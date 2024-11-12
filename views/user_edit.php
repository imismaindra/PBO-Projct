<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
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
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Update User</h2>
                    <form action="index.php?modul=user&fitur=update" method="POST">
                        
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user->id); ?>">
                        <div class="mb-4">
                            <label for="username" class="block text-gray-700">Username:</label>
                            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user->username); ?>" class="border border-gray-300 p-2 w-full">
                        </div>
                        <div class="mb-4" x-data="{ showPassword: false }">
                            <label for="password" class="block text-gray-700">Password:</label>
                            <div class="relative">
                                <input :type="showPassword ? 'text' : 'password'" name="password" id="password" value="<?php echo htmlspecialchars($user->password); ?>" class="border border-gray-300 p-2 w-full">
                                <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 px-3 py-2 text-gray-600">
                                    <span x-text="showPassword ? 'Hide' : 'Show'"></span>
                                </button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="role_description" class="block text-gray-700">Email:</label>
                            <input type="text" name="email" id="role_description" value="<?php echo htmlspecialchars($user->email); ?>" class="border border-gray-300 p-2 w-full">
                        </div>
                            <div class="mb-4">
                            <label for="role" class="block text-gray-700">Status:</label>
                            <select name="role" id="role" class="border border-gray-300 p-2 w-full">
                                <?php foreach ($roles as $role): ?>
                                    <option value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update Role</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>

</html>