 $(document).ready(function () {
 	$('.side-bar-list li:gt(27)').hide();
 	$('#show-button').click(function(){
 		$('ul li:gt(27)').show();
 	})
});