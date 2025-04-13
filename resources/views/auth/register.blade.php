<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
</head>
<body>
    
    <form action="" method="post">
        @csrf
        <input type="text" name="first_name" placeholder="l n">
        <input type="text" name="last_name" placeholder="f n">
        <input type="email" name="email">
        <input type="password" name="password">
        <button type="submit">s</button>
    </form>
</body>
</html>