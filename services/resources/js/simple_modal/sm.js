$(document).ready(function(){

    //When you click on a link with class of poplight and the href starts with a #
    $('a.poplight[href^=#]').click( function() {
	open_modal($(this).attr('rel'), $(this).attr('href'), '');
        return false;
    });


    //Close Popups and Fade Layer
    $('a.close, #fade').live('click', function() { //When clicking on the close or fade layer...
        $('#fade , .popup_block').fadeOut(function() {
            $('#fade, div.btn_close').remove();
    }); //fade them both out
        ModalToContent();
        return false;
    });


});

function open_modal (popID, popURL, text, css_class) {

        //Если в окне сейчас что-то есть и App.Modal.from_s не пусто - возвращаем контент по селектору
        if( App.Modal.from_s !== "" ) {
            $(App.Modal.from_s).html($('#'+popID).html());
            App.Modal.from_s = "";
        }

        //Pull Query & Variables from href URL
        var query= popURL.split('?');
        var dim= query[1].split('&');
        var popWidth = dim[0].split('=')[1]; //Gets the first query string value
		if(dim[1]!=undefined)
		{
		var popHeight = dim[1].split('=')[1]; //Gets the first query string value
		}

		if(dim[2]!=undefined)
		{
			temp = $("iframe[name='"+popID+"']").attr("src");
			if( temp.indexOf('?') > 0 )
			{ temp = temp.substr(0,temp.indexOf('?')); }
			$("iframe[name='"+popID+"']").attr("src", temp+"?"+dim[2]);
		}


        if(text!='') {
            document.getElementById(popID).innerHTML = text;
        }

        //Fade in the Popup and add close button
        if(dim[1]!=undefined) {
                $('#' + popID).fadeIn().css({ 'width': popWidth, 'height': popHeight }).prepend('<div class="btn_close"><a href="#" class="close"><b><i class="far fa-times-circle"></i></b></a></div>');
        } else {
                $('#' + popID).fadeIn().css({ 'width': popWidth }).prepend('<div class="btn_close"><a href="#" class="close"><i class="far fa-times-circle"></i></a></div>');
        }
        
        $('#' + popID).removeClass();
        $('#' + popID).addClass('popup_block');
        if( css_class != undefined ) {
            $('#' + popID).addClass(css_class);
        }
        
        //Define margin for center alignment (vertical + horizontal) - we add 80 to the height/width to accomodate for the padding + border width defined in the css
        var popMargTop = ($('#' + popID).height() + 80) / 2;
        var popMargLeft = ($('#' + popID).width() + 40) / 2;

        //Apply Margin to Popup
        $('#' + popID).css({
            'margin-top' : -popMargTop,
            'margin-left' : -popMargLeft
        });

        //Fade in Background
        $('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
        $('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn(); //Fade in the fade layer

}