// URL de la API de NewsAPI
const apiUrl = 'https://newsapi.org/v2/everything?q=(economía OR bolsa OR criptomonedas)&language=es&sortBy=publishedAt';

// Clave de API (sustituye 'TU_API_KEY' con tu propia clave de API)
const apiKey = 'c6c8982e31fd47698245511bb1cf2f50';

// Agregar la clave de API a la URL
const url = `${apiUrl}&apiKey=${apiKey}`;

// Función para realizar la solicitud a la API
async function getNews() {
    try {
        // Realizar la solicitud a la API
        const response = await fetch(url);

        // Verificar si la respuesta es exitosa (código de estado 200)
        if (response.ok) {
            // Convertir la respuesta a formato JSON
            const data = await response.json();
            console.log(data); // Mostrar los datos en la consola
            return data; // Devolver los datos obtenidos
        } else {
            // En caso de error en la respuesta, mostrar mensaje de error
            console.error('Error en la solicitud:', response.statusText);
            return null; // Devolver null en caso de error
        }
    } catch (error) {
        // Capturar y manejar errores de red u otros errores
        console.error('Error en la solicitud:', error);
        return null; // Devolver null en caso de error
    }
}


document.contentLoaded = function() {
    getNews();
}
// Llamar a la función getNews para obtener los datos de noticias
getNews()
    .then(data => {
        // Aquí puedes procesar y utilizar los datos obtenidos
        if (data && data.articles) {
            // Acceder a la lista de artículos (noticias)
            const articles = data.articles;
            console.log('Artículos obtenidos:', articles);

            // Aquí puedes realizar más operaciones con los artículos (noticias)
        }
    })
    .catch(error => {
        console.error('Error al obtener noticias:', error);
    });


// Para el degradado entre noticias

const items = document.querySelectorAll(".item");


items.forEach((item) => {
 
  item.style.setProperty('--clip-i')
  item.style.setProperty('--clip-f')
});
