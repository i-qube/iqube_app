<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Data Barang</title>
    <link rel="stylesheet" href="{{ asset('css\style.css') }}" />
    <!-- Font Awesome Cdn Link -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        .main {
            background: #07617D;
        }

        .h1 {
            font-size: 30px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="dashboard" class="logo">
                        <img src="{{ asset('images/iQUBE.png') }}" alt="">
                        <span class="nav-title">i-QUBE</span>
                    </a></li>
                <li><a href="item_user">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Data Barang</span>
                    </a></li>
                <li><a href="room_user">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Data Ruangan</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-wallet"></i>
                        <span class="nav-item">Data Peminjaman</span>
                    </a></li>
                <li><a href="">
                        <i class="fas fa-chart-bar"></i>
                        <span class="nav-item">Riwayat</span>
                    </a></li>
                <li><a href="" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log out</span>
                    </a></li>
            </ul>
        </nav>

        <section class="main">
            <div class="main-top">
                <h1 class="h1">Form Peminjaman</h1>
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="mb-5 mt-4">
                <form class="max-w-md">
                    <div class="flex justify-between mb-5 relative">
                        <div class="w-3/4 pr-2 relative">
                            <input type="text" id="selection"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="w-1/4 pl-2 relative">
                            <input type="number" id="quantity"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-center"
                                placeholder="Qty">
                        </div>
                </form>
            </div>
            <div class="mb-5 mt-4">
                <form class="max-w-md">
                    <div class="flex justify-between mb-5 relative">
                        <div class="w-3/4 pr-2 relative">
                            <label for="name" class="text-white pl-5">Nama</label>
                            <input type="text" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan nama...">
                        </div>
                </form>
            </div>
            <div class="mb-5 mt-4">
                <form class="max-w-md">
                    <div class="flex justify-between mb-5 relative">
                        <div class="w-3/4 pr-2 relative">
                            <label for="id" class="text-white pl-5">NIM</label>
                            <input type="text" id="id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan NIM...">
                        </div>
                </form>
            </div>
            <form class="max-w-md">
                <div class="flex justify-between mb-5 relative">
                    <div class="w-3/4 pr-2">
                        <label for="id" class="text-white pl-5">Kelas</label>
                        <select id="class"
                            class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled selected hidden style="color: #808080;">Pilih kelas...
                            </option>
                            <option value="nama1">SIB-1A</option>
                            <option value="nama2">SIB-1B</option>
                            <option value="nama3">SIB-1C</option>
                        </select>
                    </div>
                </div>
            </form>
            <label for="date" class="text-white pl-5">Pilih tanggal</label>
            <div date-rangepicker class="flex items-center">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input name="start" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tanggal pinjam...">
                </div>
                <span class="mx-4 text-gray-500">to</span>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input name="end" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tanggal kembali...">
                </div>
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-8">
                Submit
            </button>
            <script>
                const urlParams = new URLSearchParams(window.location.search);
                const itemName = urlParams.get('item_name');
                document.getElementById("selection").placeholder = itemName;
            </script>
        </section>
    </div>
</body>

</html>
