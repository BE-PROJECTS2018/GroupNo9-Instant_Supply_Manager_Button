// JavaScript Document
(function($){
	
	$('#fileContents').val(document.documentElement.innerHTML);
	
	$.generateFile = function(options){

        options = options || {};

        if(!options.script || !options.fileName || !options.fileContents|| !options.css){
            throw new Error("Please enter all the required config options!");
        }
		// Creating a 1 by 1 px invisible iframe:
        var iframe = $('<iframe>',{
            width:1,
            height:1,
            frameborder:0,
            css:{
                display:'none'
            }
        }).appendTo('body');

        var formHTML = '<form action="" method="post">'+
            '<input type="hidden" name="css" />'+
            '<input type="hidden" name="fileName" />'+
            '<input type="hidden" name="fileContents" />'+
            '</form>';

        // Giving IE a chance to build the DOM in
        // the iframe with a short timeout:

        setTimeout(function(){

            // The body element of the iframe document:
           var body = (iframe.prop('contentDocument') !== undefined) ?
                            iframe.prop('contentDocument').body :
                            iframe.prop('document').body;	// IE

            body = $(body);

            // Adding the form to the body:
            body.html(formHTML);

            var form = body.find('form');

            form.attr('action',options.script);
			form.find('input[name=css]').val(options.css);
            form.find('input[name=fileName]').val(options.fileName);
            form.find('input[name=fileContents]').val(options.fileContents);

            // Submitting the form to download.php. This will
            // cause the file download dialog box to appear.

            form.submit();
        },50);
    };

})(jQuery);