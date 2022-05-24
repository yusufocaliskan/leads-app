import { createApp } from 'vue'
import App from './App.vue'
import './index.css'

import LeadsAxios from './utilities/LeadsAxios'

//Import toast notitications
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

//Modal
import 'flowbite';


//import the store and router 
import store from './store'
import router from './router'

//Create app
const app = createApp(App);

//Set the provides
app.provide('Axios', LeadsAxios)
app.provide('Store', store)
app.provide('Router', router)


//set the store and the router
//Mids
app.use(store)
app.use(router)

app.use(Toast)
app.provide('Toast', Toast)


//mount to the #app
app.mount('#app')