<!DOCTYPE html>
<html>
<head>
    <title>Lihat Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .pdf-viewer {
            width: 100%;
            max-width: 100%;
            height: 500px;
        }
        .error-message {
            text-align: center;
            font-weight: bold;
            color: red;
            margin-top: 20px;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>

        <?php
        // Periksa apakah parameter URL 'url' telah diberikan
        if(isset($_GET['url'])) {
            // Mendapatkan URL buku PDF dari parameter URL
            $file_url = $_GET['url'];
        ?>
            <embed class="pdf-viewer" src="<?php echo $file_url; ?>" type="application/pdf" />
        <?php
        } else {
            // Jika parameter URL 'url' tidak diberikan, tampilkan pesan kesalahan
            echo "<p class='error-message'>File buku tidak ditemukan.</p>";
        }
        ?>
        
        <!-- <div class="row justify-content-center">
        <div class="col-auto">
        <a href="?page=kumpulan_buku" class="btn btn-sm mt-3" style="background-color: red; border-radius: 10px; color: white; font-weight:bold; width: 100%;" >Kembali</a>
        </div>
    </div> -->

</body>
</html>
