<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <div style="margin: auto; width: 50%;">
        <h2 style="text-align: center;">Reset Password</h2>
        <form method="POST" action="{{ route('reset.password.post') }}" style="margin: auto; width: 100%;">
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div style="margin-bottom: 10px;">
                <label for="email" style="display: block;">Email Address:</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}" style="width: 100%;">
            </div>

            <div style="margin-bottom: 10px;">
                <label for="password" style="display: block;">New Password:</label>
                <input type="password" name="password" id="password" required style="width: 100%;">
            </div>

            <div style="margin-bottom: 10px;">
                <label for="password_confirmation" style="display: block;">Confirm New Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required style="width: 100%;">
            </div>

            <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Reset Password</button>
        </form>
    </div>
</body>
</html>
