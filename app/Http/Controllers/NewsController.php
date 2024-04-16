<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    //
    public function index()
    {
        // Obtener los datos de las noticias
        $articles = $this->getNews();

        // Retornar la vista con los datos de las noticias
        return view('news', compact('articles'));
    }

    private function getNews()
    {
        // URL de la API de NewsAPI
        $apiUrl = 'https://newsapi.org/v2/everything?q=(econom%C3%ADa%20OR%20bolsa%20OR%20criptomonedas)&language=es&sortBy=publishedAt&apiKey=c6c8982e31fd47698245511bb1cf2f50';


        try {
            // Realizar la solicitud a la API utilizando la clase Http de Laravel
            $response = Http::get($apiUrl);

            // Verificar si la solicitud fue exitosa (código de estado 200)
            if ($response->successful()) {
                // Decodificar la respuesta JSON
                $data = $response->json();
                
                // Verificar si se recibieron datos válidos
                if (isset($data['articles']) && is_array($data['articles'])) {
                    // Retornar los datos de las noticias
                    return $data['articles'];
                }
            }
        } catch (\Exception $e) {
            // Manejar cualquier excepción que pueda ocurrir durante la solicitud
            // Por ejemplo, problemas de red, errores del servidor, etc.
            // Para simplificar, en este caso solo retornamos un array vacío
            var_dump($data);
        }

        // Retornar un array vacío si no se pudieron obtener los datos de las noticias
        return [];
    }
}
