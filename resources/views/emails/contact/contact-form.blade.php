@component('mail::message')
New Message Received!
<strong>First Name</strong> {{ $data['fname'] }}
<br>
<strong>Last Name</strong> {{ $data['lname'] }}
<br>
<strong>Email</strong> {{ $data['email'] }}
<br>
<strong>Subject</strong> {{ $data['subject'] }}
<br>
<strong>Message</strong> 
{{ $data['message'] }}

@endcomponent


<!--@component('mail::message')-->
<!--# Thank you for your Message-->
<!--<strong>Hello</strong> {{ $data['fname'].' '.$data['lname'] }} , we received you message as regards <i>{{ $data['subject'] }}</i>  . We would review and act as soon as possible!-->
<!--<br>-->

<!--We also attached the you message in case you need to make refernce to it.-->
<!--<strong>Email</strong> {{ $data['email'] }}-->
<!--<br>-->
<!--<strong>Subject:</strong> {{ $data['subject'] }}-->
<!--<br>-->
<!--<strong>Message body: </strong> -->
<!--{{ $data['message'] }}-->

<!--@endcomponent-->
