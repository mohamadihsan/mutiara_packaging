<?php
include '../../tampilan/header_footer/index.php';

Headers();
?>
	<title>Tambah Supplier</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend><i class="fa fa-institution"></i> Tambah Supplier</legend>
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
					              					<legend>Nama Supplier</legend>
					              				</fieldset>
												<input class="form-control" id="nama" type="text" name="nama" placeholder="Masukkan Nama Supplier ..." required>
					              			</div>
					              		</div>
						              	<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>No.Telp</legend>
					              				</fieldset>
												<input class="form-control" id="no_telp" type="phone" name="no_telp" placeholder="Masukkan nomor telp ...">
					              			</div>
					              		</div>
						              	<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Fax</legend>
					              				</fieldset>
												<input class="form-control" id="fax" type="phone" name="fax" placeholder="Masukkan Fax ...">
					              			</div>
					              		</div>
				            		</div>
				            		<!-- /.col -->
						            <div class="col-md-6">
						              	<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Website</legend>
					              				</fieldset>
												<input class="form-control" id="website" type="phone" name="website" placeholder="Masukkan Alamat Website ...">
					              			</div>
					              		</div>
						              	<div class="col-md-12">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Email</legend>
					              				</fieldset>
												<input class="form-control" id="email" type="email" name="email" placeholder="Masukkan alamat email ...">
					              			</div>
					              		</div>
					              		<div class="col-md-12">
					              			<fieldset>
					              				<legend>Alamat</legend>
					              			</fieldset>
					              			<textarea class="form-control" name="alamat" placeholder="Masukkan alamat .."></textarea>
					              		</div>
					              		<div class="col-md-12" hidden="">
					              			<div class="form-group">
					              				<fieldset>
					              					<legend>Jenis</legend>
					              				</fieldset>
							                	<select class="form-control select2" style="width: 100%;" name="jenis" required>
							                		<option value="supplier" selected="selected">Supplier</option>
							                		<option value="pelanggan">Pelanggan</option>
							                		<option value="distributor">Distributor</option>
							                		<option value="ekspedisi">Ekspedisi / Logistik</option>
							                		<option value="lainnya">Lainnya</option>
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