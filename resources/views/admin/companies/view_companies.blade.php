@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Companies
                      <span style="float:right"><a href="{{ url('/admin/add-company') }}" class="btn btn-primary">New Company</a></span>
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
                  <th> Name</th>
                  <th> Logo</th>
                  <th>C.A.C No.</th>
                  <th>Location</th>
                  <th>Phone </th>
                  <th>Second Number</th>
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($companies as $company)
                <tr class="gradeX">
                  <td>{{ $company->id }}</td>
                  <td>{{ $company->name }}</td>
                  <td>
                    @if (!empty($company->logo))
                      <img src="{{ asset('public/images/backend_images/products/small/'.$company->logo) }}" style="width:60px;">  
                    @endif
                  </td>
                  <td>{{ $company->cac }}</td>
                  <td>{{ $company->business_location }}</td>
                  <td>{{ $company->phone }}</td>
                  <td>{{ $company->phone2 }}</td>

                  <td>{{ $company->email }}</td>
                  
                  <td class="center"><a href="#myModal{{ $company->id }}" data-toggle="modal" class="btn btn-success btn-sm"><i class="ti-eye"></i></a> 
                  <a href="{{ url('/admin/edit-company/'.$company->id) }}" class="btn btn-primary btn-sm"><i class="ti-pencil"></i></a> 
                  <a id="delProduct" href="{{ url('/admin/delete-company/'.$company->id) }}" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a></td><div>
                </tr>
                
             
                          <div class="modal fade bd-example-modal-md" id="myModal{{ $company->id }}">
                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $company->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                @php($count = App\Vehicle::where('company_id', $company->id)->count())
                                <div class="modal-body">
                                    <p>Company ID: {{ $company->id }}</p>
                                    <p>Company Name: {{ $company->name }}</p>
                                    <p>Corporate Affairs Commission No.: {{ $company->cac }}</p>
                                    <p>Business Location: {{ $company->business_location }}</p>
                                    <p>Phone Number: {{ $company->phone }}</p>
                                    <p>Second Phone Number: {{ $company->phone2 }}</p>
                                    <p>Email-Address: {{ $company->email }}</p>
                                    <p>No. of Registered Vehicles: {{ $count }} <span style="float:right"><button class="btn btn-small btn-primary">View Company Vehicles</button></span></p>
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
                           
        </section>
    </div>

 <!-- JS Libraies -->
  <script src="dashboard/datatables/datatables.min.js"></script>
  <script src="dashboard/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="dashboard/jquery-ui/jquery-ui.min.js"></script>

@endsection