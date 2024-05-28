<span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Form Pinjam Ruangan</title>
        <link rel="stylesheet" href="{{ asset('css\style.css') }}" />
        <!-- Font Awesome Cdn Link -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <style>
            .main {
                background: #ffffff;
            }

            .h1 {
                font-size: 30px;
                font-weight: 600;
                color: #07617D;
            }

            .h3 {
                font-size: 20px;
                font-weight: 480;
                color: #07617D;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="dashboard_user" class="logo">
                            <img src="{{ asset('images/iQUBE_3.png') }}" alt="">
                            <span class="nav-title">i-QUBE</span>
                        </a></li>
                    <li><a href="{{ url('item_user') }}">
                            <i class="fas fa-home"></i>
                            <span class="nav-item">Data Barang</span>
                        </a></li>
                    <li><a href="{{ url('room_user') }}">
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
                    <h1 class="h1">Form Peminjaman Ruangan</h1></br>
                </div>
                <div class="main-top">
                    <h1 class="h3" id="roomNameHeading">
                        </h3>
                        <i class="fas fa-user-cog"></i>
                </div>
                <div class="main-top">
                    <h3 class="h3" id="roomFloorHeading"></h3>
                </div>
                <form method="POST" action="{{ url('room_user') }}">
                    @csrf
                    <div class="flex justify-between mb-5 relative">
                        <div class="mb-5 mt-4">
                            <label for="image" class="text-black pl-5">Foto Ruangan</label>
                            <div>
                                <img id="roomImage" alt="Gambar tidak tersedia" style="width: 700px;">
                            </div>
                        </div>

                        <div class="mb-5 mt-4">
                            <form class="max-w-md">
                                <div class="flex justify-between mb-5 relative">
                                    <div class="w-3/4 pr-2 relative">
                                        <label for="name" class="text-black pl-5">Nama</label>
                                        <input type="text" id="name" name="nama"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{ session('user.nama') }}" readonly>
                                    </div>
                            </form>
                        </div>
                        <div class="mb-5 mt-4">
                            <form class="max-w-md">
                                <div class="flex justify-between mb-5 relative">
                                    <div class="w-3/4 pr-2 relative">
                                        <label for="id" class="text-black pl-5">NIM</label>
                                        <input type="text" id="nim" name="nim"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{ session('user.nim') }}" readonly>
                                    </div>
                            </form>
                        </div>
                        <div class="mb-5 mt-4">
                            <form class="max-w-md">
                                <div class="flex justify-between mb-5 relative">
                                    <div class="w-3/4 pr-2">
                                        <label for="id" class="text-black pl-5">Kelas</label>
                                        <input type="text" id="kelas" name="kelas"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{ session('user.kelas') }}" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="date-picker-container">
                            <label for="date" class="text-black pl-5">Pilih tanggal</label>
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
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Tanggal peminjaman">
                                </div>
                                <span class="mx-4 text-gray-500">to</span>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input name="end" type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Tanggal pengembalian">
                                </div>
                            </div>
                        </div>
                        <div class="time-picker-container">
                            <label for="date" class="text-black pl-5">Pilih Jam</label>

                            <form class="max-w-[16rem] mx-auto grid grid-cols-2 gap-4">
                                <div>
                                    <label for="start-time"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Start
                                        time:</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input type="time" id="start-time"
                                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            min="09:00" max="18:00" value="00:00" required />
                                    </div>
                                </div>
                                <div>
                                    <label for="end-time"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">End
                                        time:</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input type="time" id="end-time"
                                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            min="09:00" max="18:00" value="00:00" required />
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-8">Submit</button>
                    <script>
                        const urlParams = new URLSearchParams(window.location.search);
                        const roomName = urlParams.get('room_name');
                        document.getElementById("roomNameHeading").innerText += roomName;
                        const roomFloor = urlParams.get('room_floor');
                        document.getElementById("roomFloorHeading").innerText += roomFloor;
                        const roomImage = urlParams.get('image');
                        if (roomImage) {
                            document.getElementById("roomImage").src = "{{ asset('storage/ruangan') }}/" + roomImage;
                        }
                    </script>
                </form>
            </section>
        </div>
    </body>

    </html>
