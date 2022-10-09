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

    <title>Register Siswa</title>
  </head>
  <body>

        <div class="container mt-5">
            <?php $validation = \Config\Services::validation(); ?>
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <?php endif; ?>

            <form method="post" action="<?= base_url(); ?>/siswa/register/store">
                <?= csrf_field(); ?>
                <h1 class="my-5">Form Registrasi Siswa</h1>
                <h5>Data Diri</h5>
                <hr>
                <div class="mb-3">
                    <label for="id_reg" class="form-label">ID Registrasi</label>
                    <input type="text" class="form-control" id="id_reg" name="id_reg" value="<?= "PS-".uniqid() ?>" readonly>
                    <?php if($validation->getError('id_reg')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('id_reg'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" required>
                    <?php if($validation->getError('nisn')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('nisn'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                    <?php if($validation->getError('nama')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('nama'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    <?php if($validation->getError('tempat_lahir')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('tempat_lahir'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    <?php if($validation->getError('tanggal_lahir')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('tanggal_lahir'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" required>
                        <option value="tidak_jelas" hidden selected>Pilih Jenis Kelamin</option>
                        <option value="laki">Laki - Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                    <?php if($validation->getError('jenis_kelamin')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('jenis_kelamin'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="agama" class="form-label">Agama</label>
                    <select class="form-control" name="agama">
                        <option value="tidak_jelas" hidden selected>Pilih Agama</option>
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                    </select>
                    <?php if($validation->getError('agama')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('agama'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="status_keluarga" class="form-label">Status Keluarga</label>
                    <input type="text" class="form-control" id="status_keluarga" name="status_keluarga" required>
                    <?php if($validation->getError('status_keluarga')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('status_keluarga'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="anak_ke" class="form-label">Anak Ke</label>
                    <input type="number" class="form-control" id="anak_ke" name="anak_ke" required>
                    <?php if($validation->getError('anak_ke')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('anak_ke'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" required>
                    <?php if($validation->getError('nik')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('nik'); ?>
                        </span>
                    <?php }?>
                </div>
                <h5>Data Orangtua</h5>
                <hr>
                <div class="my-3">
                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
                    <?php if($validation->getError('nama_ayah')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('nama_ayah'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" required>
                    <?php if($validation->getError('pekerjaan_ayah')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('pekerjaan_ayah'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="no_telepon_ayah" class="form-label">No Telepon Ayah</label>
                    <input type="text" class="form-control" id="no_telepon_ayah" name="no_telepon_ayah" required>
                    <?php if($validation->getError('no_telepon_ayah')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('no_telepon_ayah'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                    <?php if($validation->getError('nama_ibu')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('nama_ibu'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" required>
                    <?php if($validation->getError('pekerjaan_ibu')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('pekerjaan_ibu'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="no_telepon_ibu" class="form-label">No Telepon Ibu</label>
                    <input type="text" class="form-control" id="no_telepon_ibu" name="no_telepon_ibu" required>
                    <?php if($validation->getError('no_telepon_ibu')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('no_telepon_ibu'); ?>
                        </span>
                    <?php }?>
                </div>
                <h5>Data Wali</h5>
                <small>Jika tidak ada, tidak perlu diisi</small>
                <hr>
                <div class="my-3">
                    <label for="nama_wali" class="form-label">Nama Wali</label>
                    <input type="text" class="form-control" id="nama_wali" name="nama_wali" >
                    <?php if($validation->getError('nama_wali')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('nama_wali'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="pekerjaan_wali" class="form-label">Pekerjaan Wali</label>
                    <input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali" >
                    <?php if($validation->getError('pekerjaan_wali')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('pekerjaan_wali'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="no_telepon_wali" class="form-label">No Telepon Wali</label>
                    <input type="text" class="form-control" id="no_telepon_wali" name="no_telepon_wali" >
                    <?php if($validation->getError('no_telepon_wali')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('no_telepon_wali'); ?>
                        </span>
                    <?php }?>
                </div>
                <h5>Data Alamat</h5>
                <hr>
                <div class="my-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                    <?php if($validation->getError('alamat')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('alamat'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="provinsi" class="form-label">Provinsi</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" required>
                    <?php if($validation->getError('provinsi')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('provinsi'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="kota" class="form-label">Kota</label>
                    <input type="text" class="form-control" id="kota" name="kota" required>
                    <?php if($validation->getError('kota')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('kota'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="kabupaten" class="form-label">Kabupaten</label>
                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" required>
                    <?php if($validation->getError('kabupaten')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('kabupaten'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="kode_pos" class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" required>
                    <?php if($validation->getError('kode_pos')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('kode_pos'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="form-group my-auto">
					<input id="pac-input" class="controls" type="text" placeholder="Search Box" style="font-size:17px">
					<div id="map" class="mx-auto"></div>
				</div>
                <div class="my-3">
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="text" class="form-control" id="latitude" name="latitude" onkeyup="calculate()" required>
                    <?php if($validation->getError('latitude')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('latitude'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="text" class="form-control" id="longitude" name="longitude" onkeyup="calculate()" required>
                    <?php if($validation->getError('longitude')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('longitude'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="my-3">
                    <label for="jarak" class="form-label">Jarak</label>
                    <input type="text" class="form-control" id="jarak" name="jarak" readonly>
                    <span class='text-danger'>Jarak maksimal dari sekolah adalah 2KM</span>
                    <?php if($validation->getError('jarak')) {?>
                        <span class='text-danger'>
                            <?= $error = $validation->getError('jarak'); ?>
                        </span>
                    <?php }?>
                </div>
                <div class="mb-3">
                    <button type="submit" id="submitBtn" class="btn btn-primary" disabled>Simpan</button>
                </div>
                
            </form>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>

<script>      
    function calculate(){
        // Titik Sekolah
        var originLat = '-6.916083'
        var originLon = '107.596287'

        // Titik Siswa
        var siswaLat = document.getElementById('latitude').value
        var siswaLon = document.getElementById('longitude').value

        const origin = { lat: originLat, lng: originLon }
        const destination = { lat: siswaLat, lng: siswaLon }

        getHaversineDistance(origin, destination)
    }

    getHaversineDistance = (firstLocation, secondLocation) => {
        const earthRadius = 6371; // km 

        const diffLat = (secondLocation.lat-firstLocation.lat) * Math.PI / 180;  
        const diffLng = (secondLocation.lng-firstLocation.lng) * Math.PI / 180;  

        const arc = Math.cos(
                        firstLocation.lat * Math.PI / 180) * Math.cos(secondLocation.lat * Math.PI / 180) 
                        * Math.sin(diffLng/2) * Math.sin(diffLng/2)
                        + Math.sin(diffLat/2) * Math.sin(diffLat/2);
        const line = 2 * Math.atan2(Math.sqrt(arc), Math.sqrt(1-arc));

        const distance = earthRadius * line; 

        document.getElementById('jarak').value = Math.ceil(distance)+" KM"

        if(distance >= 2) {
            document.getElementById("submitBtn").disabled = true;
        } else {
            document.getElementById("submitBtn").disabled = false;
        }
    }

    var marker;

    function initMap() {
        directionsRenderer = new google.maps.DirectionsRenderer();
        directionsService = new google.maps.DirectionsService();
        const loc = { lat: -6.9806422, lng: 107.5860216 }

        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: loc
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input'));
        google.maps.event.addListener(searchBox, 'places_changed', function() {
            searchBox.set('map', null);


            var places = searchBox.getPlaces();

            var bounds = new google.maps.LatLngBounds();
            var i, place;
     
            map.fitBounds(bounds);
            searchBox.set('map', map);
            map.setZoom(Math.min(map.getZoom(),15));

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

            if (marker == null)
            {
                marker = new google.maps.Marker({
                    position: location,
                    map: map
                }); 
            } 
            else 
            {
                marker.setPosition(location); 
            } 
        }

	}
</script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoNyOpCm5oQ4vlUSfaQX5_dDd06ZNGQR4&callback=initMap&libraries=places&v=weekly"
      async
></script>