<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-4xl text-gray-900 dark:text-gray-200 leading-tight">
            Noticas última hora
        </h2>
    </x-slot>
    <div>
        <h1 class="news-title">Últimas noticias</h1>

        <div class="news-container">
            @foreach ($articles as $index => $article)
                <div class="item news-item">
                    <h2 class="news-title">{{ $article['title'] }}</h2>
                    <div class="row">
                        @if ($index % 2 == 0)
                            <div class="col-md-6">
                                @if (isset($article['urlToImage']))
                                    <img class="news-image" src="{{ $article['urlToImage'] }}"
                                        alt="Imagen de la noticia {{ $article['title'] }}">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <p class="news-description">{{ $article['description'] }}</p>
                                @if (isset($article['content']))
                                    <p class="news-content">{{ $article['content'] }}</p>
                                @endif
                                @if (isset($article['author']))
                                    <p class="news-author">{{ $article['author'] }}</p>
                                @endif
                                @if (isset($article['url']))
                                    <a href="{{ $article['url'] }}" class="news-link">Ver noticia completa</a>
                                @endif
                            </div>
                        @else
                            <div class="col-md-6 order-md-2">
                                @if (isset($article['urlToImage']))
                                    <img class="news-image" src="{{ $article['urlToImage'] }}"
                                        alt="Imagen de la noticia {{ $article['title'] }}">
                                @endif
                            </div>
                            <div class="col-md-6 order-md-1">
                                <p class="news-description">{{ $article['description'] }}</p>
                                @if (isset($article['content']))
                                    <p class="news-content">{{ $article['content'] }}</p>
                                @endif
                                @if (isset($article['author']))
                                    <p class="news-author">{{ $article['author'] }}</p>
                                @endif
                                @if (isset($article['url']))
                                    <a href="{{ $article['url'] }}" class="news-link">Ver noticia completa</a>
                                @endif
                            </div>
                        @endif
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
