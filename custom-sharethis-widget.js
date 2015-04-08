$( document ).ready(function() {

	$('.js-share_link').click(function(event){

		event.preventDefault();

		var href = $(event.target).attr('href'),
			title = 'Share on ' + $(event.target).attr('data-uwlm-share-site'),
			left = (screen.width/2)-(550/2),
			top = (screen.height/2)-(300/2);

		window.open(href, title, "height=300,width=550,resizable=1, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no,top="+top+", left="+left);

	});

});