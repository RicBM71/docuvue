<div class="tags container-flex">
	@forelse($post->etiquetas as $etiqueta)
	<span class="tag c-gray-1 text-capitalize"><a href="{{ route('etiquetas.show',$etiqueta) }}">#{{  $etiqueta->nombre }}</a></span>
	@empty
	<span class="tag c-gray-1 text-capitalize"></span>
	@endforelse
</div>