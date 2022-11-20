<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Selamat Datang-->
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card bg-c-white m-3 shadow">
                <div class="row align-items-center ml-3">
                    <i class="fa fa-user"></i>
                    <div class="p-3">
                        <h4>
                            <span class="m-b-5 font-weight-bold">Selamat Datang, <?= session()->nama; ?> !</span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-1">
        <!-- Absensi -->
        <div class="col-xl-8 col-md-8 mb-4">
            <!-- Clock -->
            <div class="card bg-c-white m-3 shadow">
                <div class="row justify-content-center">
                    <div id="clock"></div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="card bg-c-white">
                        <button class="btn btn-success" id="absen" style="font-size:25px; background-color:#508b90" onclick="getLocation()">Absen</button>
                    </div>
                </div>
                <!-- Status -->
                <div class="row justify-content-center mt-1 p-3">
                    <h5 id="message"></h5>
                </div>
                <!-- Start time End time -->
                <div class="row justify-content-center p-1">
                    <div class="col text-center ">
                        <h4>START TIME</h4>
                        <h3 id="start-time">-- : --</h3>
                    </div>
                    <div class="col text-center ">
                        <h4>END TIME</h4>
                        <h3 id="end-time">-- : --</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pie Chart Kehadiran -->
        <div class="col-xl-3 col-md-8">
            <div class="card bg-c-white mt-3 p-3 shadow"> <canvas id="barChart" width="300" height="300"></canvas></div>

            <p id="lokasi"></p>
        </div>

        <!-- lokasi -->
        <script>
            var x = document.getElementById("lokasi");

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                $.post(
                    '/Peserta/addLokasi', {
                        latitude: position.coords.latitude,
                        longitude: position.coords.longitude
                    },
                    (data) => {
                        console.log(data)
                    }
                )
            }
        </script>
        <script src="/assets/js/clock.js"></script>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->