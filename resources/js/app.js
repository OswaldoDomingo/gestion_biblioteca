import './bootstrap';
//
import{ createApp } from 'vue';

//Importamos el componente de vue
import HelloWorld from '@/components/HelloWorld.vue';

//Importamos el componente de vue
import BookList from '@/components/BookList.vue';

//Importamos el componente de vue
import router from "./router.js"

//Se crea la aplicación y se monta en el elemento con id app
createApp(HelloWorld).use(router).mount("#app");

