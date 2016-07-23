<?php

/*========================= TAMBAH DATA EKSPEDISI ========================*/
function TambahDataEkspedisi() {
	include '../../koneksi/index.php';

	//inisialisasi
	$nama = $_POST['nama'];

	//insert
	$sql = "INSERT INTO ekspedisi (nama) VALUES(?)";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('s', $nama);
	if ($stmt->execute()) {
		$stmt->insert_id;
		$_SESSION['status_operasi_ekspedisi'] = "berhasil_menyimpan";
	} else {
		$_SESSION['status_operasi_ekspedisi'] = "gagal_menyimpan";
	}
	$stmt->close();
}

/*========================= PERBAHARUI DATA EKSPEDISI ========================*/
function PerbaharuiDataEkspedisi() {
	include '../../koneksi/index.php';

	//inisialisasi
	$nama = $_POST['nama'];
	$id = $_POST['id'];

	//update
	$sql = "UPDATE ekspedisi SET nama = ? WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('si', $nama, $id);
	if ($stmt->execute()) {
		$_SESSION['status_operasi_ekspedisi'] = "berhasil_memperbaharui";
	} else {
		$_SESSION['status_operasi_ekspedisi'] = "gagal_memperbaharui";
	}
	$stmt->close();
}

/*========================= HAPUS DATA EKSPEDISI ========================*/
function HapusDataEkspedisi() {
	include '../../koneksi/index.php';

	//inisialisasi
	$id = $_GET['id'];
	$status_hapus = "0";

	//hapus
	$sql = "UPDATE ekspedisi SET status_hapus = ? WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('si', $status_hapus, $id);
	if ($stmt->execute()) {
		$_SESSION['status_operasi_ekspedisi'] = "berhasil_menghapus";
	} else {
		$_SESSION['status_operasi_ekspedisi'] = "gagal_menghapus";
	}
	$stmt->close();
}
?>
