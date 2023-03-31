<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Document</title>
</head>

<body>
    <header class="header">
        <ul class="nav_items-list">
            <li class="nav_item"><a href="">Newest</a></li>
            <li class="nav_item"><a href="">Featured</a></li>
            <li class="nav_item"><a href="">Hottest</a></li>
            <li class="nav_item"><a href="">Trending</a></li>
        </ul>
    </header>

    @yield('content')

    <footer class="footer">
        &copy; Copyright by Amg.Co
    </footer>
</body>

</html>
