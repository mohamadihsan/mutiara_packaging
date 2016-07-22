<?php
include '../../tampilan/header_footer/index.php';

Headers();
?>
	<title>Kontak</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend>Kontak</legend>
							</fieldset>
							<a href="tambah.php">
								<button class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Kontak</button>
							</a>
							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama</th>
										<th>No.Telp</th>
										<th>Email</th>
										<th>Fax</th>
										<th>Alamat</th>
										<th>Website</th>
										<th>Group Kontak</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Supplier Pot Cream</td>
										<td>085720054204</td>
										<td>mohamad_ihsan100@yahoo.co.id</td>
										<td>085720054204</td>
										<td>Ujung Berung</td>
										<td>www.pot-cream.com</td>
										<td>Supplier</td>
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