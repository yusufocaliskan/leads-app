//Imports all pages components
import DashboardIndex from '../pages/admin/dashboard/DashboardIndex.vue'
import ListLeads from '../pages/admin/leads/ListLeads.vue'
//Login Page
import LoginForm from '../pages/admin/login/LoginForm.vue'

//create the admin routes array
const admin_routes = [
    {
        path:'/dashboard/',
        component:DashboardIndex,
        name: 'dashboard',
        meta: {
            layout: "AdminLayout",
            auth: true,
        }
    },
    {
        path: '/leads',
        component:ListLeads,
        name: 'list-leads',
        meta: {
            layout:'AdminLayout',
            auth:true
        }
        
    },

    {
        path: '/login',
        component:LoginForm,
        name: 'login-form',
        meta: {
            layout:'LoginLayout'
        }
        
    }
];


//Exportted
export default admin_routes;