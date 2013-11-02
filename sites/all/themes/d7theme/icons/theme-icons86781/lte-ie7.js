/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'theme-icons\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-contract' : '&#xe004;',
			'icon-expand' : '&#xe005;',
			'icon-cog' : '&#xe00c;',
			'icon-info' : '&#xe00d;',
			'icon-spinner' : '&#xe00a;',
			'icon-spinner-2' : '&#xe009;',
			'icon-phone' : '&#xe000;',
			'icon-location' : '&#xe001;',
			'icon-printer' : '&#xe002;',
			'icon-popup' : '&#xe003;',
			'icon-cog-2' : '&#xe006;',
			'icon-plus' : '&#xe007;',
			'icon-minus' : '&#xe008;',
			'icon-cross' : '&#xe010;',
			'icon-minus-2' : '&#xe011;',
			'icon-plus-2' : '&#xe012;',
			'icon-info-2' : '&#xe00b;',
			'icon-info-3' : '&#xe00e;',
			'icon-add-to-list' : '&#xe00f;',
			'icon-layout' : '&#xe013;',
			'icon-list' : '&#xe014;',
			'icon-cw' : '&#xe015;',
			'icon-upload' : '&#xe016;',
			'icon-download' : '&#xe017;',
			'icon-upload-2' : '&#xe018;',
			'icon-bookmarks' : '&#xe019;',
			'icon-resize-enlarge' : '&#xe01a;',
			'icon-resize-shrink' : '&#xe01b;',
			'icon-arrow-left' : '&#xe01c;',
			'icon-arrow-right' : '&#xe01d;',
			'icon-arrow-left-2' : '&#xe01e;',
			'icon-arrow-down' : '&#xe01f;',
			'icon-arrow-up' : '&#xe020;',
			'icon-arrow-right-2' : '&#xe021;',
			'icon-arrow-left-3' : '&#xe022;',
			'icon-arrow-down-2' : '&#xe023;',
			'icon-arrow-up-2' : '&#xe024;',
			'icon-untitled' : '&#xe025;',
			'icon-search' : '&#xe026;',
			'icon-pencil' : '&#xe027;',
			'icon-calendar' : '&#xe028;',
			'icon-warning' : '&#xe029;',
			'icon-disk' : '&#xe02a;',
			'icon-trash' : '&#xe02b;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};