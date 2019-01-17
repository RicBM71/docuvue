@extends('layout')

@section('meta-titulo',$post->titulo)
@section('meta-descripcion',$post->extracto)


@section('contenido')
  <article class="post image-w-text container">
    <div class="content-post">
      <header class="container-flex space-between">
        <div class="date">
          <span class="c-gris">{{ $post->fecha_publi->format('M d') }}</span>
        </div>
        <div class="post-category">
          <span class="category"> {{ $post->categoria->nombre }}</span>
        </div>
      </header>
      <h1>{{ $post->titulo }}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
        	{!! $post->cuerpo !!}
        </div>

        <footer class="container-flex space-between">
          <div class="buttons-social-media-share">
            <ul class="share-buttons">
            	<li><a href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Compartir en Facebook" target="_blank"><img alt="Compartir en Facebook" src="/img/flat_web_icon_set/Facebook.png"></a></li>
            	<li><a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet"><img alt="Tweet" src="/img/flat_web_icon_set/Twitter.png"></a></li>
            	<li><a href="https://plus.google.com/share?url=" target="_blank" title="Compartir en Google+"><img alt="Compartir en Google+" src="/img/flat_web_icon_set/Google+.png"></a></li>
            	<li><a href="http://pinterest.com/pin/create/button/?url=&description=" target="_blank" title="Pin it"><img alt="Pin it" src="/img/flat_web_icon_set/Pinterest.png"></a></li>
            </ul>
          </div>
          <div class="tags container-flex">
             @forelse($post->etiquetas as $etiqueta)
                <span class="tag c-gray-1 text-capitalize">#{{  $etiqueta->nombre }}</span>
            @empty
                <span class="tag c-gray-1 text-capitalize"></span>
             @endforelse
          </div>
      </footer>
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>

		@include('scripts.discus')
                                
      </div><!-- .comments -->
    </div>
  </article>
@endsection

@push('scripts')
	<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
@endpush
 