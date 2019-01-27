<?php
$extrascript[]= " 
	<script>
		var Aloha = {};
		Aloha.settings = {
			logLevels: {'error': true, 'warn': true, 'info': true, 'debug': true},
			errorhandling: false,
			ribbon: false
		};
	</script>";
$extrascript[]= '
	<script src="scripts/alohaeditor/lib/aloha.js"
	        data-aloha-plugins="common/ui,
	                            common/format,
	                            common/table,
	                            common/list,
	                            common/link,
	                            common/highlighteditables,
	                            common/undo,
	                            common/contenthandler,
	                            common/paste,
	                            common/characterpicker,
	                            common/commands,
	                            common/block,
	                            common/image,
	                            common/abbr,
	                            common/horizontalruler,
	                            common/align,
	                            common/dom-to-xhtml,
	                            extra/textcolor,
	                            extra/formatlesspaste,
	                            extra/hints,
	                            extra/toc,
	                            extra/headerids,
	                            extra/listenforcer,
	                            extra/metaview,
	                            extra/numerated-headers,
	                            extra/ribbon,
	                            extra/wai-lang,
	                            extra/linkbrowser,
	                            extra/imagebrowser,
	                            extra/cite"></script>


	
	<script src="scripts/alohaeditor/lib/require.js"></script>

<script src="scripts/alohaeditor/lib/aloha.js" data-aloha-plugins="common/format,common/highlighteditables,common/list,common/undo,common/paste,common/block"></script>
	<link rel="stylesheet" href="scripts/alohaeditor/css/aloha.css" id="aloha-style-include" type="text/css">
';	
	
?>