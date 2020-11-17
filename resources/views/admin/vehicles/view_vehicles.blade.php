@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Vehicles
                      <span style="float:right"><a href="{{ url('/admin/add-vehicle') }}" class="btn btn-primary">New Vehicle</a></span>
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
                  <th>Company</th>
                  <th>Category</th>
                  <th>Route </th>
                  <th> VehicleName</th>
                  <th> Model</th>
                  <th> Status</th>
                  <th> Price</th>
                  <th> Available</th>
                  <th>Plate Number</th>
                  <th>Capacity</th>
                  <th>Image</th>
                  <th>Image 1</th>
                  <th>Image 2</th>
                  <th>Image 3</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($vehicles as $vehicle)
                <tr class="gradeX">
                  <td>{{ $vehicle->id }}</td>
                  <td>{{ $vehicle->company_name }}</td>
                  <td>{{ $vehicle->vehiclecategory_name }}</td>
                  <td>{{ $vehicle->routecategory_name }}</td>
                  <td>{{ $vehicle->vehicle_name }}</td>
                  <td>{{ $vehicle->vehicle_model }}</td>
                  <td>{{ $vehicle->vehicle_status }}</td>
                  <td>₦ {{ $vehicle->price }}</td>
                  <td>{{ $vehicle->quantity_available }}</td>
                  <td>{{ $vehicle->plate_no }}</td>
                  <td>{{ $vehicle->capacity.' '.$vehicle->unit }}</td>
                  <td>
                    @if (!empty($vehicle->image))
                      <img src="{{ asset('public/images/backend_images/products/medium/'.$vehicle->image) }}" style="width:60px;">  
                    @endif
                  </td>
                  <td>
                    @if (!empty($vehicle->image1))
                      <img src="{{ asset('public/images/backend_images/products/medium/'.$vehicle->image1) }}" style="width:60px;">  
                    @endif
                  </td>
                  <td>
                    @if (!empty($vehicle->image2))
                      <img src="{{ asset('public/images/backend_images/products/medium/'.$vehicle->image2) }}" style="width:60px;">  
                    @endif
                  </td>
                  <td>
                    @if (!empty($vehicle->image3))
                      <img src="{{ asset('public/images/backend_images/products/medium/'.$vehicle->image3) }}" style="width:60px;">  
                    @endif
                  </td>
                  <td class="center"><a href="#myModal{{ $vehicle->id }}" data-toggle="modal" class="btn btn-success btn-sm"><i class="ti-eye"></i></a>
                  <a href="{{ url('/admin/edit-vehicle/'.$vehicle->id) }}" class="btn btn-primary btn-sm"><i class="ti-pencil"></i></a>
                  <a id="delProduct" href="{{ url('/admin/delete-vehicle/'.$vehicle->id) }}" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a></td><div>  
                 </tr>
                 
                 <div class="modal fade bd-example-modal-md" id="myModal{{ $vehicle->id }}">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $vehicle->vehicle_name }}</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                        <p>Vehicle ID: {{ $vehicle->id }}</p>
                        <p>Company Name: {{ $vehicle->company_name }}</p>
                        <p>Vehicle Category: {{ $vehicle->vehiclecategory_name }}</p>
                        <p>Route Category: {{ $vehicle->routecategory_name }}</p>
                        <p>Vehicle Name: {{ $vehicle->vehicle_name }}</p>
                        <p>Vehicle Model: {{ $vehicle->vehicle_model }}</p>
                        <p>Vehicle Status: {{ $vehicle->vehicle_status }}</p>
                        <p>Vehicle Description: {{ $vehicle->vehicle_description }}</p>
                        <p>Vehicle Price: {{ $vehicle->vehicle_price }}</p>
                        <p>Number of Available Vehicles: {{ $vehicle->quantity_available }}</p>
                        <p>Vehicle Plate No.: {{ $vehicle->plate_no }}</p>
                        <p>Vehicle Capacity: {{ $vehicle->capacity.' '.$vehicle->unit }}</p>
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