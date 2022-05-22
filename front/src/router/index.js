import {createRouter, createWebHistory} from 'vue-router'

//Import the custom routes
import admin_routes from './admin';
import client_layout from './client';


//Gether all the routes
const routes = [...client_layout, ...admin_routes];

//Create the router
const router = createRouter({
    routes:routes,
    history:createWebHistory()
})

//And export it.
export default router