@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Add Vehicle 
                    <span style="float:right"><a href="{{ url('/admin/view-vehicles') }}" class="btn btn-primary">Back to list</a></span>
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
                    <form enctype="multipart/form-data" method="post" action="{{ url('/admin/add-vehicle') }}">{{ csrf_field()}}

                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">Company</label>
                                <div class="controls">
                                  <select name="company_id" class="form-control" id="company_id"  required>
                                      <?php echo $companies_dropdown; ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Route Category</label>
                                <div class="controls">
                                  <select name="route_cat_id" class="form-control" id="route_cat_id" required>
                                    <?php echo $routecategory_dropdown; ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Vehicle Category</label>
                                <div class="controls">
                                  <select name="vehicle_cat_id" class="form-control" id="route_cat_id" required>
                                    <?php echo $vehiclecategory_dropdown; ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Vehicle Name</label>
                                <div class="controls">
                                  <input type="text" name="vehicle_name" class="form-control" id="vehicle_name" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Vehicle Model</label>
                                <div class="controls">
                                  <input type="text" name="vehicle_model" class="form-control" id="vehicle_model" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Vehicle Status</label>
                                <div class="controls">
                                  <select type="text" name="vehicle_status" class="form-control" id="vehicle_status"  required>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Hired">Hired</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Vehicle Description</label>
                                <div class="controls">
                                  <textarea name="description" class="form-control" id="description"  required></textarea>
                                </div>
                             </div>
                              <div class="form-group">
                                <label class="control-label">Vehicle Price</label>
                                <div class="controls">
                                  <input type="number" name="vehicle_price" class="form-control" id="vehicle_price" required>
                                </div>
                              </div>
                          </div>
                          
                          <div class="col-md-6">
                              
                              
                              <div class="form-group">
                                <label class="control-label">Quantity Available</label>
                                <div class="controls">
                                  <input type="number" name="quantity" class="form-control" id="quantity" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Plate Number</label>
                                <div class="controls">
                                  <input type="text" name="plate_number" class="form-control" id="plate_number" required>
                                </div>
                              </div>
                                <div class="form-group">
                                <label class="control-label">Unit</label>
                                <div class="controls">
                                  <select type="text" name="unit" class="form-control" id="description"  required>
                                    <option value="Tonne(s)">Tonne(s)</option>
                                    <option value="Kg">Kg</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Weight</label>
                                <div class="controls">
                                  <input type="number" name="capacity" class="form-control" id="capacity" required>
                                </div>
                            </div>
                              <div class="form-group">
                                <label class="control-label">Vehicle Image</label>
                                <div class="controls">
                                    <input type="file" name="image" class="form-control" id="image" required/>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Vehicle Image 1 <small>(Optional)</small></label>
                                <div class="controls">
                                    <input type="file" name="image1" class="form-control" id="image1" />
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Vehicle Image 2 <small>(Optional)</small></label>
                                <div class="controls">
                                    <input type="file" name="image2" class="form-control" id="image2" />
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Vehicle Image 3 <small>(Optional)</small></label>
                                <div class="controls">
                                    <input type="file" name="image3" class="form-control" id="image3" />
                                </div>
                              </div>
                          </div>

                          <div class="col-md-12">
                            <input type="submit" value="Add Vehicle" class="btn btn-success">
                          </div>
                         </form>
                      </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
            
</div>
@endsection