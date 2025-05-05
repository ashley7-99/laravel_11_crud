<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to your Dashboard!</h1>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
