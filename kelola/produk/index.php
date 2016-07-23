<?php
include '../../tampilan/header_footer/index.php';

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
										<th width="45%">Nama</th>
										<th width="20%">Harga Jual</th>
										<th width="10%">Stok</th>
										<th width="15%">Bahan Baku</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Pot PP 15gr Gold - Putih</td>
										<td>Rp 1.900,00</td>
										<td>71</td>
										<td>
											<a href=""><i class="fa fa-search" title="Lihat Detail"></i> Lihat</a>
										</td>
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