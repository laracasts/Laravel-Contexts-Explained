<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>
    <h1>Contact Us from User</h1>
    <p>User: {{ $user->id }} {{ $user->name }}</p>
    <p>Account: {{ $account->account_number }} {{ $account->name }}</p>
    <hr>
    <p>{{$contactMessage}}</p>

</body>
</html>