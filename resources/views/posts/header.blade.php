<header class="container-flex space-between">
	<div class="date">
		<span class="c-gris">{{ optional($post->fecha_publi)->format('M d') }} / {{ $post->owner->name }}</span>
	</div>
	<div class="post-category">
		<span class="category"><a href="{{ route('categorias.show', $post->categoria_id) }} ">{{ $post->categoria->nombre }}</a></span>
	</div>
</header>