<?php
include '../../tampilan/header_footer/index.php';

Headers();
?>
	<title>Ekspedisi</title>

	<div class="content-wrapper">
		<!-- Konten -->
		<section class="content">
			<div class="box box-default">
				<div class="box-body">
		      		<div class="row">
    					<div class="col-md-12">
							<fieldset>
								<legend>Ekspedisi</legend>
							</fieldset>
							<a href="tambah.php">
								<button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Ekspedisi</button>
							</a>
							<br><br>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>JNE</td>
									</tr>
									<tr>
										<td>Pos Indonesia</td>
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