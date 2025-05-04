<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="flex h-screen">
        <div id="sidebar" class="fixed w-64 h-full bg-white shadow-md transition-transform duration-300 ease-in-out transform -translate-x-full lg:translate-x-0 z-30">
            <div class="flex items-center justify-between p-5 border-b border-gray-200">
                <h1 class="text-xl font-bold text-blue-500"><i class="fa-solid fa-street-view"></i> moSafir</h1>
            </div>
            <div class="p-5">
                <ul>
                    <li class="mb-2">
                        <a href="{{url('admin/index')}}" class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors">
                            <i class="fas fa-users mr-3 text-lg"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{url('admin/offers')}}" class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors">
                            <i class="fas fa-shopping-cart mr-3 text-lg"></i>
                            <span>Offers</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{url('admin/posts')}}" class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors">
                            <i class="fas fa-file-alt mr-3 text-lg"></i>
                            <span>Posts</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="mainContent" class="flex-1 transition-all duration-300 ease-in-out lg:ml-64">
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between p-4">
                    <button id="toggleSidebar" class="text-gray-500 hover:text-gray-700 lg:hidden">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="relative" id="profileContainer">
                        <button id="profileBtn" class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white">
                                <i class="fas fa-user"></i>
                            </div>
                            <span class="hidden md:block">Admin User</span>
                            
                        </button>
                    </div>
                </div>
            </header>

            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const toggleSidebarBtn = document.getElementById('toggleSidebar');
        const closeSidebarBtn = document.getElementById('closeSidebar');
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');

        toggleSidebarBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        closeSidebarBtn.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });

        profileBtn.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            if (!profileBtn.contains(event.target) && !profileDropdown.contains(event.target)) {
                profileDropdown.classList.add('hidden');
            }
        });

        const menuItems = document.querySelectorAll('li a');
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                menuItems.forEach(i => i.classList.remove('bg-blue-50', 'text-blue-500'));
                item.classList.add('bg-blue-50', 'text-blue-500');

                if (window.innerWidth < 1024) {
                    sidebar.classList.add('-translate-x-full');
                }
            });
        });

        function handleResize() {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        }

        handleResize();
        window.addEventListener('resize', handleResize);
    </script>
</body>

</html>