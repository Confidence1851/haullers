<html lang="en">
<head>
   
    <title>Ordered Details</title>
</head>
<body>
    @php($payment = App\Payment::where('id', $me['payment_id'])->first())
    @php($vehicle = App\Vehicle::where('id', $me['vehicle_id'])->first())
    <table width='700px'>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Hello {{$me['name']}}</td></tr>
        <tr><td>Thank you for Booking with Us. Your Booking Details are stated below :</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Your Order ID is : <b>{{ $me['order_id'] }}</b></td></tr>
        <tr><td>Your payment has also been acknowleged. Payment Reference is  <b># {{ $payment->payment_ref_no }}</b> and the amount received is <b>₦ {{$payment->price}}</b>.</td></tr>
        
        <tr><td>Vehicle Ordered: <b>{{ $vehicle->vehicle_name }}</b></td></tr>
        <tr><td>Vehicle Capacity: {{ $vehicle->capacity.' '.$vehicle->unit }}</td></tr>
       
    </table>
    <br>
     <small>Please contact us at <a href="mailto:info@haullersonline.com" target="_top">info@haullersonline.com</a>  for more inquires or  information.</small>
</body>
</html>