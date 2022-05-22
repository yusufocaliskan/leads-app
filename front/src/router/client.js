import IndexPage from '../pages/client/index/IndexPage.vue';
import LeadAppForm from '../pages/client/leads/LeadAppForm.vue'

/**
 * Holds all the routes that would be used in leads pages
 */
const client_layout = [
    {
        path: "/",
        component: IndexPage,
        name: "index",
        meta: {
            layout: "ClientLayout"
        }
    },

    {
        path:'/app-form',
        component: LeadAppForm,
        name: 'app-form',
        meta:{
            layout: 'ClientLayout'
        }

    }
];

//export it.

export default client_layout;