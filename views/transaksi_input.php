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
<body class="bg-gray-200 font-sans leading-normal tracking-normal" 
      x-data="{ 
        sidebarOpen: true, 
        selectedBarangs: [],  
        jumlah: 1,
        totalTransaksi: 0,
        
        // Fungsi untuk menambahkan barang ke dalam selectedBarangs
        selectBarang(event) {
            const selectedOption = event.target.options[event.target.selectedIndex];
            const id = selectedOption.value;
            const nama = selectedOption.getAttribute('data-nama');
            const harga = selectedOption.getAttribute('data-harga');

            if (!this.selectedBarangs.find(barang => barang.id === id)) {
                this.selectedBarangs.push({ id,nama, harga: parseFloat(harga), jumlah: this.jumlah });
            }
            this.jumlah = 1;
            this.calculateTotal(); // Update total transaksi
        },
        
        // Fungsi untuk menghapus barang
        removeBarang(index) {
            this.selectedBarangs.splice(index, 1);
            this.calculateTotal(); // Update total transaksi
        },

       // Fungsi untuk menghitung total transaksi
        calculateTotal() {
            this.totalTransaksi = this.selectedBarangs.reduce((total, barang) => {
                return total + (barang.harga * barang.jumlah);
            }, 0);
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
                    <div class="bg-white rounded-lg flex">
                        <div class="px-6 py-4 w-2/3">
                            <label for="barangSelect" class="block text-xl font-semibold">Pilih Barang</label>
                            <select id="barangSelect" name="barang[]" @change="selectBarang($event)" class="mt-1 p-2 border border-gray-300 rounded-xl w-full" required>
                                <option value="" disabled selected>Pilih Barang</option>
                                <?php foreach ($barangs as $barang): ?>
                                    <?php if ($barang->Stock_Barang <= 1) continue; ?>
                                    <option value="<?php echo $barang->Id_Barang; ?>" data-harga="<?php echo $barang->Harga_Barang; ?>" data-nama="<?php echo $barang->Nama_Barang; ?>">
                                        <?php echo $barang->Nama_Barang . " - Rp." . $barang->Harga_Barang; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>   
                            <h3 class="text-xl font-semibold mb-2 mt-4">Detail Barang</h3>
                            <div class="bg-white rounded-lg mt-4 px-6 py-4">
                                <div id="barangContainer">
                                    <!-- Detail Barang yang Terpilih -->
                                    <div class="relative overflow-x-auto">
                                        <table class="w-full rounded-lg text-sm text-left rtl:text-right text-gray-500 ">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">Nama Barang</th>
                                                    <th scope="col" class="px-6 py-3">Harga Barang</th>
                                                    <th scope="col" class="px-6 py-3">Jumlah</th>
                                                    <th scope="col" class="px-6 py-3">Total</th>
                                                    <th scope="col" class="px-6 py-3">Action</th>
                                                </tr>
                                            </thead>
                                            <template x-for="(barang, index) in selectedBarangs" :key="index">
                                                
                                                <tbody>
                                                    <tr class="barang-item bg-white border-b auto">
                                                        
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" x-text="barang.nama"></th>
                                                        <td class="px-6 py-4">
                                                            <span x-text="`Rp. ${barang.harga}`"></span>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <input type="number" name="jumlah[]" class="mt-1 p-2 border border-gray-300 rounded w-1/4" min="1" x-model="barang.jumlah" @input="calculateTotal" required>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <span id="total" x-text="`Rp. ${barang.harga * barang.jumlah}`"></span>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <!-- <button type="button" class="text-red-500" @click="removeBarang(index)">Hapus</button> -->

                                                            <button type="button" @click="removeBarang(index)"class="px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                                </svg>
                                                                Hapus
                                                            </button>
                                                        </td>
                                                            <!-- Input Tersembunyi untuk ID Barang -->
                                                        <input type="hidden" :name="'barang[]'" :value="barang.id">
                                                        
                                                    </tr>
                                                </tbody>
                                            </template>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="block mt-4 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br 
                            focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg 
                            dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Simpan Transaksi</button>
                        </div>

                        <!-- Elemen Pilih Customer -->
                        <div class="px-6 py-4 w-1/3">
                            <div class="mb-4">
                                <label for="customer" class="block text-xl font-semibold text-gray-700">Customer</label>
                                <select id="customer" name="customer" class="mt-1 p-2 border border-gray-300 rounded-xl w-full" required>
                                    <option value="" disabled selected>Pilih Customer</option>
                                    <?php foreach ($users as $customer): ?>
                                        <option value="<?php echo $customer->id; ?>"><?php echo $customer->username; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2">
                                    <a href="#" class="  max-w p-6 bg-[#0548B3] border border-gray-200 rounded-lg shadow hover:bg-green-500 ">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Transaksi</h5>
                                        <p class="font-semibold text-xl text-white" x-text="`Rp ${totalTransaksi}`"></p>
                                    </a>
                                    <!-- <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 ">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total</h5>
                                        <p class="font-semibold text-xl text-white">Rp 400000</p>
                                    </a> -->
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>