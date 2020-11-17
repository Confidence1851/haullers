@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Company
                    <span style="float:right"><a href="{{ url('/admin/view-companies') }}" class="btn btn-primary">Back to list</a></span>
                    </h4>
                  </div>
                  <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="{{ url('/admin/edit-company/'.$companyDetails->id) }}">{{csrf_field()}}

                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Company Name</label>
                                <div class="controls">
                                  <input type="text" name="company_name" class="form-control" value="{{ $companyDetails->name }}" id="company_name">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Email-Address</label>
                                <div class="controls">
                                  <input type="email" name="company_email" class="form-control" value="{{ $companyDetails->email }}" id="company_email">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Company Logo</label>
                                <div class="controls">
                                    <input type="file" name="company_logo" class="form-control" value="{{ $companyDetails->logo }}" id="company_logo" />
                                    <input type="hidden" name="current_image" class="form-control" value="{{ $companyDetails->logo }}">
                                    @if (!empty($companyDetails->logo))
                                      <img style="width:40px;" src="{{ asset('public/images/backend_images/products/small/'.$companyDetails->logo) }}"> / 
                                      <a class="btn btn-danger" href="{{ url('/admin/delete-company-logo/'.$companyDetails->id) }}" >Delete</a>
                                    @endif
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Corporate Affairs Commission No.</label>
                                <div class="controls">
                                  <input type="text" name="company_cac" class="form-control" value="{{ $companyDetails->cac }}" id="company_cac">
                                </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">Business Location</label>
                                <div class="controls">
                                  <textarea name="company_location" class="form-control" rows="5" id="company_location">{{ $companyDetails->business_location }}</textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Phone Number</label>
                                <div class="controls">
                                  <input type="text" name="company_phone" class="form-control" value="{{ $companyDetails->phone }}" id="company_phone">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Second Phone Number</label>
                                <div class="controls">
                                  <input type="text" name="company_phone2" class="form-control" value="{{ $companyDetails->phone2 }}" id="company_phone2">
                                </div>
                              </div>
                          </div>
                          
                          <div class="form-actions">
                            <input type="submit" value="Update Company" class="btn btn-success">
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