<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Aplicación</title>
    <!-- Incluir Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="bg-gray-100">
        <!-- Navbar -->
        <div class="bg-white shadow">
            <div class="container mx-auto">
                <div class="flex justify-between items-center py-4 px-2">
                    <h1 class="text-xl font-semibold">Animated Drawer</h1>
    
                    <button class="text-gray-500 hover:text-gray-600" id="open-sidebar">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    
        <div class="grid grid-cols-2 gap-4 h-screen">
            <!-- Sidebar -->
            <div class="absolute bg-gray-800 text-white w-56 min-h-screen overflow-y-auto transition-transform transform -translate-x-full ease-in-out duration-300" id="sidebar">
                <!-- Your Sidebar Content -->
                <div class="p-4">
                    <h1 class="text-2xl font-semibold"> Menú</h1>
                    <ul class="mt-4">
                        <li class="mb-2"><a href="#" class="block hover:text-indigo-400">Home</a></li>
                        <li class="mb-2"><a href="#" class="block hover:text-indigo-400">About</a></li>
                        <li class="mb-2"><a href="#" class="block hover:text-indigo-400">Services</a></li>
                        <li class="mb-2"><a href="#" class="block hover:text-indigo-400">Contact</a></li>
                    </ul>
                </div>
            </div>
    
            <!-- Content -->
            <div id="content" class="col-span-2 md:col-span-1 flex flex-col overflow-hidden">
                <!-- Content Body -->
                <div class="overflow-auto p-4">
                    <h1 class="text-2xl font-semibold">Welcome to our website</h1>
                    <p>... Content goes here ...</p>
                </div>
            </div>
        </div>
    
        <script>
            const sidebar = document.getElementById('sidebar');
            const openSidebarButton = document.getElementById('open-sidebar');
            const content = document.getElementById('content');
            
            openSidebarButton.addEventListener('click', (e) => {
                e.stopPropagation();
                sidebar.classList.toggle('-translate-x-full');
                content.classList.toggle('md:col-span-1');
                content.classList.toggle('md:col-span-2');
            });
    
            // Close the sidebar when clicking outside of it
            document.addEventListener('click', (e) => {
                if (!sidebar.contains(e.target) && !openSidebarButton.contains(e.target)) {
                    sidebar.classList.add('-translate-x-full');
                    content.classList.remove('md:col-span-2');
                    content.classList.add('md:col-span-1');
                }
            });
        </script>
    </div>
    


</body>

</html>
