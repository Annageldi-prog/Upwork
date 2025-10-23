<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Login</h2>
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ url('web/v1/admin/login') }}">
    @csrf
    <label>Username:</label>
    <input type="text" name="username" value="{{ old('username') }}">
    <br><br>
    <label>Password:</label>
    <input type="password" name="password">
    <br><br>
    <button type="submit">Login</button>
</form>
</body>
</html>
