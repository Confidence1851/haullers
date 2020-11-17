@extends('layouts.adminLayout.admin_design')
@section('content')
   <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ route('home') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#" class="current">View Messages</a> </div>
    <h1> Messages </h1>
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
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Unread Messages</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Message ID </th>
                  <th>Type</th>
                  <th>Reference</th>
                  <th>Message</th>

                  <th>User Type  </th>
                  <th>User ID</th>
                  <th>Payment</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($messages as $message)
  
                  <tr class="gradeX">
                    <td>{{ $message->id }}</td>
                    @if($message->type == 'Order')
                        <td><b>New Order</b></td>
                        <td>{{ $message->order_id}}</td>
                        <td>{{ $message->message}}</td>
                        @if($message->user_type == 'User')
                          <td>Registered</td>
                          <td><a href="{{ $message->user_id }}">Link</a></td>
                        @elseif($message->user_type == 'Guest')
                          <td>Guest User</td>
                          <td> <a href="{{ $message->user_id }}">Link</a></td>
                        @endif
                        @if(empty($message->payment_id))
                          <td>No Payment</td>
                        @else
                          <td>Payment Ref ID: <a href=""></a></td>
                        @endif
                    @endif
                    <td>{{ date('D, d M Y h:i:s A',strtotime($message->created_at)) }}</td>
                    <td class="center"> <a id="delProduct" href="#" class="btn btn-danger btn-mini">Delete</a></td><div>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
@stop
