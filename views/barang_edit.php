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
                <div class="max-w mx-auto bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Update Barang</h2>
                    <form action="index.php?modul=barang&fitur=update" method="POST">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <input type="hidden" name="Id_Barang" value="<?php echo htmlspecialchars($barang->Id_Barang); ?>">
                            <div class="mb-4">
                                <label for="Nama_Barang" class="block text-gray-700 font-bold  ">Nama Barang:</label>
                                <input type="text" name="Nama_Barang" id="Nama_Barang" value="<?php echo htmlspecialchars($barang->Nama_Barang); ?>" class=" rounded-lg border border-gray-300 p-2 w-full">
                            </div>
                            <div class="mb-4">
                                <label for="Deskripsi_Barang" class="block text-gray-700 font-bold ">Deskripsi Barang:</label>
                                <textarea type="text" name="Deskripsi_Barang" id="Deskripsi_Barang"  class="rounded-lg  border border-gray-300 p-2 w-full"><?php echo htmlspecialchars($barang->Deskripsi_Barang); ?></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="Satuan_Barang" class="block text-gray-700 font-bold ">Satuan Barang:</label>
                                <select id="Satuan_Barang" name="Satuan_Barang"
                                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700  leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                                    <option value="" disabled <?php echo empty($barang->Satuan_Barang) ? 'selected' : ''; ?>>Pilih Satuan</option>
                                    <option value="pcs" <?php echo ($barang->Satuan_Barang === 'pcs') ? 'selected' : ''; ?>>Pcs</option>
                                    <option value="unit" <?php echo ($barang->Satuan_Barang === 'unit') ? 'selected' : ''; ?>>Unit</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="Kategori_Barang" class="block text-gray-700 font-bold ">Kategori Barang:</label>
                                <select id="Kategori_Barang" name="Kategori_Barang"
                                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700  leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                                    <option value="" disabled <?php echo empty($barang->Kategori_Barang) ? 'selected' : ''; ?>>Pilih Satuan</option>
                                    <option value="Elektronik"<?php echo ($barang->Kategori_Barang === 'elektronik') ? 'selected' : ''; ?> >Elektronik</option>
                                    <option value="Peralatan Kerja"<?php echo ($barang->Kategori_Barang === 'peralatan kerja') ? 'selected' : ''; ?>>Perlatan Kerja</option>
                                    <option value="Alat Tulis" <?php echo ($barang->Kategori_Barang === 'alat tulis') ? 'selected' : ''; ?> >Alat Tulis</option>
                                    <option value="Lainnya" <?php echo ($barang->Kategori_Barang === 'lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="Stock_Barang" class="block text-gray-700 font-bold ">Stok Barang:</label>
                                <input type="number" name="Stock_Barang" id="Stock_Barang" value="<?php echo htmlspecialchars($barang->Stock_Barang); ?>" class="rounded-lg border border-gray-300 p-2 w-full">
                            </div>
                            <div class="mb-4">
                                <label for="Harga_Barang" class="block text-gray-700 font-bold ">Harga Barang:</label>
                                <input type="number" name="Harga_Barang" id="Harga_Barang" value="<?php echo htmlspecialchars($barang->Harga_Barang); ?>" class="rounded-lg border border-gray-300 p-2 w-full">
                            </div>
                            
                        </div>  
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update Role</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>

</html>