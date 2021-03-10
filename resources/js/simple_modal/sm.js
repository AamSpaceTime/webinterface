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

function open_modal (popID, popURL, text	)
{
        //var popID = $(this).attr('rel'); //Get Popup Name
        //var popURL = $(this).attr('href'); //Get Popup href to define size

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