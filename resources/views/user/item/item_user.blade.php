<span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Data Barang</title>
        <link rel="stylesheet" href="{{ asset('css\style.css') }}" />
        <!-- Font Awesome Cdn Link -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <style>
            .main {
                background: #07617D;
            }
            .h1{
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
                    <h1 class="h1">Data Barang</h1>
                    <i class="fas fa-user-cog"></i>
                </div>
                <table
                    class="w-full table-fixed border-collapse border border-slate-400 mt-8 border-separate border-spacing-x-3">
                    <tbody>
                        @foreach ($items as $item)
                            <tr class="md-8">
                                <td colspan="4" class="ml-8">
                                    <div class="p-4 w-full bg-white text-black rounded-full my-2">
                                        <p>{{ $item->item_name }}</p>
                                    </div>
                                </td>
                                @if ($item->item_qty != 0)
                                <td colspan="1">
                                    <button id="button" class="p-4 w-full bg-yellow-500 text-white rounded-full text-center hover:bg-blue-500 my-2" onclick="navigateToItemUser('{{ $item->item_id }}' , '{{ $item->item_name }}')">
                                        <p>Pinjam</p>
                                    </button>
                                </td> 
                                @else
                                <td colspan="1">
                                    <button id="button" class="p-4 w-full bg-gray-400 text-white rounded-full text-center cursor-not-allowed my-2 disabled">
                                        <p>Pinjam</p>
                                    </button>
                                </td> 
                                @endif
                                <script>
                                    function navigateToItemUser(itemId) {
                                        if (itemId) {
                                            window.location.href = "{{ url('item_user/item_borrow') }}?item_id=" + itemId;
                                        }
                                    }
                                </script>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </body>
    </html>
</span>
