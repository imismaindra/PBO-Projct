<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Baru</title>
    <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/script-name.js"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>
</head>
<body class="bg-gray-200 font-sans leading-normal tracking-normal" x-data="{ 
        sidebarOpen: true, 
        selectedBarangs: [],  
        jumlah: 1,
        selectBarang(event) {
            const selectedOption = event.target.options[event.target.selectedIndex];
            const nama = selectedOption.getAttribute('data-nama');
            const harga = selectedOption.getAttribute('data-harga');

            // Cek apakah barang sudah ada dalam array
            if (!this.selectedBarangs.find(barang => barang.nama === nama)) {
                this.selectedBarangs.push({ nama, harga, jumlah: this.jumlah });
            }
            this.jumlah = 1; // Reset jumlah setelah menambah barang
        },
        removeBarang(index) {
            this.selectedBarangs.splice(index, 1); // Hapus barang dari array berdasarkan index
        }
    }"> 
    <div class="flex h-screen">
        <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="flex h-screen">
            <?php include 'includes/sidebar.php'; ?>
        </div>
        
        <div class="flex-1 flex flex-col">
            <?php include 'views/includes/navbar.php'; ?>
            <div class="flex-1 p-8">
                <h2 class="text-2xl font-bold mb-4">Transaksi Baru</h2>
                <form action="index.php?modul=transaksi&fitur=add" method="POST" id="transaksiForm">
                    <div class="bg-white rounded-lg">
                        <div class="px-6 py-4 mx-auto">
                            <label for="barangSelect" class="block text-gray-700">Pilih Barang</label>
                            <select id="barangSelect" name="barang" @change="selectBarang($event)" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
                                <option value="" disabled selected>Pilih Barang</option>
                                <?php foreach ($barangs as $barang): ?>
                                    <option value="<?php echo $barang->Id_Barang; ?>" data-harga="<?php echo $barang->Harga_Barang; ?>" data-nama="<?php echo $barang->Nama_Barang; ?>">
                                        <?php echo $barang->Nama_Barang . " - Rp." . $barang->Harga_Barang; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Detail Barang</h3>
                        <div id="barangContainer">
                            <!-- Detail Barang yang Terpilih -->
                            <div class="relative overflow-x-auto">
                                <table class="w-full rounded-lg text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Nama Barang
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Harga Barang
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Jumlah
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <template x-for="(barang, index) in selectedBarangs" :key="index">
                                        <tbody>
                                            <tr class=" barang-item bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" x-text="barang.nama"></th>
                                            
                                                <td class="px-6 py-4">
                                                    <span x-text="`Rp. ${barang.harga}`"></span>
                                                </td>
                                                <td class="px-6 py-4">
                                                <input type="number" name="jumlah[]" class="mt-1 p-2 border border-gray-300 rounded w-full" min="1" x-model="barang.jumlah" required>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <button type="button" class="text-red-500" @click="removeBarang(index)">Hapus</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </template>
                                    </table>
                                </div>

                                <!-- <div class="barang-item mb-4 bg-gray-100 p-4 rounded flex justify-between items-center">
                                    <div class="flex-grow">
                                        <div>
                                            <label class="block text-gray-700">Nama Barang</label>
                                            <p x-text="barang.nama"></p>
                                        </div>
                                        <div>
                                            <label class="block text-gray-700">Harga Barang</label>
                                            <p x-text="`Rp. ${barang.harga}`"></p>
                                        </div>
                                        <div>
                                            <label for="jumlah" class="block text-gray-700">Jumlah</label>
                                            <input type="number" name="jumlah[]" class="mt-1 p-2 border border-gray-300 rounded w-full" min="1" x-model="barang.jumlah" required>
                                        </div>
                                    </div>
                                    <button type="button" class="text-red-500" @click="removeBarang(index)">Hapus</button>
                                </div> -->
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="customer" class="block text-gray-700">Customer</label>
                        <select id="customer" name="customer" class="mt-1 p-2 border border-gray-300 rounded w-1/3" required>
                            <option value="" disabled selected>Pilih Customer</option>
                            <?php foreach ($users as $customer): ?>
                                <option value="<?php echo $customer->id; ?>"><?php echo $customer->username; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-green-500 text-white p-2 rounded">Simpan Transaksi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
