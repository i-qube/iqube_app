<span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Data Barang</title>
        <link rel="stylesheet" href="{{ asset('css\style.css') }}" />
        <!-- Font Awesome Cdn Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <style>
            .main {
                background: #07617D;
            }

            .component-wrapper {
                padding: 15px;
                background-color: #f2f2f2;
                border-radius: 50px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                width: 800px;
            }

            .component-title {
                font-size: 1.2em;
                font-weight: bold;
                color: #000000;
            }

            .component-status {
                font-size: 1.1em;
                color: green;
            }

            .action-button {
                background-color: #D5B300;
                border: none;
                color: #fff;
                padding: 15px;
                border-radius: 5px;
                text-transform: uppercase;
                cursor: pointer;
                border-radius: 50px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                display: flex;
                justify-content: center;
                align-items: center;
                width: 180px;
                font-size: 18px;
            }

            .action-button:hover {
                background-color: #0069d9;
            }

            .action-button:disabled {
                background-color: #c0c0c0;
                cursor: not-allowed;
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
                    <li><a href="item">
                            <i class="fas fa-home"></i>
                            <span class="nav-item">Data Barang</span>
                        </a></li>
                    <li><a href="">
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
                    <h1>Data Barang</h1>
                    <i class="fas fa-user-cog"></i>
                </div>
                <table>
                  <tr>
                <th>
                <table>
                    <tr class="component-wrapper">
                        <th class="component-title">1. Lorem Ipsum</th>
                        <th class="component-status">Tersedia</th>
                    </tr>
                </table>
                </th>
                <th>
                <div class="component-action">
                    <button class="action-button">PINJAM</button>
                </div>
                </th>
                  </tr>
                </table>
            </section>
        </div>
    </body>

    </html>
</span>
