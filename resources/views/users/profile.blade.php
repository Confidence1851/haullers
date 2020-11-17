@extends('users.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Profile
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
                    <form enctype="multipart/form-data" method="post" action="{{ url('/users/update-profile') }}">{{csrf_field()}}

                      <div class="row col-md-6 offset-md-3">
                        <div class="col-md-12">
                              <div class="form-group">
               
                <label class="control-label">Full Name</label>
                <div class="controls">
                  <input type="text" name="name" class="form-control"  value="{{$user->name}}" required >
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="email" name="email" readonly class="form-control" value="{{$user->email}}" required>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <label class="control-label">Phone Number</label>
                <div class="controls">
                  <input type="text" name="phone" class="form-control"  value="{{$user->phone}}"  >
                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <label class="control-label">Alt Phone Number</label>
                <div class="controls">
                  <input type="text" name="phone2" class="form-control"  value="{{$user->phone2}}"  >
                  @error('phone2')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
               
              </div>
                          </div>
                          
                          <div class="col-md-12">
                            <input type="submit" value="Update Profile" class="btn btn-success">
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