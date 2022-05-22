import { createApp } from 'vue'
import App from './App.vue'
import './index.css'
import { useRouter } from 'vue-router'


//Import the router
import router from './router'

const app = createApp(App);
app.config.globalProperties.$router = useRouter;
app.use(router)
app.mount('#app')
