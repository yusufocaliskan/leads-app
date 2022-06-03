import {createRouter, createWebHistory} from 'vue-router'
import store from '../store';
import PageNotFound from '../components/PageNotFound.vue'

//Import the custom routes
import admin_routes from './admin';
import client_route from './client';

/**
 * Page not found
 */
const default_routes =[
    { 
        path: '/:pathMatch(.*)*', 
        component:PageNotFound,
        name: 'not-found',
        meta: {
            layout:'LoginLayout',
            title: 'Not Found | Leads Application'
        }
    },
]

//Gether all the routes
const routes = [...client_route, ...admin_routes, ...default_routes];

//Create the router
const router = createRouter({
    routes:routes,
    linkActiveClass: 'active-link',
    history:createWebHistory()
});

//-------------------------------------------
//------------- AUTH CONTROL ----------------
//-------------------------------------------
router.beforeEach((to, form, next) => {

    //--------------- [ Step#1 ] ---------------
    //First lets change the title :)
    document.title = to.meta.title

    //--------------- [ Step#2 ] ---------------
    //Is it logged in?
    //and the page is required auth?
    if(to.meta.auth == true && !store.state.UserModule.admin_data.token)
    {
        //no - go to index page..
        next({name:'index'})
    }

    //--------------- [ Step#3 ] ---------------
    //It is Logged in and wants to try attempt to Login page?
    //Don't let them to go to login page again
    //It could coused to the errors
    else if(store.state.UserModule.admin_data.token && to.name == 'login-form')
    {
        //Sent them to dashboard
        next({name:'list-leads'})
    }


    //--------------- [ Step#4 ] --------------- 
    //It is logged in, go to wherever you want
    else{
        next()
    }
});

//And export it.
export default router