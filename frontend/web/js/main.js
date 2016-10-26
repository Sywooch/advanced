$(function(){
	$('#modalButton').click(function(){
	$('#modalId').modal('show')
		.find('#modalContentId')
		.load($(this).attr('value'));
	});

});