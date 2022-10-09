jQuery(function () {

  fetch('/getProvinsi', {
    method: "get",
    headers: {
      "Content-Type": "application/json",
      "X-Requested-With": "XMLHttpRequest"
    }
  })
    .then((res) =>
      res.json()
    )
    .then((dataProvinsi) => {
      showProvinsi(dataProvinsi);
    })

  // Funcs

  function showProvinsi(dataProvinsi) {

    // CONVERT KE SELECT2 REQUIRED DATA
    const resultProv = dataProvinsi.map(function (row) {
      return { id: row.id, text: row.nama }
    });

    // SELECT2 PROVINSI
    $('#provinsi').select2({
      placeholder: 'PILIH PROVINSI',
      allowClear: true,
      data: resultProv
    })
  }

  // EVENTS GET KABs
  $('#provinsi').on('select2:select', function (e) {
    $('#kota').empty();
    $('#kecamatan').empty();
    let idProv = e.params.data.id;

    fetch(`/getKabupaten/${idProv}`, {
      method: 'post',
      headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest"
      }
    })
      .then((res) => res.json())
      .then((dataKabupaten) => {
        showKabupaten(dataKabupaten);
      })
  })

  function showKabupaten(dataKabupaten) {
    const resultKab = dataKabupaten.map(function (row) {
      return { id: row.id, text: row.nama }
    })

    $('#kota').select2({
      placeholder: 'PILIH PROVINSI',
      allowClear: true,
      data: resultKab
    })
  }

  $('#kota').on('select2:select', function (e) {
    $('#kecamatan').empty();
    $('#desa').empty();
    let idKab = e.params.data.id;

    fetch(`/getKecamatan/${idKab}`, {
      method: 'post',
      headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest"
      }
    })
      .then((res) => res.json())
      .then((dataKecamatan) => {
        showKecamatan(dataKecamatan);
      })
  })

  function showKecamatan(dataKecamatan) {
    const resultKec = dataKecamatan.map(function (row) {
      return { id: row.id, text: row.nama }
    })

    $('#kecamatan').select2({
      placeholder: 'PILIH PROVINSI',
      allowClear: true,
      data: resultKec
    })
  }

  $('#kecamatan').on('select2:select', function (e) {
    $('#desa').empty();
    let idKec = e.params.data.id;

    fetch(`/getDesa/${idKec}`, {
      method: 'post',
      headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest"
      }
    })
      .then((res) => res.json())
      .then((dataDesa) => {
        showDesa(dataDesa);
      })
  })

  function showDesa(dataDesa) {
    const resultDes = dataDesa.map(function (row) {
      return { id: row.id, text: row.nama }
    })
    $('#desa').select2({
      placeholder: 'PILIH PROVINSI',
      allowClear: true,
      data: resultDes
    })
  }
  //-------------END OF FILE
})