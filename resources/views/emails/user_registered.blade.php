<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
            text-align: center;
        }
        p {
            color: #555555;
            line-height: 1.6;
            font-size: 16px;
        }
        a {
            display: inline-block;
            margin: 20px 0;
            padding: 3px;
            background-color: #007bff;
            color:white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        a:hover {
            background-color: #0056b3;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello, {{ $user->name }}!</h1>
        <p>Thank you for registering with us. We are glad to have you on board!</p>
        <table role="presentation" border="0" cellspacing="0" cellpadding="0" style="margin: 25px auto;">
            <tr>
                <td align="center" 
                    style="
                        background: #007bff;
                        border-radius: 10px;
                        padding: 0;
                    ">
                    
                    <a href="http://127.0.0.1:8000/verify-email/{{ $user->verification_token }}"
                        style="font-size: 14px; font-weight: 600; font-family: Arial, sans-serif; color: #ffffff !important; text-decoration: none; display: inline-block; padding: 10px 25px; border-radius: 10px;">
                            Verify Email
                        </a>
                </td>
            </tr>
        </table>
        <footer>
            <p>&copy; {{ date('Y') }} Martega. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
