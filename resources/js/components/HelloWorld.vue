<template>
    <ul>
        <li>
            <!-- /**
             * Componente que muestra un enlace a la lista de libros.
             */ -->
            <router-link to="/books">Lista de libros</router-link>
        </li>
        <li>
            <router-link to="/login">Login</router-link>
        </li>
        <li>
            <router-link to="/registro">Registro</router-link>
        </li>

    </ul>
    <!-- <div>
        <p> ¡Ya estamos aquí! </p>
    </div> -->
    <!-- /**
     * Componente HelloWorld.vue
     * 
     * Este componente representa la vista principal de la aplicación.
     * Contiene un router-view para mostrar los componentes asociados a las rutas.
     */ -->
    <router-view></router-view>
</template>
<script>

    export default {}
    
</script>