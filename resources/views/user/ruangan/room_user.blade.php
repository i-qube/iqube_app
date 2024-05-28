<span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Ruangan JTI Polinema</title>
        <link rel="stylesheet" href="{{ asset('css\style.css') }}" />
        <!-- Font Awesome Cdn Link -->
        <script src="https://cdn.tailwindcss.com"></script>
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
                    <h1 class="h1">Data Ruangan</h1>
                    <br>
                </div>
                <table
                    class="w-full table-fixed border-collapse border border-slate-400 mt-8 border-separate border-spacing-x-3">
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr class="md-8">
                                {{-- <td colspan="4" class="ml-8"> --}}
                                <button type="button"
                                    class=" px-9 py-9 focus:outline-none text-white bg-yellow-500 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-650 dark:focus:ring-yellow-650"
                                    onclick="navigateToItemUser('{{ $room->room_name }}', '{{ $room->room_floor }}', '{{ $room->image }}')">
                                    <p class="text-center">{{ $room->room_code }}</p>
                                    <hr class="text-center">{{ $room->room_floor }}</hr>
                                </button>
                                {{-- </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
        <script>
            function navigateToItemUser(roomName, roomFloor, roomImage) {
                if (roomName && roomFloor && roomImage) {
                    window.location.href = "{{ url('room_user/room_borrow') }}?room_name=" + roomName + "&room_floor=" +
                        roomFloor + "&image=" + roomImage;
                }
            }
        </script>
    </body>

    </html>
</span>
