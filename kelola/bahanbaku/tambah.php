<?php
include '../../tampilan/header_footer/index.php';

Headers();
?>
	<title>Tambah Bahan Baku</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend><i class="fa fa-cubes"></i> Tambah Bahan Baku</legend>
							</fieldset>
							<br>
						</div>
						<div class="box-body">
							<form method="post" action="../bahanbaku/" enctype="multipart/form-data">
					        	<!-- /.box-header -->
					        	<div class="box-body">
				            		<div class="col-md-6">
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Kode Bahan Baku</legend>
					              				</fieldset>
												<input class="form-control" id="kode" type="text" name="kode" placeholder="Masukkan Kode Bahan Baku ...">
					              			</div>
					              		</div>
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Nama Bahan Baku</legend>
					              				</fieldset>
												<input class="form-control" id="nama" type="text" name="nama" placeholder="Masukkan Nama Bahan Baku ..." required>
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
					              					<legend>Harga Pokok (Beli)</legend>
					              				</fieldset>
												<input class="form-control" id="harga_beli" type="number" name="harga_beli" placeholder="Harga Beli Rp. 0" min="0">
					              			</div>
					              		</div>
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Harga Jual</legend>
					              				</fieldset>
												<input class="form-control" id="harga_jual" type="number" name="harga_jual" placeholder="Harga Jual Rp. 0" min="0">
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