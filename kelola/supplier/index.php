<?php
include '../../tampilan/header_footer/index.php';

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
										<th width="30%">Nama</th>
										<th width="10%">No.Telp</th>
										<th width="10%">Fax</th>
										<th width="20%">Website</th>
										<th width="20">Email</th>
										<th>Alamat</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>CV. Dhyan Dhany Plastik</td>
										<td>082131901686</td>
										<td>082131901686</td>
										<td>www.pot-cream.com</td>
										<td>-</td>
										<td>Surabaya</td>
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