<?php
include '../../tampilan/header_footer/index.php';

Headers();
?>
	<title>Detail Supplier</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend>Detail Supplier</legend>
							</fieldset>
							<a href="tambah.php">
								<button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Supplier</button>
							</a>
							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="50%">Nama</th>
										<th width="30%">Alamat</th>
										<th width="20%">Barang yang di supply</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>CV. Dhyan Dhany Plastik</td>
										<td>Surabaya</td>
										<td><a href=""><i class="fa fa-search" title="Lihat Barang yang di supply"></i> Lihat</a></td>
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