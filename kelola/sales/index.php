<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include '../../tampilan/header_footer/index.php';
include '../../fungsi/sales/index.php';
include '../../koneksi/index.php';

if (isset($_POST['simpan'])) {
	TambahDataPembelian();
	if ($_SESSION['status_operasi_sales'] == "berhasil_menyimpan") {
		?><body onload="BerhasilMenyimpan()"></body><?php
	} else {
		?><body onload="GagalMenyimpan()"></body><?php
	}
}

Headers();
?>
	<title>Costumer Order</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend><i class="fa fa-file-text-o"></i> Costumer Order</legend>
							</fieldset>
							<br>
						</div>
						<div class="box-body">
							<form method="post" action="" enctype="multipart/form-data">
					        	<!-- /.box-header -->
					        	<div class="box-body">
				            		<div class="col-md-12">
				            			<div class="col-md-8"></div>
				            			<div class="col-md-4">
				            				<div class="form-group">
				            					<div class="input-group date">
								                  	<div class="input-group-addon">
								                    	<i class="fa fa-calendar"></i>
								                  	</div>
								                  	<input type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Order/Pemesanan ..." name="tanggal_pembelian">
								                </div>
				            				</div>
				            			</div>

				            			<div class="col-md-12">
				            				<fieldset>
				              					<legend align="right"></legend>
				              				</fieldset>
				              			</div>
				              			<div class="col-md-6">
				              				<div class="col-md-9">
					              				<fieldset>
					              					<legend>Produk</legend>
					              				</fieldset>
					              			</div>
					            			<div class="col-md-3">
					            				<fieldset>
					              					<legend>Quantity</legend>
					              				</fieldset>
					            			</div>
					            			<div class="col-md-12"></div>
				              			</div>
				              			<div class="col-md-12"></div>
				              			<div class="col-md-6">
				              				<div id="tambah_produk">
					              				<div class="col-md-12">
							            			<div class="col-md-9">
							            				<div class="form-group">
										                	<select class="form-control select" style="width: 100%;" name="id_produk[]" placeholder="Produk">
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
								              		<div class="col-md-3">
								              			<div class="form-group">
															<input class="form-control" type="number" name="quantity[]" placeholder="0" min="0">
								              			</div>
								              		</div>
								              		<div class="col-md-12"></div>
								              		<div class="col-md-9"></div>
								              	</div>	
							              	</div>

						              		<div class="col-md-12" align="right">
						              			<div class="col-md-12">
						              				<a href="javascript:TambahProduk()"><i class="fa fa-plus"></i> Tambah</a>
						              			</div>
						              		</div>
				              			</div>
				              			<div class="col-md-6">
				              				<div class="col-md-2">
				              					<label>Penerima (Costumer)</label>
				              				</div>	
				              				<div class="col-md-10">
					            				<div class="form-group">
								                	<select class="form-control select" style="width: 100%;" name="id_costumer" placeholder="Supplier">
								                		<?php
															//Tampilkan Data
															$sql = "SELECT id, nama FROM costumer WHERE status_hapus='1'";
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
				              				<div class="col-md-12"></div>
				              			</div>

					            		<div class="col-md-12" align="right">
					            			<div class="col-md-1">
					            				<button class="btn btn-primary" name="simpan">Simpan</button>
					            			</div>
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