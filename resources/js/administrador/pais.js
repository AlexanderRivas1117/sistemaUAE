		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'../../model/pais/listar_pais.php',
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
		$('#editPaisModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var nombre = button.data('nombre') 
		  $('#edit_nombre').val(nombre)
		  var id = button.data('id') 
		  $('#edit_id').val(id)
		})
		
		$('#deletePaisModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) 
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		})
		
		
		$( "#edit_pais" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "../../model/pais/editar_pais.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editPaisModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		
		$( "#add_pais" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "../../model/pais/guardar_pais.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addPaisModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		$( "#delete_pais" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "../../model/pais/eliminar_pais.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deletePaisModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});