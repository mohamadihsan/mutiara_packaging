<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include '../../tampilan/header_footer/index.php';
include '../../fungsi/bahanbaku/index.php';
include '../../koneksi/index.php';

Headers();
?>
	<title>Cek Stok</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend><i class="fa fa-calendar"></i> Cek Stok Bahan Baku</legend>
							</fieldset>

    						<?php 
    						if (isset($_POST['cek_stok'])) { ?>

							<div class="col-md-2">
								<a href="../pembelian/">
									<button class="btn btn-primary"><i class="fa fa-file-text"></i> Lakukan Pemesanan </button>
								</a>
							</div>
							<?php } ?>

							<div class="col-md-2">
								<form action="../cek_stok_bb/" method="post">
									<button class="btn btn-success" name="cek_stok"><i class="fa fa-refresh"></i> Cek Stok </button>
								</form>
							</div>	
							<br><br>
							<i>
								*Catatan: Bahan Baku yang dicek adalah bahan baku yang melewati minimal quantity atau stok habis.
							</i>
							<br><br>

							<?php
							if (isset($_POST['cek_stok'])) { ?>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="20%">Kode</th>
										<th width="30%">Nama Bahan Baku</th>
										<th width="20%">Harga Beli</th>
										<th width="20%">Harga Jual</th>
										<th width="10%">Stok</th>
									</tr>
								</thead>
								<tbody>
									<?php
										//Tampilkan Data
										$sql = "SELECT id, kode, nama, harga_beli, harga_jual, stok FROM bahan_baku WHERE status_hapus='1' AND stok<minimal_quantity OR stok=0";
										$stmt = $db->prepare($sql);
										$stmt->execute();

										$stmt->bind_result($id, $kode, $nama, $harga_beli, $harga_jual, $stok);

										while ($stmt->fetch()) {?>
										<tr>
											<td><?php echo $kode; ?></td>
											<td><?php echo $nama; ?></td>
											<td><?php echo Rupiah($harga_beli); ?></td>
											<td><?php echo Rupiah($harga_jual); ?></td>
											<td><?php echo $stok; ?></td>
										</tr>
									<?php } $stmt->close();?>	
								</tbody>
							</table>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php
Footer();
?>