<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include '../../tampilan/header_footer/index.php';
include '../../fungsi/pembelian/index.php';
include '../../koneksi/index.php';

if (isset($_POST['perbaharui'])) {
	EditDataPembelian();
	if ($_SESSION['status_operasi_pembelian'] == "berhasil_memperbaharui") {
		?><body onload="BerhasilMemperbaharui()"></body><?php
	} else {
		?><body onload="GagalMemperbaharui()"></body><?php
	}
}

if (isset($_GET['id'])) {
	Arsipkan();
	if ($_SESSION['status_operasi_bahan_baku_masuk'] == "berhasil_mengarsipkan") {
		?><body onload="BerhasilMengarsipkan()"></body><meta http-equiv="refresh" content="1.5;url=../bahanbaku_masuk/"><?php
	} else {
		?><body onload="GagalMenyimpan()"></body><meta http-equiv="refresh" content="1.5;url=../bahanbaku_masuk/"><?php
	}
}

if (isset($_GET['dikirim'])OR isset($_GET['sudah_dibayar']) OR isset($_GET['selesai'])) {
	UpdateStatusPembelian();
	if ($_SESSION['status_operasi_pembelian'] == "berhasil_memperbaharui") {
		?><body onload="BerhasilMemperbaharui()"></body><meta http-equiv="refresh" content="1.5;url=../cek_pemesanan/"><?php
	} else {
		?><body onload="GagalMemperbaharui()"></body><meta http-equiv="refresh" content="1.5;url=../cek_pemesanan/"><?php
	}
}

Headers();
?>
	<title>Bahan Baku Masuk</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend><i class="fa fa-calendar"></i> Bahan Baku Yang Masuk</legend>
							</fieldset>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="15%">Tanggal Barang Sampai</th>
										<th width="20%">Nama Bahan Baku</th>
										<th width="10%">Quantity</th>
										<th width="15%">Lokasi Penyimpanan</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<?php
									//Tampilkan Data
									$sql = "SELECT pembelian.id, pembelian.no_order, pembelian.tanggal_barang_datang, gudang.nama_gudang, bahan_baku.nama, detail_pembelian.quantity FROM pembelian, bahan_baku, gudang, detail_pembelian WHERE detail_pembelian.id_bahan_baku=bahan_baku.id AND detail_pembelian.id_pembelian=pembelian.id AND pembelian.gudang=gudang.id AND pembelian.arsipkan=0";
									$result = mysqli_query($db, $sql);
									$i=0;
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										$id[$i] = $row['id'];
										$no_order[$i] = $row['no_order'];
										$tanggal_barang_datang[$i] = $row['tanggal_barang_datang']; 
										$gudang[$i] = $row['nama_gudang'];
										$nama_bb[$i] = $row['nama'];
										$quantity[$i] = $row['quantity'];?>
										<tr>
											<td><?php echo Tanggal($tanggal_barang_datang[$i]); ?></td>
											<td><?php echo $nama_bb[$i]; ?></td>
											<td><?php echo $quantity[$i]; ?></td>
											<td><?php echo strtoupper($gudang[$i]); ?></td>
											<td>
												<a href="index.php?id=<?php echo $id[$i]; ?>?stok=<?php echo $quantity[$i]; ?>" title="Tandai Bahwa Barang Sudah Diterima">
													<i class="fa fa-archive"> Arsipkan</i>
												</a>

												<div id="detail?id=<?php echo $id[$i];?>" class="modalWindow">
													<div>
														<div class="modalHeader">
															<h2><?php echo $no_order[$i]; ?></h2>
															<!-- <a href="#close" title="Close" class="close">X</a> -->
														</div>
														<div class="modalContent">
															<p>
																Detail pembelian bahan baku dari <?php echo $supplier[$i]; ?> :
															</p>
															
															<?php
															$sql1 = "SELECT bahan_baku.nama, detail_pembelian.quantity FROM detail_pembelian, bahan_baku WHERE detail_pembelian.id_bahan_baku=bahan_baku.id AND detail_pembelian.id_pembelian=$id[$i]";
															$result1 = mysqli_query($db, $sql1);
															$j=0;
															?>
															<table class="table table-striped">
																<thead>
																	<tr>
																		<th>Nama Bahan Baku</th>
																		<th>Quantity</th>
																	</tr>
																</thead>
																<tbody><?php
																	while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
																		$nama_bb[$j] = $row1['nama'];
																		$quantity[$j] = $row1['quantity'];?>
																			<p>
																				<tr>
																					<td>
																						<?php echo $nama_bb[$j]; ?>
																					</td>	
																					<td>
																						<?php echo $quantity[$j]; ?>
																					</td>	
																				</tr>
																			</p><?php
																		$j++;
																	}?>													
																</tbody>
															</table>
														</div>
														<div class="modalFooter">
															<a href="#close" title="Tutup" class="cancel">Tutup</a>
															<div class="clear"></div>
														</div>
													</div>
												</div>
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