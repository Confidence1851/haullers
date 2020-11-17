@extends('admin.layout.app')

@section('content')
            <!-- Dark table start -->
            <div class="col-12 mt-5">
                        @if (Session::has('flash_message_error'))
                            <h5><font color="red">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                    <strong>{!! session('flash_message_error') !!}</strong>
                            </font></h5>        
                        @endif
                        @if (Session::has('flash_message_success'))
                            <h5><font color-"green">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                    <strong>{!! session('flash_message_success') !!}</strong>
                            </font></h5>       
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Dish Categories 
                                    <span class="pull-right">
                                    <button type="button" class="btn btn-primary  mb-2" data-toggle="modal" data-target="#newmodal">New Category</button>
                                    </span>
                                </h4> 
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td><a href="" data-toggle="modal" data-target="#edit-{{$category->id}}">Edit</a></td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->description}}</td>
                                                <td>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                             <!-- Edit post -->
                                                <div class="modal fade" id="edit-{{$category->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Dish Caegory </h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">{{csrf_field()}} {{method_field('PATCH')}}
                                                                    <div class="form-group" >
                                                                        <label for="">Name</label>
                                                                        <input type="text" name="name" maxlength="50" id="" class="form-control" required autofocus value="{{$category->name}}">
                                                                    </div>
                                                                    <div class="form-group" >
                                                                        <label for="">Description</label>
                                                                        <textarea rows="4" name="description" id="" class="form-control summernote" required value="">{{$category->description}}</textarea>
                                                                    </div>
    
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <!-- Delete post -->
                                                <div class="modal fade" id="delete">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-red">Are your sure you want to delete? All information related to this post would be deleted. This action can`t be revoked!</h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form action="{{route('categories.destroy',$category->id)}}" method="post">{{csrf_field()}} {{method_field('DELETE')}}
                                                                <button type="submit" class="btn btn-warning">Proceed</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->

                                <!-- New post -->
                                <div class="modal fade" id="newmodal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">New Category </h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                                                    <div class="form-group" >
                                                        <label for="">Name</label>
                                                        <input type="text" name="name" maxlength="50" id="" class="form-control" required autofocus value="{{old('name')}}">
                                                    </div>
                                                    <div class="form-group" >
                                                        <label for="">Description</label>
                                                        <textarea rows="4" name="description" id="" class="form-control summernote" required value="">{{old('description')}}</textarea>
                                                    </div>
                                                   
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                     <!-- main content area end -->

<script>
$(document).ready(function() {
    $('.summernote').summernote();
});
</script>
@endsection