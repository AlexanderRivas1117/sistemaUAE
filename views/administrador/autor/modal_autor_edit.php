<div id="editLiteraturaModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_autor" id="edit_autor">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Autor</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="edit_nombre"  id="edit_nombre" class="form-control" required>
							<input type="hidden" name="edit_id" id="edit_id" >
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>