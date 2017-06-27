$.fn.editable.defaults.mode 		= 'inline';
$.fn.editable.defaults.ajaxOptions 	= {type: 'PUT'};

$(document).ready(function(){
	$('.set-guide-number').editable();
	$('.select-status').editable({
		source: [
			{value:'creado', text:'Creado'},
			{value:'enviado', text:'Enviado'},
			{value:'recibido', text:'Recibido'}
		]
	});
	$(".add-to-cart").on('submit',function(e){
		e.preventDefault(); 
		var $form = $(this);
		var $button = $form.find("[type='submit']");
		
		$.ajax({
			url		:	$(this).attr("action"),
			type	:	$(this).attr("method"),
			data	:	$(this).serialize(),
			dataType:	'JSON',
			beforeSend: function(){
				$button.val('Cargando....');
			},
			success: function(data){
				$button.css('background-color', '#00c853').val('Agregado');
				console.log(data);
				$('.circle-shopping-cart').html(data.products_count);
				setTimeout(function(){
					restartButton($button);
				}, 2000);
			},
			error: function(err){
				console.log(err);
				$button.css('background-color', '#d50000').val('Error');
				setTimeout(function(){
					restartButton($button);
				}, 2000);
			}
		});
		return false;
	});
	
	function restartButton($button){
		$button.val('Agregar al Carrito').attr('style', '');
	}
	
});
