<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Role</title>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>

</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal" x-data="{ sidebarOpen: true }">


    <!-- Main container -->
    <div class="flex h-screen">
        <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="flex h-screen">
            <?php include 'includes/sidebar.php'; ?>
        </div>
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <?php include 'includes/navbar.php'; ?>
            <!-- Main Content -->
            <div class="flex-1 p-8">
                Apa ini
            </div>
        </div>

    </div>

</body>

</html>