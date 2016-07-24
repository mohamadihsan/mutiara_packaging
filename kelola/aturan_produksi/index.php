<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include '../../tampilan/header_footer/index.php';
include '../../fungsi/aturan_produksi/index.php';
include '../../koneksi/index.php';

if (isset($_POST['simpan'])) {
	TambahAturanProduksi();
	if ($_SESSION['status_operasi_aturan_produksi'] == "berhasil_menyimpan") {
		?><body onload="BerhasilMenyimpan()"></body><?php
	} else {
		?><body onload="GagalMenyimpan()"></body><?php
	}
}

if (isset($_POST['perbaharui'])) {
	PerbaharuiAturanProduksi();
	if ($_SESSION['status_operasi_aturan_produksi'] == "berhasil_memperbaharui") {
		?><body onload="BerhasilMemperbaharui()"></body><?php
	} else {
		?><body onload="GagalMemperbaharui()"></body><?php
	}
}

if (isset($_GET['id'])) {
	HapusAturanProduksi();
	if ($_SESSION['status_operasi_aturan_produksi'] == "berhasil_menghapus") {
		?><body onload="BerhasilMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../aturan_produksi/"><?php
	} else {
		?><body onload="GagalMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../aturan_produksi/"><?php
	}
}

Headers();
?>
	<title>Aturan Produksi</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend>Aturan Produksi</legend>
							</fieldset>
							<a href="tambah.php">
								<button class="btn btn-success"><i class="fa fa-plus"></i> Tambah Aturan</button>
							</a>
							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama Bahan Baku</th>
										<th>Minimal Quantity</th>
										<th>Maksimal Quantity</th>
										<th>Gudang</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<?php
										//Tampilkan Data
										$sql = "SELECT id, nama, minimal_quantity, maksimal_quantity, lokasi_penyimpanan FROM produk WHERE minimal_quantity IS NOT NULL OR maksimal_quantity IS NOT NULL AND status_hapus='1'";
										$stmt = $db->prepare($sql);
										$stmt->execute();

										$stmt->bind_result($id, $nama, $minimal_quantity, $maksimal_quantity, $lokasi_penyimpanan);

										while ($stmt->fetch()) {?>
										<tr>
											<td><?php echo $nama; ?></td>
											<td><?php echo $minimal_quantity; ?></td>
											<td><?php echo $maksimal_quantity; ?></td>
											<td><?php echo $lokasi_penyimpanan; ?></td>
											<td>
												<center>
													<a href="" title="Edit"><i class="fa fa-edit"> </i></a>___
													<a href="index.php?id=<?php echo $id; ?>" title="Hapus"><i class="fa fa-trash"> </i></a>
												</center>
											</td>
										</tr>
									<?php } $stmt->close();?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php
Footer();
?>