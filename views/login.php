<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Welcome Back!</h2>
        <form x-data="{ showPassword: false }"  action="../index.php?modul=login" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-gray-700 mb-2">Username</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your username" required>
            </div>
            <div class="mb-4 relative">
                <label for="password" class="block text-gray-700 mb-2">Password</label>
                <input :type="showPassword ? 'text' : 'password'" id="password" 
                    name="password" 
                    class="w-full px-4 py-2 pr-12 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" 
                    placeholder="Enter your password" 
                    required>
            </div>
            <div class="mb-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600">
                    <span class="ml-2 text-gray-700">Remember me</span>
                </label>
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">Login</button>
        </form>
        <p class="mt-4 text-center text-gray-600">Don't have an account? <a href="#" class="text-blue-600 hover:underline">Sign up</a></p>
    </div>
</body>
</html>
