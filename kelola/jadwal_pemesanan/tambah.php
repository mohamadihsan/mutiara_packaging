<?php
include '../../tampilan/header_footer/index.php';

Headers();
?>
	<title>Tambah Jadwal Pemesanan</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend><i class="fa fa-calendar"></i> Tambah Jadwal Pemesanan</legend>
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
				              					<legend>Bahan Baku</legend>
				              				</fieldset>
				              			</div>
				            			<div class="col-md-2">
				            				<fieldset>
				              					<legend>Quantity</legend>
				              				</fieldset>
				            			</div>
				            			<div class="col-md-4">
				            				<fieldset>
				              					<legend>Tanggal Pemesanan</legend>
				              				</fieldset>
				            			</div>
				            			<div class="col-md-5">
				            				<div class="form-group">
							                	<select class="form-control select" style="width: 100%;" name="nama" placeholder="Bahan Baku">
							                		<option value="">POT 5GR ACD GOLD</option>
							                		<option value="">Pot PP 15gr Gold - Putih</option>
							                		<option value="">POT 5GR ACD HIJAU PERLIZE</option>
							                		<option value="">POT 5GR ACD MUTIARA</option>
							                		<option value="">POT 5GR ACD PINK</option>
							                		<option value="">AIRLESS PLASTIK 100ML</option>
							                	</select>
							              	</div>
				            			</div>
					              		<div class="col-md-2">
					              			<div class="form-group">
												<input class="form-control" id="quantity" type="number" name="quantity" placeholder="0" min="0">
					              			</div>
					              		</div>
				            			<div class="col-md-4">
				            				<div class="form-group">
				            					<div class="input-group date">
								                  	<div class="input-group-addon">
								                    	<i class="fa fa-calendar"></i>
								                  	</div>
								                  	<input type="text" class="form-control pull-right" id="datepicker">
								                </div>
				            				</div>
				            			</div>
					              		<div class="col-md-1">
					              			<a href=""><i class="fa fa-plus"></i></a>
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