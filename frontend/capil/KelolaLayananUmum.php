<?php session_start(); ?>
<?php include '../base_url.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAPIL</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
<header>    
    <div class="container">
        <div class="header-left">
            <img class="logo" src="https://bantaengkab.go.id:443/uploads/logoweb.png">
        </div>
        <div class="header-right">
          <a href="KelolaLayananUmum.php">KELOLA LAYANAN UMUM</a>
          <a href="KelolaLayananKonsolidasi.php">KELOLA LAYANAN KONSOLIDASI</a>
          <a href="logout.php">LOGOUT</a>
        </div>
    </div>
</header>
<div class="container">
<br><br><br>
<h1>LAYANAN UMUM</h1>
<span>Anda Login Sebagai: <?php echo  $_SESSION['user_info']; ?></span><br><br>


    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel" style="overflow-y: scroll;height: 350px;">
        <div id="result"></div>
    </div>

    
</div>
<div class="footer">
        <p>@DUKCAPIL BANTAENG</p>
    </div>
</body>


    <?php session_start(); ?>

    <script type="text/javascript" src="../jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">

        $( document ).ready(function() {
        
           $.ajax({
            type: 'POST',
            url: "<?php echo $base_url_backend; ?>/capil-tampil-layanan-umum.php",
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer <?php echo $_SESSION['token_stakeholder']; ?>');
            },
            data: {},
            success: function(res){
                
              var tbl = '<table id="customers">'+
                         '<tr>'+
                             '<th><center>JENIS LAYANAN</th>'+
                             '<th><center>NIK</th>'+
                             '<th><center>NAMA</th>'+
                             '<th><center>NO HP</th>'+
                             '<th><center>STATUS</th>'+
                             '<th><center>AKSI</th>'+
                         '</tr>';

            for (var i = 0; i < res[0].data.length; i++) {
                tbl += '<tr>'+
                        '<td><center>'+res[0].data[i].jenis_layanan+'</td>'+
                        '<td>'+res[0].data[i].nik+'</td>'+
                        '<td>'+res[0].data[i].nama+'</td>'+
                        '<td>'+res[0].data[i].no_hp+'</td>'+
                        '<td><center>'+res[0].data[i].status+'<br><b>Pesan:</b> '+res[0].data[i].feedback_capil+'</td>'+
                        '<td><center>'+
                            '<a href="proses.php?id='+res[0].data[i].id+'&hal=umum">Proses Layanan</a>'+
                        '</td>'+
                      '</tr>';
            }
              

              tbl += '</table>';

              $('#result').html(tbl);

            },  error: function(error){

            }
          });

        });

    </script>
</html>