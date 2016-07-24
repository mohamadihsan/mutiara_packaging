<?php
	
	/*========================= TAMBAH DATA PEMBELIAN ========================*/
	function TambahDataPembelian()
	{
		include '../../koneksi/index.php';

		//inisialisasi
		$tanggal = date_create($_POST['tanggal_pembelian']);
		$tanggal_pembelian = date_format($tanggal, "Y-m-d");
		$id_bahan_baku = $_POST['id_bahan_baku'];
		$quantity = $_POST['quantity'];
		$id_supplier = $_POST['id_supplier'];
		$id_gudang = $_POST['id_gudang'];

		//insert 
		$sql = "INSERT INTO pembelian (supplier, tanggal_pembelian, gudang) VALUES(?, ?, ?)";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('isi', $id_supplier, $tanggal_pembelian, $id_gudang);
		if($stmt->execute()){
			$stmt->insert_id;
			$_SESSION['status_operasi_pembelian'] = "berhasil_menyimpan";
		}else{
			$_SESSION['status_operasi_pembelian'] = "gagal_menyimpan";
		}
		$stmt->close();

		$sql = "SELECT id FROM pembelian ORDER BY id DESC LIMIT 1";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($id_pembelian);
		$stmt->fetch();
		$stmt->close();

		for($i=0;$i<count($id_bahan_baku);$i++){
			//insert 
			$sql = "INSERT INTO detail_pembelian (id_pembelian, id_bahan_baku, quantity) VALUES(?, ?, ?)";
			$stmt = $db->prepare($sql);
			$stmt->bind_param('iii', $id_pembelian, $id_bahan_baku[$i], $quantity[$i]);
			if($stmt->execute()){
				$_SESSION['status_operasi_pembelian'] = "berhasil_menyimpan";
			}else{
				$_SESSION['status_operasi_pembelian'] = "gagal_menyimpan";
			}
			$stmt->close();
		}

		/*//select id trx
		$sql = "SELECT id_transaksi FROM transaksi ORDER BY id_transaksi DESC LIMIT 1";
		$stmt = $db->prepare($sql);
		$stmt->execute();

		$stmt->bind_result($id_transaksi);
		$stmt->fetch();
		$stmt->close();

		//select data produk
		$sql = "SELECT detail_transaksi.id_transaksi, detail_transaksi.id_produk, jumlah_beli, nama_garansi, telp_garansi, nama_produk, kode_produk, harga FROM detail_transaksi, transaksi, produk WHERE detail_transaksi.id_transaksi='$id_transaksi' AND transaksi.id_transaksi=detail_transaksi.id_transaksi AND detail_transaksi.id_produk=produk.id_produk";
		$stmt = $db->prepare($sql);
		$stmt->execute();

		$stmt->bind_result($id_transaksi, $id_produk, $jumlah_beli, $nama_garansi, $telp_garansi, $nama_produk, $kode_produk, $harga);

		$total_bayar = 0;

		while ($stmt->fetch()) {
			$total_bayar = $total_bayar + ($harga*$jumlah_beli);
		}

		$_SESSION['total_bayar'] = $total_bayar;
		$stmt->close();	

		//Update Transaksi
		$status_transaksi = "L";

		$sql = "UPDATE transaksi SET status_transaksi = ?, total_bayar = ? WHERE id_transaksi = ?";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('sii', $status_transaksi, $total_bayar, $id_transaksi);
		if($stmt->execute()){
			$_SESSION['status_operasi_tr'] = "berhasil_update_total_bayar";
		}else{
			$_SESSION['status_operasi_tr'] = "gagal_update_total_bayar";
		}
		$stmt->close(); 

		//update poin pelanggan
		if ($member=="M") {

			$sql = "SELECT id_pelanggan, poin FROM pelanggan WHERE nama='$username'";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$stmt->bind_result($id_pelanggan, $poin_pelanggan);
			$stmt->fetch();
			$stmt->close();

			//perhitungan poin
			$temp_poin = $total_bayar / 100000;
			$poin = $poin_pelanggan + $temp_poin;

			$sql = "UPDATE pelanggan SET poin = ? WHERE id_pelanggan = ?";
			$stmt = $db->prepare($sql);
			$stmt->bind_param('ii', $poin, $id_pelanggan);
			$stmt->execute();
			$stmt->close();
		}*/
	}

	/*========================= EDIT DATA PEMBELIAN ========================*/
	function EditDataPembelian()
	{
		include '../../koneksi/index.php';

		//inisialisasi
		/*$nama_kategori = $_POST['nama_kategori'];
		$id_kategori_produk = $_POST['id_kategori'];

		//update ke tabel pegawai
		$sql = "UPDATE kategori_produk SET nama_kategori = ? WHERE id_kategori = ?";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('si', $nama_kategori, $id_kategori_produk);
		if($stmt->execute()){
			$_SESSION['status_operasi_tr'] = "berhasil_memperbaharui";
		}else{
			$_SESSION['status_operasi_tr'] = "gagal_memperbaharui";
		}
		$stmt->close();*/
	}

	function UpdateStatusPembelian()
	{
		include '../../koneksi/index.php';

		//inisialisasi
		if (isset($_GET['dikirim'])) {
			$id = $_GET['dikirim'];
			$status_pembelian = 0;
		}if (isset($_GET['sudah_dibayar'])) {
			$id = $_GET['sudah_dibayar'];
			$status_pembelian = 1;
		}else if (isset($_GET['selesai'])) {
			$id = $_GET['selesai'];
			$status_pembelian = 2;
		}

		//update 
		$sql = "UPDATE pembelian SET status_pembelian = ? WHERE id = ?";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('si', $status_pembelian, $id);
		if($stmt->execute()){
			$_SESSION['status_operasi_pembelian'] = "berhasil_memperbaharui";
		}else{
			$_SESSION['status_operasi_pembelian'] = "gagal_memperbaharui";
		}
		$stmt->close();
	}

	function Arsipkan()
	{
		include '../../koneksi/index.php';

		//inisialisasi
		$arsip = 1;
		$id = $_GET['id'];

		//update 
		$sql = "UPDATE pembelian SET arsipkan = ? WHERE id = ?";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('ii', $arsip, $id);
		if($stmt->execute()){
			$_SESSION['status_operasi_bahan_baku_masuk'] = "berhasil_mengarsipkan";
		}else{
			$_SESSION['status_operasi_bahan_baku_masuk'] = "gagal_mengarsipkan";
		}
		$stmt->close();
	}

	/*========================= HAPUS DATA PEMBELIAN ========================*/
	function BatalkanPembelian()
	{
		include '../../koneksi/index.php';

		//inisialisasi
		$id = $_GET['id'];

		//hapus 
		$sql = "DELETE FROM pembelian WHERE id = ?";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('i', $id);
		if($stmt->execute()){
			$_SESSION['status_operasi_pembelian'] = "berhasil_menghapus";
		}else{
			$_SESSION['status_operasi_pembelian'] = "gagal_menghapus";
		}
		$stmt->close();
	}
?>
