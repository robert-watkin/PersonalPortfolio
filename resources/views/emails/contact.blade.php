<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }
        .message {
            font-size: 18px;
            color: #007bff;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank you for contacting us, {{ $details['name'] }}!</h1>
        <p class="message">We have received your message.</p>
        <p><strong>Your message:</strong></p>
        <p>{{ $details['email_message'] }}</p>
        <p><strong>Email:</strong> {{ $details['email'] }}</p>
    </div>
</body>
</html>
