<?php
include '../../tampilan/header_footer/index.php';
include '../../koneksi/index.php';

Headers();
?>
	<title>Tambah Produk</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend><i class="fa fa-cube"></i> Tambah Produk</legend>
							</fieldset>
							<br>
						</div>
						<div class="box-body">
							<form method="post" action="../produk/" enctype="multipart/form-data">
					        	<!-- /.box-header -->
					        	<div class="box-body">
				            		<div class="col-md-6">
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Kode Produk</legend>
					              				</fieldset>
												<input class="form-control" id="kode" type="text" name="kode" placeholder="Masukkan Kode Produk ...">
					              			</div>
					              		</div>
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Nama Produk</legend>
					              				</fieldset>
												<input class="form-control" id="nama" type="text" name="nama" placeholder="Masukkan Nama Produk ..." required>
					              			</div>
					              		</div>
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Quantity (Stok)</legend>
					              				</fieldset>
												<input class="form-control" id="stok" type="number" name="stok" placeholder="Quantity ..." min="0">
					              			</div>
					              		</div>
				            		</div>
				            		<div class="col-md-6">
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Harga Jual</legend>
					              				</fieldset>
												<input class="form-control" id="harga_jual" type="number" name="harga_jual" placeholder="Harga Jual Rp. 0" min="0">
					              			</div>
					              		</div>
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Bahan Baku</legend>
					              				</fieldset>
												<select class="form-control select2" multiple="multiple" style="width: 100%;" name="nama_bahan_baku[]" placeholder="Bahan Baku">
							                		<?php
														//Tampilkan Data
														$sql = "SELECT id, nama FROM bahan_baku WHERE status_hapus='1'";
														$stmt = $db->prepare($sql);
														$stmt->execute();

														$stmt->bind_result($id, $nama);

														while ($stmt->fetch()) {?>
							                			<option value="<?php echo $id; ?> ">
							                				<?php echo $nama; ?>
							                			</option>
							                		<?php } $stmt->close(); ?>
							                	</select>
					              			</div>
					              		</div>
				            		</div>
				            		<div class="col-md-12">
				            			<div class="col-md-1">
				            				<button class="btn btn-primary" name="simpan">Simpan</button>
				            			</div>
				            		</div>
					        	</div>
					        	<!-- /.box-body -->
						    </form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php
Footer();
?>