<?php
/**
 * Registering meta boxes
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'k_';

global $meta_boxes;

$meta_boxes = array();


// BERITA meta box
$meta_boxes[] = array(
	'title' => 'Detail Berita',
	'pages' => array( 'post' ),
	'fields' => array(
		// URL Foto
		array(
			'name'  => 'Foto',
			'id'    => "{$prefix}berita_foto",
			'desc'  => 'Upload foto berita jika ada. <span style="color:red">Upload hanya 1 foto</span>, jika lebih akan terjadi error dan foto tidak akan tampil.',
			'type'  => 'thickbox_image',
		)
	)
);


// banner meta box
$meta_boxes[] = array(
	'title' => 'Detail Banner',
	'pages' => array( 'banner' ),
	'fields' => array(
		// URL Foto
		array(
			'name'  => 'Banner',
			'id'    => "{$prefix}banner",
			'desc'  => 'Upload foto banner untuk ditampilkan pada slide homepage. <span style="color:red">Upload hanya 1 banner</span>, jika lebih akan terjadi error dan banner tidak akan tampil.',
			'type'  => 'thickbox_image',
		)
	)
);


// PROFIL meta box
$meta_boxes[] = array(
	'title' => 'Biodata <em>(Bagian ini hanya untuk halaman Profil)</em>',
	'pages' => array( 'page' ),
	'fields' => array(
		// Foto Profil
		array(
			'name' => 'Foto Profil',
			'id'   => "{$prefix}foto_profil",
			'desc' => 'Masukkan foto yang akan ditampilkan di halaman PROFIL.<br><strong>CATATAN : </strong>Field ini hanya dipakai untuk halaman Profil.',
			'type'  => 'plupload_image',
			'max_file_uploads'   => 1,
		),
		// URL Foto
		array(
			'name'  => 'Biodata',
			'id'    => "{$prefix}biodata",
			'desc'  => 'Masukkan profil lengkap Khalifah Umroh & Tour.<br><strong>CATATAN : </strong>Field ini hanya dipakai untuk halaman Profil.',
			'type'  => 'wysiwyg',
		)
	)
);


// GALLERY meta box
$meta_boxes[] = array(
	'title' => 'Detail Gallery',
	'pages' => array( 'gallery' ),
	'fields' => array(
		// Cover Album
		array(
			'name' => 'Cover Album',
			'id'   => "{$prefix}gallery_cover",
			'desc' => 'Masukkan foto yang akan dijadikan cover album/galeri',
			'type'  => 'plupload_image',
			'max_file_uploads'   => 1,
		),
		// Foto
		array(
			'name' => 'Foto',
			'id'   => "{$prefix}gallery_foto",
			'desc' => 'Masukkan foto-foto yang akan ditampilkan di album ini.',
			'type'  => 'plupload_image',
		)
	)
);





/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function k_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
add_action( 'admin_init', 'k_register_meta_boxes' );