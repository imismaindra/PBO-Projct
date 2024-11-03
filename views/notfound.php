<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Role</title>
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
               <h1 class="font-bold">Page Not Found</h1>
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

</body>

</html>