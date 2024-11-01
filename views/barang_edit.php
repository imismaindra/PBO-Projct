<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>
    <?php
    $barang = $obj_barang->getBarangById($_GET['Id_Barang']);
    ?>

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
                <!-- Formulir Input Barang -->
                <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Update Barang</h2>
                    <form action="index.php?modul=barang&fitur=update" method="POST">

                        <input type="hidden" name="Id_Barang" value="<?php echo htmlspecialchars($barang->Id_Barang); ?>">
                        <div class="mb-4">
                            <label for="role_name" class="block text-gray-700">Nama Barang:</label>
                            <input type="text" name="role_name" id="role_name" value="<?php echo htmlspecialchars($role->role_name); ?>" class="border border-gray-300 p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="role_description" class="block text-gray-700">Role Description:</label>
                            <input type="text" name="role_description" id="role_description" value="<?php echo htmlspecialchars($role->role_description); ?>" class="border border-gray-300 p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="role_status" class="block text-gray-700">Status:</label>
                            <select name="role_status" id="role_status" class="border border-gray-300 p-2 w-full">
                                <option value="1" <?php echo $role->role_status == 1 ? 'selected' : ''; ?>>Aktif</option>
                                <option value="0" <?php echo $role->role_status == 0 ? 'selected' : ''; ?>>Non-Aktif</option>
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