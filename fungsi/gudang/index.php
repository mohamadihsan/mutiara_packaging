<?php

/*========================= TAMBAH DATA GUDANG ========================*/
function TambahDataGudang() {
	include '../../koneksi/index.php';

	//inisialisasi
	$nama = $_POST['nama'];
	$no_telp = $_POST['no_telp'];
	$alamat = $_POST['alamat'];

	//insert
	$sql = "INSERT INTO gudang (nama, no_telp, alamat) VALUES(?, ?, ?)";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('sss', $nama, $no_telp, $alamat);
	if ($stmt->execute()) {
		$stmt->insert_id;
		$_SESSION['status_operasi_gudang'] = "berhasil_menyimpan";
	} else {
		$_SESSION['status_operasi_gudang'] = "gagal_menyimpan";
	}
	$stmt->close();
}

/*========================= PERBAHARUI DATA GUDANG ========================*/
function PerbaharuiDataGudang() {
	include '../../koneksi/index.php';

	//inisialisasi
	$nama = $_POST['nama'];
	$no_telp = $_POST['no_telp'];
	$alamat = $_POST['alamat'];
	$id = $_POST['id'];

	//update
	$sql = "UPDATE gudang SET nama = ?, no_telp = ?, alamat = ? WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('sssi', $nama, $no_telp, $alamat, $id);
	if ($stmt->execute()) {
		$_SESSION['status_operasi_gudang'] = "berhasil_memperbaharui";
	} else {
		$_SESSION['status_operasi_gudang'] = "gagal_memperbaharui";
	}
	$stmt->close();
}

/*========================= HAPUS DATA GUDANG ========================*/
function HapusDataGudang() {
	include '../../koneksi/index.php';

	//inisialisasi
	$id = $_GET['id'];
	$status_hapus = "0";

	//hapus
	$sql = "UPDATE gudang SET status_hapus = ? WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('si', $status_hapus, $id);
	if ($stmt->execute()) {
		$_SESSION['status_operasi_gudang'] = "berhasil_menghapus";
	} else {
		$_SESSION['status_operasi_gudang'] = "gagal_menghapus";
	}
	$stmt->close();
}
?>
