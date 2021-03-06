<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include '../../tampilan/header_footer/index.php';
include '../../fungsi/ekspedisi/index.php';
include '../../koneksi/index.php';

if (isset($_POST['simpan'])) {
	TambahDataEkspedisi();
	if ($_SESSION['status_operasi_ekspedisi'] == "berhasil_menyimpan") {
		?><body onload="BerhasilMenyimpan()"></body><?php
	} else {
		?><body onload="GagalMenyimpan()"></body><?php
	}
}

if (isset($_POST['perbaharui'])) {
	PerbaharuiDataEkspedisi();
	if ($_SESSION['status_operasi_ekspedisi'] == "berhasil_memperbaharui") {
		?><body onload="BerhasilMemperbaharui()"></body><?php
	} else {
		?><body onload="GagalMemperbaharui()"></body><?php
	}
}

if (isset($_GET['id'])) {
	HapusDataEkspedisi();
	if ($_SESSION['status_operasi_ekspedisi'] == "berhasil_menghapus") {
		?><body onload="BerhasilMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../ekspedisi/"><?php
	} else {
		?><body onload="GagalMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../ekspedisi/"><?php
	}
}

Headers();
?>
	<title>Ekspedisi</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend>Ekspedisi</legend>
							</fieldset>
							<a href="tambah.php">
								<button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Ekspedisi</button>
							</a>
							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<?php
										//Tampilkan Data
										$sql = "SELECT id, nama FROM ekspedisi WHERE status_hapus='1'";
										$stmt = $db->prepare($sql);
										$stmt->execute();

										$stmt->bind_result($id, $nama);

										while ($stmt->fetch()) {?>

										<tr>
											<td><?php echo $nama; ?></td>
											<td>
												<center>
													<a href="" title="Edit"><i class="fa fa-edit"> </i></a>___
													<a href="index.php?id=<?php echo $id; ?>" title="Hapus"><i class="fa fa-trash"> </i></a>
												</center>
											</td>
										</tr>
									<?php } $stmt->close(); ?>
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