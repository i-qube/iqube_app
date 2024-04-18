<span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Dashboard | Admin</title>
      <link rel="stylesheet" href="{{ asset('css\style.css') }}" />
      <!-- Font Awesome Cdn Link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
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
            <h1>Dashboard</h1>
            <i class="fas fa-user-cog"></i>
          </div>
          <div class="main-skills">
            <div class="card">
              <i class="fas fa-laptop-code"></i>
              <h3>Peminjaman Barang</h3>
              <button>Get Started</button>
            </div>
            <div class="card">
              <i class="fab fa-wordpress"></i>
              <h3>Peminjaman Ruangan</h3>
              <button>Get Started</button>
            </div>
            <div class="card">
              <i class="fas fa-palette"></i>
              <h3>Belum Tahu</h3>
              <button>Get Started</button>
            </div>
            <div class="card">
              <i class="fab fa-app-store-ios"></i>
              <h3>Belum Tahu</h3>
              <button>Get Started</button>
            </div>
          </div>
    
          <section class="main-course">
            <div class="main-top">
            <h1>My courses</h1>
            </div>
            <div class="course-box">
              <ul>
                <li class="active">In progress</li>
                <li>explore</li>
                <li>incoming</li>
                <li>finished</li>
              </ul>
              <div class="course">
                <div class="box">
                  <h3>HTML</h3>
                  <p>80% - progress</p>
                  <button>continue</button>
                  <i class="fab fa-html5 html"></i>
                </div>
                <div class="box">
                  <h3>CSS</h3>
                  <p>50% - progress</p>
                  <button>continue</button>
                  <i class="fab fa-css3-alt css"></i>
                </div>
                <div class="box">
                  <h3>JavaScript</h3>
                  <p>30% - progress</p>
                  <button>continue</button>
                  <i class="fab fa-js-square js"></i>
                </div>
              </div>
            </div>
            </div>
          </section>
        </section>
      </div>
    </body>
    </html></span>
  