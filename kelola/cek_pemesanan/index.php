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
	BatalkanPembelian();
	if ($_SESSION['status_operasi_pembelian'] == "berhasil_menghapus") {
		?><body onload="BerhasilMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../cek_pemesanan/"><?php
	} else {
		?><body onload="GagalMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../cek_pemesanan/"><?php
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
	<title>Cek Pemesanan</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend><i class="fa fa-calendar"></i> Pemesanan Bahan Baku</legend>
							</fieldset>
							<div class="col-md-12" align="right">
								<i align="right">Tanggal Hari ini : <b><?php echo Tanggal(date('Y-m-d')); ?></b></i>
							</div>	
							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="15%">Tanggal Pemesanan</th>
										<th width="20%">Supplier</th>
										<th width="15%">Dikirim ke</th>
										<th width="10%">Status Pemesanan</th>
										<th width="15%">Total Pembelian</th>
										<th width="15%">Barang Datang</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<?php
									//Tampilkan Data
									$sql = "SELECT pembelian.id, pembelian.no_order, pembelian.tanggal_pembelian, supplier.nama, gudang.nama_gudang, pembelian.status_pembelian, pembelian.tanggal_barang_datang, pembelian.total_pembelian FROM pembelian, supplier, gudang WHERE pembelian.supplier=supplier.id AND pembelian.gudang=gudang.id";
									$result = mysqli_query($db, $sql);
									$i=0;
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										$id[$i] = $row['id'];
										$no_order[$i] = $row['no_order'];
										$tanggal_pembelian[$i] = $row['tanggal_pembelian'];
										$supplier[$i] = $row['nama'];
										$gudang[$i] = $row['nama_gudang'];
										$status_pembelian[$i] = $row['status_pembelian'];
										$tanggal_barang_datang[$i] = $row['tanggal_barang_datang'];
										$total_pembelian[$i] = $row['total_pembelian'];?>
										<tr>
											<td><?php echo Tanggal($tanggal_pembelian[$i]); ?></td>
											<td><?php echo $supplier[$i]; ?></td>
											<td><?php echo "MUTIARA PACKAGING (".$gudang[$i].")"; ?></td>
											<td>
												<center>
												<?php 
													if ($status_pembelian[$i]=="0") {
														echo "<button class='btn btn-warning'>DIKIRIM</button>";
													}else if ($status_pembelian[$i]=="1") {
														echo "<button class='btn btn-primary'>SUDAH DIBAYAR</button>";
													}else{
														echo "<button class='btn btn-success'>SELESAI</button>";
													}

													if ($status_pembelian[$i]=="0") {
														?>
															<br>
															<a href="index.php?sudah_dibayar=<?php echo $id[$i];?>" title="Status Sudah Dibayar">
																<button class='btn btn-default'>
																	<i class="fa fa-money"> </i>
																</button>
															</a>
															<a href="index.php?selesai=<?php echo $id[$i];?>" title="Status Selesai">
																<button class='btn btn-default'>
																	<i class="fa fa-check"> </i>
																</button>
															</a>
														<?php
													}else if ($status_pembelian[$i]=="1") {
														?>
															<br>
															<a href="index.php?dikirim=<?php echo $id[$i];?>" title="Status Dikirim">
																<button class='btn btn-default'>
																	<i class="fa fa-send-o"> </i>
																</button>	
															</a> 
															<a href="index.php?selesai=<?php echo $id[$i];?>" title="Status Selesai">
																<button class='btn btn-default'>
																	<i class="fa fa-check"> </i>
																</button>	
															</a>
														<?php
													}else if ($status_pembelian[$i]=="2"){
														?>
															<br>
															<a href="index.php?dikirim=<?php echo $id[$i];?>" title="Status Dikirim">
																<button class='btn btn-default'>
																	<i class="fa fa-send-o"> </i>
																</button
															</a>
															<a href="index.php?sudah_dibayar=<?php echo $id[$i];?>" title="Status Sudah Dibayar">
																<button class='btn btn-default'>	
																	<i class="fa fa-money"> </i>
																</button>	
															</a>
														<?php
													}
												?>
												</center>
											</td>
											<td><?php echo "Rp.".Rupiah($total_pembelian[$i]); ?></td>
											<td><?php echo Tanggal($tanggal_barang_datang[$i]); ?></td>
											<td>
												<a href="#detail?id=<?php echo $id[$i];?>"><i class="fa fa-file-text-o" title="Lihat Detail"></i>
												</a>___
												<a href="index.php?id=<?php echo $id[$i]; ?>" title="Batalkan Pembelian">
													<i class="fa fa-trash"> </i>
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