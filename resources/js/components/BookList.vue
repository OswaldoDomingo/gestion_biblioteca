<template>
    <div>
        <h2>Lista de Libros</h2>
        <ul>
            <li v-for="book in books" :key="book.id">
                {{ book.title }}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        //con que datos vamos a trabajar
        data(){
            //Que vamos a devolver
            return {
                books: [],
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
        }
    }
</script>