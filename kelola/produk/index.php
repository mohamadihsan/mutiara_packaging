<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include '../../tampilan/header_footer/index.php';
include '../../fungsi/produk/index.php';
include '../../koneksi/index.php';

if (isset($_POST['simpan'])) {
	TambahDataProduk();
	if ($_SESSION['status_operasi_produk'] == "berhasil_menyimpan") {
		?><body onload="BerhasilMenyimpan()"></body><?php
	} else {
		?><body onload="GagalMenyimpan()"></body><?php
	}
}

if (isset($_POST['perbaharui'])) {
	PerbaharuiDataProduk();
	if ($_SESSION['status_operasi_produk'] == "berhasil_memperbaharui") {
		?><body onload="BerhasilMemperbaharui()"></body><?php
	} else {
		?><body onload="GagalMemperbaharui()"></body><?php
	}
}

if (isset($_POST['update_stok'])) {
	PerbaharuiStokProduk();
	if ($_SESSION['status_operasi_produk'] == "berhasil_update_stok") {
		?><body onload="BerhasilMemperbaharui()"></body><?php
	} else {
		?><body onload="GagalMemperbaharui()"></body><?php
	}
}

if (isset($_GET['id'])) {
	HapusDataProduk();
	if ($_SESSION['status_operasi_produk'] == "berhasil_menghapus") {
		?><body onload="BerhasilMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../produk/"><?php
	} else {
		?><body onload="GagalMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../produk/"><?php
	}
}

Headers();
?>
	<title>Produk</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend>Produk</legend>
							</fieldset>
							<a href="tambah.php">
								<button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Produk</button>
							</a>
							<a href="update_stok.php">
								<button class="btn btn-success"><i class="fa fa-cubes"></i> Update Stok</button>
							</a>
							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="15%">Kode</th>
										<th width="30%">Nama</th>
										<th width="20%">Harga Jual</th>
										<th width="10%">Stok</th>
										<th width="15%">Bahan Baku</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<?php
										//Tampilkan Data
										$sql = "SELECT id, kode, nama, harga_jual, stok FROM produk WHERE status_hapus='1'";
										$stmt = $db->prepare($sql);
										$stmt->execute();

										$stmt->bind_result($id, $kode, $nama, $harga_jual, $stok);

										while ($stmt->fetch()) {?>
										<tr>
											<td><?php echo $kode; ?></td>
											<td><?php echo $nama; ?></td>
											<td><?php echo Rupiah($harga_jual); ?></td>
											<td><?php echo $stok; ?></td>
											<td>
												<a href=""><i class="fa fa-file-text-o" title="Lihat Detail Bahan Baku yang Digunakan"></i> Lihat</a>
											</td>
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