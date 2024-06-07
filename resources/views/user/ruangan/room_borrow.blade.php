<span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Form Pinjam Ruangan</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
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

            .h3 {
                font-size: 20px;
                font-weight: 480;
                color: #07617D;
            }

            .flex-row {
                display: flex;
                justify-content: space-between;
            }

            .image-container {
                flex: 1;
                padding-right: 20px;
            }

            .info-container {
                flex: 1;
                padding-left: 20px;
            }

            .logout {
                color: white;
                font-size: 16px;
                /* Optional: Adjust font size if needed */
            }

            .logout .fas {
                color: white;
            }

            .logout .nav-item {
                color: white;
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

            <section class="main">
                <div class="main-top">
                    <h1 class="h3" id="roomNameHeading"></h1>
                    <i class="fas fa-user-cog"></i>
                </div>
                <div class="main-top">
                    <h3 class="h3" id="roomFloorHeading"></h3>
                </div>
                </br>
                <div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Nama Peminjam
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Peminjaman
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Pukul
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($peminjaman as $pinjam)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{$pinjam->user->nama}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$pinjam->date_borrow}}
                                    </td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                        {{$pinjam->start_time}} - {{$pinjam->end_time}}
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                </br>
                <div class="flex-row">
                    <div class="image-container">
                        <div>
                            <img id="roomImage" alt="Gambar tidak tersedia" style="width: 700px;">
                        </div>
                    </div>

                    <div class="info-container">
                        <div class="card bg-neutral-200 shadow-lg rounded-lg p-6">
                            <form method="POST" action="{{ url('room_user') }}">
                                <input type="hidden" name="room_id" value="{{ request('room_id') }}">
                                @csrf
                                <div class="mb-5 mt-4">
                                    {{-- <label for="name" class="text-black pl-5">Nama</label> --}}
                                    <input type="text" id="name" name="nama"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Nama" value="{{ session('user.nama') }}" readonly>
                                </div>
                                <div class="mb-5 mt-4">
                                    {{-- <label for="id" class="text-black pl-5">NIM</label> --}}
                                    <input type="text" id="no_induk" name="no_induk"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="NIM" value="{{ session('user.no_induk') }}" readonly>
                                </div>
                                <div class="mb-5 mt-4">
                                    {{-- <label for="id" class="text-black pl-5">Kelas</label> --}}
                                    <input type="text" id="kelas" name="kelas"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Kelas" value="{{ session('user.kelas') }}" readonly>
                                </div>
                                <div class="date-picker-container">
                                    {{-- <label for="date" class="text-black pl-5">Pilih tanggal</label> --}}
                                    <div class="relative max-w-sm mb-5">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input type="date" id="date_borrow" name="date_borrow"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Pilih tanggal pinjam">
                                    </div>
                                </div>
                                <div class="time-picker-container">
                                    {{-- <label for="date" class="text-black pl-5">Pilih Jam</label> --}}
                                    <div class="max-w-[20rem] pl-2.5 grid grid-cols-2 gap-5">
                                        <div>
                                            <label for="start-time"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Start
                                                time:</label>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <input type="time" id="start_time" name="start_time"
                                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-50"
                                                    required />
                                            </div>
                                        </div>
                                        <div>
                                            <label for="end-time"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">End
                                                time:</label>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <input type="time" id="end_time" name="end_time"
                                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-5 mt-4">
                                    {{-- <label for="id" class="text-black pl-5">Status</label> --}}
                                    <input type="text" id="status" name="status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="Not Complete" readonly>
                                </div>
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-8">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    function updateRoomDetails() {
                        const urlParams = new URLSearchParams(window.location.search);
                        const roomName = urlParams.get('room_name');
                        document.getElementById("roomNameHeading").innerText += roomName;
                        const roomFloor = urlParams.get('room_floor');
                        document.getElementById("roomFloorHeading").innerText += roomFloor;
                        const roomImage = urlParams.get('image');
                        if (roomImage) {
                            document.getElementById("roomImage").src = "{{ asset('storage/ruangan') }}/" + roomImage;
                        }
                    }

                    function handleDateChange() {
                        const chosenDate = new Date(this.value);
                        const dayOfWeek = chosenDate.getDay();
                        const startTimeInput = document.getElementById('start_time');
                        const endTimeInput = document.getElementById('end_time');

                        if (dayOfWeek > 0 && dayOfWeek < 6) { // Weekdays (Monday to Friday)
                            setWeekdayTimeLimits(startTimeInput, endTimeInput);
                        } else { // Weekends (Saturday and Sunday)
                            setWeekendTimeLimits(startTimeInput, endTimeInput);
                        }
                    }

                    function setWeekdayTimeLimits(startTimeInput, endTimeInput) {
                        startTimeInput.min = '17:00';
                        startTimeInput.max = '21:00';
                        endTimeInput.min = '18:00';
                        endTimeInput.max = '22:00';
                    }

                    function setWeekendTimeLimits(startTimeInput, endTimeInput) {
                        startTimeInput.min = '07:00';
                        startTimeInput.max = '22:00';
                        endTimeInput.min = '07:00';
                        endTimeInput.max = '22:00';
                    }

                    document.addEventListener('DOMContentLoaded', function() {
                        updateRoomDetails();
                        document.getElementById('date_borrow').addEventListener('change', handleDateChange);
                    });
                </script>
            </section>
        </div>
    </body>

    </html>
