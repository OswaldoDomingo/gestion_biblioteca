<template>
    <div>
        <h2 class="bg-red-800 text-white">Lista de Libros</h2>
        <ul>
            <li v-for="book in books" :key="book.id">
                {{ book.title }} - {{ book.published_year }}
                <!-- Se le añade un botón -->
                <button @click="addFavorito(book.ide)"
                    class="px-3 py-1 ml-2 bg-blue-500 hover:bg-blue-700 text-white rounded">
                    Add Fav
                </button>

            </li>
        </ul>
    </div>
    <div>
        <h2>Lista de Autores</h2>
        <ul>
            <li v-for="author in authors" :key="author.id">
                {{ author.name }} - {{ author.country }}
            </li>
        </ul>
    </div>
</template>

<script>
//Se importa la librería de cookies
import Cookies from 'js-cookie';

export default {
    //con que datos vamos a trabajar
    data() {
        //Que vamos a devolver
        return {
            books: [],
            authors: [],
        }
    },
    mounted() {
        //Cargamos los datos
        //Lanzamos una petición a la API para obtener los libros y los guardamos en el array books que hemos creado en data
        fetch('api/libros') //Se llama a la ruta api/libros que está en routes/api.php
            .then((response) => response.json())
            .then((data) => {
                //Guardamos los datos en el array books
                this.books = data;
            });
        // Obtener los autores
        fetch('api/autores') // Asegúrate de que esta es la ruta correcta para obtener los autores
            .then((response) => response.json())
            .then((data) => {
                this.authors = data;
            });
    },
    methods: {
        addFavorito(id) {
            let favorites = Cookies.get('favorites');
            if (!favorites) {
                favorites = '[]';
            }
            //Parseo lista
            favorites = JSON.parse(favorites);

            //agrergar nuevo a favorito
            if (!favorites.includes(id)) {
                favorites.push(id);
                Cookies.set('favorites', JSON.stringify(favorites), { expires: 30 });
            }
            //Método, addFavorito(id), se utiliza para agregar un libro a la lista de favoritos del usuario.

            // let favorites = Cookies.get('favorites');: Aquí, estás obteniendo la lista de favoritos del usuario de las cookies. Si el usuario no tiene ninguna lista de favoritos, favorites será undefined.

            // if(!favorites){ favorites = '[]'; }: Si favorites es undefined (lo que significa que el usuario no tiene ninguna lista de favoritos), inicializas favorites como una cadena que representa un array vacío.

            // favorites = JSON.parse(favorites);: Aquí, estás convirtiendo la cadena favorites en un array de JavaScript. Esto es necesario porque las cookies solo pueden almacenar datos como cadenas.

            // if(!favorites.includes(id)){ ... }: Este bloque de código se ejecuta si el id del libro no está ya en la lista de favoritos. Utilizas el método includes para comprobar si el id ya está en el array favorites.

            // favorites.push(id);: Si el id no está en la lista de favoritos, lo agregas al array favorites con el método push.

            // Cookies.set('favorites', JSON.stringify(favorites) , {expires : 30});: Finalmente, se guarda la lista de favoritos actualizada en las cookies. Primero, se convierte el array favorites en una cadena con JSON.stringify, ya que las cookies solo pueden almacenar cadenas. Luego, se establece la cookie 'favorites' con esta cadena. La cookie expirará después de 30 días.

            // Este método permite a los usuarios agregar un libro a su lista de favoritos. La lista de favoritos se guarda en las cookies para que persista incluso después de que el usuario cierre el navegador.
           
            //Actualizar la variable
            this.favorites = favorites;

            console.log(favorites);
        }

    }
}
</script>