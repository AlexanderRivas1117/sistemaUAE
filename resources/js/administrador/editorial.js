		$(function() {
			load(1);
		});


		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'../../model/editorial/listar_editorial.php', 
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
		$('#editEditorialModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var nombre = button.data('nombre') 
		  $('#edit_nombre').val(nombre)
		  var id = button.data('id') 
		  $('#edit_id').val(id)
		})
		
		$('#deleteEditorialModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		})
		
		
		$( "#edit_editorial" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "../../model/editorial/editar_editorial.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editEditorialModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});

		
		
		
		$( "#add_editorial" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "../../model/editorial/guardar_editorial.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addEditorialModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		$( "#delete_editorial" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "../../model/editorial/eliminar_editorial.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteEditorialModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});


		