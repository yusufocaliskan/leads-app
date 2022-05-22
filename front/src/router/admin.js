//Imports all pages components
import DashboardIndex from '../pages/admin/dashboard/DashboardIndex.vue'

//Login Page
import LoginForm from '../pages/admin/login/LoginForm.vue'

//create the admin routes array
const admin_routes = [
    {
        path:'/dashboard/',
        component:DashboardIndex,
        name: 'dashboard-index',
        meta: {
            layout: "AdminLayout"
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