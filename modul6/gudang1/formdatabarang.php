<html>
	<head>
		<title>Data Gudang</title>
	</head>
		<?php
			$conn = mysqli_connect('localhost','root','','penyimpanan');
		?>
		<body>
			<center>
				<h3>Masukkan Data Barang :</h3>
					<table border='0' width='30%'>
					<form method='POST' action = 'form_databarang.php'>
						<tr>
							<td width='25%'>Kode Barang</td>
							<td width='5%'>:</td>
							<td width='65%'><input type='text' name='kode_barang' size='10'></td>
						</tr>
						<tr>
							<td width='25%'>Nama Barang</td>
							<td width='5%'>:</td>
							<td width='65%'><input type='text' name='nama_barang' size='30'></td>
						</tr>
						<tr>
							<td width='25%'>gudang</td>
							<td width='5%'>:</td>
							<td width='65%'><input type='text' name='kode_gudang' size='40'></td>
						</tr>
					</table>
					<input type='submit' value='Masukkan' name='submit'>
					</form>
					<?php
					error_reporting(E_ALL^E_NOTICE);
					$kode = $_POST['kode_barang'];
					$nama = $_POST['nama_barang'];
					$lokasi = $_POST['kode_gudang'];
					$submit = $_POST['submit'];
					$input = "insert into barang (Kode_Barang, Nama_Barang,Kode_Gudang)values
					('$kode', '$nama','$lokasi')";
					if ($submit){
						if ($kode==''){
							echo "</br>Kode tidak boleh kosong";
						}elseif ($nama==''){
							echo "</br>Nama tidak boleh kosong";
						}elseif ($lokasi==''){
							echo "</br>Lokasi tidak boleh kosong";
						}else
							mysqli_query($conn, $input);
							echo "
							<script>
							alert('data berhasil dimasukkan');
							document.location.href='form_gudang.php';
							</script>";
					}
					?>
					<hr>
					<h3>Data Gudang</h3>
					<table border='1' width='50'>
						<tr>
							<td align='center' width='20%'><b>Kode Gudang</b></td>
							<td align='center' width='30%'><b>Nama Gudang</b></td>
							<td align='center' width='30%'><b>Lokasi</b></td>
							<td colspan= 2 align='center' width='30%'><b>Keterangan</b></td>
						</tr>
						<?php
						$cari = "select * from gudang order by kode_gudang";
						$hasil_cari = mysqli_query($conn,$cari);
						while($data = mysqli_fetch_array($hasil_cari)){
						echo"
						<tr>
							<td width='20%'>$data[kode_gudang]</td>
							<td width='30%'>$data[nama_gudang]</td>
							<td width='30%'>$data[lokasi]</td>
							<td width='30%'><a href='form_update.php?KODE=$data[kode_gudang]'>Ubah</a></td>
							<td width='30%'><a href='delete.php?KODE=$data[kode_gudang]'>Hapus</a></td>
						</tr>";
						}
						?>
					</table>
				</center>
			</body>
		</html>	