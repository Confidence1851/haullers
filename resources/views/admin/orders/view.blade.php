@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Orders
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
                  <th> Order ID</th>
                  <th> Customer Fullname</th>
                  <th> Customer Category</th>
                  <th> Vehicle Name</th>
                  <th> Route </th>
                  <th> Price </th>
                  <th> Status </th>
                  <th> Order Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($orders as $order)
                <tr class="gradeX">
                  <td>{{ $order->id }}</td>
                  
                  @if(!empty($order->user_id))
                      @php($user = App\User::where('id', $order->user_id)->first())
                      
                      @php($userID = $user->id)
                      @php($user = $user->name)
                      @php($type = 'Registered User')
                      @php($t = 1)
                      
                  @elseif(!empty($order->contact_id))
                      @php($user = App\OrderContact::where('id', $order->order_contact_id)->first())
                      
                      @php($userID = $user->id)
                      @php($user = $user->name)
                      @php($type = 'Guest User')
                      @php($t = 0)
                     
                  @else
                      @php($userID = 'Invalid')
                      @php($user = 'Invalid')
                      @php($type = 'Invalid')
                      @php($t = 0) 
                  
                  @endif

                  @php($vehicle = App\Vehicle::where('id', $order->vehicle_id)->first())
                  @php($routeCat = App\RouteCategory::where('id', $vehicle->route_cat_id)->first())

                  @if(!empty($order->route_id))
                      @php($route = App\Route::where('id', $order->route_id)->first())
                      @php($r = $route->start.' - '.$route->end)
                  @else
                      @php($r = 'Full Day ('.$routeCat->name.')')
                  @endif
                   <td>{{ $user }}</td>
                   <td>{{ $type }}</td>
                   <td>{{ $vehicle->vehicle_name }}</td>
                   <td>{{ $r }}</td>
                  
                       @if(!empty($order->payment_id))
                          @php($payment = App\Payment::where('id', $order->payment_id)->first())
                          <td>₦{{ $payment->price }}</td>
                        @else
                          <td><a href="#payModal{{ $order->id }}" data-toggle="modal" class="btn btn-success btn-mini">Pay</a></td>
                        @endif

                   <td>{{ $order->status}}</td>
                   <td>{{ date('D, d M Y h:i:s A',strtotime($order->created_at)) }}</td>
                  @if(empty($order->payment_id))
                          <td><a href="#" class="btn btn-warning btn-small disabled">Pay first</a></td>
                  @else
                      @if($order->status == "Processing")
                          <td><a href="{{route('admin.approveOrder',$order->id)}}" class="btn btn-primary btn-small">Approve</a></td>
                      @else
                          <td><a href="#" class="btn btn-success btn-small disabled">Approved</a></td>
                      @endif
                  @endif
                  <!-- <div class="fr"><td class="center"><a href="#myModal{{ $order->id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a></td></div> -->
                </tr>
                 
                 <div class="modal fade bd-example-modal-md" id="payModal{{ $order->id }}">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $vehicle->vehicle_name }}</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" method="post" action="{{ route('admin.attachpay', $order->id)}}"> {{ csrf_field() }}
                        <h4 class="text-center">Fill in details correctly!</h4>
                            <br>
                              <input type="hidden" name="v_id"  value="{{$vehicle->id}}" required />
                              <input type="hidden" name="user_id"  value="{{$userID}}" required />
                              <input  type="hidden" name="type"  value="{{$t}}" required />

                                <div class="form-group">
                                    <label class="control-label">Payment Reference No.</label>
                                    <div class="controls">
                                      <input type="text" name="ref"  class="form-control" required  />
                                      @error('ref')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label">Price (₦)</label>
                                    <div class="controls">
                                      <input type="number" name="price" class="form-control" required />
                                      @error('price')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                    </div>
                                  </div>
                                <button type="submit" class="btn btn-small btn-primary mt-3" style="float:right">Submit</button>
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
                           
        </section>
    </div>

 <!-- JS Libraies -->
  <script src="dashboard/datatables/datatables.min.js"></script>
  <script src="dashboard/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="dashboard/jquery-ui/jquery-ui.min.js"></script>

@endsection