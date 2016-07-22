<?php
include '../../tampilan/header_footer/index.php';

Headers();
?>
	<title>Kategori Produk</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend>Kategori Produk</legend>
							</fieldset>
							<a href="tambah.php">
								<button class="btn btn-primary"><i class="fa fa-cubes"></i> Tambah Kategori Produk</button>
							</a>
							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama Kategori Produk</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Barang Jadi</td>
										<td>
											<center>
												<a href="" title="Edit"><i class="fa fa-edit"> </i></a>___
												<a href="" title="Hapus"><i class="fa fa-trash"> </i></a>
											</center>
										</td>
									</tr>
									<tr>
										<td>Barang Olahan</td>
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