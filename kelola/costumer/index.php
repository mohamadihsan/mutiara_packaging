<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include '../../tampilan/header_footer/index.php';
include '../../fungsi/costumer/index.php';
include '../../koneksi/index.php';

if (isset($_POST['simpan'])) {
	TambahDataCostumer();
	if ($_SESSION['status_operasi_costumer'] == "berhasil_menyimpan") {
		?><body onload="BerhasilMenyimpan()"></body><?php
	} else {
		?><body onload="GagalMenyimpan()"></body><?php
	}
}

if (isset($_POST['perbaharui'])) {
	PerbaharuiDataCostumer();
	if ($_SESSION['status_operasi_costumer'] == "berhasil_memperbaharui") {
		?><body onload="BerhasilMemperbaharui()"></body><?php
	} else {
		?><body onload="GagalMemperbaharui()"></body><?php
	}
}

if (isset($_GET['id'])) {
	HapusDataCostumer();
	if ($_SESSION['status_operasi_costumer'] == "berhasil_menghapus") {
		?><body onload="BerhasilMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../costumer/"><?php
	} else {
		?><body onload="GagalMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../costumer/"><?php
	}
}

Headers();
?>
	<title>Costumer</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend>Costumer</legend>
							</fieldset>
							<a href="tambah.php">
								<button class="btn btn-success"><i class="fa fa-user-plus"></i> Tambah Costumer</button>
							</a>
							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="20%">Nama</th>
										<th width="10%">No.Telp</th>
										<th width="10%">Fax</th>
										<th width="20%">Website</th>
										<th width="20">Email</th>
										<th>Alamat</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<?php
										//Tampilkan Data
										$sql = "SELECT id, nama, no_telp, fax, email, website, alamat FROM costumer WHERE status_hapus='1'";
										$stmt = $db->prepare($sql);
										$stmt->execute();

										$stmt->bind_result($id, $nama, $no_telp, $fax, $email, $website, $alamat);

										while ($stmt->fetch()) {?>
										<tr>
											<td><?php echo $nama; ?></td>
											<td><?php echo $no_telp; ?></td>
											<td><?php echo $fax; ?></td>
											<td><?php echo $email; ?></td>
											<td><?php echo $website; ?></td>
											<td><?php echo $alamat; ?></td>
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