<span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Dashboard | User</title>
        <link rel="stylesheet" href="{{ asset('css\style.css') }}" />
        <!-- Font Awesome Cdn Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <style>
            .main {
                background: #fdfdfd;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="{{url('dashboard_user')}}" class="logo">
                            <img src="{{ asset('images/IQUBE.png') }}" alt="">
                            <span class="nav-title">i-QUBE</span>
                        </a></li>
                    <li><a href="{{url('item_user')}}">
                            <i class="fas fa-home"></i>
                            <span class="nav-item">Data Barang</span>
                        </a></li>
                    <li><a href="{{url('room_user')}}">
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
                    <h1>Dashboard</h1>
                    <i class="fas fa-user-cog"></i>
                </div>
            </section>
        </div>
    </body>
    </html>
</span>
