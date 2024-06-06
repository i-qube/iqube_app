<span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Barang</title>
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
                    <h1 class="h1">Barang</h1>
                </br></br></br>
                </div>
                <table
                    class="w-full table-fixed border-collapse border border-slate-400 mt-8 border-separate border-spacing-x-3">
                    <tbody>
                        @foreach ($items as $item)
                            <tr class="md-8">
                                <button type="button" style="height: 230px; width: 230px;" 
                                class=" px-9 py-9 focus:outline-none text-white bg-cyan-900 hover:bg-cyan-900 focus:ring-4 focus:ring-cyan-900 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-cyan-600 dark:hover:bg-cyan-650 dark:focus:ring-cyan-650"
                                    onclick="navigateToItemUser('{{ $item->item_id }}', '{{ $item->item_name }}')">
                                    <img src="{{ asset('storage/barang/' . $item->image) }}"
                                        alt="{{ $item->item_name }}" class="image-center"
                                        style="height: 120px; width: 200px;">
                                    
                                    <p class="text-center">{{ $item->item_name }}</p>
                                    <hr class="text-center">{{ $item->brand }}</hr>
                                </button>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>

        <script>
            function navigateToItemUser(itemId, itemName) {
                if (itemId && itemName) {
                    window.location.href = "{{ url('item_user/item_borrow') }}?item_id=" + itemId + "&item_name=" + itemName;
                }
            }
        </script>

    </body>

    </html>
</span>
