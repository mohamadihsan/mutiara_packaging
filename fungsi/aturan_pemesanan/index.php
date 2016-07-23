<?php

/*========================= TAMBAH ATURAN PEMESANAN ========================*/
function TambahAturanPemesanan() {
	include '../../koneksi/index.php';

	//inisialisasi
	$id = $_POST['nama'];
	$minimal_quantity = $_POST['minimal_quantity'];
	$maksimal_quantity = $_POST['maksimal_quantity'];
	$waktu_tunggu = $_POST['waktu_tunggu'];
	$lokasi_penyimpanan = $_POST['lokasi_penyimpanan'];

	if (($waktu_tunggu == null)OR($waktu_tunggu == 0)) {
		$waktu_tunggu = null;
	}
	if ($minimal_quantity == null) {
		$minimal_quantity = null;
	}
	if ($maksimal_quantity == null) {
		$maksimal_quantity = null;
	}
	if ($lokasi_penyimpanan == "0") {
		$lokasi_penyimpanan = null;
	}

	//insert
	$sql = "UPDATE bahan_baku SET minimal_quantity = ?, maksimal_quantity = ?, waktu_tunggu = ?, lokasi_penyimpanan = ? WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('iiiii', $minimal_quantity, $maksimal_quantity, $waktu_tunggu, $lokasi_penyimpanan, $id);
	if ($stmt->execute()) {
		$_SESSION['status_operasi_aturan_pemesanan'] = "berhasil_menyimpan";
	} else {
		$_SESSION['status_operasi_aturan_pemesanan'] = "gagal_menyimpan";
	}
	$stmt->close();;
}

/*========================= PERBAHARUI ATURAN PEMESANAN ========================*/
function PerbaharuiAturanPemesanan() {
	include '../../koneksi/index.php';

	//inisialisasi
	$id = $_POST['nama'];
	$minimal_quantity = $_POST['minimal_quantity'];
	$maksimal_quantity = $_POST['maksimal_quantity'];
	$waktu_tunggu = $_POST['waktu_tunggu'];
	$lokasi_penyimpanan = $_POST['lokasi_penyimpanan'];

	//update
	$sql = "UPDATE bahan_baku SET minimal_quantity = ?, maksimal_quantity = ?, waktu_tunggu = ?, lokasi_penyimpanan = ? WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('iiiii', $minimal_quantity, $maksimal_quantity, $waktu_tunggu, $lokasi_penyimpanan, $id);
	if ($stmt->execute()) {
		$_SESSION['status_operasi_aturan_pemesanan'] = "berhasil_memperbaharui";
	} else {
		$_SESSION['status_operasi_aturan_pemesanan'] = "gagal_memperbaharui";
	}
	$stmt->close();
}

/*========================= HAPUS ATURAN PEMESANAN ========================*/
function HapusAturanPemesanan() {
	include '../../koneksi/index.php';

	//inisialisasi
	$id = $_GET['id'];
	$minimal_quantity = null;
	$maksimal_quantity = null;
	$lokasi_penyimpanan = null;

	//hapus
	$sql = "UPDATE bahan_baku SET minimal_quantity = ?, maksimal_quantity = ?, lokasi_penyimpanan = ? WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('iiii', $minimal_quantity, $maksimal_quantity, $lokasi_penyimpanan, $id);
	if ($stmt->execute()) {
		$_SESSION['status_operasi_aturan_pemesanan'] = "berhasil_menghapus";
	} else {
		$_SESSION['status_operasi_aturan_pemesanan'] = "gagal_menghapus";
	}
	$stmt->close();
}
?>
