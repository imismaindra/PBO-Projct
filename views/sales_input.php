
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Transaksi</title>
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
                <!-- Konten pencarian barang -->
                <div x-data="liveSearch()" class="mb-4">
                    <label for="search_barang" class="block text-gray-700 text-sm font-bold mb-2">Cari Barang:</label>
                    <input type="text" id="search_barang" name="search_barang"
                        x-model="query"
                        @input="search()"
                        class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Masukkan Nama Barang" autocomplete="off">
                    
                    <!-- Daftar hasil pencarian -->
                    <div x-show="results.length > 0" class="mt-2 bg-white shadow-lg rounded-lg overflow-hidden">
                        <ul>
                            <template x-for="item in results" :key="item.Id_Barang">
                                <li @click="selectItem(item)" class="p-2 hover:bg-gray-200 cursor-pointer">
                                    <span x-text="item.Nama_Barang"></span> - <span x-text="item.Harga_Barang"></span>
                                </li>
                            </template>
                        </ul>
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

            tr td:nth-child(n+5),
            tr th:nth-child(n+5) {
                border-radius: 0 .625rem .625rem 0;
            }

            tr td:nth-child(1),
            tr th:nth-child(1) {
                border-radius: .625rem 0 0 .625rem;
            }
        </style>


    </div>
    <script>
        function liveSearch() {
            return {
                query: '',
                results: [],
                search() {
                    if (this.query.length > 2) {
                        fetch(`search_barang.php?nama=${this.query}`)
                            .then(response => response.json())
                            .then(data => {
                                this.results = data;
                            })
                            .catch(error => console.error("Parsing error:", error));
                    } else {
                        this.results = [];
                    }
                },
                selectItem(item) {
                    this.query = item.Nama_Barang;
                    this.results = [];
                    // Lakukan sesuatu dengan item yang dipilih, misalnya mengisi form dengan ID atau detail barang
                }
            };
        }

    </script>

</body>

</html>