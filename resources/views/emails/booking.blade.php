<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Enquiry Details</h2>
        <p> Name : {{ $data['name'] }}</p>
        <p> Email : {{ $data['email'] }}</p>
        <p> Phone : {{ $data['phone_number'] }}</p>
        <p> Subject : {{ $data['subject'] }}</p>
        <p> Message : {{ $data['message'] }}</p>
        
    </body>
</html>