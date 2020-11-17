@extends('users.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>My Orders
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
                  <th>Order ID</th>
                  <th> Vehicle Name </th>
                  <th> Payment reference </th>
                  <th> Price </th>
                  <th> Route </th>
                  <th> Order Date</th>
                  <!-- <th>Actions</th> -->
                </tr>
              </thead>
              <tbody>
              @foreach ($orders as $order)
              
              @if($order->payment_id != Null)
                @php($ref = App\Payment::where('id', $order->payment_id)->first())
                @php($refNo = '# '. $ref->payment_ref_no )
                @php($refPrice =  $ref->price )
              @else
                @php($refNo = "Not Available")
                @php($refPrice ="Not Available")
              @endif
              
                @php($vehicle = App\Vehicle::findOrFail($order->vehicle_id))
                @if($order->route_id != Null)
                  @php($route = App\Route::findOrFail($order->route_id))
                  @php($route = $route->start.' - '.$route->end)
                @else
                  @php($route = 'Full day')
                @endif
                  <tr class="gradeX">
                    <td>{{$order->id}}</td>
                    <td>{{ $vehicle->vehicle_name }}</td>
                    <td>{{ $refNo }}</td>
                    <td>{{ $refPrice }}</td>
                    <td>{{ $route }}</td>
                    <td>{{ $order->created_at }}</td>
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

