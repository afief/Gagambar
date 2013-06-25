<?php
$location = $options_page; 
?>

<style type="text/css">
	.gag label {
		display: block;
		width: 250px;
		float: left;
	}
	.gag code {
		padding: 5px;
	}
	.gag input[type=number] {
		width: 50px;
	}
</style>

<div class="wrap">
	<h2>Pengaturan Plugin Gagambar</h2>
    
        <form method="post" action="options.php" class="gag">
        
			<?php wp_nonce_field('update-options'); ?>

        	Tambahkan kode berikut ini pada bagian tema yang akan diberi slideshow gagambar :<br /><br />
       	<code>&lt;&#63;php include (ABSPATH . '/wp-content/plugins/gagambar/gagambar.php'); &#63;&#62;</code>
			<br /><br />        
      
      <h3>Pengaturan Gagambar :</h3>

        	<label>Jumlah maksimal gambar yang ditampilkan</label> : 
        	<input type="number" name="gagjmax" id="gagjmax" value="<?php echo (get_option('gagjmax'))?get_option('gagjmax'):5; ?>" />
        	
			<br />
	      <label>Panjang ukuran slideshow</label> : 
        	<input type="number" name="gagwidth" id="gagwidth" value="<?php echo (get_option('gagwidth'))?get_option('gagwidth'):500; ?>" />
        	<i>px</i>
        	
			<br />
	      <label>Lebar ukuran slideshow</label> : 
	      <input type="number" name="gagheight" id="gagheight" value="<?php echo (get_option('gagheight'))?get_option('gagheight'):300; ?>" />
	      <i>px</i>
	      
        	<br />
        	<label>Kecepatan Efek</label> : 
        	<input type="number" name="gagkec" id="gagkec" value="<?php echo (get_option('gagkec'))?get_option('gagkec'):1; ?>" />
        	<i>detik</i> 
        	<br />
        	
        	<label>Kecepatan Transisi</label> : 
        	<input type="number" name="gagtrans" id="gagtrans" value="<?php echo (get_option('gagtrans'))?get_option('gagtrans'):5; ?>" />
        	<i>detik</i> 
        	<br /><br />
        	
        	<label>Tampilkan Navigasi</label> : 
        	<input type="checkbox" id="gagnav" name="gagnav" <?php echo (get_option('gagnav'))?'checked':''; ?> />
        	<br />
        	
        	<label>Tampilkan Judul Postingan</label> : 
        	<input type="checkbox" id="gagjudul" name="gagjudul" <?php echo (get_option('gagjudul'))?'checked':''; ?> />	

                        
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="gagjmax,gagwidth,gagheight,gagkec,gagtrans,gagnav,gagjudul" />
      <br /><br />  
		  Informasi lebih lanjut, kunjungi <a href="http://afief.net" target="_blank">http://afief.net/</a>
		<br /><br />
		<input type="submit" name="Submit" value="<?php _e('Update Pengaturan') ?>" />

	</form>      
</div>