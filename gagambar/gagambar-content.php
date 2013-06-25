<?php
/*
Plugin Name: Gagambar
Plugin URI: http://afief.net
Description: Galeri gambar dari featured-image
Version: 0.8
Author: Afief Yona Ramadhana
Author URI: http://afief.net
*/
/*  Copyright 2012  Afief Yona Ramadhana  (email : surat@afief.net)

*/
add_theme_support( 'post-thumbnails' );

$options_page = get_option('siteurl') . '/wp-admin/admin.php?page=gagambar/pengaturan.php';

function tambahPengaturan() {
	add_options_page('Gagambar', 'Gagambar', 8, 'gagambar/pengaturan.php');
}
add_action('admin_menu', 'tambahPengaturan');

?>