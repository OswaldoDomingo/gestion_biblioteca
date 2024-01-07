<template>
    <div class="flex justify-center items-center">
        <form @submit.prevent="login" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="" class="sr-only">Email</label>
                <input v-model="email" type="text" id="email" placeholder="Email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

            </div>

            <div class="mb-4">
                <label for="" class="sr-only">Contraseña</label>
                <input v-model="password" type="password" id="password" placeholder="Contraseña"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

            </div>

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Iniciar sesión
            </button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        login() {
            axios
                .post('/api/login', {
                    email: this.email,
                    password: this.password
                })
                .then((response) => {
                    // alert(response.data.token);
                    alert("Inicio OK");
                    localStorage.setItem('token', response.data.token);
                    this.$router.push({ name: 'Profile' });
                })
                .catch((error) => {
                    console.log('Error de registro', error);
                    alert('Error de registro', error);
                });
        },
    },
};
</script>