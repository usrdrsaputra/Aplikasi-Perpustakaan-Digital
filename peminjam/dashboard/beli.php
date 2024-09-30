<?php
include '../inc/koneksi.php';

// Inisialisasi variabel data dan status_pembelian
$data = [];
$status_pembelian = "";

// Periksa apakah BukuID telah diset sebelum mengaksesnya
if (isset($_GET['BukuID'])) {
    $BukuID = $_GET['BukuID'];
    
    // Lakukan query untuk mendapatkan data buku berdasarkan BukuID
    $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE BukuID='$BukuID'");
    
    // Periksa apakah query berhasil dieksekusi dan data ditemukan
    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        
        // Periksa apakah buku telah dibeli sebelumnya
        if ($data['Status'] == 'Sudah Dibeli') {
            // Redirect ke halaman index jika buku telah dibeli sebelumnya
            header("Location:?page=detail_buku");
            exit;
        }
        
        // Periksa apakah ada data yang dikirimkan via POST (saat form beli disubmit)
        if (isset($_POST['beli'])) { // Ubah kondisi ini
            $harga_transfer = $_POST['harga_transfer'];

            // Periksa apakah harga transfer sesuai dengan harga buku
            if ($harga_transfer == $data['Harga']) {
                // Proses pembelian buku...
                // Misalnya, simpan informasi pembelian dan perbarui status pembelian di database
                $tanggal_pembelian = date('Y-m-d'); // Tanggal pembelian
                // Simpan informasi pembelian ke dalam tabel pembelian (jika diperlukan)
                // Contoh: mysqli_query($koneksi, "INSERT INTO pembelian (BukuID, TanggalPembelian, Harga) VALUES ('$BukuID', '$tanggal_pembelian', '$harga_transfer')");
                
                // Ubah status pembelian menjadi "Sudah Dibeli" di database
                mysqli_query($koneksi, "UPDATE buku SET Status='Sudah Dibeli' WHERE BukuID='$BukuID'");
                
                // Set status_pembelian jika pembelian berhasil
                $status_pembelian = "Pembelian berhasil. Anda dapat membaca buku sekarang.";
                echo "<script type='text/javascript'>
                        alert('Pembayaran berhasil');
                        window.location = 'index.php?page=detail_buku&BukuID=".$data['BukuID']."';
                      </script>";
            } else {
                // Set status_pembelian jika pembayaran tidak valid
                $status_pembelian = "Pembayaran tidak valid. Silakan coba lagi.";
                echo "<script type='text/javascript'>
                        alert('Pembayaran tidak sesuai');
                        window.location = 'index.php?page=beli&BukuID=".$data['BukuID']."';
                      </script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Buku</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .status {
            margin-top: 20px;
            padding: 15px 20px;
            border-radius: 8px;
            font-size: 16px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .message {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pembayaran Buku</h1>
        <?php if (!empty($data)): ?>
            <h4><?php echo $data['Judul']; ?></h4>
            <img src="../foto/<?php echo $data['Foto']; ?>"  height="160px" class="card-img-top" alt="sampul_buku" />
            <p>Harga: <?php echo $data['Harga']; ?></p>
        <?php endif; ?>

        <?php if (!empty($status_pembelian)): ?>
            <div class="status success">
                <p class="message"><?php echo $status_pembelian; ?></p>
            </div>
        <?php elseif ($data['Status'] != 'Sudah Dibeli'): ?>
        <form action="" method="POST">
            <input type="hidden" name="BukuID" value="<?php echo $data['BukuID']; ?>">
            <label for="harga_transfer">Harga Transfer:</label>
            <input type="text" name="harga_transfer" id="harga_transfer" required>
            <br>
            <button class="btn-sm" type="submit" name="beli" style="border-radius: 10px; background-color: #007bff; color: #fff; border: none; padding: 10px 20px; cursor: pointer; transition: background-color 0.3s;">Beli</button>
            <a class="btn btn-danger ms-1" href="?page=detail_buku&BukuID=<?php echo $data['BukuID']?>" style="border-radius: 10px; background-color: #dc3545; color: #fff; border: none; padding: 10px 20px; cursor: pointer; transition: background-color 0.3s; text-decoration: none;">Kembali</a>
        </form>

        <?php endif; ?>
    </div>
</body>
</html>
