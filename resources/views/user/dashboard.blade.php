<span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Dashboard | User</title>
        <link rel="stylesheet" href="{{ asset('css\style.css') }}" />
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Font Awesome Cdn Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

        <style>
            .main {
                background: #07617D;
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
                    <li><a href="{{url('peminjaman')}}">
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

            {{-- <section class="image-container">
                <div class="flex justify-between mb-5 relative">
                    <div class="mb-5 mt-5" style="display: flex; align-items: flex-start;">
                        <div style="margin-left: 400px; margin-right: 50px; margin-top: 150px">
                            <img src="{{ asset('images/landing_page.png') }}" alt="" style="width: 500px;">
                        </div>
                        <div style="margin-left: 50px; margin-top:200px">
                            <h1 style="font-size: 36px; margin-bottom: 16px;">Sistem Informasi Peminjaman Sarana dan Prasarana</h1>
                            <button id="button" class="p-3 px-6 bg-cyan-800 text-white rounded-full text-center hover:bg-cyan-900 my-2" onclick="scrollToSection('target-section')">
                                <p>Mulai</p>
                            </button>
                        </div>
                    </div>
                </div>
            </section>   
            
            <section id="target-section">
                <h2>Target Section</h2>
                <p>This is the section to navigate to.</p>
            </section>

            <script>
                function scrollToSection(sectionId) {
                    // Scroll to the target section
                    document.getElementById(sectionId).scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            </script> --}}
            </div>
        </div>
    </body>
    </html>
</span>
