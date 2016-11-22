<?php
	include_once "../assets/koneksi.php";

	if (isset($_POST)) {
		$POST = $_POST;

		$id_artikel = $POST['id_artikel'];
		$isi_komentar = $POST['komentar'];
		$nama = $POST['nama'];

		$SQL = "INSERT INTO tb_komentar(id_komentar, id_artikel, isi_komentar, nama) VALUES('', " .$id_artikel .", '" .$isi_komentar ."', '" .$nama ."')";
		$result = mysql_query($SQL);

		if ($result) {
			echo '<script type="text/javascript">alert("Komentar berhasil diposting");location.href = "../content.php?id=' .$POST['id_artikel'] .'";</script>';
		}
	}
?>