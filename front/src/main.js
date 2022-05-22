import { createApp } from 'vue'
import App from './App.vue'
import './index.css'

//import the store 
import store from './store'

//Import the router
import router from './router'

const app = createApp(App);

//set the store and the router
app.use(store)
app.use(router)

//mount to the #app
app.mount('#app')
