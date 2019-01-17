<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="{{ route('admin.posts.store') }}" method="POST">
			@csrf
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nuevo post</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
						<label>Título</label>
						<input type="text" class="form-control" 
						name="titulo" 
						placeholder="Título"
						required="required" 
						value = "{{ old('titulo') }}">
						{!! $errors->first('titulo', '<span class="help-block">:message</span>') !!}

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</form>
	</div>
</div>