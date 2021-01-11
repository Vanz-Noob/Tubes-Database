<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['Nim'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$NIM = $_GET['Nim'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE Nim='$NIM'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$NAMA_MAHASISWA		  = $_POST['Nama_Mhs'];
			$JENIS_KELAMIN	= $_POST['Jenis_Kelamin'];
			$ID_PROGRAM_STUDI	= $_POST['Id_Program_Studi'];
			$STATUS		= $_POST['Status'];


			$sql = mysqli_query($koneksi, "UPDATE mahasiswa SET NAMA_MAHASISWA='$NAMA_MAHASISWA', JENIS_KELAMIN='$JENIS_KELAMIN', ID_PROGRAM_STUDI='$ID_PROGRAM_STUDI', STATUS='$STATUS'  WHERE Nim='$NIM'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_mhs";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_mhs&Nim=<?php echo $NIM; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nim</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nim" class="form-control" size="4" value="<?php echo $data['NIM']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mahasiswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Mhs" class="form-control" value="<?php echo $data['NAMA_MAHASISW']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Laki-Laki" <?php if($data['Jenis_Kelamin'] == 'Laki-Laki'){ echo 'checked'; } ?> required>Laki-Laki
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Perempuan" <?php if($data['Jenis_Kelamin'] == 'Perempuan'){ echo 'checked'; } ?> required>Perempuan
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Program Studi</label>
				<div class="col-md-6 col-sm-6">
					<select name="Id_Program_Studi" class="form-control" required>
					<option value="TK" <?php if($data['ID_PROGRAM_STUDI'] == 'TK'){ echo 'selected'; } ?>>Teknik Komputer</option>
						<option value="TE" <?php if($data['ID_PROGRAM_STUDI'] == 'TE'){ echo 'selected'; } ?>>Teknik Elektro</option>
						<option value="TF" <?php if($data['ID_PROGRAM_STUDI'] == 'TF'){ echo 'selected'; } ?>>Teknik Fisika</option>
						<option value="BM" <?php if($data['ID_PROGRAM_STUDI'] == 'BM'){ echo 'selected'; } ?>>Biomedis</option>
					</select>
				</div>
			</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Status" value="Aktif" <?php if($data['Status'] == 'Aktif'){ echo 'checked'; } ?> required>Aktif
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Status" value="Lulus" <?php if($data['Status'] == 'Lulus'){ echo 'checked'; } ?> required>Lulus
						</label>
						<label class="btn btn-danger" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Status" value="DO" <?php if($data['Status'] == 'DO'){ echo 'checked'; } ?> required>DO
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_mhs" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
