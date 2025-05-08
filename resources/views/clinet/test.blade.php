<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" class="sidbar">
        @csrf
            <div>
                <input type="text" name="searchByname" placeholder="search...">
                <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
            <hr>

            <div>
                <input id="hotel" name="Hotel" type="checkbox">
                <label for="hotel">Hotel</label>
            </div>

            <div>
                <input id="pace" name="pace" type="checkbox">
                <label for="pace">pace</label>
            </div>

            
            <hr>
            <button   class="btn btn-info" type="submit">Filter</button>
        </form>
</body>
</html>