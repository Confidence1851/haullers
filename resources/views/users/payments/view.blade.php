@extends('users.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>My Payments
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
                  <th>Payment ID </th>
                  <th>Reference No  </th>
                  <th>Status</th>
                  <th>Date</th>
                  <!-- <th>Actions</th> -->
                </tr>
              </thead>
              <tbody>
              @foreach ($payments as $payment)
  
                  <tr class="gradeX">
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->payment_ref_no }}</td>
                    @if($payment->status == 0)
                      <td>Pending</td>
                      @else
                      <td>Approved</td>
                    @endif
                    <td>{{$payment->created_at }}</td>
                    <!-- <td class="center"> <a id="delProduct" href="#" class="btn btn-danger btn-mini">Delete</a></td><div> -->
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