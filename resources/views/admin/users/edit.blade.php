@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Edit User
                    <span style="float:right"><a href="{{ route('admin.users.index') }}" class="btn btn-primary">Back to list</a></span>
                    </h4>
                  </div>
                  <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="{{ route('admin.users.update' , $user->id) }}">{{csrf_field()}} @method('patch')

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
                  <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
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
                <label class="control-label">Role</label>
                <div class="controls ">
                  <select type="text" class="form-control" name="role"  required>
                    <option value="admin"  {{ $user->role == 'admin' ? 'selected' : '' }} >Admin</option>
                    <option value="user"  {{ $user->role == 'user' ? 'selected' : '' }} >User</option>
                  </select>
                  @error('role')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <label class="control-label">Change Password</label>
                <div class="controls">
                  <input type="text" name="password" class="form-control" >
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
                          </div>
                          
                          <div class="col-md-12">
                            <input type="submit" value="Update User" class="btn btn-success">
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