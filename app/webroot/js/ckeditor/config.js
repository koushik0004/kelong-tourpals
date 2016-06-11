
CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	//config.language = 'es';
	//config.uiColor = '#aabbcc';
	//config.allowedContent = true;
	var path = 'http://anyvdo.com/tourpals';
	//var path = 'http://localhost/tourpals';
	config.filebrowserBrowseUrl 			= 		path + '/app/webroot/js/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl 		= 		path + '/app/webroot/js/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl 		= 		path + '/app/webroot/js/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl 			= 		path + '/app/webroot/js/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl 		= 		path + '/app/webroot/js/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl 		= 		path + '/app/webroot/js/kcfinder/upload.php?type=flash';
	
	
  /*config.filebrowserBrowseUrl 			= 		'http://118.139.161.84/Sortinoresidetial/js/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl 		= 		'http://118.139.161.84/Sortinoresidetial/js/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl 		= 		'http://118.139.161.84/Sortinoresidetial/js/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl 			= 		'http://118.139.161.84/Sortinoresidetial/js/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl 		= 		'http://118.139.161.84/Sortinoresidetial/js/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl 		= 		'http://118.139.161.84/Sortinoresidetial/js/kcfinder/upload.php?type=flash';*/
	/*config.extraPlugins = 'photo,video,customlink,anchorlink';
	config.toolbar_MyToolbarSet =
	[
		['Source'],['Cut','Copy','Paste'],['Undo','Redo'],['Link'],['PageBreak','SpecialChar'],,['TextColor','Image','Table'],'/',['Bold','Italic','Underline','Subscript','Superscript','NumberedList','BulletedList','Outdent','Indent','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Font','FontSize']
	];
	config.toolbar = 'MyToolbarSet';*/
	/*refer to http://stackoverflow.com/questions/7728959/ckeditor-defining-custom-toolbar*/
	config.toolbar = 'Custom';

    config.toolbar_Custom =
    [
        { name: 'document', items : [ 'NewPage','Preview','Source' ] },
        { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
        { name: 'insert', items : [ 'Image','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'
                 ,'Iframe' ] },
                '/',
        { name: 'styles', items : [ 'Styles','Format' ] },
        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat', 'TextColor', 'BGColor'] },
        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
        { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
        { name: 'tools', items : [ 'Maximize','-','About' ] },
		//{ name: 'colors'}
    ];
};
/*CKEDITOR.on('dialogDefinition', function( ev ){	var dialogName = ev.data.name;	var dialogDefinition = ev.data.definition;	if ( dialogName == 'link' )	{		dialogDefinition.minHeight = '100';		dialogDefinition.removeContents( 'advanced' );		var infoTab = dialogDefinition.getContents( 'info' );		infoTab.remove('linkType');		infoTab.remove('browse');		var targetTab = dialogDefinition.getContents( 'target' );		var targetField = targetTab.get('linkTargetType');		targetField.items = [["<No definido>", "notSet"], ["Externo (_blank)", "_blank"], ["Interno (_self)", "_self"]];	}});*/