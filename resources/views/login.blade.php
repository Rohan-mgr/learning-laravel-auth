<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    @if(Session::has('fail'))
    <span>{{Session::get('fail')}}</span>
    @endif
    <form action="/login" method="post">
        @csrf
        <div>
            <label>Username: </label>
            <input type="email" placeholder="Enter Username" name="email">
            <span>@error('email') {{$message}} @enderror</span><br>
        </div>
        <div>
            <label>Password: </label>
            <input type="password" placeholder="Enter Password" name="password">
            <span>@error('password') {{$message}} @enderror</span><br>
        </div>
        <button type="submit">Login</button>
    </form>
</body>

</html>