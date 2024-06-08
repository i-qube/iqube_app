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
            .image-container {
                display: flex;
                align-items: center;
                justify-content: flex-start;
                margin: 200px 0px 50px 330px;
                padding: 0 100px;
            }

            .image-container img {
                width: 400px;
                margin-right: 50px;
            }

            .text-container {
                max-width: 500px;
            }

            .text-container h1 {
                font-size: 36px;
                margin-bottom: 16px;
            }

            .text-container button {
                padding: 16px 24px;
                background-color: #164e63;
                color: white;
                border: none;
                border-radius: 9999px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .text-container button:hover {
                background-color: #0f3542;
            }

            .new-section {
                background-color: #ffffff;
                padding-left: 330px;
                padding-top: 100px;
                padding-bottom: 200px;
                text-align: center;
            }

            .new-section h2 {
                font-size: 32px;
                margin-bottom: 20px;
            }

            .new-section p {
                font-size: 18px;
                max-width: 600px;
                margin: 0 auto 20px;
            }

            .new-section .features {
                display: flex;
                justify-content: center;
                gap: 20px;
                flex-wrap: wrap;
            }

            .new-section .feature {
                background-color: #ffffff;
                padding: 10px;
                border-radius: 10px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                max-width: 300px;
                text-align: center;
                /* Change text alignment to center */
            }

            .new-section .feature img {
                max-width: 100px;
                margin: 0 auto 10px;
                /* Center image and add bottom margin */
            }

            .new-section .feature h3 {
                font-size: 24px;
                margin-bottom: 10px;
            }

            .new-section .feature p {
                font-size: 16px;
            }

            .button-target {
                padding: 16px 24px;
                margin-left: 1000px;
                margin-top: 150px;
                margin-right: 100px;
                background-color: #164e63;
                color: white;
                border: none;
                border-radius: 9999px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .button-target:hover {
                background-color: #0f3542;
            }

            .download-button {
                display: inline-block;
                padding: 8px 16px;
                background-color: #164e63;
                color: white;
                border: none;
                border-radius: 9999px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .download-button:hover {
                background-color: #0f3542;
            }

            .logout {
                color: white;
                font-size: 16px;
            }

            .logout .fas {
                color: white;
            }

            .logout .nav-item {
                color: white;
            }

            .navbar-active {
                background-color: rgb(255, 255, 255);
                color: black;
            }

            .navbar-active a {
                color: black;
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
                    <li class="{{ request()->is('dashboard_user') ? 'navbar-active' : '' }}">
                        <a href="{{ url('dashboard_user') }}">
                            <i class="fas fa-home"></i>
                            <span class="nav-item">Home</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('item_user') ? 'navbar-active' : '' }}">
                        <a href="{{ url('item_user') }}">
                            <i class="fas fa-inbox"></i>
                            <span class="nav-item">Barang</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('room_user') ? 'navbar-active' : '' }}">
                        <a href="{{ url('room_user') }}">
                            <i class="fas fa-cube"></i>
                            <span class="nav-item">Ruangan</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('peminjaman') ? 'navbar-active' : '' }}">
                        <a href="{{ url('peminjaman') }}">
                            <i class="fas fa-server"></i>
                            <span class="nav-item">History</span>
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button class="logout">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="nav-item">Log out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>


            <div>
                <section class="image-container">
                    <img src="{{ asset('images/landing_page.png') }}" alt="Landing Page Image">
                    <div class="text-container">
                        <h1>Sistem Informasi Peminjaman Sarana dan Prasarana</h1>
                        <button id="button" onclick="scrollToSection('target-section')">
                            Start
                        </button>
                    </div>
                </section>

                <!-- New Section -->
                <section class="new-section" id="target-section">
                    <h2>Tata Cara Peminjaman Barang</h2>
                    <div class="features">
                        <div class="feature">
                            <img src="{{ asset('images/icons.png') }}" alt="Icons">
                            <h3>Pilih Menu</h3>
                            <p>Pilih menu data barang pada sidebar
                            </p>
                        </div>
                        <div class="feature">
                            <img src="{{ asset('images/icons_2.png') }}" alt="Icons 2">
                            <h3>Cek Ketersediaan</h3>
                            <p>Barang yang tersedia otomatis bisa dipinjam
                            </p>
                        </div>
                        <div class="feature">
                            <img src="{{ asset('images/icons_3.png') }}" alt="Icons 3">
                            <h3>Isi Formulir</h3>
                            <p>Pastikan untuk mengisi data diri peminjam dengan benar</p>
                        </div>
                    </div>
                    <div class="button-target">
                        <button id="button" onclick="scrollToSection('new-target-section')">
                            Next
                        </button>
                    </div>
                </section>

                <!-- New Section -->
                <section class="new-section" id="new-target-section">
                    <h2>Tata Cara Peminjaman Ruangan</h2>
                    <div class="features">
                        <div class="feature">
                            <img src="{{ asset('images/icons.png') }}" alt="Icons">
                            <h3>Pilih Menu</h3>
                            <p>Pilih menu data ruangan pada sidebar
                            </p>
                        </div>
                        <div class="feature">
                            <img src="{{ asset('images/icons_2.png') }}" alt="Icons 2">
                            <h3>Cek Ketersediaan</h3>
                            <p>Ruangan yang tersedia otomatis bisa dipinjam
                            </p>
                        </div>
                        <div class="feature">
                            <img src="{{ asset('images/icons_3.png') }}" alt="Icons 3">
                            <h3>Isi Formulir</h3>
                            <p>Pastikan untuk mengisi data diri peminjam dengan benar</p>
                        </div>
                        <div class="feature">
                            <img src="{{ asset('images/icons_4.png') }}" alt="Icons 4">
                            <h3>Unduh Surat</h3>
                            <p>Unduh template surat disini</p>
                            <a href=https://drive.google.com/file/d/14WGJuiGNQuiRbdXTQDYokao1sujdfZu9/view?uspsharing
                                class="download-button">Download</a>
                        </div>
                        <div class="feature">
                            <img src="{{ asset('images/icons_5.png') }}" alt="Icons 5">
                            <h3>Cek Surat</h3>
                            <p>Cek surat secara berkala di admin jurusan</p>
                        </div>
                    </div>
                </section>
            </div>
            <script>
                function scrollToSection(id) {
                    document.getElementById(id).scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            </script>
        </div>
        </div>
    </body>

    </html>
</span>
