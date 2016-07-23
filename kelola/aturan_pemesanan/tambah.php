<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include '../../tampilan/header_footer/index.php';
include '../../fungsi/bahanbaku/index.php';
include '../../koneksi/index.php';

Headers();
?>
	<title>Tambah Aturan Pemesanan</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend><i class="fa fa-reorder"></i> Tambah Aturan</legend>
							</fieldset>
							<br>
						</div>
						<div class="box-body">
							<form method="post" action="../aturan_pemesanan/" enctype="multipart/form-data">
					        	<!-- /.box-header -->
					        	<div class="box-body">
				            		<div class="col-md-8">
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Nama Bahan Baku</legend>
					              				</fieldset>
												<select class="form-control select2" style="width: 100%;" name="nama" required>
							                		<?php
														//Tampilkan Data
														$sql = "SELECT id, nama FROM bahan_baku WHERE minimal_quantity IS NULL OR maksimal_quantity IS NULL AND status_hapus='1'";
														$stmt = $db->prepare($sql);
														$stmt->execute();

														$stmt->bind_result($id, $nama);

														while ($stmt->fetch()) {?>
							                			<option value="<?php echo $id; ?> ">
							                				<?php echo $nama; ?>
							                			</option>
							                		<?php } $stmt->close();?>	
							                	</select>
					              			</div>
					              		</div>
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Minimal Quantity (Stok)</legend>
					              				</fieldset>
												<input class="form-control" id="minimal_quantity" type="number" name="minimal_quantity" placeholder="Quantity ..." min="0" required="">
					              			</div>
					              		</div>
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Maksimal Quantity (Stok)</legend>
					              				</fieldset>
												<input class="form-control" id="maksimal_quantity" type="number" name="maksimal_quantity" placeholder="Quantity ..." min="0">
					              			</div>
					              		</div>
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Waktu Tunggu (hari)</legend>
					              				</fieldset>
												<input class="form-control" id="waktu_tunggu" type="number" name="waktu_tunggu" placeholder="Waktu Tunggu Pemesanan ..." min="0">
					              			</div>
					              		</div>
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Lokasi Penyimpanan</legend>
					              				</fieldset>
												<select class="form-control select2" style="width: 100%;" name="lokasi_penyimpanan">
							                		<?php
														//Tampilkan Data
														$sql = "SELECT id, nama FROM gudang WHERE status_hapus='1'";
														$stmt = $db->prepare($sql);
														$stmt->execute();

														$stmt->bind_result($id, $nama);

														while ($stmt->fetch()) {?>
							                			<option value="<?php echo $id; ?> ">
							                				<?php echo $nama; ?>
							                			</option>
							                		<?php } $stmt->close();?>
													<option value="0">Jangan Simpan Lokasi</option>	
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