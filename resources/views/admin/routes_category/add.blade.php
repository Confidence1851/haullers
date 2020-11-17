@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Add Route Category
                    <span style="float:right"><a href="{{ route('admin.route-category.index') }}" class="btn btn-primary">Back to list</a></span>
                    </h4>
                  </div>
                  <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="{{ route('admin.route-category.store') }}">{{csrf_field()}}

                      <div class="row col-md-6 offset-md-3">
                          
                        <div class="col-md-12">
                        <div class="form-group">
                        <label class="control-label">State</label>
                          <select type="text" class="form-control" name="state"   required>
                            <option disabled selected  >Select State</option>
                            @include('admin.routes_category.states')
                          </select>
                          @error('state')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                        </div>
                        
                        <div class="col-md-12">
                        <div class="form-group">
                        <label class="control-label">Route Name</label>
                        <div class="controls">
                          <input type="text" name="name" id="category_name"  class="form-control" required>
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                        </div>
                      </div>
              
                          <div class="col-md-12">
                            <input type="submit" value="Add Category" class="btn btn-success">
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