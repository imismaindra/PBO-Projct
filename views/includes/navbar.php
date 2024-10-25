<nav class=" flex bg-blue-600 p-4 shadow-lg">
    <button @click="sidebarOpen = !sidebarOpen" class="p-1 mr-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="h-6 w-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white font-bold text-xl">
            My Application
        </div>

        <!-- <div class="text-white">
            <span class="mr-4">Username</span>
            <span class="mr-4">Role</span>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Logout
            </button>
        </div> -->
        <div class="relative flex items-center cursor-pointer group">
            <div class="flex-shrink-0 w-10 h-10">
                <img class="w-full h-full rounded-full"
                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                    alt="" />
            </div>
            <div class="ml-3">
                <p class="text-white whitespace-no-wrap">
                    Username
                </p>
            </div>

            <!-- Dropdown Menu -->
            <div class="absolute right-0 top-full mt-1 w-48 bg-white rounded-lg shadow-lg opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-opacity duration-200">
                <div class="px-4 py-2 text-gray-700">
                    Role: User Role Here
                </div>
                <div class="border-t border-gray-300"></div>
                <button class="w-full text-left px-4 py-2 hover:bg-gray-200">
                    Logout
                </button>
            </div>
        </div>
    </div>
</nav>