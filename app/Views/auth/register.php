<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<style>
    #map {
        height: 400px;
        width: 600px;
    }
</style>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/authentication/style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <title>Register</title>
</head>

<body>

    <div class="container">
        <?php $validation = \Config\Services::validation(); ?>
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <?php endif; ?>
        <form class="form-signin" method="post" action="<?= base_url(); ?>/auth/register/process">
            <?= csrf_field(); ?>
            <h1 class="mt-5">Form Registrasi Siswa</h1>
            <h5>Data Akun</h5>
            <hr>
            <div class="my-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                <?php if ($validation->getError('email')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('email'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <?php if ($validation->getError('password')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('password'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="password_conf" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_conf" name="password_conf" required>
                <span class="text-danger fw-bold" id="pass_warning">
                </span>
                <?php if ($validation->getError('password_conf')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('password_conf'); ?>
                    </span>
                <?php } ?>
            </div>
            <h5>Data Diri</h5>
            <hr>
            <div class="mb-3">
                <!-- <label for="id_reg" class="form-label">ID Registrasi</label> -->
                <input type="hidden" class="form-control" id="id_reg" name="id_reg" value="<?= "PS-" . uniqid() ?>" readonly>
                <?php if ($validation->getError('id_reg')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('id_reg'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="number" class="form-control" id="nisn" name="nisn" required>
                <?php if ($validation->getError('nisn')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('nisn'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
                <?php if ($validation->getError('nama')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('nama'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                <?php if ($validation->getError('tempat_lahir')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('tempat_lahir'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                <?php if ($validation->getError('tanggal_lahir')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('tanggal_lahir'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" required>
                    <option value="tidak_jelas" hidden selected>Pilih Jenis Kelamin</option>
                    <option value="laki">Laki - Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
                <?php if ($validation->getError('jenis_kelamin')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('jenis_kelamin'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="agama" class="form-label">Agama</label>
                <select class="form-control" name="agama">
                    <option value="tidak_jelas" hidden selected>Pilih Agama</option>
                    <option value="islam">Islam</option>
                    <option value="katolik">Katolik</option>
                    <option value="hindu">Hindhu</option>
                    <option value="budha">Budha</option>
                    <option value="kristen">Kristen</option>
                    <option value="konghuchu">Kong Hu Chu</option>
                </select>
                <?php if ($validation->getError('agama')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('agama'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="status_keluarga" class="form-label">Status Keluarga</label>
                <input type="text" class="form-control" id="status_keluarga" name="status_keluarga" required>
                <?php if ($validation->getError('status_keluarga')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('status_keluarga'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="anak_ke" class="form-label">Anak Ke</label>
                <input type="number" class="form-control" id="anak_ke" name="anak_ke" required>
                <?php if ($validation->getError('anak_ke')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('anak_ke'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="number" class="form-control" id="nik" name="nik" required>
                <?php if ($validation->getError('nik')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('nik'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="sekolah_asal" class="form-label">Sekolah Asal</label>
                <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal" required>
                <?php if ($validation->getError('sekolah_asal')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('sekolah_asal'); ?>
                    </span>
                <?php } ?>
            </div>

            <h5>Data Orangtua</h5>
            <hr>
            <div class="my-3">
                <label for="nama_ayah" class="form-label">Nama Ayah</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
                <?php if ($validation->getError('nama_ayah')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('nama_ayah'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" required>
                <?php if ($validation->getError('pekerjaan_ayah')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('pekerjaan_ayah'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="penghasilan_ayah" class="form-label">Penghasilan Perbulan</label>
                <select class="form-control" name="penghasilan_ayah">
                    <option value="tidak_jelas" hidden selected>Pilih Penghasilan Ayah</option>
                    <option value="Rp.0-Rp.500.000">Rp. 0 - Rp. 500.000</option>
                    <option value="Rp.500.000-Rp.999.999">Rp. 500.000 - Rp. 999.999</option>
                    <option value="Rp.1.000.000-Rp.1.999.999">Rp. 1.000.000 - Rp. 1.999.999</option>
                    <option value="Rp.2.000.000-Rp.4.999.999">Rp. 2.000.000 - Rp. 4.999.999</option>
                    <option value="Rp.5.000.000-Rp.20.000.000">Rp. 5.000.000 - Rp. 20.000.000</option>
                    <option value="Lebih Dari Rp.20.000.000">Lebih Dari Rp. 20.000.000</option>
                    <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                </select>
                <?php if ($validation->getError('penghasilan_ayah')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('penghasilan_ayah'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="no_telepon_ayah" class="form-label">No Telepon Ayah</label>
                <input type="number" class="form-control" id="no_telepon_ayah" name="no_telepon_ayah" required>
                <?php if ($validation->getError('no_telepon_ayah')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('no_telepon_ayah'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                <?php if ($validation->getError('nama_ibu')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('nama_ibu'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" required>
                <?php if ($validation->getError('pekerjaan_ibu')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('pekerjaan_ibu'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="penghasilan_ibu" class="form-label">Penghasilan Perbulan</label>
                <select class="form-control" name="penghasilan_ibu">
                    <option value="tidak_jelas" hidden selected>Pilih Penghasilan Ibu</option>
                    <option value="Rp.0-Rp.500.000">Rp. 0 - Rp. 500.000</option>
                    <option value="Rp.500.000-Rp.999.999">Rp. 500.000 - Rp. 999.999</option>
                    <option value="Rp.1.000.000-Rp.1.999.999">Rp. 1.000.000 - Rp. 1.999.999</option>
                    <option value="Rp.2.000.000-Rp.4.999.999">Rp. 2.000.000 - Rp. 4.999.999</option>
                    <option value="Rp.5.000.000-Rp.20.000.000">Rp. 5.000.000 - Rp. 20.000.000</option>
                    <option value="Lebih Dari Rp.20.000.000">Lebih Dari Rp. 20.000.000</option>
                    <option value="tidak_berpenghasilan">Tidak Berpenghasilan</option>
                </select>
                <?php if ($validation->getError('penghasilan_ibu')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('penghasilan_ibu'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="no_telepon_ibu" class="form-label">No Telepon Ibu</label>
                <input type="number" class="form-control" id="no_telepon_ibu" name="no_telepon_ibu" required>
                <?php if ($validation->getError('no_telepon_ibu')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('no_telepon_ibu'); ?>
                    </span>
                <?php } ?>
            </div>
            <h5>Data Wali</h5>
            <small>Jika tidak ada, tidak perlu diisi</small>
            <hr>
            <div class="my-3">
                <label for="nama_wali" class="form-label">Nama Wali</label>
                <input type="text" class="form-control" id="nama_wali" name="nama_wali">
                <?php if ($validation->getError('nama_wali')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('nama_wali'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="pekerjaan_wali" class="form-label">Pekerjaan Wali</label>
                <input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali">
                <?php if ($validation->getError('pekerjaan_wali')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('pekerjaan_wali'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="no_telepon_wali" class="form-label">No Telepon Wali</label>
                <input type="number" class="form-control" id="no_telepon_wali" name="no_telepon_wali">
                <?php if ($validation->getError('no_telepon_wali')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('no_telepon_wali'); ?>
                    </span>
                <?php } ?>
            </div>

            <h5>Data Alamat</h5>
            <hr>


            <div class="form-group">
                <label for="">Provinsi</label>
                <select name="provinsi" id="provinsi" class="form-control form-control-sm">
                    <option></option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Kabupaten/Kota</label>
                <select name="kota" id="kota" class="form-control form-control-sm">
                    <option></option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Kecamatan</label>
                <select name="kecamatan" id="kecamatan" class="form-control form-control-sm">
                    <option></option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Desa/Kelurahan</label>
                <select name="desa" id="desa" class="form-control form-control-sm">
                    <option></option>
                </select>
            </div>

            <div class="my-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
                <?php if ($validation->getError('alamat')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('alamat'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="form-group my-auto">
                <input id="pac-input" class="controls" type="text" placeholder="Search Box" style="font-size:17px">
                <!-- BUTTON MyLocation -->
                <button class="btn btn-info" id="pac-button">Lokasi Saya Saat Ini</button>
                <div id="map" class="mx-auto"></div>

            </div>
            <div class="my-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" onkeyup="calculate()" required>
                <?php if ($validation->getError('latitude')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('latitude'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" onkeyup="calculate()" required>
                <?php if ($validation->getError('longitude')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('longitude'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="my-3">
                <label for="jarak" class="form-label">Jarak</label>
                <input type="text" class="form-control" id="jarak" name="jarak" readonly>
                <span class='text-danger' id="jarak_danger"></span>
                <?php if ($validation->getError('jarak')) { ?>
                    <span class='text-danger'>
                        <?= $error = $validation->getError('jarak'); ?>
                    </span>
                <?php } ?>
            </div>
            <div class="mb-3">
                <button type="submit" id="submitBtn" class="btn btn-primary" disabled>Daftar</button>

            </div>
            <span>Sudah punya akun ? Login <a href="<?= base_url(); ?>/auth/login">disini</a></span>
        </form>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="<?= base_url() ?>/assets/js/ajax.js" type="text/javascript"></script>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // PASSWORD MATCH
    let span = document.getElementById('pass_warning');
    let text_danger = document.createTextNode("**PASSWORD HARUS SAMA");
    $('#password_conf').on('keyup', function() {
        if ($('#password').val() !== $('#password_conf').val()) {
            span.appendChild(text_danger)
        } else {
            span.innerHTML = '';
        }
    })

    function calculate() {
        // Titik Sekolah
        var originLat = '-3.1380555'
        var originLon = '121.0850155'

        // Titik Siswa
        var siswaLat = document.getElementById('latitude').value
        var siswaLon = document.getElementById('longitude').value

        const origin = {
            lat: originLat,
            lng: originLon
        }
        const destination = {
            lat: siswaLat,
            lng: siswaLon
        }

        getHaversineDistance(origin, destination)
    }

    getHaversineDistance = (firstLocation, secondLocation) => {
        const earthRadius = 6371; // km 

        const diffLat = (secondLocation.lat - firstLocation.lat) * Math.PI / 180;
        const diffLng = (secondLocation.lng - firstLocation.lng) * Math.PI / 180;

        const arc = Math.cos(
                firstLocation.lat * Math.PI / 180) * Math.cos(secondLocation.lat * Math.PI / 180) *
            Math.sin(diffLng / 2) * Math.sin(diffLng / 2) +
            Math.sin(diffLat / 2) * Math.sin(diffLat / 2);
        const line = 2 * Math.atan2(Math.sqrt(arc), Math.sqrt(1 - arc));

        const distance = earthRadius * line;

        document.getElementById('jarak').value = Math.ceil(distance) + " KM"

        if (distance <= 2) {
            document.getElementById("submitBtn").disabled = false;
            document.getElementById("jarak_danger").innerHTML = '';
        } else {
            document.getElementById("submitBtn").disabled = true;
            document.getElementById("jarak_danger").innerHTML = '**Jarak maksimal dari sekolah adalah 2KM';
        }
    }

    var marker;

    function initMap() {
        directionsRenderer = new google.maps.DirectionsRenderer();
        directionsService = new google.maps.DirectionsService();


        const loc = {
            lat: -3.1380555,
            lng: 121.0850155
        }

        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: loc
        });

        const searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));

        map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input'));
        map.addListener("bounds_changed", () => {
            searchBox.setBounds(map.getBounds());
        });

        searchBox.addListener('places_changed', function() {
            const places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            const bounds = new google.maps.LatLngBounds();

            placeMarker(places[0].geometry.location);
            if (places[0].geometry.viewport) {
                bounds.union(places[0].geometry.viewport);
            } else {
                bounds.extend(places[0].geometry.location);
            }
            map.fitBounds(bounds);
            var latitude = places[0].geometry.location.lat();
            var longitude = places[0].geometry.location.lng();

            document.getElementById("latitude").value = latitude;
            document.getElementById("longitude").value = longitude;
            calculate();
        });

        map.addListener("click", (e) => {

            var latitude = e.latLng.lat();
            var longitude = e.latLng.lng();

            document.getElementById("latitude").value = latitude;
            document.getElementById("longitude").value = longitude;

            placeMarker(e.latLng);
            calculate();
        });




        function placeMarker(location) {

            if (marker == null) {
                marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            } else {
                marker.setPosition(location);
            }
        }

    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoNyOpCm5oQ4vlUSfaQX5_dDd06ZNGQR4&callback=initMap&libraries=places&v=weekly" async></script>