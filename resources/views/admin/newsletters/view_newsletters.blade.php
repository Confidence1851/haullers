@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Payments</h4>
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
                  <th>Newsletter Subscriber ID</th>
                  <th>Newsletter Subscriber Email</th>
                  <th>Newsletter Subscribers Status</th>
                  <th>Created On</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($newsletters as $newsletter)
                <tr class="gradeX">
                  <td class="center">{{ $newsletter->id }}</td>
                  <td class="center">{{ $newsletter->email }}</td>
                   <td class="center">
                    @if ($newsletter->status==1)
                        <span style="color:green;">Active</span>
                    @else
                        <span style="color:red;">Inactive</span>  
                    @endif
                   <td class="center">{{ $newsletter->created_at }}</td>
                  <div class="fr"><td class="center"> <a id="delCat" href="{{ url('/admin/delete-newsletter-email/'.$newsletter->id) }}" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a></td></div>
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