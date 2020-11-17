@extends('users.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Change Password
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
                    <form enctype="multipart/form-data" method="post" action="{{ url('/users/update-pwd') }}">{{csrf_field()}}

                      <div class="row col-md-6 offset-md-3">
                        <div class="col-md-12">
                              <div class="form-group">
               
                <label class="control-label">Current Password</label>
                  <div class="controls">
                    <input type="password" name="current_pwd" class="form-control" required id="current_pwd" />
                    <span id="chkPwd"></span>
                  </div>
                <label class="control-label">New Password</label>
                  <div class="controls">
                    <input type="password" name="new_pwd" class="form-control" required id="new_pwd" />
                  </div>
                </div>
               <label class="control-label">Confirm password</label>
                  <div class="controls">
                    <input type="password" name="confirm_pwd" class="form-control" required id="confirm_pwd" />
                  </div>
              </div>
                          
                          <div class="col-md-12 mt-3">
                            <input type="submit" value="Update Password" class="btn btn-success">
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