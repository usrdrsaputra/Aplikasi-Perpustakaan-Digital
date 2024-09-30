<?php
include('../inc/koneksi.php');
$sql = mysqli_query ($koneksi,"SELECT * FROM user WHERE UserID='$UserID'");
$data = mysqli_fetch_array($sql);
?>
<div class="container-fluid">
            <div class="col-md-12 ">
             	<div class="row z-depth-3">
                 	<div class="col-sm-4 bg-info rounded-left">
        		        <div class="card-block text-center text-white mt-5">
                        <?php
                 if($data['foto'] == ""){
                 ?>
                 <img src="../foto_profil_admin/foto_kosong.webp" width="100" class="img-fluid rounded" alt="">
                 <?php
                 }
                 else{
                 ?>
                 <img src="../foto_profil_admin/<?php echo $data['foto'];?>" width="200" height="auto" class="img-fluid rounded" alt="foto">
                 <?php
                 }
                ?>
                    		<h4 class="font-weight-bold mt-4 mb-4"><?php echo $data['NamaLengkap'];?></h4>
                            <h1>
                    		<a href="?page=edit&UserID=<?php echo $data['UserID'];?>"><i class="ti-pencil-alt menu-icon"  style="color:white;"></i></a>
                            </h1>
                		</div>
            		</div>
            		<div class="col-sm-8 bg-white rounded-right">
                    	<h4 class="mt-3 text-center">Informasi</h4>
                    		<hr class="bg-primary">
                   		<div class="row">
                        	<div class="col-sm-6">
                            	<p class="font-weight-bold">Email:</p>
                           		<h6 class=" text-muted"><?php echo $data['Email'];?></h6>
                        	</div>
                        	<div class="col-sm-6">
                            	<p class="font-weight-bold">Alamat:</p>
                           		<h6 class="text-muted"> <?php echo $data['Alamat'];?> </h6>
                        	</div>
                            
                            <div class="row">
                                <br>
                                <br>
                                <br>    
                                <br>
                            <hr class="bg-primary">
                        	
                    	</div>
                    	</div>
              		</div>
             	</div>
                 </div>
