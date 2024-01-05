import './bootstrap';
//
import{ createApp } from 'vue';

//Importamos el componente de vue
import HelloWorld from '@/components/HelloWorld.vue';

//Importamos el componente de vue
import BookList from '@/components/BookList.vue';

//Se crea la aplicación
createApp(BookList).mount("#app");

