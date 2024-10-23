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

        <div class="text-white">
            <span class="mr-4">Username</span>
            <span class="mr-4">Role</span>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Logout
            </button>
        </div>
    </div>
</nav>