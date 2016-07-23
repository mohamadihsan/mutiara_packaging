<?php

/*========================= TAMBAH DATA PRODUK ========================*/
function TambahDataProduk() {
	include '../../koneksi/index.php';

	//inisialisasi
	$kode = strtoupper($_POST['kode']);
	$nama = strtoupper($_POST['nama']);
	$harga_jual = $_POST['harga_jual'];
	$stok = $_POST['stok'];

	//insert
	$sql = "INSERT INTO produk (kode, nama, harga_jual, stok) VALUES(?, ?, ?, ?)";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('ssii', $kode, $nama, $harga_jual, $stok);
	if ($stmt->execute()) {
		$stmt->insert_id;
		$_SESSION['status_operasi_produk'] = "berhasil_menyimpan";
	} else {
		$_SESSION['status_operasi_produk'] = "gagal_menyimpan";
	}
	$stmt->close();

	//select produk yang baru saja dimasukkan
	$sql = "SELECT id FROM produk ORDER BY id DESC LIMIT 1";
	$stmt = $db->prepare($sql);
	$stmt->execute();

	$stmt->bind_result($id_produk);
	$stmt->fetch();
	$stmt->close();

	//hitung banyaknya bahan baku
	for($i=0;$i<count($_POST['nama_bahan_baku']);$i++){
    	
    	//inisialisasi
    	$id_bahan_baku[$i] = $_POST['nama_bahan_baku'][$i];

    	//insert bahan baku untuk membuat produk
    	$sql = "INSERT INTO detail_produk (id_produk, id_bahan_baku) VALUES(?, ?)";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('ii', $id_produk, $id_bahan_baku[$i]);
		if ($stmt->execute()) {
			$_SESSION['status_operasi_produk'] = "berhasil_menyimpan";
		} else {
			$_SESSION['status_operasi_produk'] = "gagal_menyimpan";
		}
		$stmt->close();
  	}
}

/*========================= PERBAHARUI DATA PRODUK ========================*/
function PerbaharuiDataProduk() {
	include '../../koneksi/index.php';

	//inisialisasi
	$kode = strtoupper($_POST['kode']);
	$nama = strtoupper($_POST['nama']);
	$harga_jual = $_POST['harga_jual'];
	$stok = $_POST['stok'];
	$id = $_POST['id'];

	//update
	$sql = "UPDATE produk SET kode = ?, nama = ?, harga_jual = ?, stok = ? WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('ssiii', $kode, $nama, $harga_jual, $stok, $id);
	if ($stmt->execute()) {
		$_SESSION['status_operasi_produk'] = "berhasil_memperbaharui";
	} else {
		$_SESSION['status_operasi_produk'] = "gagal_memperbaharui";
	}
	$stmt->close();
}

function PerbaharuiStokProduk() {
	include '../../koneksi/index.php';

	//inisialisasi
	$id = $_POST['nama'];
	$status = $_POST['status'];
	$stok = $_POST['stok'];

	//cek stok 
	$sql = "SELECT stok FROM produk WHERE id=$id AND status_hapus='1'";
	$stmt = $db->prepare($sql);
	$stmt->execute();

	$stmt->bind_result($stok_produk);
	$stmt->fetch();
	$stmt->close();

	if ($status=="tambah") {
		$stok_baru = $stok_produk + $stok;
	}else{
		$stok_baru = $stok_produk - $stok;
	}

	if ($stok_baru>=0) {
		//update
		$sql = "UPDATE produk SET stok = ? WHERE id = ?";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('ii', $stok_baru, $id);
		if ($stmt->execute()) {
			$_SESSION['status_operasi_produk'] = "berhasil_update_stok";
		} else {
			$_SESSION['status_operasi_produk'] = "gagal_update_stok";
		}
		$stmt->close();
	}else{
		$_SESSION['status_operasi_produk'] = "gagal_memperbaharui";
	}
	
}

/*========================= HAPUS DATA PRODUK ========================*/
function HapusDataProduk() {
	include '../../koneksi/index.php';

	//inisialisasi
	$id = $_GET['id'];
	$stok = "0";
	$status_hapus = "0";

	//hapus
	$sql = "UPDATE produk SET stok = ?, status_hapus = ? WHERE id = ?";
	$stmt = $db->prepare($sql);
	$stmt->bind_param('isi', $stok, $status_hapus, $id);
	if ($stmt->execute()) {
		$_SESSION['status_operasi_produk'] = "berhasil_menghapus";
	} else {
		$_SESSION['status_operasi_produk'] = "gagal_menghapus";
	}
	$stmt->close();
}
?>
