<template>  
<div class="flex justify-center items-center">
    <form @submit.prevent="register">
        <div class="mb-4">
            <label for="" class="sr-only">Nombre</label>
            <input v-model="name" type="text" id ="name" placeholder="Nombre">
        </div>

        <div class="mb-4">
            <label for="" class="sr-only">Email</label>
            <input v-model="email" type="text" id ="email" placeholder="Email">
        </div>

        <div class="mb-4">
            <label for="" class="sr-only">Contraseña</label>
            <input v-model="password" type="password" id ="password" placeholder="Contraseña">
        
        </div>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Registrar
        </button>
        </form>
</div>
</template>
<script>
export default {
    data(){
        return{
            name: '',
            email: '',
            password: ''
        }
    },
    methods:{
        register(){
            axios.post('/api/register', {
                name: this.name,
                email: this.email,
                password: this.password
            })
            .then((response) =>{
                console.log(response);
                localStorage.setItem('token', response.data.token);
                this.$router.push({name: 'Profile'});
            })
            .catch((error) =>{
                console.log('Error de registro',error);
            });
        },
    },
};
// Desglose del código:

// data(): Esta es una función que devuelve un objeto que contiene las propiedades de datos que queremos rastrear en nuestro componente. name, email y password, que se inicializan como cadenas vacías.

// methods: Este es un objeto que contiene métodos que puedes usar en tu componente. Hay un método llamado register.

// register(): Este es un método que realiza una solicitud POST a la ruta '/api/register' utilizando axios, una biblioteca de cliente HTTP basada en promesas. Envía name, email y password como datos de la solicitud.

// .then((response) => {...}): Esta es una función que se ejecuta cuando la promesa se resuelve con éxito. En este caso, se registra la respuesta en la consola, almacenando el token de la respuesta en el almacenamiento local y luego redirigiendo al usuario a la ruta 'Profile' utilizando el enrutador Vue.

// .catch((error) => {...}): Esta es una función que se ejecuta cuando la promesa se rechaza debido a un error. En este caso, se registra un mensaje de error en la consola.

// Este componente Vue permite a los usuarios registrarse en la aplicación. 
//Recoge el nombre, el correo electrónico y la contraseña del usuario, los envía a la API para registrarse y luego maneja la respuesta de la API.
</script>