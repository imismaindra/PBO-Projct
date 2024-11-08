<?php 
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
        $role_name = isset($_SESSION['role_id']) ? $_SESSION['role_id'] : 'No role';
    ?>
<nav class="flex bg-white p-4 shadow-lg">
    <!-- Sidebar Toggle Button -->
    <button @click="sidebarOpen = !sidebarOpen" class="p-1 mr-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="h-6 w-6 text-blue-600">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Container with Search Bar and Profile -->
    <div class="container mx-auto flex justify-between items-center">
        <!-- Search Bar -->
        <div class="relative w-full max-w-lg mx-4">
            <input type="text" placeholder="Search..."
                class="w-full bg-gray-100 text-gray-800 rounded-full py-2 px-4 pr-10 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
            <div class="absolute inset-y-0 right-3 flex items-center">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-5 w-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 16l6-6m2 2a9 9 0 11-4.91-4.91L10 8h-1l-6-6" />
                </svg> -->
            </div>
        </div>

        <!-- User Profile Section -->
        <div class="relative flex items-center cursor-pointer group">
            <div class="flex-shrink-0 w-10 h-10">
                <img class="w-full h-full rounded-full"
                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                    alt="" />
            </div>
            <div class="ml-3">
                <p class=" font-bold text-blue-600 whitespace-no-wrap">
                <?php echo htmlspecialchars($username); ?>
                </p>
            </div>

            <!-- Dropdown Menu -->
            <div
                class="absolute right-0 top-full mt-1 w-48 bg-white rounded-lg shadow-lg opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-opacity duration-200">
                <div class="px-4 py-2 text-gray-700">
                    Role: <?php echo htmlspecialchars($role_name); ?>
                </div>
                <div class="border-t border-gray-300"></div>
                <button class="w-full text-left px-4 py-2 hover:bg-gray-200">
                    Logout
                </button>
            </div>
        </div>
    </div>
</nav>