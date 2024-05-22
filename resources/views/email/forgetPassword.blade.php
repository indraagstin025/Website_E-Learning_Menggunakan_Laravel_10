<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Hello,</h2>
    <p>You have requested to reset your password. Click the link below to reset it:</p>
    <a href="{{ route('reset.password.get', $token) }}">Reset Password</a>
    <br>
    <p>If you did not request a password reset, no further action is required.</p>
    <p>Regards,<br>Your Application Team</p>
</body>
</html>
