<div id="layoutSidenav_content">
    <?php $val = Service('validation'); ?>
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4 shadow">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                Detail Absen
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <hr class="mt-0 mb-4" />
            <div class="row">
                <div class="col-xl-5">
                    <div class="card mb-4 shadow">
                        <div class="card-header">Detail</div>
                        <div class="card-body">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Tanggal</th>
                                        <td><?= $absen['date']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jam Masuk</th>
                                        <td><?= $absen['datang']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jam Selesai</th>
                                        <td><?= $absen['pulang']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Keterangan</th>
                                        <td><?= ($absen['datang'] > '07:30:00' ? 'Terlambat' : 'Hadir'); ?></td>
                                    </tr>
                    				 <tr>
                                        <th scope="row">Latitude</th>
                                        <td><?= $absen['latitude']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Longitude</th>
                                        <td><?= $absen['longitude']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="card mb-4 shadow">
                        <div class="card-header">Lokasi</div>
                        <div class="card-body m-3" id="map" style="width: 500px; height: 320px; ">
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<script>
    var map = L.map('map').setView([-8.001359, 112.621183], 15);
    var id = <?= $absen['id']; ?>;
    var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);

    $.get(
        '/Admin/getAbsenKoordinat/' + id,
        (data) => {
            if (data) {
                L.marker([data.latitude, data.longitude]).addTo(map)
                    .bindPopup('<b>Lokasi Absen!</b><br />lokasi saat melakukan absen').openPopup();
            }
        })
</script>
</main>