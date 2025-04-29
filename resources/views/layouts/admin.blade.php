<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @yield('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style-type: none;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: fixed;
            height: 100%;
            z-index: 100;
        }

        .sidebar.collapsed {
            transform: translateX(-100%);
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            border-bottom: 1px solid #eee;
        }

        .sidebar-header h1 {
            font-size: 1.5rem;
            color: #3b82f6;
        }

        .close-sidebar {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            color: #666;
        }

        .sidebar-menu {
            padding: 20px;
        }

        .toggle-sidebar {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            margin-right: 15px;
            display: none;
            color: #666;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            border-bottom: 1px solid #eee;
        }

        .close-sidebar {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            color: #666;
        }


        .sidebar-menu {
            padding: 20px;
        }


        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px;
            margin-bottom: 8px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .menu-item:hover {
            background-color: #f0f0f0;
        }

        .menu-item.active {
            background-color: #e6f0ff;
            color: #3b82f6;
        }

        .menu-item i {
            margin-right: 12px;
            font-size: 1.2rem;
        }

        .main-content {
                margin-left: 0;
            }

            .main-content {
            flex: 1;
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }

        .main-content.full-width {
            margin-left: 0;
        }
        @media (max-width: 991px) {
            .toggle-sidebar {
                display: block;
            }

            .close-sidebar {
                display: block;
            }

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
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
                        <i class="fas fa-users"></i>
                        <a href="">Users</a>
                    </li>
                    <li class="menu-item ">
                        <i class="fas fa-shopping-cart"></i>
                        <a href="{{url('admin/offers')}}">Offers</a>
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

    <script>
        // DOM Elements
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const toggleSidebarBtn = document.getElementById('toggleSidebar');
        const closeSidebarBtn = document.getElementById('closeSidebar');
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');

        // Toggle Sidebar
        toggleSidebarBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        // Close Sidebar
        closeSidebarBtn.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });

        // Toggle Profile Dropdown
        profileBtn.addEventListener('click', () => {
            profileDropdown.classList.toggle('show');
        });

        // Close Profile Dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!profileBtn.contains(event.target) && !profileDropdown.contains(event.target)) {
                profileDropdown.classList.remove('show');
            }
        });

        // Menu Items Click
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                // Remove active class from all menu items
                menuItems.forEach(i => i.classList.remove('active'));
                // Add active class to clicked item
                item.classList.add('active');

                // On mobile, close the sidebar after clicking a menu item
                if (window.innerWidth < 992) {
                    sidebar.classList.remove('active');
                }
            });
        });

        // Responsive adjustments
        function handleResize() {
            if (window.innerWidth < 992) {
                sidebar.classList.remove('active');
                mainContent.classList.add('full-width');
            } else {
                sidebar.classList.add('active');
                mainContent.classList.remove('full-width');
            }
        }

        // Initial call and event listener for resize
        handleResize();
        window.addEventListener('resize', handleResize);
    </script>
</body>

</html>