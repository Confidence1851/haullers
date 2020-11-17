@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Route 
                    <span style="float:right"><a href="{{ route('admin.routes.index') }}" class="btn btn-primary">Back to list</a></span>
                    </h4>
                  </div>
                  <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="{{ route('admin.routes.update' , $routeDetails->id) }}">{{csrf_field()}} @method('put')

                      <div class="row col-md-6 offset-md-3">
                          
                        <div class="col-md-12">
                        <div class="form-group">
                       <label class="control-label">Route Category</label>
                              <select type="text" class="form-control" name="route_cat_id" id="route_cat_id"  required>
                                <option disabled selected  >Select Route Category</option>
                                @foreach($cats as $cat)
                                  <option value="{{$cat->id}}" {{ $routeDetails->route_cat_id == $cat->id ? 'selected' : '' }} >{{$cat->name}}</option>
                                @endforeach
                              </select>
                              @error('route_cat_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                        </div>
                        
                        <div class="col-md-12">
                        <div class="form-group">
                        <label class="control-label">Route Start Point</label>
                              <input type="text" name="start" class="form-control"  id="start" value="{{$routeDetails->start}}"required>
                              @error('start')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                        </div>
                        
                        
                        
                        <div class="col-md-12">
                        <div class="form-group">
                        <label class="control-label">Route End Point</label>
                              <input type="text" name="end" class="form-control"  id="end" value="{{$routeDetails->end}}" required>
                              @error('end')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                        </div>
                        
                        <div class="col-md-12">
                        <div class="form-group">
                        <label class="control-label">Price Per Range (₦)</label>
                              <input type="number" name="price" class="form-control"  id="price" value="{{$routeDetails->price}}" required>
                              @error('price')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                        </div>
                        
              
                          <div class="col-md-12">
                            <input type="submit" value="Update Route" class="btn btn-success">
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