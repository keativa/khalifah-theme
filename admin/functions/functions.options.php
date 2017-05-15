<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");
	
		//Testing
		$of_options_select 	= array("one","two","three","four","five");
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		(
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			),
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) )
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) )
		    {
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false )
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) {
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center");
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post");


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( 	"name" 		=> "Pengaturan Umum",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Petunjuk penggunaan",
						"desc" 		=> "",
						"id" 		=> "introduction_1",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Pentunjuk Penggunaan.</h3>
						Baca teks di sebelah kanan setiap opsi setting.",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array( 	"name" 		=> "Favicon",
						"desc" 		=> "Upload favicon untuk website ini.",
						"id" 		=> "k_favicon",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "[site_url]/wp-content/themes/khalifah-theme/assets/images/favicon.png",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "Logo",
						"desc" 		=> "Upload logo untuk website ini. Ukuran 250x39 px dan tipe file-nya harus PNG yang transparan, atau JPG tapi warna background belakang logo harus sama dengan warna background menu. Jika tidak diisi, logo yang tampil adalah logo bawaan theme ini.",
						"id" 		=> "k_logo",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "Avatar",
						"desc" 		=> "Upload avatar untuk ditampilkan di homepage. Tipe file jpg dengan ukuran 128x128 px.",
						"id" 		=> "k_ava",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "[site_url]/wp-content/themes/khalifah-theme/assets/images/logo_khalifah.jpg",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "Hero Background",
						"desc" 		=> "Upload foto untuk header di homepage. Tipe file jpg dengan ukuran 1200x600 px.",
						"id" 		=> "k_hero_bg",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "[site_url]/wp-content/themes/khalifah-theme/assets/images/header01.jpg",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "Teks Judul Header",
						"desc" 		=> "Masukkan teks untuk judul header yang tampil di homepage.",
						"id" 		=> "k_hero_title",
						"std" 		=> "Khalifah Umroh & Tour",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Teks Header",
						"desc" 		=> "Masukkan teks untuk konten header yang tampil di homepage.",
						"id" 		=> "k_hero_text",
						"std" 		=> "Sekarang setiap muslim bisa umroh. Cukup hanya 5 juta rupiah langsung berangkat umroh. Hanya di Khalifah Umroh & Tour!",
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> "Username Twitter",
						"desc" 		=> "Masukkan <span style='color:red'>username</span> twitter. Contoh : google",
						"id" 		=> "k_link_tw",
						"std" 		=> "#",
						"type" 		=> "text",
				);

$of_options[] = array( 	"name" 		=> "Fanpage facebook",
						"desc" 		=> "Masukkan url fanpage facebook. Harus menyertakan <span style='color:red'>https://</span> di bagian depannya.",
						"id" 		=> "k_link_fb",
						"std" 		=> "#",
						"type" 		=> "text",
				);

$of_options[] = array( 	"name" 		=> "Sosok",
						"desc" 		=> "Masukkan judul dan foto untuk kolom Sosok. Link URL dan Description tidak perlu diisi.",
						"id" 		=> "k_slide_sosok",
						"std" 		=> "",
						"type" 		=> "slider"
				);

$of_options[] = array( 	"name" 		=> "Pengaturan Paket",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Paket",
						"desc" 		=> "Masukkan judul dan foto untuk kolom Sosok. Link URL dan Description tidak perlu diisi.",
						"id" 		=> "k_paket_home",
						"std" 		=> "",
						"type" 		=> "slider"
				);

$of_options[] = array( 	"name" 		=> "Pengaturan Khusus",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Berita",
						"desc" 		=> "Masukkan ID kategori yang tidak ingin ditampilkan di halaman berita. Awali dengan tanda minus (<span style=\"color:red;\">-</span>) dan pisahkan dengan koma (<span style=\"color:red;\">,</span>) tanpa ada spasi. Postingan pada ID kategori yang dimasukkan akan di-exclude dari halaman berita.",
						"id" 		=> "k_cat_id_exclude",
						"std" 		=> "-1",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> "Pengaturan Warna",
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> "Color Scheme",
						"desc" 		=> "Warna background menu.",
						"id" 		=> "k_color_main",
						"std" 		=> "#046603",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna teks pada menu.",
						"id" 		=> "k_color_menu",
						"std" 		=> "#ffffff",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna teks pada menu ketika aktif.",
						"id" 		=> "k_color_menu_active",
						"std" 		=> "#ebd203",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna border header di bawah menu.",
						"id" 		=> "k_color_menu_border",
						"std" 		=> "#ebd203",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna background sub menu ketika kursor berada di atasnya.",
						"id" 		=> "k_color_menu_bg_hover",
						"std" 		=> "#047c02",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Background header.",
						"id" 		=> "k_color_hero_bg",
						"std" 		=> "#161616",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna teks di header.",
						"id" 		=> "k_color_hero",
						"std" 		=> "#606060",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna border foto avatar.",
						"id" 		=> "k_color_border_ava",
						"std" 		=> "#6b8c6a",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna kalimat utama dan link di header.",
						"id" 		=> "k_color_hero_title",
						"std" 		=> "#ebd203",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna icon sosial media di homepage.",
						"id" 		=> "k_color_sosmed_icon",
						"std" 		=> "#37593a",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna icon sosial media ketika kursor berada di atasnya.",
						"id" 		=> "k_color_sosmed_icon_hover",
						"std" 		=> "#046603",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Background footer.",
						"id" 		=> "k_color_footer_bg",
						"std" 		=> "#f0f4ef",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna teks di footer.",
						"id" 		=> "k_color_footer",
						"std" 		=> "#6c8e6d",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna link di footer.",
						"id" 		=> "k_color_footer_link",
						"std" 		=> "#375635",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna link secara umum.",
						"id" 		=> "k_color_link",
						"std" 		=> "#107c02",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna link ketika kursor diletakkan di atasnya.",
						"id" 		=> "k_color_link_hover",
						"std" 		=> "#3e5937",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna link judul berita.",
						"id" 		=> "k_color_link_berita",
						"std" 		=> "#35563a",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna link judul berita ketika kursor diletakkan di atasnya.",
						"id" 		=> "k_color_link_hover_berita",
						"std" 		=> "#038e01",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna tanggal berita.",
						"id" 		=> "k_color_meta",
						"std" 		=> "#aabfab",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna teks berita.",
						"id" 		=> "k_color_body",
						"std" 		=> "#445442",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna background Galeri, Opini Publik dan penomoran halaman.",
						"id" 		=> "k_color_galeri_bg",
						"std" 		=> "#EDF0F3",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna blok heading.",
						"id" 		=> "k_color_h1",
						"std" 		=> "#345132",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna border blok heading.",
						"id" 		=> "k_color_h1_border",
						"std" 		=> "#E7EBF0",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Background button.",
						"id" 		=> "k_color_btn_bg",
						"std" 		=> "#107c02",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna teks pada button.",
						"id" 		=> "k_color_btn",
						"std" 		=> "#ffffff",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> "Warna background pada button ketika kursor diletakkan di atasnya.",
						"id" 		=> "k_color_btn_hover",
						"std" 		=> "#118e01",
						"type" 		=> "color"
				);
				
/*$of_options[] = array( 	"name" 		=> "Switch 2",
						"desc" 		=> "Switch ON",
						"id" 		=> "switch_ex2",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Select a Category",
						"desc" 		=> "A list of all the categories being used on the site.",
						"id" 		=> "example_category",
						"std" 		=> "Select a category:",
						"type" 		=> "select",
						"options" 	=> $of_categories
				);*/
				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Pengaturan",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'Gunakan 2 button di bawah untuk mem-backup Pengaturan Anda saat ini, agar nantinya bisa di-restore di kemudian hari jika diperlukan. Hal ini berguna jika Anda ingin bereksperimen dengan Pengaturan yang ada saat ini, namun tetap ingin menyimpan Pengaturan lama jika Anda membutuhkannya kembali.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Data Pengaturan Theme",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
