@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Vehicle Routes
                      <span style="float:right"><a href="{{ route('admin.routes.create') }}" class="btn btn-primary">New Route</a></span>
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
                  <th> ID</th>
                  <th> Category Name</th>
                  <th> Route Startpoint</th>
                  <th> Route Endpoint</th>
                  <th> Price Per Tonne</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($routes as $route)
                  @php($category = App\RouteCategory::find($route->route_cat_id))
                <tr class="gradeX">
                  <td>{{ $route->id }}</td>
                  <td>{{ $category->name }}</td>
                   <td>{{ $route->start }}</td>
                   <td>{{ $route->end }}</td>
                   <td>₦ {{ $route->price }}</td>
                  <div class="fr"><td class="center"><a href="{{ route('admin.routes.edit', $route->id) }}" class="btn btn-primary btn-sm"><i class="ti-pencil"></i></a>
                  <a id="delCat" href="{{ route('admin.deleteRoute' , $route->id) }}" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a></td></div>
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