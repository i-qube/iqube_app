<span style="font-family: verdana, geneva, sans-serif;">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Pinjam Barang</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Font Awesome Cdn Link -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .container {
            padding-left: 300px;
        }

        .main {
            background: #ffffff;
            position: relative;
            padding-left: 20px;
            width: 100%;
        }

        .h1 {
            font-size: 30px;
            font-weight: 600;
            color: #07617D;
        }
    </style>
</head>

    <body>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="{{ url('dashboard_user') }}" class="logo">
                            <img src="{{ asset('images/iQUBE_3.png') }}" alt="">
                            <span class="nav-title">i-QUBE</span>
                        </a></li>
                    <li><a href="{{ url('dashboard_user') }}">
                            <i class="fas fa-home"></i>
                            <span class="nav-item">Home</span>
                        </a></li>
                    <li><a href="{{ url('item_user') }}">
                            <i class="fas fa-inbox"></i>
                            <span class="nav-item">Barang</span>
                        </a></li>
                    <li><a href="{{ url('room_user') }}">
                            <i class="fas fa-cube"></i>
                            <span class="nav-item">Ruangan</span>
                        </a></li>
                    <li><a href="{{ url('peminjaman') }}">
                            <i class="fas fa-server"></i>
                            <span class="nav-item">History</span>
                        </a></li>
                    <li><a href="" class="logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="nav-item">Log out</span>
                        </a></li>
                </ul>
            </nav>

        <section class="main">
            <div class="main-top">
                <h1 class="h1">Formulir Penggunaan Barang</h1></br>
            </div></br>
            <form method="POST" action="{{ url('item_user') }}">
                @csrf
                <div class="mb-5 mt-4">
                    <div class="flex justify-between mb-5 relative">
                        <div class="w-full pr-2 relative">
                            {{-- <label for="selection_name" class="text-black pl-5">Nama Barang</label> --}}
                            <input type="text" id="selection_name" name="item_name" readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nama Barang">
                        </div>
                        <div class="w-2/4 pl-2 relative">
                            {{-- <label for="quantity" class="text-black pl-1">Jumlah</label> --}}
                            <div class="relative max-w-sm">
                                <input type="number" id="quantity" name="jumlah"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 pl-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-center"
                                    placeholder="Jumlah">
                            </div>
                        </div>
                        <div class="w-2/4 pr-2 relative">
                            <input type="text" id="selection" name="item_id" readonly hidden>
                        </div>
                    </div>
                </div>
                <div class="mb-5 mt-4">
                    <div class="flex justify-between mb-5 relative">
                        <div class="w-3/4 pr-2 relative">
                            {{-- <label for="name" class="text-black pl-5">Nama</label> --}}
                            <input type="text" id="name" name="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Nama" value="{{ session('user.nama') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="mb-5 mt-4">
                    <div class="flex justify-between mb-5 relative">
                        <div class="w-3/4 pr-2 relative">
                            {{-- <label for="no_induk" class="text-black pl-5">NIM</label> --}}
                            <input type="text" id="no_induk" name="no_induk"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="NIM" value="{{ session('user.no_induk') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="mb-5 mt-4">
                    <div class="flex justify-between mb-5 relative">
                        <div class="w-3/4 pr-2">
                            {{-- <label for="kelas" class="text-black pl-5">Kelas</label> --}}
                            <input type="text" id="kelas" name="kelas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Kelas" value="{{ session('user.kelas') }}" readonly>
                        </div>
                    </div>
                </div>
                {{-- <label for="date_borrow" class="text-black pl-5">Pilih tanggal</label> --}}
                <div class="relative max-w-sm mb-5">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker type="text" id="date_borrow" name="date_borrow"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Pilih tanggal pinjam">
                </div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-8">Submit</button>
            </form>
            <script>
                const urlParams = new URLSearchParams(window.location.search);
                const itemName = urlParams.get('item_name');
                document.getElementById("selection_name").value = itemName;
                const itemId = urlParams.get('item_id');
                document.getElementById("selection").value = itemId;
            </script>
        </section>
    </div>
</body>

</html>