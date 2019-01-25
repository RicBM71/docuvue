
<div class="m-checkbox-list">
	@foreach ($permisos as $id => $name)
		<label class="m-checkbox">		
			<input name="permissions[]" type="checkbox" value="{{ $name }}" 		
				{{ $model->permissions->contains($id) ||  collect(old('permissions'))->contains($name) ? 'checked' : '' }}>{{ $name }}<span></span>		
		</label>
	@endforeach
</div>						
