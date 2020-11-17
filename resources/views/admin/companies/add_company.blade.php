@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Add Company</h4>
                  </div>
                  <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="{{ url('/admin/add-company') }}">{{csrf_field()}}

                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Company Name</label>
                                <div class="controls">
                                  <input type="text" name="company_name" class="form-control"  id="company_name"  required value="{{ old('company_name') }}">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Company Logo</label>
                                <div class="controls">
                                    <input type="file" name="company_logo" class="form-control"  id="company_logo"  required value="{{ old('company_logo') }}"/>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Email-Address</label>
                                <div class="controls">
                                  <input type="email" name="company_email" class="form-control"  id="company_email"  required value="{{ old('company_email') }}">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Corporate Affairs Commission No.</label>
                                <div class="controls">
                                  <input type="text" name="company_cac" class="form-control"  id="company_cac"  required value="{{ old('company_cac') }}">
                                </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">Business Location</label>
                                <div class="controls">
                                  <textarea name="company_location" class="form-control" rows="5" id="company_location" required>{{ old('company_location') }}</textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Phone Number</label>
                                <div class="controls">
                                  <input type="text" name="company_phone" class="form-control"  id="company_phone" required value="{{ old('company_phone') }}">  
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Second Phone Number</label>
                                <div class="controls">
                                  <input type="text" name="company_phone2" class="form-control"  id="company_phone2" value="{{ old('company_phone') }}">
                                </div>
                              </div>
                          </div>
                          
                          <div class="form-actions">
                            <input type="submit" value="Add Company" class="btn btn-success">
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

