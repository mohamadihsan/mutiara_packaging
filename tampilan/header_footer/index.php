<?php
function Headers() {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="icon" href="../../gambar/icon.png">
	 	<meta charset="utf-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  	<!-- Tell the browser to be responsive to screen width -->
	  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  	<!-- Bootstrap 3.3.6 -->
	  	<link rel="stylesheet" href="../../gaya/bootstrap/bootstrap/css/bootstrap.min.css">
	  	<!-- Font Awesome -->
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	  	<!-- Ionicons -->
	  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	  	<!-- data tables -->
	  	<link rel="stylesheet" href="../../gaya/bootstrap/plugins/datatables/dataTables.bootstrap.css">
	  	<!-- daterange picker -->
	  	<link rel="stylesheet" href="../../gaya/bootstrap/plugins/daterangepicker/daterangepicker-bs3.css">
	  	<!-- bootstrap datepicker -->
	  	<link rel="stylesheet" href="../../gaya/bootstrap/plugins/datepicker/datepicker3.css">
	  	<!-- iCheck for checkboxes and radio inputs -->
	  	<link rel="stylesheet" href="../../gaya/bootstrap/plugins/iCheck/all.css">
	  	<!-- Bootstrap Color Picker -->
	  	<link rel="stylesheet" href="../../gaya/bootstrap/plugins/colorpicker/bootstrap-colorpicker.min.css">
	  	<!-- Bootstrap time Picker -->
	  	<link rel="stylesheet" href="../../gaya/bootstrap/plugins/timepicker/bootstrap-timepicker.min.css">
	  	<!-- Select2 -->
	  	<link rel="stylesheet" href="../../gaya/bootstrap/plugins/select2/select2.min.css">
	  	<!-- Theme style -->
	  	<link rel="stylesheet" href="../../gaya/bootstrap/dist/css/AdminLTE.min.css">
	  	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	  	<link rel="stylesheet" href="../../gaya/bootstrap/dist/css/skins/_all-skins.min.css">
	  	<!-- SweetAlert -->
	  	<link rel="stylesheet" type="text/css" href="../../gaya/bootstrap/dist/sweet/sweetalert.css">

	  	<script type="text/javascript" src="../../gaya/bootstrap/bootstrap/js/jquery1.min.js"></script>

	  	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	  	<style type="text/css" media="screen">
	  		.modalDialog{
	  			position: fixed;
	  			font-family: Arial, Helvetica, sans-serif;
	  			top: 0;
	  			right: 0;
	  			bottom: 0;
	  			left: 0;
	  			background: rgba(0,0,0,0.8);
	  			z-index: 99999;
	  			opacity: 0;
	  			-webkit-transition: opacity 400ms ease-in;
	  			-moz-transition: opacity 400ms ease-in;
	  			transition: opacity 400ms ease-in;
	  			pointer-events: none;
	  		}

	  		.modalDialog:target{
	  			opacity: 1;
	  			pointer-events: auto;
	  		}

	  		.modalDialog > div{
	  			width: 400px;
	  			position: relative;
	  			margin: 10% auto;
	  			padding: 5px 20px 13px 20px;
	  			border-radius: 10px;
	  			background: #fff;
	  			background: -moz-linear-gradient(#fff, #999);
	  			background: -webkit-linear-gradient(#fff, #999);
	  			background: -o-linear-gradient(#fff, #999);
	  		}

	  		.modalWindow {
				position: fixed;
				font-family: arial;
				font-size:90%;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				background: rgba(0,0,0,0.2);
				z-index: 99999;
				opacity:0;
				-webkit-transition: opacity 400ms ease-in;
				-moz-transition: opacity 400ms ease-in;
				transition: opacity 400ms ease-in;
				pointer-events: none;
				}
				.modalHeader h2 { color: #189CDA; border-bottom: 2px groove #efefef; }
				.modalWindow:target {
				opacity:1;
				pointer-events: auto;
				}
				.modalWindow > div {
				width: 500px;
				position: relative;
				margin: 10% auto;
				-webkit-border-radius: 5px;
				-moz-border-radius: 5px;
				border-radius: 5px;
				background: #fff;
				}
				.modalWindow .modalHeader  {    padding: 5px 20px 0px 20px; }
				.modalWindow .modalContent {    padding: 0px 20px 5px 20px; }
				.modalWindow .modalFooter  {    padding: 8px 20px 8px 20px; }
				.modalFooter {
				background: #F1F1F1;
				border-top: 1px solid #999;
				-moz-box-shadow: inset 0px 13px 12px -14px #888;
				-webkit-box-shadow: inset 0px 13px 12px -14px #888;
				box-shadow: inset 0px 13px 12px -14px #888;
				}
				.modalFooter p {
				color:#D4482D;
				text-align:right;
				margin:0;
				padding: 5px;
				}
				.ok, .close, .cancel {
				background: #606061;
				color: #FFFFFF;
				line-height: 25px;
				text-align: center;
				text-decoration: none;
				font-weight: bold;
				-webkit-border-radius: 2px;
				-moz-border-radius: 2px;
				border-radius: 2px;
				-moz-box-shadow: 1px 1px 3px #000;
				-webkit-box-shadow: 1px 1px 3px #000;
				box-shadow: 1px 1px 3px #000;
				}
				.close {
				position: absolute;
				right: 5px;
				top: 5px;
				width: 22px;
				height: 22px;
				font-size: 10px;
				}
				.ok, .cancel {
				width:80px;
				float:right;
				margin-left:20px;
				}
				.ok:hover { background: #189CDA; }
				.close:hover, .cancel:hover { background: #D4482D; }
				.clear { float:none; clear: both; }
	  	</style>
	</head>
	<body class="hold-transition skin-green-light sidebar-mini">
		<div class="wrapper">
		  	<header class="main-header">
		    	<!-- Logo -->
		    	<a href="#" class="logo">
		      		<!-- mini logo for sidebar mini 50x50 pixels -->
		      		<span class="logo-mini"><b>M</b>P</span>
		      		<!-- logo for regular state and mobile devices -->
		      		<span class="logo-lg"><b>Mutiara</b> Packaging</span>
		    	</a>
			    <!-- Header Navbar: style can be found in header.less -->
			    <nav class="navbar navbar-static-top">
			     	<!-- Sidebar toggle button-->
		      		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			        	<span class="sr-only">Toggle navigation</span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
		      		</a>

		      		<div class="navbar-custom-menu">
		        		<ul class="nav navbar-nav">
		          			<li class="dropdown user user-menu">
		            			<a href="#">
		              				<span class="hidden-xs"><i class="fa fa-sign-out"> Keluar</i></span>
		            			</a>
					        </li>
		        		</ul>
		      		</div>
		    	</nav>
		  	</header>
		  	<aside class="main-sidebar">
		    	<section class="sidebar">
			      	<ul class="sidebar-menu">
			        	<!-- MENU -->
			        	<li class="header">NAVIGASI ADMIN</li>
			        	<li class="treeview">
					        <a href="../../pengelola/admin/">
					            <i class="fa fa-dashboard"></i>
					            <span>DASHBOARD</span>
					        </a>
					    </li>
					    <li class="header">MANAGEMENT INVENTORI</li>
					    <li class="treeview">
					         <a href="#">
					            <i class="fa fa-cog"></i><span>KONTROL PERSEDIAAN</span>
					            <i class="fa fa-angle-left pull-right"></i>
					         </a>
					         <ul class="treeview-menu">
					            <li><a href="../../kelola/bahanbaku/"><i class="fa fa-cubes"></i> Bahan Baku</a></li>
					            <li><a href="../../kelola/produk/"><i class="fa fa-cube"></i> Produk</a></li>
					            <li>
					            	<a href="../../kelola/aturan_pemesanan/"><i class="fa fa-reorder"></i> Aturan Pemesanan</a>
					            </li>
					         </ul>
				        </li>
				        <li class="treeview">
					         <a href="#">
					            <i class="fa fa-calendar"></i><span>PENGECEKAN</span>
					            <i class="fa fa-angle-left pull-right"></i>
					         </a>
					         <ul class="treeview-menu">
					            <li><a href="../../kelola/cek_pemesanan/"><i class="fa fa-calendar-plus-o"></i> 
					            	Cek Pemesanan</a>
					            </li>
					            <li><a href="../../kelola/cek_stok_bb/"><i class="fa fa-calendar-plus-o"></i> 
					            	Cek Stok Bahan Baku</a>
					            </li>
					         </ul>
				        </li>

				        <li class="header">MANAGEMENT PEMBELIAN</li>
				        <li class="treeview">
					         <a href="#">
					            <i class="fa fa-file-text"></i><span> PEMBELIAN</span>
					            <i class="fa fa-angle-left pull-right"></i>
					         </a>
					         <ul class="treeview-menu">
					            <li><a href="../../kelola/pembelian/"><i class="fa fa-money"></i> Beli Bahan Baku</a></li>
					            <li><a href="../../kelola/bahanbaku_masuk/"><i class="fa fa-cloud-download"></i> Bahan Baku Yang Masuk</a></li>
					         </ul>
				        </li>
				        <li class="treeview">
					        <a href="../../kelola/supplier/">
					            <i class="fa fa-institution"></i>
					            <span>Data Supplier</span>
					        </a>
					    </li>

				        <li class="header">PRODUKSI DAN DISTRIBUSI</li>
					    <li class="treeview">
					         <a href="#">
					            <i class="fa fa-cog"></i><span>MANAGEMENT</span>
					            <i class="fa fa-angle-left pull-right"></i>
					         </a>
					         <ul class="treeview-menu">
					            <li><a href="../../kelola/produksi/"><i class="fa fa-cube"></i> Produksi Produk</a></li>
					            <li>
					            	<a href="../../kelola/aturan_produksi/"><i class="fa fa-reorder"></i> 
					            		Aturan Produksi Produk
					            	</a>
					            </li>
					         </ul>
				        </li>
				        <li class="treeview">
					         <a href="#">
					            <i class="fa fa-calendar"></i><span>JADWAL</span>
					            <i class="fa fa-angle-left pull-right"></i>
					         </a>
					         <ul class="treeview-menu">
					            <li>
					            	<a href="../../kelola/jadwal_produksi/"><i class="fa fa-calendar-plus-o"></i> 
					            		Jadwal Produksi
					            	</a>
					            </li>
					            <li>
					            	<a href="../../kelola/jadwal_distribusi/"><i class="fa fa-calendar-plus-o"></i> 
					            		Jadwal Distribusi
					            	</a>
					            </li>
					         </ul>
				        </li>

				        <li class="header">SALES</li>
					    <li class="treeview">
					         <a href="#">
					            <i class="fa fa-user"></i><span>MANAGEMENT SALES</span>
					            <i class="fa fa-angle-left pull-right"></i>
					         </a>
					         <ul class="treeview-menu">
					            <li><a href="../../kelola/costumer/"><i class="fa fa-users"></i> Data Costumer</a></li>
					            <li>
					            	<a href="../../kelola/sales/"><i class="fa fa-file-text-o"></i> 
					            		Costumer Order 
					            	</a>
					            </li>
					         </ul>
				        </li>
				        
				        <li class="header">LAINNYA</li>
				        <li class="treeview">
					         <a href="#">
					            <i class="fa fa-cogs"></i><span>MANAGEMEN LAINNYA</span>
					            <i class="fa fa-angle-left pull-right"></i>
					         </a>
					         <ul class="treeview-menu">
					            <li><a href="../../kelola/gudang/"><i class="fa fa-institution"></i> Gudang</a></li>
					            <li><a href="../../kelola/ekspedisi/"><i class="fa fa-truck"></i> Logistik/Ekspedisi</a></li>
					         </ul>
				        </li>
			   	 	</ul>
		    	</section>
			</aside>
	<?php
}

function Footer() {
	?>
	</div>
	<!-- Wrapper -->

	<footer class="main-footer">
    	<div class="pull-right hidden-xs">
      		<b></b>
    	</div>
    	<strong>Copyright &copy;<?php echo date('Y'); ?> <a href="#">Mutiara Packaging</a>.</strong>
  	</footer>
		<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
		<!-- jQuery 2.2.0 -->
		<script src="../../gaya/bootstrap/plugins/jQuery/jQuery-2.2.0.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="../../gaya/bootstrap/bootstrap/js/bootstrap.min.js"></script>
		<!-- DataTables -->
		<script src="../../gaya/bootstrap/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="../../gaya/bootstrap/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<!-- Select2 -->
		<script src="../../gaya/bootstrap/plugins/select2/select2.full.min.js"></script>
		<!-- InputMask -->
		<script src="../../gaya/bootstrap/plugins/input-mask/jquery.inputmask.js"></script>
		<script src="../../gaya/bootstrap/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
		<script src="../../gaya/bootstrap/plugins/input-mask/jquery.inputmask.extensions.js"></script>
		<!-- date-range-picker -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
		<script src="../../gaya/bootstrap/plugins/daterangepicker/daterangepicker.js"></script>
		<!-- bootstrap datepicker -->
		<script src="../../gaya/bootstrap/plugins/datepicker/bootstrap-datepicker.js"></script>
		<!-- bootstrap color picker -->
		<script src="../../gaya/bootstrap/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
		<!-- bootstrap time picker -->
		<script src="../../gaya/bootstrap/plugins/timepicker/bootstrap-timepicker.min.js"></script>
		<!-- SlimScroll 1.3.0 -->
		<script src="../../gaya/bootstrap/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- iCheck 1.0.1 -->
		<script src="../../gaya/bootstrap/plugins/iCheck/icheck.min.js"></script>

		<!-- AdminLTE App -->
		<script src="../../gaya/bootstrap/dist/js/app.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="../../gaya/bootstrap/dist/js/demo.js"></script>
		<!-- SweetAlert -->
		<script src="../../gaya/bootstrap/dist/sweet/sweetalert.min.js"></script>
		<!-- JQuery -->
		<script src="../../gaya/bootstrap/dist/js/jquery.min.js"></script>
		<!-- Page script -->
		<script>

			function TambahProduk(){
				$("#tambah_produk").clone(false).insertAfter("#tambah_produk");
			}

		  	$(function () {
		    	//Initialize Select2 Elements
		    	$(".select2").select2();
		    	//Money Euro
		    	$("[data-mask]").inputmask();
		    	//Data Tables
		    	$("#example1").DataTable();
		    	$('#example2').DataTable({
		      		"paging": true,
		      		"lengthChange": false,
		      		"searching": false,
		      		"ordering": true,
		      		"info": true,
		      		"autoWidth": true
		    	});

		    	//Datemask dd/mm/yyyy
    			$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

    			//Date picker
			    $('#datepicker').datepicker({
			      autoclose: true
			    });
		  	});

			function BerhasilMenyimpan(){
				swal({
					title: "",
					text: "Data telah disimpan.",
					timer: 1500,
					type: "success",
					showConfirmButton: false });
			}

			function GagalMenyimpan(){
				swal({
					title: "",
					text: "Data gagal disimpan.",
					timer: 1500,
					type: "error",
					showConfirmButton: false });
			}

			function BerhasilMemperbaharui(){
				swal({
					title: "",
					text: "Data telah diperbaharui.",
					timer: 1500,
					type: "success",
					showConfirmButton: false });
			}

			function BerhasilMengarsipkan(){
				swal({
					title: "",
					text: "Data telah diarsipkan.",
					timer: 1500,
					type: "success",
					showConfirmButton: false });
			}

			function GagalMemperbaharui(){
				swal({
					title: "",
					text: "Data gagal diperbaharui.",
					timer: 1500,
					type: "error",
					showConfirmButton: false });
			}

			function BerhasilMenghapus(){
				swal({
					title: "",
					text: "Data telah dihapus.",
					timer: 1500,
					type: "success",
					showConfirmButton: false });
			}

			function GagalMenghapus(){
				swal({
					title: "",
					text: "Data gagal dihapus.",
					timer: 1500,
					type: "error",
					showConfirmButton: false });
			}

			function MenuBelumTersedia(){
				swal({
					title: "",
					text: "Menu ini belum tersedia.",
					type: "warning",
					showConfirmButton: true });
			}
		</script>
	</body>
	</html>
	<?php
}

function Tanggal($tanggal) {
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$tahun = substr($tanggal, 0, 4);
	$bulan = substr($tanggal, 5, 2);
	$tgl = substr($tanggal, 8, 2);

	$hasil = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
	return ($hasil);
}

function Rupiah($rupiah) {
	//format rupiah
	$jumlah_desimal = "2";
	$pemisah_desimal = ",";
	$pemisah_ribuan = ".";

	$hasil = number_format($rupiah, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);
	return ($hasil);
}
?>