<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Newsletter!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #b3e5fc; /* Light blue background */
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #f0f0f0; /* Light grey background for the container */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4A90E2; /* A nice blue color */
            text-align: center;
        }
        p {
            line-height: 1.6;
            color: #555;
            margin-bottom: 15px;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
            text-align: center;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #4A90E2; /* Button color */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .button:hover {
            background-color: #357ABD; /* Darker shade on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, {{ $details['name'] ?? 'Subscriber' }}!</h1>
        <p>Thank you for subscribing to our newsletter!</p>
        <p>You will receive updates, promotions, and news directly in your inbox.</p>
        <p>If you have any questions or feedback, feel free to reach out to us!</p>
        <p>We’re excited to have you on board!</p>
        <a href="{{ url('/') }}" class="button">Visit Our Website</a>
        <p class="footer">Best regards,<br>Your Company Name</p>
    </div>
</body>
</html>
