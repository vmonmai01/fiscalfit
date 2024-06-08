<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-4xl text-white leading-tight">
            Noticas última hora
        </h2>
    </x-slot>
    <script>
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
    <div class="p-4 mb-5">
        <h1 class="news-title">Últimas noticias</h1>

        <div class="news-container">
            @foreach ($articles as $index => $article)
                <div class="item news-item">
                    <h2 class="news-title">{{ $article['title'] }}</h2>
                    <div class="flex flex-wrap items-center">
                        @if ($index % 2 == 0)
                            <div class="w-full md:w-1/2 p-4 flex justify-center items-center">
                                @if (isset($article['urlToImage']))
                                    <img class="news-image max-h-500 w-full h-auto mb-4 rounded-lg" src="{{ $article['urlToImage'] }}"
                                        alt="Imagen de la noticia {{ $article['title'] }}" loading="lazy">
                                @endif
                            </div>
                            <div class="w-full md:w-1/2 p-4">
                                <p class="news-description">{{ $article['description'] }}</p>
                                <!-- Aquí estoy truncando el contenido del artículo a una longitud específica -->
                                @if (isset($article['content']))
                                    @php
                                        $content = $article['content'];
                                        // Encuentra la posición de la cadena '[+' o '[ +' en el contenido del artículo
                                        $char_pos = preg_match('/\[\s*\+/', $content, $matches, PREG_OFFSET_CAPTURE);
                                        // Si se encuentra la posición de '[+' o '[ +', truncar la cadena antes de ese punto
                                        if ($char_pos !== false && count($matches) > 0) {
                                            $char_pos = $matches[0][1]; // Obtener la posición de la coincidencia
                                            $content = substr($content, 0, $char_pos);
                                        }
                                    @endphp
                                    <p class="news-content">{{ $content }}
                                        @if (isset($article['url']))
                                            <a href="{{ $article['url'] }}" class="news-link">Ver noticia completa</a>
                                        @endif
                                    </p>
                                @endif
                                @if (isset($article['author']))
                                    <p class="news-author">{{ $article['author'] }}</p>
                                @endif

                            </div>
                        @else
                            
                            <div class="w-full md:w-1/2 p-4">
                                <p class="news-description">{{ $article['description'] }}</p>
                                @if (isset($article['content']))
                                    @php
                                        $content = $article['content'];
                                        // Encuentra la posición de la cadena '[+' o '[ +' en el contenido del artículo
                                        $char_pos = preg_match('/\[\s*\+/', $content, $matches, PREG_OFFSET_CAPTURE);
                                        // Si se encuentra la posición de '[+' o '[ +', truncar la cadena antes de ese punto
                                        if ($char_pos !== false && count($matches) > 0) {
                                            $char_pos = $matches[0][1]; // Obtener la posición de la coincidencia
                                            $content = substr($content, 0, $char_pos);
                                        }
                                    @endphp
                                    <p class="news-content">{{ $content }}
                                        @if (isset($article['url']))
                                            <a href="{{ $article['url'] }}" class="news-link">Ver noticia completa</a>
                                        @endif
                                    </p>
                                @endif
                                @if (isset($article['author']))
                                    <p class="news-author">{{ $article['author'] }}</p>
                                @endif
                            </div>
                            <div class="w-full md:w-1/2 p-4 flex justify-center items-center">
                                @if (isset($article['urlToImage']))
                                    <img class="news-image max-w-500 w-full h-auto mb-4 rounded-lg" src="{{ $article['urlToImage'] }}"
                                        alt="Imagen de la noticia {{ $article['title'] }}" loading="lazy">
                                @endif
                            </div>
                        @endif
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>
         <!-- Botón "Volver arriba" -->
    <button id="backToTop" onclick="scrollToTop()">↑ Volver arriba ↑</button>
    </div>
</x-app-layout>
