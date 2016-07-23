<?php
include '../../tampilan/header_footer/index.php';

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
										<th width="20%">Dari (Supplier)</th>
										<th width="25%">Dikirim ke</th>
										<th width="10%">Status</th>
										<th width="15%">Total Biaya</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>2 September 2015</td>
										<td>CV. Dhyan Dhany Plastik</td>
										<td>Mutiara Packaging (Gudang Besar)</td>
										<td>Proses</td>
										<td>Rp. 4.500.000,00</td>
										<td>
											<center>
												<a href=""><i class="fa fa-file-text" title="Lihat Detail Pemesanan"></i> ___</a> 
												<a href="" title="Edit"><i class="fa fa-edit"> </i></a>___
												<a href="" title="Hapus"><i class="fa fa-trash"> </i></a>
											</center>
										</td>
									</tr>
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