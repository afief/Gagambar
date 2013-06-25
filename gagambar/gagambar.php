<?php
	  $cadanganquery = $wp_query;
	  $gagagambar = array();
	  $gaglinkgambar = array();
	  $gagjudulpost = array();
	  
	  $gagpanjang = (get_option('gagwidth'))?get_option('gagwidth'):500;
	  $gagtinggi = (get_option('gagheight'))?get_option('gagheight'):300;
	  $gagkecepatan = (get_option('gagkec'))?get_option('gagkec'):1;
	  $gagktransisi = (get_option('gagtrans'))?get_option('gagtrans'):5;
	  $gagtampilnavigasi = (get_option('gagnav'))?1:0;
	  $gagtampiljudul = (get_option('gagjudul'))?1:0;
	  $gagajgambar = (get_option('gagjmax'))?get_option('gagjmax'):5;
	  query_posts('showposts=-1');

	  if (have_posts()):
	  		$gagi = 0;
	  		while(have_posts()):
	  		the_post();
	  			if (has_post_thumbnail() && ($gagi < $gagajgambar)) {
	  				$urlg = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
	  				if ($urlg[0]) {
	  					array_push($gagagambar, $urlg[0]);
	  					array_push($gaglinkgambar, get_permalink());
	  					array_push($gagjudulpost, get_the_title());
	  				}
	  				$gagi++;
	  			}
	  		endwhile;
	  endif;
	  //echo $gagpanjang . '.' . $gagtinggi . '.' . $gagkecepatan . '.' . $gagktransisi . '.' . $gagtampilnavigasi . '.' . $gagajgambar;
	  ?>


<style type="text/css">
	.gagambar-slider {
		width: <?php echo $gagpanjang ?>px;
		margin: 0px;
	}
	.gagambar-frame {
		width: <?php echo $gagpanjang ?>px;
		height: <?php echo $gagtinggi ?>px;
		margin: 0px auto;
		border: solid 1px #efefef;
		box-shadow: 1px 1px 10px rgba(0,0,0,0.5);
		overflow: hidden;		
	}
	.gagambar-frame .gagjudul {
		position: absolute;
		z-index: 12;
		padding: 10px;
		background-color: rgba(0, 0, 0, 0.2);
		color: rgba(255,255,255,0.5);
		max-width: <?php echo ($gagpanjang-20); ?>px;
		display: <?php if ($gagtampiljudul) { echo 'block'; } else { echo 'none'; } ?>;
	}
	.gagambar-frame .gagjudul:hover {
		background-color: rgba(0, 0, 0, 0.7);
		color: rgba(255,255,255,1);
	}
	.ggambar {
		margin: 0px; padding: 0px;
		position: absolute;
		opacity: 0;
		z-index: 10;
		-webkit-transition: opacity <?php echo $gagkecepatan; ?>s;
		-moz-transition: opacity <?php echo $gagkecepatan; ?>s;
		-o-transition: opacity <?php echo $gagkecepatan; ?>s;
		-ms-transition: opacity <?php echo $gagkecepatan; ?>s;
	}
	.ggambar img {
		width: <?php echo $gagpanjang ?>px;
		height: <?php echo $gagtinggi ?>px;		
	}
	.gagambar-navigasi {
		text-align: center;
		margin-top: 10px;
		display: <?php if ($gagtampilnavigasi) { echo 'block'; } else { echo 'none'; } ?>;
	}
	.gagambar-navigasi a {
		padding: 5px;
		background-color: #eee;
		box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);
		text-transform: lowercase;
		color: #333;
		text-decoration: none;
		font-family: verdana;
		font-size: small;
		cursor: pointer;
	}
	.gagambar-navigasi a:hover {
		background-color: #bdf;
	}
</style>

<script type="text/javascript" >
	var posgambar = 0;
	var jgambar = <?php echo count($gagagambar); ?>;
	var interva = setInterval(lanjut,<?php echo ($gagktransisi * 1000); ?>);
	var kjudul = new String("<?php echo implode('|gag|', $gagjudulpost); ?>");
	var arjudul = kjudul.split('|gag|');
	
	function lanjut() {
		clearInterval(interva);
		interva = setInterval(lanjut,<?php echo ($gagktransisi * 1000); ?>);
		
		var obj = document.getElementById('ggambar'+posgambar);
		obj.style.opacity = 0;
		obj.style.zIndex = 10;
		
		posgambar++;
		if (posgambar == jgambar) posgambar = 0;
		obj = document.getElementById('ggambar'+posgambar);
		obj.style.zIndex = 11;
		obj.style.opacity = 1;
		document.getElementById('gagjudul').innerHTML = arjudul[posgambar];
	}
	function kembali() {
		clearInterval(interva);
		interva = setInterval(lanjut,<?php echo ($gagktransisi * 1000); ?>);
		
		var obj = document.getElementById('ggambar'+posgambar);
		obj.style.opacity = 0;
		obj.style.zIndex = 10;
		
		posgambar--;
		if (posgambar < 0) posgambar = jgambar-1;
		obj = document.getElementById('ggambar'+posgambar);
		obj.style.zIndex = 11;
		obj.style.opacity = 1;
		document.getElementById('gagjudul').innerHTML = arjudul[posgambar];
	}
</script>

	<!-- bagian utama !-->
	<div class="gagambar-slider">
	<div class="gagambar-frame">
		<div class="gagjudul" id="gagjudul"></div>
		<?php
			foreach ($gagagambar as $i => $gambar) {
				?>
				<div class="ggambar" id="ggambar<?php echo $i; ?>">
				<a href="<?php echo $gaglinkgambar[$i]; ?>">
					<img src="<?php echo $gambar; ?>" />
				</a>
				</div>
				<?php
			}
		?>
	</div>
	<div class="gagambar-navigasi">
		<a id="ggbprev" onclick="kembali()">Prev</a>
		<a id="ggbnext" onclick="lanjut()">Next</a>
	</div>
	</div>
	
	<!-- script untuk menampilkan gambar pertama !-->
	<script type="text/javascript" >
	document.getElementById('gagjudul').innerHTML = arjudul[posgambar];
	document.getElementById('ggambar'+posgambar).style.zIndex = 11;
	document.getElementById('ggambar'+posgambar).style.opacity = 1;
	</script>
	
	
<?php
	  $wp_query = $cadanganquery; 
?>