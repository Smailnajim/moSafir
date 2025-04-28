<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h1 class="navbar-brand text-dark"><i class="fa-solid fa-street-view"></i> moSafir </h1>
                <button class="close-sidebar" id="closeSidebar">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li class="menu-item">
                        <i class="fas fa-users active"></i>
                        <a href="">Users</a>
                    </li>
                    <li class="menu-item ">
                        <i class="fas fa-shopping-cart"></i>
                        <a href="./offers.html">Offers</a>
                    </li>
                    <li class="menu-item">
                        <i class="fas fa-file-alt"></i>
                        <a href="">Reports</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-content" id="mainContent">
            @yield('content')
        </div>
    </div>
</body>

</html>