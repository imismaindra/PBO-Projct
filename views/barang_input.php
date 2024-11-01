
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang</title>
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
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Input Barang</h2>
                    <form action="../index.php?modul=barang&fitur=add" method="POST">

                        <!-- Nama user -->
                        <div class="mb-4">
                            <label for="Nama_Barang" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang:</label>
                            <input type="text" id="Nama_Barang" name="Nama_Barang"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Masukkan Nama Role" required>
                        </div>
                        <div class="mb-4">
                            <label for="Stok_Barang" class="block text-gray-700">Stok Barang:</label>
                            <div class="relative">
                            <input id="Stok_Barang" name="Stok_Barang"type="number"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Masukkan Jumlah Barang" rows="3" required>
                            </div>
                        </div>
                        <!-- Role Deskripsi -->
                        <div class="mb-4">
                            <label for="Harga_Barang" class="block text-gray-700 text-sm font-bold mb-2">Harga Barang:</label>
                            <input id="Harga_Barang" name="Harga_Barang"type="number"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Masukkan Harga Barang" rows="3" required>
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