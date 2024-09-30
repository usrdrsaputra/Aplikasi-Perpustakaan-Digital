<?php
session_start();
include 'koneksi.php';
$username = $_POST['username']; 
$password = md5($_POST['password']);
$sql = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password' ");
$data = mysqli_fetch_array($sql);
$cek = mysqli_num_rows($sql);
if ($cek>0) {
	 if($data['Role']=="Administrator") {
		$_SESSION['username']= $username;
		$_SESSION['status']= "Administrator";
		$_SESSION['UserID']=$data[0];
		header("location:../Admin/index.php");
	
	}else if($data['Role']=="Petugas") {
		$_SESSION['username']= $username;
		$_SESSION['status']= "Petugas";
		$_SESSION['UserID']=$data[0];
		header("location:../petugas/index.php");

    }else if($data['Role']=="Peminjam") {
		$_SESSION['username']= $username;
		$_SESSION['status']= "Peminjam";
		$_SESSION['UserID']=$data[0];
		header("location:../peminjam/index.php");
    }
    
}else{
	?>
	<script type="text/javascript">
		alert("Username Atau Passwaord Yang Anda Masukan Salah");
		window.location="../index.php";
	</script>

<?php
}

?>
