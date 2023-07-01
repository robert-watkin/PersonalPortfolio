<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
</head>
<body>
    <h1>You have a new message from {{ $details['name'] }}:</h1>
    <p>{{ $details['message'] }}</p>
    <p>Email: {{ $details['email'] }}</p>
</body>
</html>