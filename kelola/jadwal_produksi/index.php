<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include '../../tampilan/header_footer/index.php';
include '../../fungsi/produksi/index.php';
include '../../koneksi/index.php';

if (isset($_GET['qty'])) {
	ProduksiSelesai();
	if ($_SESSION['status_operasi_produksi'] == "berhasil_menyimpan") {
		?><body onload="BerhasilMemperbaharui()"></body><meta http-equiv="refresh" content="1.5;url=../jadwal_produksi/"><?php
	} else {
		?><body onload="GagalMemperbaharui()"></body><meta http-equiv="refresh" content="1.5;url=../jadwal_produksi/"><?php
	}
}

if (isset($_GET['id'])) {
	BatalkanProduksi();
	if ($_SESSION['status_operasi_produksi'] == "berhasil_menghapus") {
		?><body onload="BerhasilMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../jadwal_produksi/"><?php
	} else {
		?><body onload="GagalMenghapus()"></body><meta http-equiv="refresh" content="1.5;url=../jadwal_produksi/"><?php
	}
}

if (isset($_GET['tunggu'])OR isset($_GET['proses']) OR isset($_GET['selesai'])) {
	UpdateStatusProduksi();
	if ($_SESSION['status_operasi_produksi'] == "berhasil_memperbaharui") {
		?><body onload="BerhasilMemperbaharui()"></body><meta http-equiv="refresh" content="1.5;url=../jadwal_produksi/"><?php
	} else {
		?><body onload="GagalMemperbaharui()"></body><meta http-equiv="refresh" content="1.5;url=../jadwal_produksi/"><?php
	}
}

Headers();
?>
	<title>Jadwal Produksi</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend><i class="fa fa-calendar"></i> Jadwal Produksi</legend>
							</fieldset>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="30%">Tanggal</th>
										<th width="20%">Nama Produk</th>
										<th width="15%">Quantity</th>
										<th width="">Status</th>
										<th width="10%"></th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<?php
									//Tampilkan Data
									$sql = "SELECT produksi.id_produksi, produk.id, produksi.produk, produksi.produk, produksi.quantity, produksi.status_produksi, produksi.tanggal_produksi, produk.nama FROM produksi, produk WHERE produksi.produk=produk.id AND produksi.arsipkan='0'";
									$result = mysqli_query($db, $sql);
									$i=0;
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										$id[$i] = $row['id_produksi'];
										$id_produk[$i] = $row['id'];
										$produk[$i] = $row['produk'];
										$quantity[$i] = $row['quantity'];
										$status_produksi[$i] = $row['status_produksi'];
										$tanggal_produksi[$i] = $row['tanggal_produksi'];
										$nama_produk[$i] = $row['nama'];?>
										<tr>
											<td><?php echo Tanggal($tanggal_produksi[$i]); ?></td>
											<td><?php echo $nama_produk[$i]; ?></td>
											<td><?php echo $quantity[$i]; ?></td>
											<td>
												<center>
												<?php 
													if ($status_produksi[$i]=="0") {
														echo "<button class='btn btn-warning'>Tunggu Persetujuan</button>";
													}else if ($status_produksi[$i]=="1") {
														echo "<button class='btn btn-primary'>Proses</button>";
													}else{
														echo "<button class='btn btn-success'>Selesai</button>";
													}

													if ($status_produksi[$i]=="0") {
														?>
															<br>
															<a href="index.php?proses=<?php echo $id[$i];?>" title="Status Proses">
																<button class='btn btn-default'>
																	<i class="fa fa-spinner"> </i>
																</button>
															</a>
															<a href="index.php?selesai=<?php echo $id[$i];?>" title="Status Selesai">
																<button class='btn btn-default'>
																	<i class="fa fa-check"> </i>
																</button>
															</a>
														<?php
													}else if ($status_produksi[$i]=="1") {
														?>
															<br>
															<a href="index.php?tunggu=<?php echo $id[$i];?>" title="Status Sedang Menunggu Persetujuan">
																<button class='btn btn-default'>
																	<i class="fa fa-question"> </i>
																</button>	
															</a> 
															<a href="index.php?selesai=<?php echo $id[$i];?>" title="Status Selesai">
																<button class='btn btn-default'>
																	<i class="fa fa-check"> </i>
																</button>	
															</a>
														<?php
													}else if ($status_produksi[$i]=="2"){
														?>
															<br>
															<a href="index.php?tunggu=<?php echo $id[$i];?>" title="Status Sedang Menunggu Persetujuan">
																<button class='btn btn-default'>
																	<i class="fa fa-question"> </i>
																</button>	
															</a> 
															<a href="index.php?proses=<?php echo $id[$i];?>" title="Status Proses">
																<button class='btn btn-default'>
																	<i class="fa fa-spinner"> </i>
																</button>
															</a>
														<?php
													}
												?>
												</center>
											</td>
											
											<td>
												<center>
													<a href="index.php?id=<?php echo $id[$i]; ?>" title="Batalkan Produksi">
														<i class="fa fa-trash" style="font-size:30px;"> </i><br>Batalkan Produksi
													</a>
												</center>	
											</td>
											<td>
												<center>
													<a href="index.php?id_produksi=<?php echo $id[$i]; ?>&&qty=<?php echo $quantity[$i]; ?>&&id_produk=<?php echo $id_produk[$i]; ?>" title="Arspikan">
														<i class="fa fa-archive" style="font-size:30px;"> </i><br>Arspikan Produksi
													</a>
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