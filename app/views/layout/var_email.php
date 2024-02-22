<!-- verification_email_template.php -->
<?php $name=$_POST["userName"]; $code="";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <h1>Email Verification</h1>
    <p>Dear {userName},,</p>
    <p>Thank you for signing up for our service! To complete the registration process, please use the following verification code:</p>
    <p>Verification Code: {verificationCode} ?></p>
    <p>Please enter this code on the verification page to activate your account.</p>
    <p>If you did not sign up for our service, please ignore this email.</p>
    <p>Thank you,</p>
    <p>Jamaican Tavern</p>
</body>
</html>
