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
										$result = mysqli_query($db, $sql);
										$i=0;
										while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
											$id[$i] = $row['id'];
											$kode[$i] = $row['kode'];
											$nama[$i] = $row['nama'];
											$harga_jual[$i] = $row['harga_jual'];
											$stok[$i] = $row['stok'];?>
											<tr>
												<td><?php echo $kode[$i]; ?></td>
												<td><?php echo $nama[$i]; ?></td>
												<td><?php echo Rupiah($harga_jual[$i]); ?></td>
												<td><?php echo $stok[$i]; ?></td>
												<td>
													<a href="#detail?id_p=<?php echo $id[$i];?>"><i class="fa fa-file-text-o" title="Lihat Detail Bahan Baku yang Digunakan"></i> Lihat
													</a>

													<div id="detail?id_p=<?php echo $id[$i];?>" class="modalWindow">
														<div>
															<div class="modalHeader">
																<h2><?php echo $nama[$i]; ?></h2>
																<!-- <a href="#close" title="Close" class="close">X</a> -->
															</div>
															<div class="modalContent">
																<p>Bahan Baku yang digunakan untuk membuat produk ini yaitu:</p>
																
																<?php
																$sql1 = "SELECT bahan_baku.nama FROM bahan_baku, detail_produk, produk WHERE bahan_baku.id=detail_produk.id_bahan_baku AND produk.id=detail_produk.id_produk AND produk.id=$id[$i]";
																$result1 = mysqli_query($db, $sql1);
																$j=0;
																while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
																	$nama_bb[$j] = $row1['nama'];?>
																		<p>
																			<?php echo "* ".$nama_bb[$j]."<br>"; ?>
																		</p> <?php
																	$j++;
																}?>
															</div>
															<div class="modalFooter">
																<a href="#close" title="Tutup" class="cancel">Tutup</a>
																<div class="clear"></div>
															</div>
														</div>
													</div>
												</td>
												<td>
													<center>
														<a href="" title="Edit"><i class="fa fa-edit"> </i></a>___
														<a href="index.php?id=<?php echo $id; ?>" title="Hapus"><i class="fa fa-trash"> </i></a>
													</center>
												</td>
											</tr>
											<?php
											$i++;
										}?>
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