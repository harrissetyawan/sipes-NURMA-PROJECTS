jQuery(function () {
  $('#regis_form').validate({
    rules: {
      email: {
        required: true,
        email: true,
        minlength: 4,
        maxlength: 64,
      },
      password: {
        required: true,
        minlength: 4,
        maxlength: 50,
      },
      password_conf: {
        required: true,
        equalTo: "#password",
        minlength: 4,
        maxlength: 64,
      },
      nama: {
        required: true,
        minlength: 4,
        maxlength: 100
      },
      nisn: {
        required: true,
      }
    },
    messages: {
      email: {
        required: "Email harus diisi",
        email: "Format email salah !",
        minlength: "Minimal 4 Karakter",
      },
      password: {
        required: "Password Harus Diisi !",
        minlength: "Password terlalu Pendek",
      },
      password_conf: {
        required: "Silahkan Ulangi Password Anda !",
        equalTo: "Password tidak sama dengan sebelumnya",
      },
      nama: {
        required: "Nama Harus Diisi !",
        minlength: "Nama terlalu pendek !",
        maxlength: "Nama terlalu panjang !"
      },
      nisn: {
        required: "NISN Harus Diisi !",
      }
    }
  });
})