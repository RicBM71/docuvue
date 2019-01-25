
<div class="m-checkbox-list">
	@foreach ($roles as $role)
		<label class="m-checkbox">
			<input name="roles[]" type="checkbox" value="{{ $role->name }}" {{ $user->roles->contains($role->id) ? 'checked' : '' }}>{{ $role->name }}<span></span> <br>
			<small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
		</label>
	@endforeach
</div>						
