<?php
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Harga</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<!-- Tampil semua data barang dari database-->
	<center> <h2>Daftar Tiket</h2></center>
	<table class="table" border="1" cellpadding="10">
		<tr>
			<th scope="col">No</th>
			<th scope="col">Tempat Wisata</th>
			<th scope="col">Harga</th>
		</tr>
		<?php 
			$no = 1;
			//Query menampilkan semua data dari tabel barang
			$sql = "select * from tbl_tiket";
			$hasil = mysqli_query($kon, $sql);
			while($data = mysqli_fetch_array($hasil)){
		?>
		<tr>
			<!--Tampil data berupa array -->
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['tiketwisata']; ?></td>
			<td><?php echo $data['harga']; ?></td>
		</tr>
			<?php 
		}
		?>
	</table>
<!-- Pilih data barang dengan combo box-->
<hr>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
		<table>
			<tr>
				<td><h4>Pilih tiket</h4></td>
				<td>:</td>
				<td>
					<select name="id">
						<option value="" selected="selected">-</option>
						<?php						
						//perintah sql untuk menampilkan semua data pada table barang
						$sql = "select id,tiketwisata from tbl_tiket";
						$hasil = mysqli_query($kon,$sql);						
						while ($data = mysqli_fetch_array($hasil)) {						
							$ket="";
							if (isset($_GET['id'])){
								$id = trim($_GET['id']);

								if($id==$data['id'])
								{
									$ket="selected";
								}
							}
							?>
							<option <?php echo $ket;?> 
							value="<?php echo $data['id']?>">
							<?php echo $data['id'];?> - <?php echo $data['tiketwisata'];?>
							</option>
							<?php
						}
						?>
					</select>
				</td>
				<td>
					<input type="submit" name="submit" value="Pilih">
				</td>
			</tr>
		</table>
	</form>
						<br>
	<h2>Detail tiket</h2>
	<?php
	if (isset($_GET['id'])) {
	 	$id = $_GET['id'];

	 	$sql = "select * from tbl_tiket where id=$id";
	 	$hasil = mysqli_query($kon,$sql);
	 	$data = mysqli_fetch_assoc($hasil);
	 } 
	 ?>
	 <table class="mb-3">
	 	<tr>
	 		<td>ID</td>
	 		<td>:</td>
	 		<td><input type="text" name="id" 
	 			value="<?php echo $data['id'];?>"></td>
	 	</tr>
	 	<tr>
	 		<td>Nama Barang</td>
	 		<td>:</td>
	 		<td><input type="text" name="tiketwisata" 
	 			value="<?php echo $data['tiketwisata'];?>"></td>
	 	</tr>
	 	<tr>
	 		<td>Harga</td>
	 		<td>:</td>
	 		<td><input type="number" name="harga" 
	 			value="<?php echo $data['harga'];?>"></td>
	 	</tr>		 	
	 </table>

	 <h5><a href="index.php" style="text-decoration: none;"><-- Kembali</a></h5>	 
</body>
</html>