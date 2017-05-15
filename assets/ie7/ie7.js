/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referring to this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'keativa-icon-font\'">' + entity + '</span>' + html;
	}
	var icons = {
		'icon-resume': '&#xe605;',
		'icon-music': '&#xf001;',
		'icon-search': '&#xf002;',
		'icon-love': '&#xf004;',
		'icon-star': '&#xf005;',
		'icon-user': '&#xf007;',
		'icon-portfolio': '&#xf00a;',
		'icon-check': '&#xf00c;',
		'icon-delete': '&#xf00d;',
		'icon-setting': '&#xf013;',
		'icon-home': '&#xf015;',
		'icon-clock-o': '&#xf017;',
		'icon-refresh': '&#xf021;',
		'icon-tags': '&#xf02c;',
		'icon-camera': '&#xf030;',
		'icon-list': '&#xf03a;',
		'icon-photo': '&#xf03e;',
		'icon-edit': '&#xf044;',
		'icon-check2': '&#xf046;',
		'icon-expand': '&#xf065;',
		'icon-compress': '&#xf066;',
		'icon-plus': '&#xf067;',
		'icon-comment': '&#xf075;',
		'icon-cart': '&#xf07a;',
		'icon-twitter': '&#xf081;',
		'icon-facebook': '&#xf082;',
		'icon-phone': '&#xf098;',
		'icon-github': '&#xf09b;',
		'icon-chain': '&#xf0c1;',
		'icon-nav': '&#xf0c9;',
		'icon-magic': '&#xf0d0;',
		'icon-pinterest': '&#xf0d3;',
		'icon-googleplus': '&#xf0d4;',
		'icon-contact': '&#xf0e0;',
		'icon-linkedin': '&#xf0e1;',
		'icon-larr': '&#xf100;',
		'icon-rarr': '&#xf101;',
		'icon-larr1': '&#xf104;',
		'icon-rarr1': '&#xf105;',
		'icon-tarr': '&#xf106;',
		'icon-barr': '&#xf107;',
		'icon-quote-left': '&#xf10d;',
		'icon-quote-right': '&#xf10e;',
		'icon-code': '&#xf121;',
		'icon-doc': '&#xf15c;',
		'icon-youtube': '&#xf166;',
		'icon-play': '&#xf16a;',
		'icon-dropbox': '&#xf16b;',
		'icon-instagram': '&#xf16d;',
		'icon-flickr': '&#xf16e;',
		'icon-tumblr': '&#xf174;',
		'icon-apple': '&#xf179;',
		'icon-windows': '&#xf17a;',
		'icon-android': '&#xf17b;',
		'icon-skype': '&#xf17e;',
		'icon-vimeo': '&#xf194;',
		'icon-plus2': '&#xf196;',
		'icon-wordpress': '&#xf19a;',
		'icon-behance': '&#xf1b5;',
		'icon-rocket2': '&#xe600;',
		'icon-shield': '&#xe601;',
		'icon-cloud': '&#xe602;',
		'icon-earth': '&#xe603;',
		'icon-happy': '&#xe604;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
