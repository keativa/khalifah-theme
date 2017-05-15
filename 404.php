<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php the_title(); ?></title>
    <style>
	* {
		margin:0;
		padding:0;
	}
	body, html {
		height:100%;
	}
	body {
		font-size:15px;
		color:#777;
		line-height:1.5em;
		background-color:#fff;
		font-family:Arial, Helvetica, sans-serif;
	}
	a {
		color:#fff;
		text-decoration: none;
		transition:all ease-in-out 0.2s;
	}
	a:hover {
		opacity:.8;
	}
	h1, h3 {
		color:#555;
	}
	h1, h3, p {
		margin-bottom:15px;
	}
	.back-to {
		padding:8px 14px;
		background-color:rgba(0,0,0,0.5);
	}
    .container {
		position:relative;
        text-align:center;
        background-color:#fff;
		height:100%;
		width:100%;
    }
	.wrapper {
		display:table;
		padding:20px;
		height:150px;
		margin-top:-97.5px; /* (150/2) + padding + (border/2) */
		width:300px;
		margin-left:-170px; /* (300/2) + padding */
		position:absolute;
		top:50%;
		left:50%;
		background-color:#eee;
		border-bottom:5px solid rgba(0,0,0,0.1);
	}
	.content {
		display:table-cell;
		vertical-align:middle;
	}
    </style>
</head>
<body>
  <div class="container">
    <div class="wrapper">
      <div class="content">
        <h1>404 - Not Found!</h1>
        <!--<h3><a href="" class="btn-dwonload" title="<?php the_title(); ?>">Download File</a></h3>-->
        <p>Maaf, halaman yang Anda kunjungi tidak ditemukan.</p>
        <a href="<?php bloginfo('url'); ?>" class="back-to">&laquo; kembali ke homepage</a>
      </div>
    </div>
  </div>
</body>
</html>