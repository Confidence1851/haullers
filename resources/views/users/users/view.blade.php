@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Registered Users</h4>
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
                  <th>  ID</th>
                  <th>  Full Name</th>
                  <th> Email </th>
                  <th> Phone </th>
                  <th> Phone 2 </th>
                  <th> Role </th>
                  <th> Signup Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($users as $user)
                <tr class="gradeX">
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                   <td>{{ $user->email }}</td>
                   <td>{{ $user->phone }}</td>
                   <td>{{ $user->phone2 }}</td>
                   <td>{{ $user->role }}</td>
                   <td>{{ date('D, d M Y', strtotime($user->created_at)) }}</td>
                  <div class="fr"><td class="center"><a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="ti-pencil"></i></a>
                  <!--<a id="delCat" href="" class="btn btn-danger btn-mini">Suspend</a></td></div>-->
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