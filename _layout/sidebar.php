				<section id="sidebar">
					<?php
						if (isset($data['id_author'])) {
							?>
							<div class="module">
						        <h3 class="module-title">
						            Author
						        </h3>
						        <div class="module-content">
						        	<?php
						        		$SQL_author = "SELECT
						        							*
						        						FROM
						        							tb_author
						        						WHERE
						        							id_author = " .$data['id_author'];
						        		$result_author = mysql_query($SQL_author);
						        		$data_author = mysql_fetch_array($result_author);
						        	?>
						        	<div class="module-profile">
							        	<img src="assets/img/<?php echo $data_author['foto']; ?>" alt="">
							        	<div class="module-profile-content">
								            <h3><?php echo $data_author['nama']; ?></h3>
								            <p>
								                <?php echo $data_author['deskripsi']; ?>
								            </p>
							        	</div>
						        	</div>
						        </div>
						    </div>
							<?php
						}
					?>

				    <div class="module">
				        <h3 class="module-title">
				            Latest News
				        </h3>
				        <div class="module-content">
				        	<?php
				        		$SQL_news = "SELECT * FROM tb_artikel ORDER BY tgl_upload DESC, id_artikel DESC";
				        		$result_news = mysql_query($SQL_news);
				        	?>
				            <ul>
				            	<?php
				            	while ($data_news = mysql_fetch_array($result_news)) {
				            		?>
						                <li><a href="content.php?id=<?php echo $data_news['id_artikel']; ?>"><?php echo $data_news['judul_artikel']; ?></a></li>
				            		<?php
				            	}
				            	?>
				            </ul>
				        </div>
				    </div>

				    <div class="module">
				    	<?php 
				    		$SQL_popular = "SELECT * FROM tb_artikel ORDER BY jumlah_view DESC";
				    		$result_popular = mysql_query($SQL_popular);
				    		$data_popular = mysql_fetch_array($result_popular);
				    	?>

				        <h3 class="module-title">
				            Popular News
				        </h3>
				        <div class="module-content">
				        	<a href="content.php?id=<?php echo $data_popular['id_artikel']; ?>">
					        	<div class="module-popular">
						        	<img src="assets/img/<?php echo $data_popular['gambar_artikel']; ?>" alt="">
						        	<div class="module-popular-content">
							            <h3><?php echo $data_popular['judul_artikel']; ?></h3>
							            <p>
							                <?php echo substr($data_popular['isi_artikel'], 0, 180) .'...'; ?>
							            </p>
						        	</div>
					        	</div>
				        	</a>
				        </div>
				    </div>
				</section>
				<div class="clearfix"></div>