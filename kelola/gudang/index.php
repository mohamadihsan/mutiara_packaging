<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	include '../../tampilan/header_footer/index.php';
	include '../../fungsi/gudang/index.php';
	include '../../koneksi/index.php';

	if (isset($_POST['simpan'])) {
		TambahDataGudang();
		if ($_SESSION['status_operasi_gudang'] == "berhasil_menyimpan") {
			?><body onload="BerhasilMenyimpan()"></body><?php
		} else {
			?><body onload="GagalMenyimpan()"></body><?php
		}
	}

	if (isset($_POST['perbaharui'])) {
		PerbaharuiDataGudang();
		if ($_SESSION['status_operasi_gudang'] == "berhasil_memperbaharui") {
			?><body onload="BerhasilMemperbaharui()"></body><?php
		} else {
			?><body onload="GagalMemperbaharui()"></body><?php
		}
	}

	if (isset($_GET['id'])) {
		HapusDataGudang();
		if ($_SESSION['status_operasi_gudang'] == "berhasil_menghapus") {
			?><body onload="BerhasilMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../gudang/"><?php
		} else {
			?><body onload="GagalMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../gudang/"><?php
		}
	}

	Headers();
?>
	<title>Gudang</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend>Gudang</legend>
							</fieldset>
							<a href="tambah.php">
								<button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Gudang</button>
							</a>
							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama Gudang</th>
										<th>No.Telp</th>
										<th>Alamat</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<?php
										//Tampilkan Data
										$sql = "SELECT id, nama, no_telp, alamat FROM gudang WHERE status_hapus='1'";
										$stmt = $db->prepare($sql);
										$stmt->execute();

										$stmt->bind_result($id, $nama, $no_telp, $alamat);

										while ($stmt->fetch()) {?>

										<tr>
											<td><?php echo $nama; ?></td>
											<td><?php echo $no_telp; ?></td>
											<td><?php echo $alamat; ?></td>
											<td>
												<center>
													<a href="" title="Edit"><i class="fa fa-edit"> </i></a>___
													<a href="index.php?id=<?php echo $id; ?>" title="Hapus"><i class="fa fa-trash"> </i></a>
												</center>
											</td>
										</tr>
									<?php }?>
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