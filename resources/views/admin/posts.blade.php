@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Posts
                      <span style="float:right"><a href="{{ route('newpost') }}" class="btn btn-primary">New Post</a></span>
                    </h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">Edit</th>
                            <th>Image</th>
                            <th>Post</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Comments</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($posts as $post)
                        @php($cmts = App\Comment::where('post_id',$post->id)->count())
                          <tr>
                            <td><a href="{{ route('editpost',$post->id) }}" class="btn btn-primary">Edit</a></td>
                            <td><img src="{{ asset('post_images/'.$post->image ) }}" alt="{{$post->title}}"  style="width:100px" /> </td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->category}}</td>
                            <td>{{$post->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>{{$cmts}}</td>
                            <td>{{ date('D, d M Y', strtotime($post->created_at))}}</td>
                          </tr>
                        @endforeach
                          <div class="modal fade bd-example-modal-md" id="editpost">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Request Information</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                              </div>
                            </div>
                          </div>

                        </tbody>
                      </table>
                    </div>
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