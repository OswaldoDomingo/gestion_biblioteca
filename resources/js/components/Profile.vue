<template>
    <div>
        <h2>Perfil de usuario</h2>
        <div v-if="user">
            <p>Nombre: {{ user.name }}</p>
            <p>Correo Electrónico {{ user.email }}</p>

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="logout">
                Cerrar sesión
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null
        }
    },
    mounted() {
        fetch('api/user', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token'),
            },
        })
            .then((response) => { return response.json() })
            .then((data) => { this.user = data })
            .catch((error) => {
                console.log('Error en los datos', error);
            });
    },
    methods: {
        logout() {
            fetch('logout/',{
                method : 'POST',
                headers : {
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                },
            })
            .then(() => {
                localStorage.removeItem('token');
                this.$router.push({ name: 'Login' });
            })
            .catch((error) => {
                console.log('Error al cerrar sesión', error);
            })
        },
    },
};
</script>