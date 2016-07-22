<?php
include '../../tampilan/header_footer/index.php';

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
							<form method="post" action="" enctype="multipart/form-data">
					        	<!-- /.box-header -->
					        	<div class="box-body">
				            		<div class="col-md-6">
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Nama Bahan Baku</legend>
					              				</fieldset>
							                	<select class="form-control select2" style="width: 100%;" name="nama" required>
							                		<option value="" selected="selected">POT 5GR ACD GOLD (sisa stok : 10)</option>
							                		<option value="">Pot PP 15gr Gold - Putih  (sisa stok : 10)</option>
							                		<option value="">POT 5GR ACD HIJAU PERLIZE  (sisa stok : 10)</option>
							                		<option value="">POT 5GR ACD MUTIARA  (sisa stok : 10)</option>
							                		<option value="">POT 5GR ACD PINK  (sisa stok : 10)</option>
							                		<option value="">AIRLESS PLASTIK 100ML  (sisa stok : 10)</option>
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