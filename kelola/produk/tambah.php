<?php
include '../../tampilan/header_footer/index.php';
include '../../koneksi/index.php';

Headers();
?>
	<title>Produksi</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend><i class="fa fa-gavel"></i> Produksi</legend>
							</fieldset>
							<br>
						</div>
						<div class="box-body">
							<form method="post" action="" enctype="multipart/form-data">
					        	<!-- /.box-header -->
					        	<div class="box-body">
				            		<div class="col-md-12">
				            			<div class="col-md-5">
				            				<fieldset>
				              					<legend>Produk</legend>
				              				</fieldset>
				            				<div class="form-group">
							                	<select class="form-control select" style="width: 100%;" name="nama" placeholder="Bahan Baku">
							                		<?php
														//Tampilkan Data
														$sql = "SELECT id, nama FROM produk WHERE status_hapus='1'";
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
					              		<div class="col-md-2">
					              			<fieldset>
				              					<legend>Quantity</legend>
				              				</fieldset>
					              			<div class="form-group">
												<input class="form-control" id="quantity" type="number" name="quantity" placeholder="0" min="0">
					              			</div>
					              		</div>
				            			<div class="col-md-4">
					              			<fieldset>
				              					<legend>Tanggal</legend>
				              				</fieldset>
				            				<div class="form-group">
				            					<div class="input-group date">
								                  	<div class="input-group-addon">
								                    	<i class="fa fa-calendar"></i>
								                  	</div>
								                  	<input type="text" class="form-control pull-right" id="datepicker">
								                </div>
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