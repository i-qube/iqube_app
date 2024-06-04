<span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Peminjaman</title>
        <link rel="stylesheet" href="{{ asset('css\style.css') }}" />
        <!-- Font Awesome Cdn Link -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
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
                color: #164e63;
;
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
                    <li><a href="{{ url('dashboard_user') }}">
                            <i class="fas fa-home"></i>
                            <span class="nav-item">Homepage</span>
                        </a></li>
                    <li><a href="{{ url('item_user') }}">
                            <i class="fas fa-inbox"></i>
                            <span class="nav-item">Data Barang</span>
                        </a></li>
                    <li><a href="{{ url('room_user') }}">
                            <i class="fas fa-cube"></i>
                            <span class="nav-item">Data Ruangan</span>
                        </a></li>
                    <li><a href="{{ url('peminjaman') }}">
                            <i class="fas fa-server"></i>
                            <span class="nav-item">Data Peminjaman</span>
                        </a></li>
                    <li><a href="" class="logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="nav-item">Log out</span>
                        </a></li>
                </ul>
            </nav>

            <section class="main">
                <div class="main-top">
                    <h1 class="h1">Daftar Data Peminjaman</h1>
                    <br>
                </div>
                </br>

                <div class="border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                        <li class="me-2"><a></a></li>
                        <li class="me-2">
                            <a href="#barang"
                                class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                <svg class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300 w-[30px] h-[30px] fill-[#8e8e8e]"
                                    viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M248 0H208c-26.5 0-48 21.5-48 48V160c0 35.3 28.7 64 64 64H352c35.3 0 64-28.7 64-64V48c0-26.5-21.5-48-48-48H328V80c0 8.8-7.2 16-16 16H264c-8.8 0-16-7.2-16-16V0zM64 256c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H224c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H184v80c0 8.8-7.2 16-16 16H120c-8.8 0-16-7.2-16-16V256H64zM352 512H512c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64H472v80c0 8.8-7.2 16-16 16H408c-8.8 0-16-7.2-16-16V256H352c-15 0-28.8 5.1-39.7 13.8c4.9 10.4 7.7 22 7.7 34.2V464c0 12.2-2.8 23.8-7.7 34.2C323.2 506.9 337 512 352 512z">
                                    </path>
                                </svg>Barang
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="#ruangan"
                                class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                <svg class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300 w-[30px] h-[30px] fill-[#878282]"
                                    viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path
                                        d="M320 32c0-9.9-4.5-19.2-12.3-25.2S289.8-1.4 280.2 1l-179.9 45C79 51.3 64 70.5 64 92.5V448H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H96 288h32V480 32zM256 256c0 17.7-10.7 32-24 32s-24-14.3-24-32s10.7-32 24-32s24 14.3 24 32zm96-128h96V480c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H512V128c0-35.3-28.7-64-64-64H352v64z">
                                </svg>Ruangan
                            </a>
                        </li>
                        <li class="me-2"><a></a></li>
                    </ul>
                </div>

                </br>
                <div id="barang" class="tab-content hidden">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-500">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Barang
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Pinjam
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjamans as $item)
                                    <tr class="bg-white border-2 dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->item->item_name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $item->jumlah }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->date_borrow }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="ruangan" class="tab-content hidden">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-500">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Ruangan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Pinjam
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Kembali
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($peminjamans as $item)
                                    <tr class="bg-white border-2 dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->item->item_name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $item->jumlah }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->date_borrow }}
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

        <script>
            document.querySelectorAll('.group').forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    // Menghapus kelas 'hidden' dari semua konten tab
                    document.querySelectorAll('.tab-content').forEach(content => {
                        content.classList.add('hidden');
                    });
                    // Menemukan href yang sesuai dengan tab yang ditekan
                    const href = this.getAttribute('href');
                    // Menghapus kelas 'hidden' dari konten yang sesuai dengan tab yang ditekan
                    document.querySelector(href).classList.remove('hidden');
                });
            });
        </script>


    </body>

    </html>
</span>
