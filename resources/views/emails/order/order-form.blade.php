@component('mail::message')
    <table width='700px'>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Hello {{ $data['name'] }}</td>
        </tr>
        <tr>
            <td>Thank you for Booking with Us. Your Booking Details are stated below :</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Your Order ID is : <b>{{ $data['order']->id }}</b></td>
        </tr>
        <tr>
            <td>Your payment has also been acknowleged. Payment Reference is <b>#
                    {{ $data['payment']->payment_ref_no }}</b> and the amount received is <b>₦
                    {{ $data['payment']->price }}</b>.</td>
        </tr>
        <tr>
            <td>Vehicle Ordered: <b>{{ $data['vehicle']->vehicle_name }}</b></td>
        </tr>
        <tr>
            <td>Vehicle Capacity: {{ $data['vehicle']->capacity . ' ' . $data['vehicle']->unit }}</td>
        </tr>
    </table>
    <br>
    <small>
        Please contact us at
        <a href="mailto:info@haullersonline.com" target="_top">info@haullersonline.com</a>
        for more inquires or information.
    </small>

@endcomponent
