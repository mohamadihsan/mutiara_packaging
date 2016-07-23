<?php

/*========================= TAMBAH DATA COSTUMER ========================*/
function TambahDataCostumer() {
	include '../../koneksi/index.php';

	//inisialisasi
	$nama = strtoupper($_POST['nama']);
	$no_telp = $_POST['no_telp'];
	$fax = $_POST['fax'];
	$email = $_POST['email'];
	$website = $_POST['website'];
	$alamat = $_POST['alamat'];

	//insert
	$sql = "INSERT INTO costumer (nama, no_telp, fax, email, website, alamat) VALUES(?, ?, ?, ?, ?, ?)";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('ssssss', $nama, $no_telp, $fax, $email, $website, $alamat);
	if ($stmt->execute()) {
		$stmt->insert_id;
		$_SESSION['status_operasi_costumer'] = "berhasil_menyimpan";
	} else {
		$_SESSION['status_operasi_costumer'] = "gagal_menyimpan";
	}
	$stmt->close();
}

/*========================= PERBAHARUI DATA COSTUMER ========================*/
function PerbaharuiDataCostumer() {
	include '../../koneksi/index.php';

	//inisialisasi
	$nama = strtoupper($_POST['nama']);
	$no_telp = $_POST['no_telp'];
	$fax = $_POST['fax'];
	$email = $_POST['email'];
	$website = $_POST['website'];
	$alamat = $_POST['alamat'];
	$id = $_POST['id'];

	//update
	$sql = "UPDATE costumer SET nama = ?, no_telp = ?, fax = ?, email = ?, website = ?, alamat = ? WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('ssssssi', $nama, $no_telp, $fax, $email, $website, $alamat, $id);
	if ($stmt->execute()) {
		$_SESSION['status_operasi_costumer'] = "berhasil_memperbaharui";
	} else {
		$_SESSION['status_operasi_costumer'] = "gagal_memperbaharui";
	}
	$stmt->close();
}

/*========================= HAPUS DATA COSTUMER ========================*/
function HapusDataCostumer() {
	include '../../koneksi/index.php';

	//inisialisasi
	$id = $_GET['id'];
	$status_hapus = "0";

	//hapus
	$sql = "UPDATE costumer SET status_hapus = ? WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('si', $status_hapus, $id);
	if ($stmt->execute()) {
		$_SESSION['status_operasi_costumer'] = "berhasil_menghapus";
	} else {
		$_SESSION['status_operasi_costumer'] = "gagal_menghapus";
	}
	$stmt->close();
}
?>
