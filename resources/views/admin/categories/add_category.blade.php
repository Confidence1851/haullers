@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Add Vehicle Category
                    <span style="float:right"><a href="{{ url('/admin/view-categories') }}" class="btn btn-primary">Back to list</a></span>
                    </h4>
                  </div>
                  <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="{{ url('/admin/add-category') }}">{{csrf_field()}}

                      <div class="row col-md-6 offset-md-3">
                        <div class="col-md-12">
                              <div class="form-group">
                                <label class="control-label">Category Name</label>
                                <div class="controls">
                                  <input type="text" name="category_name" class="form-control" id="category_name">
                                </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class=" form-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                  <textarea name="description"  class="form-control" rows="5" id="description"></textarea>
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