@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Vehicle Categories
                      <span style="float:right"><a href="{{ url('/admin/add-category') }}" class="btn btn-primary">New Category</a></span>
                    </h4>
                  </div>
                  <div class="card-body">
                  @if (Session::has('flash_message_error'))
                        <div class="alert alert-error alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{!! session('flash_message_error') !!}</strong>
                        </div>        
                    @endif
                    @if (Session::has('flash_message_success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{!! session('flash_message_success') !!}</strong>
                        </div>        
                    @endif
                   <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                <tr>
                  <th>ID</th>
                  <th> Category Name</th>
                  <th> Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($categories as $category)
                <tr class="gradeX">
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                   <td>{{ $category->description }}</td>
                  <td class="center"><a href="{{ url('/admin/edit-category/'.$category->id) }}" class="btn btn-primary btn-sm"><i class="ti-pencil"></i></a>
                        <a id="delCat" href="{{ url('/admin/delete-category/'.$category->id) }}" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a></td>
                </tr>
              @endforeach
              </tbody>
            </table>
                  </div>
                </div>
              </div>
                           
        </section>
    </div>

 <!-- JS Libraies -->
  <script src="dashboard/datatables/datatables.min.js"></script>
  <script src="dashboard/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="dashboard/jquery-ui/jquery-ui.min.js"></script>

@endsection