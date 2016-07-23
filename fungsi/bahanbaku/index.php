<?php

/*========================= TAMBAH DATA BAHAN BAKU ========================*/
function TambahDataBahanBaku() {
	include '../../koneksi/index.php';

	//inisialisasi
	$kode = strtoupper($_POST['kode']);
	$nama = strtoupper($_POST['nama']);
	$harga_beli = $_POST['harga_beli'];
	$harga_jual = $_POST['harga_jual'];
	$stok = $_POST['stok'];

	//insert
	$sql = "INSERT INTO bahan_baku (kode, nama, harga_beli, harga_jual, stok) VALUES(?, ?, ?, ?, ?)";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('ssiii', $kode, $nama, $harga_beli, $harga_jual, $stok);
	if ($stmt->execute()) {
		$stmt->insert_id;
		$_SESSION['status_operasi_bahan_baku'] = "berhasil_menyimpan";
	} else {
		$_SESSION['status_operasi_bahan_baku'] = "gagal_menyimpan";
	}
	$stmt->close();
}

/*========================= PERBAHARUI DATA BAHAN BAKU ========================*/
function PerbaharuiDataBahanBaku() {
	include '../../koneksi/index.php';

	//inisialisasi
	$kode = strtoupper($_POST['kode']);
	$nama = strtoupper($_POST['nama']);
	$harga_beli = $_POST['harga_beli'];
	$harga_jual = $_POST['harga_jual'];
	$stok = $_POST['stok'];
	$id = $_POST['id'];

	//update
	$sql = "UPDATE bahan_baku SET kode = ?, nama = ?, harga_beli = ?, harga_jual = ?, stok = ? WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('ssiiii', $kode, $nama, $harga_beli, $harga_jual, $stok, $id);
	if ($stmt->execute()) {
		$_SESSION['status_operasi_bahan_baku'] = "berhasil_memperbaharui";
	} else {
		$_SESSION['status_operasi_bahan_baku'] = "gagal_memperbaharui";
	}
	$stmt->close();
}

function PerbaharuiStokBahanBaku() {
	include '../../koneksi/index.php';

	//inisialisasi
	$id = $_POST['nama'];
	$status = $_POST['status'];
	$stok = $_POST['stok'];

	//cek stok 
	$sql = "SELECT stok FROM bahan_baku WHERE id=$id AND status_hapus='1'";
	$stmt = $db->prepare($sql);
	$stmt->execute();

	$stmt->bind_result($stok_bb);
	$stmt->fetch();
	$stmt->close();

	if ($status=="tambah") {
		$stok_baru = $stok_bb + $stok;
	}else{
		$stok_baru = $stok_bb - $stok;
	}

	if ($stok_baru>=0) {
		//update
		$sql = "UPDATE bahan_baku SET stok = ? WHERE id = ?";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('ii', $stok_baru, $id);
		if ($stmt->execute()) {
			$_SESSION['status_operasi_bahan_baku'] = "berhasil_update_stok";
		} else {
			$_SESSION['status_operasi_bahan_baku'] = "gagal_update_stok";
		}
		$stmt->close();
	}else{
		$_SESSION['status_operasi_bahan_baku'] = "gagal_memperbaharui";
	}
	
}

/*========================= HAPUS DATA BAHAN BAKU ========================*/
function HapusDataBahanBaku() {
	include '../../koneksi/index.php';

	//inisialisasi
	$id = $_GET['id'];
	$stok = "0";
	$status_hapus = "0";

	//hapus
	$sql = "UPDATE bahan_baku SET stok = ?, status_hapus = ? WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('isi', $stok, $status_hapus, $id);
	if ($stmt->execute()) {
		$_SESSION['status_operasi_bahan_baku'] = "berhasil_menghapus";
	} else {
		$_SESSION['status_operasi_bahan_baku'] = "gagal_menghapus";
	}
	$stmt->close();
}
?>
