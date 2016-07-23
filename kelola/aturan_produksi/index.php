<?php
include '../../tampilan/header_footer/index.php';

Headers();
?>
	<title>Aturan Pemesanan</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend>Aturan Pemesanan</legend>
							</fieldset>
							<a href="tambah.php">
								<button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Aturan</button>
							</a>
							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama Bahan Baku</th>
										<th>Minimal Quantity</th>
										<th>Maksimal Quantity</th>
										<th>Waktu Tunggu Pemesanan</th>
										<th>Gudang</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Pot PP 15gr Gold - Putih</td>
										<td>10</td>
										<td>100</td>
										<td>7 hari</td>
										<td>Gudang Besar</td>
										<td>
											<center>
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