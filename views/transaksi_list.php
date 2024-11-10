<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Script untuk mengaktifkan modal -->
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Main Container for Transactions -->
            <div class="container mx-auto">
                <!-- Transaksi Table -->
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-full bg-white grid-cols-1">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">ID Transaksi</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Customer</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Kasir</th>
                                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Total</th>
                                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php if (!empty($listTransaksis)) {
                                foreach ($listTransaksis as $transaksi) { 
                                    $totalHargaKeseluruhan = 0;
                                    ?>
                                <tr class="text-center">
                                    <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($transaksi->Id_Transaksi); ?></td>
                                    <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($transaksi->Id_User->username); ?></td> 
                                    <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($transaksi->kasir); ?></td> 
                                    <?php foreach ($transaksi->DetailBarang as $detail) { 
                                        $totalHargaKeseluruhan += $detail->Total_Harga; // Menambah ke total keseluruhan
                                    ?>
                                    <?php } ?>
                                        <td class="w-1/6 py-3 px-4"><?php echo "Rp. " . number_format($totalHargaKeseluruhan, 0, ',', '.');  ?></td>
                                    <td class="w-1/6 py-3 px-4">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded"
                                            onclick="openModal('modal-<?php echo $transaksi->Id_Transaksi; ?>')">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk detail transaksi -->
<?php if (!empty($listTransaksis)) {
    foreach ($listTransaksis as $transaksi) { 
        $totalHargaKeseluruhan = 0; // Reset total setiap transaksi
?>
    <div id="modal-<?php echo $transaksi->Id_Transaksi; ?>" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-1/2 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Detail Transaksi: <?php echo htmlspecialchars($transaksi->Id_Transaksi); ?></h3>
                <div class="mt-2">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/2 py-3 px-4 uppercase font-semibold text-sm">Barang</th>
                                <th class="w-1/2 py-3 px-4 uppercase font-semibold text-sm">Harga Satuan</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Jumlah</th>
                                <th class="w-1/2 py-3 px-4 uppercase font-semibold text-sm">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php foreach ($transaksi->DetailBarang as $detail) { 
                                $totalHargaKeseluruhan += $detail->Total_Harga; // Menambah ke total keseluruhan
                            ?>
                                <tr class="text-center">
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($detail->Id_Barang->Nama_Barang); ?></td>
                                    <td class="py-3 px-4"><?php echo "Rp. " . number_format($detail->Harga_Barang, 0, ',', '.');  ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($detail->Jumlah_Barang); ?></td>
                                    <td class="py-3 px-4"><?php echo "Rp. " . number_format($detail->Total_Harga, 0, ',', '.'); ?></td>
                                </tr>
                            <?php } ?>
                            <!-- Total Keseluruhan -->
                            <tr class="font-semibold text-center bg-gray-200">
                                <td colspan="3" class="py-3 px-4">Total Keseluruhan</td>
                                <td class="py-3 px-4"><?php echo "Rp. " . number_format($totalHargaKeseluruhan, 0, ',', '.'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="items-center px-4 py-3">
                    <button
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                        onclick="closeModal('modal-<?php echo $transaksi->Id_Transaksi; ?>')">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } } ?>



</body>
</html>
