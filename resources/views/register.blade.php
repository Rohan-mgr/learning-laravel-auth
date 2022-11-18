<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Sign Up</h2>
    @if(Session::has("fail")){
    <span>{{Session::get("fail")}}</span>
    @endif

    <form action="/register" method="post">
        @csrf
        <div>
            <label>Name: </label>
            <input type="text" placeholder="Enter Name" name="name"><br>
            <span>@error('name') {{$message}} @enderror</span><br>
        </div>
        <div>
            <label>Username: </label>
            <input type="email" placeholder="Enter Username" name="email"><br>
            <span>@error('email') {{$message}} @enderror</span><br>

        </div>
        <div>
            <label>Password: </label>
            <input type="password" placeholder="Enter Password" name="password"><br>
            <span>@error('password') {{$message}} @enderror</span><br>

        </div>
        <button type="submit">Sign Up</button>
    </form>
</body>

</html>