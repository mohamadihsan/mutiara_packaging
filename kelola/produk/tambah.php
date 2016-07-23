<?php
include '../../tampilan/header_footer/index.php';

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
							<form method="post" action="" enctype="multipart/form-data">
					        	<!-- /.box-header -->
					        	<div class="box-body">
				            		<div class="col-md-6">
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Nama Produk</legend>
					              				</fieldset>
												<input class="form-control" id="nama_produk" type="text" name="nama_produk" placeholder="Masukkan Nama Produk ..." required>
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
					              		<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Quantity (Stok)</legend>
					              				</fieldset>
												<input class="form-control" id="stok" type="number" name="stok" placeholder="Quantity ..." min="0">
					              			</div>
					              		</div>
					              		<div class="col-md-12">
				            				<div class="form-group">
					              				<fieldset>
					              					<legend>Bahan Baku</legend>
					              				</fieldset>
							                	<select class="form-control select2" multiple="multiple" style="width: 100%;" name="nama_bahan_baku" placeholder="Bahan Baku">
							                		<option value="">POT 5GR ACD GOLD</option>
							                		<option value="">Pot PP 15gr Gold - Putih</option>
							                		<option value="">POT 5GR ACD HIJAU PERLIZE</option>
							                		<option value="">POT 5GR ACD MUTIARA</option>
							                		<option value="">POT 5GR ACD PINK</option>
							                		<option value="">AIRLESS PLASTIK 100ML</option>
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