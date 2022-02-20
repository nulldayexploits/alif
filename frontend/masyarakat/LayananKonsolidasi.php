<?php include '../base_url.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>MASYARAKAT UMUM</title>
</head>
<body>
<header>    
    <div class="container">
        <div class="header-left">
            <img class="logo" src="https://bantaengkab.go.id:443/uploads/logoweb.png">
        </div>
        <div class="header-right">
          <a href="index.php">LAYANAN UMUM</a>
          <a href="LayananKonsolidasi.php">LAYANAN KONSOLIDASI</a>
          <a href="TrackingLayanan.php">TRACKING LAYANAN</a>
        </div>
    </div>
</header>

<div class="main">
<div class="container">
  <form method="POST" id="layanan-konsolidasi" enctype="multipart/form-data"> 
  <div class="row">
  <div class="row">
    <div class="col-25">
      <label for="country">Alasan Permohonan</label>
    </div>
  </div>
  <div class="col-75">
      <select id="tujuan_konsolidasi" name="tujuan_konsolidasi">
        <option value="BPJS">BPJS</option>
        <option value="ASURANSI">ASURANSI</option>
        <option value="PAJAK">PAJAK</option>
        <option value="IJAZAH">IJAZAH</option>
        <option value="VAKSIN">VAKSIN</option>
      </select>
    </div>
    <div class="col-25">
      <label for="fname">NIK</label>
    </div>
    <div class="col-75">
      <input type="text" id="nik" name="nik" placeholder="Masukkan NIK..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">NAMA</label>
    </div>
    <div class="col-75">
      <input type="text" id="nama" name="nama" placeholder="Masukkan Nama..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">No HP</label>
    </div>
    <div class="col-75">
      <input type="text" id="no_hp" name="no_hp" placeholder="Masukkan No HP..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Ket Pemohon</label>
    </div>
    <div class="col-75">
      <input type="text" id="ket_pemohon" name="ket_pemohon" placeholder="Masukkan Keterangan Permohonan..">
    </div>
  </div>
  <br>
  <div class="row">
    <input type="submit" value="KIRIM" id="btn1" name="kirim">
  </div>
  </form>
</div>
</div>
<div class="footer">
        <p>@DUKCAPIL BANTAENG</p>
    </div>
</body>


<script type="text/javascript" src="../jquery.min.js"></script>
<script type="text/javascript">
 


  $('#layanan-konsolidasi').on('submit', function (e) {

      e.preventDefault();
      $('#btn1').attr('value', "Mohon Tunggu...");
      document.getElementById('btn1').disabled = true;

       $.ajax({
        type: 'POST',
        url: "<?php echo $base_url_backend; ?>/user-register-layanan-konsolidasi.php",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function(data){
            //var result   = jQuery.parseJSON(data);
             
             if(data[0]["code"]==200){
               $('#layanan-konsolidasi')[0].reset();
             }

             alert(data[0]["msg"]);

            $('#btn1').attr('value', "Kirim");
            document.getElementById('btn1').disabled = false;
        
        },  error: function(error){

            $('#btn1').attr('value', "Kirim");
            document.getElementById('btn1').disabled = false;
        }
      });
    
   
  });
</script>

</html>