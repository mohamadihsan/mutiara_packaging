<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include '../../tampilan/header_footer/index.php';
include '../../fungsi/produk/index.php';
include '../../koneksi/index.php';

Headers();
?>
	<title>Update Stok</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend><i class="fa fa-cubes"></i> Update Stok</legend>
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
					              					<legend>Nama Produk</legend>
					              				</fieldset>
							                	<select class="form-control select2" style="width: 100%;" name="nama" required>
							                		<?php
														//Tampilkan Data
														$sql = "SELECT id, nama, stok FROM produk WHERE status_hapus='1'";
														$stmt = $db->prepare($sql);
														$stmt->execute();

														$stmt->bind_result($id, $nama, $stok);

														while ($stmt->fetch()) {?>
							                			<option value="<?php echo $id; ?> ">
							                				<?php echo $nama." (sisa stok : ".$stok.")"; ?>
							                			</option>
							                		<?php } ?>	
							                	</select>
							              	</div>
							            </div>
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Status Update</legend>
					              				</fieldset>
					              				<div class="col-md-6">
					              					<input type="radio" name="status" value="tambah" checked=""> <b>Tambah Stok</b>
					              				</div>
					              				<div class="col-md-6">
					              					<input type="radio" name="status" value="kurang"> <b>Kurangi Stok</b>
					              				</div><br><br>
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
				            		<div class="col-md-12">
				            			<div class="col-md-1">
				            				<button class="btn btn-primary" name="update_stok">Simpan</button>
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