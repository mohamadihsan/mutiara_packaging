<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include '../../tampilan/header_footer/index.php';
include '../../fungsi/supplier/index.php';
include '../../koneksi/index.php';

if (isset($_POST['simpan'])) {
	TambahDataSupplier();
	if ($_SESSION['status_operasi_supplier'] == "berhasil_menyimpan") {
		?><body onload="BerhasilMenyimpan()"></body><?php
	} else {
		?><body onload="GagalMenyimpan()"></body><?php
	}
}

if (isset($_POST['perbaharui'])) {
	PerbaharuiDataSupplier();
	if ($_SESSION['status_operasi_supplier'] == "berhasil_memperbaharui") {
		?><body onload="BerhasilMemperbaharui()"></body><?php
	} else {
		?><body onload="GagalMemperbaharui()"></body><?php
	}
}

if (isset($_GET['id'])) {
	HapusDataSupplier();
	if ($_SESSION['status_operasi_supplier'] == "berhasil_menghapus") {
		?><body onload="BerhasilMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../supplier/"><?php
	} else {
		?><body onload="GagalMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../supplier/"><?php
	}
}

Headers();
?>
	<title>Supplier</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend>Supplier</legend>
							</fieldset>
							<a href="tambah.php">
								<button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Supplier</button>
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
										<th width="10%">Supply ?</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<?php
										//Tampilkan Data
										$sql = "SELECT id, nama, no_telp, fax, email, website, alamat FROM supplier WHERE status_hapus='1'";
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
												<a href="index.php?id_supplier=<?php echo $id; ?>">
													<i class="fa fa-file-text-o"></i> Lihat
												</a>
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