<script language="javascript" type="text/javascript" src="<?php echo MAINURL?>js/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	elements : 'nourlconvert',
	theme : "advanced",
	convert_urls : false,
	document_base_url : '<?php echo MAINURL; ?>',
	width : "569px",
	height : "200px",	
	plugins: "spellchecker",
	theme_advanced_buttons1 : "bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink,|,spellchecker",
	theme_advanced_buttons2 : "",
	theme_advanced_buttons3 : "",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	editor_selector : "tcSimple"	
});

tinyMCE.init({
	// General options
	// mode : "textareas",
	// theme : "advanced",
	width : "569px",
	height : "200px",
	mode : "textareas",
	elements : 'nourlconvert',
	theme : "advanced",
	convert_urls : false,
	document_base_url : '<?php echo MAINURL; ?>',
	extended_valid_elements : "a[id|class|name|href|target|title|rel|onclick],img[id|class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[id|class|width|size|noshade],font[face|size|color|style],span[id|class|align|style],input[id|class|value|type],div[id|class|title|role|tabIndex]",
	plugins : "pagebreak,table,advimage,advlink,preview,print,contextmenu,paste,fullscreen,spellchecker",
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,attribs,|,tablecontrols",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,hr,removeformat,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,cleanup,spellchecker,code,fullscreen",
	theme_advanced_buttons3 : "",
	theme_advanced_buttons4 : "",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	editor_selector : "tcAdvanced"	
});

</script>