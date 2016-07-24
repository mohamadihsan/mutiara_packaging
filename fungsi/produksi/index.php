<?php
	
	/*========================= TAMBAH DATA PRODUKSI ========================*/
	function TambahDataProduksi()
	{
		include '../../koneksi/index.php';

		//inisialisasi
		$tanggal = date_create($_POST['tanggal']);
		$tanggal_produksi = date_format($tanggal, "Y-m-d");
		$produk = $_POST['nama'];
		$quantity = $_POST['quantity'];

		//insert 
		$sql = "INSERT INTO produksi (produk, quantity, tanggal_produksi) VALUES(?, ?, ?)";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('iis', $produk, $quantity, $tanggal_produksi);
		if($stmt->execute()){
			$stmt->insert_id;
			$_SESSION['status_operasi_produksi'] = "berhasil_menyimpan";
		}else{
			$_SESSION['status_operasi_produksi'] = "gagal_menyimpan";
		}
		$stmt->close();
	}

	/*========================= EDIT DATA PRODUKSI ========================*/
	function ProduksiSelesai()
	{
		include '../../koneksi/index.php';

		//inisialisasi
		$status_produksi = 1;
		$id = $_GET['id_produksi'];
		$id_produk = $_GET['id_produk'];
		$quantity_produksi = $_GET['qty'];
		$arsip = 1;

		$sql = "SELECT bahan_baku.id, bahan_baku.stok FROM bahan_baku, detail_produk, produk WHERE bahan_baku.id=detail_produk.id_bahan_baku AND detail_produk.id_produk=produk.id AND produk.id=$id_produk AND bahan_baku.status_hapus='1'";
		$result = mysqli_query($db, $sql);
		$i=0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$id_bb[$i] = $row['id'];
			$stok_bb[$i] = $row['stok'];

			$stok_baru[$i] = $stok_bb[$i] - $quantity_produksi;

			if ($stok_bb[$i] < $quantity_produksi) {
				$_SESSION['status_operasi_produksi'] = "gagal_mengarsipkan";
			}else{
				//update 
				$sql = "UPDATE bahan_baku SET stok = ? WHERE id = ?";
				$stmt = $db->prepare($sql);
				$stmt->bind_param('ii', $stok_baru[$i], $id_bb[$i]);
				if($stmt->execute()){
					$_SESSION['status_operasi_produksi'] = "berhasil_menyimpan";
				}else{
					$_SESSION['status_operasi_produksi'] = "gagal_menyimpan";
				}
				$stmt->close();
			}	
			$i++;
		}	

		$sql = "SELECT id, stok FROM produk WHERE id=$id_produk AND status_hapus='1'";
		$result = mysqli_query($db, $sql);
		$i=0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$id_pr[$i] = $row['id'];
			$stok_pr[$i] = $row['stok'];

			$stok_produk_baru[$i] = $stok_pr[$i] + $quantity_produksi;

			//update 
			$sql = "UPDATE produk SET stok = ? WHERE id = ?";
			$stmt = $db->prepare($sql);
			$stmt->bind_param('ii', $stok_produk_baru[$i], $id_pr[$i]);
			if($stmt->execute()){
				$_SESSION['status_operasi_produksi'] = "berhasil_menyimpan";
			}else{
				$_SESSION['status_operasi_produksi'] = "gagal_menyimpan";
			}
			$stmt->close();

			$i++;
		}	

		//update 
		$sql = "UPDATE produksi SET arsipkan = ? WHERE id_produksi = ?";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('si', $arsip, $id);
		if($stmt->execute()){
			$_SESSION['status_operasi_produksi'] = "berhasil_menyimpan";
		}else{
			$_SESSION['status_operasi_produksi'] = "berhasil_menyimpan";
		}
		$stmt->close();
	}

	function UpdateStatusProduksi()
	{
		include '../../koneksi/index.php';

		//inisialisasi
		if (isset($_GET['tunggu'])) {
			$id = $_GET['tunggu'];
			$status_produksi = 0;
		}if (isset($_GET['proses'])) {
			$id = $_GET['proses'];
			$status_produksi = 1;
		}else if (isset($_GET['selesai'])) {
			$id = $_GET['selesai'];
			$status_produksi = 2;
		}

		//update 
		$sql = "UPDATE produksi SET status_produksi = ? WHERE id_produksi = ?";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('si', $status_produksi, $id);
		if($stmt->execute()){
			$_SESSION['status_operasi_produksi'] = "berhasil_memperbaharui";
		}else{
			$_SESSION['status_operasi_produksi'] = "gagal_memperbaharui";
		}
		$stmt->close();
	}

	/*========================= HAPUS DATA PRODUKSI ========================*/
	function BatalkanProduksi()
	{
		include '../../koneksi/index.php';

		//inisialisasi
		$id = $_GET['id'];

		//hapus 
		$sql = "DELETE FROM produksi WHERE id_produksi = ?";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('i', $id);
		if($stmt->execute()){
			$_SESSION['status_operasi_produksi'] = "berhasil_menghapus";
		}else{
			$_SESSION['status_operasi_produksi'] = "gagal_menghapus";
		}
		$stmt->close();
	}
?>
