		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'../../model/literatura/listar_literatura.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html(""); 
				}
			})
		}
		$('#editLiteraturaModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var nombre = button.data('nombre') 
		  $('#edit_nombre').val(nombre)
		  var id = button.data('id') 
		  $('#edit_id').val(id)
		})
		
		$('#deleteLiteraturaModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget)
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		})
		
		
		$( "#edit_literatura" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "../../model/literatura/editar_literatura.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editLiteraturaModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		
		$( "#add_literatura" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "../../model/literatura/guardar_literatura.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addLiteraturaModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		$( "#delete_literatura" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "../../model/literatura/eliminar_literatura.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteLiteraturaModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});