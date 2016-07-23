<?php
include '../../tampilan/header_footer/index.php';

Headers();
?>
	<title>Cek Stok</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend><i class="fa fa-calendar"></i> Cek Stok Bahan Baku</legend>
							</fieldset>
							<div class="col-md-2">
								<a href="../pembelian/">
									<button class="btn btn-primary"><i class="fa fa-file-text"></i> Lakukan Pemesanan </button>
								</a>
							</div>
							<div class="col-md-2">
								<form action="../cek_stok_bb/" method="post">
									<button class="btn btn-success" name="cek_stok"><i class="fa fa-refresh"></i> Cek Stok </button>
								</form>
							</div>	
							<br><br>
							<i>
								*Catatan: Bahan Baku yang dicek adalah bahan baku yang melewati minimal quantity atau stok habis.
							</i>
							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width="30%">Nama Bahan Baku</th>
										<th width="20%">Harga Beli</th>
										<th width="20%">Harga Jual</th>
										<th width="10%">Stok Saat ini</th>
										<th width="10%">Minimal Quantity</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Pot PP 15gr Gold - Putih</td>
										<td>Rp 1.500,00</td>
										<td>Rp 1.900,00</td>
										<td>0</td>
										<td>5</td>
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