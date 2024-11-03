
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>

</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal" x-data="{ sidebarOpen: true }">



    <!-- Main container -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'translate-x-0 ' : '-translate-x-full transition-all duration-300 ease-in-out'" class="flex h-screen">
            <?php include 'includes/sidebar.php'; ?>
        </div>
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <?php include 'includes/navbar.php'; ?>
            <!-- Main Content -->
            <div class="flex-1 p-8">
                <!-- Formulir Input Role -->
                <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Input User</h2>
                    <form action="index.php?modul=user&fitur=add" method="POST">
                        <!-- Nama user -->
                        <div class="mb-4">
                            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                            <input type="text" id="username" name="username"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Masukkan Nama Role" required>
                        </div>
                        <div class="mb-4" x-data="{ showPassword: false }">
                            <label for="password" class="block text-gray-700">Password:</label>
                            <div class="relative">
                                <input :type="showPassword ? 'text' : 'password'" name="password" id="password" class="border border-gray-300 p-2 w-full">
                                <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 px-3 py-2 text-gray-600">
                                    <span x-text="showPassword ? 'Hide' : 'Show'"></span>
                                </button>
                            </div>
                        </div>
                        <!-- Role Deskripsi -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input id="email" name="email"type="email"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Masukkan email" rows="3" required>
                        </div>

                        <!-- Role -->
                        <div class="mb-4">
                            <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                            <select id="role" name="role"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                                <option value="">Pilih Role</option>
                                <?php foreach ($roles as $role): ?>
                                    <?php if ($role->role_status == 2) continue; ?>
                                    <option value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                           
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

</body>

</html>