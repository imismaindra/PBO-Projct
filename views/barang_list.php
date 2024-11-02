<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Barang</title>
    <!-- stylesheet -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />

    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- script -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/script-name.js"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>
</head>

<body class="bg-gray-200 font-sans leading-normal tracking-normal" x-data="{ sidebarOpen: true }">


    <!-- Main container -->
    <div class="flex h-screen">
        <!-- Sidebar -->

        <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="flex h-screen">

            <?php include 'includes/sidebar.php'; ?>
        </div>

        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <?php include 'includes/navbar.php'; ?>
            <!-- Main Content -->
            <div class="flex-1 p-8">
                <!-- Your main content goes here -->
                <div class="container mx-auto">
                    <!-- Button to Insert New Role -->
                    <div class="mb-4">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <a href="views/barang_input.php">Insert New Barang</a>
                        </button>

                    </div>


                    <!-- Roles Table -->
                    <!-- Updated Roles Table -->
                    <div class="overflow-auto lg:overflow-visible">
                        <table class="min-w-full table text-gray-400 border-separate space-y-6 text-sm items-center ">
                            <thead class="bg-white text-gray-500">
                                <tr>
                                    <th class=" p-3">ID</th>
                                    <th class=" text-left">Nama Barang</th>
                                    <!-- <th class="w-1/7 p-3 text-left">Deskripsi</th> -->
                                    <th class="text-left">Satuan</th>
                                    <th class="text-left">Stok</th>
                                    <th class="p-3 text-left">Kategori</th>
                                    <th class="text-left">Harga</th>
                                    <th class="text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($barangs as $barang) { ?>
                                    <tr class="bg-white min-w-full">
                                        <td class="p-3 text-blue-600"><?php echo htmlspecialchars($barang->Id_Barang) ?></td>
                                        <td class=""><?php echo htmlspecialchars($barang->Nama_Barang) ?></td>
                                        <!-- <td class="w-1/4 p-3"><?php echo htmlspecialchars($barang->Deskripsi_Barang); ?></td> -->
                                        <td class=""><?php echo htmlspecialchars($barang->Satuan_Barang); ?></td>
                                        <td class=""><?php echo htmlspecialchars($barang->Stock_Barang) ?></td>
                                        <td class=""><?php echo htmlspecialchars($barang->Kategori_Barang); ?></td>
                                        <td class="">Rp. <?php echo htmlspecialchars($barang->Harga_Barang) ?></td>
                                        <td class="">
                                            <a href="../index.php?modul=barang&fitur=edit&Id_Barang=<?php echo htmlspecialchars($barang->Id_Barang); ?>" class="text-gray-400 hover:text-gray-100 mx-2">
                                                <i class="material-icons-outlined text-blue-600">edit</i>
                                            </a>
                                            <a href="../index.php?modul=barang&fitur=delete&Id_Barang=<?php echo htmlspecialchars($barang->Id_Barang); ?>" class="text-gray-400 hover:text-gray-100 ml-2">
                                                <i class="material-icons-round text-red-600">delete_outline</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .table {
                border-spacing: 0 15px;
            }

            i {
                font-size: 1rem !important;
            }

            .table tr {
                border-radius: 20px;
            }

            tr td:nth-child(n+7),
            tr th:nth-child(n+7) {
                border-radius: 0 .625rem .625rem 0;
            }

            tr td:nth-child(1),
            tr th:nth-child(1) {
                border-radius: .625rem 0 0 .625rem;
            }
        </style>


    </div>

</body>

</html>