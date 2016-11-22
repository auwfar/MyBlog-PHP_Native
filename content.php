<?php include '_layout/header.php'; ?>

		<section id="content">
			<div class="container">
				<section id="mainbar">
					<?php
						$SQL = 'SELECT
									tb_artikel.*, tb_kategori.nama_kategori
								FROM
									tb_artikel, tb_kategori
								WHERE 
									tb_artikel.id_kategori = tb_kategori.id_kategori AND
									tb_artikel.id_artikel = ' .$_GET['id'];
						$result = mysql_query($SQL);
						$data = mysql_fetch_array($result);

						$tanggal = explode('-', $data['tgl_upload']);
						if ($tanggal[1] == 1) {
							$bulan = 'Januari';
						} elseif ($tanggal[1] == 2) {
							$bulan = 'Februari';
						} elseif ($tanggal[1] == 3) {
							$bulan = 'Maret';
						} elseif ($tanggal[1] == 4) {
							$bulan = 'April';
						} elseif ($tanggal[1] == 5) {
							$bulan = 'Mei';
						} elseif ($tanggal[1] == 6) {
							$bulan = 'Juni';
						} elseif ($tanggal[1] == 7) {
							$bulan = 'Juli';
						} elseif ($tanggal[1] == 8) {
							$bulan = 'Agustus';
						} elseif ($tanggal[1] == 9) {
							$bulan = 'September';
						} elseif ($tanggal[1] == 10) {
							$bulan = 'Oktober';
						} elseif ($tanggal[1] == 11) {
							$bulan = 'November';
						} elseif ($tanggal[1] == 12) {
							$bulan = 'Desember';
						}

						$tanggal_lengkap = $tanggal[2] .' ' .$bulan .' ' .$tanggal[0];


						//Tambah View
						$jumlah_view = $data['jumlah_view'] + 1;
						$SQL_view = "UPDATE tb_artikel SET jumlah_view = " .$jumlah_view ." WHERE id_artikel = " .$_GET['id'];
						$result_view = mysql_query($SQL_view);
					?>
					<div class="article-wrapper">
						<div class="article-title">
							<h2><?php echo $data['judul_artikel']; ?></h2>
						</div>
						<div class="article-meta">
							<?php echo $tanggal_lengkap; ?> <span><?php echo $data['nama_kategori']; ?></span><span>DIlihat <?php echo $jumlah_view; ?> x</span>
						</div>
						<div class="article-content">
							<img <?php echo 'src="assets/img/' .$data['gambar_artikel'] .'"'; ?>>
							<p>
								<?php echo $data['isi_artikel']; ?>
							</p>
						</div>
					</div>
					<div class="comments-wrapper">
						<?php
							$SQL_comments = 'SELECT * FROM tb_komentar WHERE id_artikel = ' .$_GET['id'];
							$result_comments = mysql_query($SQL_comments);
							$jumlah_comments = mysql_num_rows($result_comments);
						?>

						<h3 class="comments-title">
							Comments <span><?php echo $jumlah_comments; ?></span>
						</h3>
						<div class="comments-contents">
							<?php
								if ($jumlah_comments != 0) {
									while ($data_comments = mysql_fetch_array($result_comments)) {
									?>
									<div class="comments-views">
										<div class="comments-name">
											<span><?php echo $data_comments['nama']; ?></span>
										</div>
										<div class="comments-contents-user">
											<?php echo $data_comments['isi_komentar']; ?>
										</div>
									</div>
									<?php
									}
								}
							?>
							<div class="comments-form">
								<h3 class="comments-form-title">
									Add Your Comments
								</h3>
								<div class="comments-form-contents">
									<form action="process/add_comment.php" method="POST">
										<div class="comments-form-left">
											<table>
												<tr>
													<td>Komentar</td>
												</tr>
												<tr>
													<td>
														<textarea name="komentar" rows="10" required="required"></textarea>
													</td>
												</tr>
											</table>
										</div>
										<div class="comments-form-right">
											<table>
												<tr>
													<td>Nama</td>
												</tr>
												<tr>
													<td style="vertical-align: top;">
														<input type="text" name="nama" required="required">
														<input type="hidden" name="id_artikel" <?php echo 'value="' .$_GET['id'] .'"'; ?>>
													</td>
												</tr>
												<tr>
													<td>
														<input type="submit" name="submit" value="Submit">
													</td>
												</tr>
											</table>
										</div>
										<div class="clearfix"></div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
				<?php include '_layout/sidebar.php'; ?>
			</div>
		</section>
		<div class="clearfix"></div>

<?php include '_layout/footer.php'; ?>