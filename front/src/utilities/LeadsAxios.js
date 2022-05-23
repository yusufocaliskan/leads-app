import axios from 'axios'
import store from '../store/'

//Create a custom axios
const LeadsAxios = axios.create({
    baseURL: 'http://localhost:8000/api/',
    headers:{
        "Content-Type":'applications/json',
        accept:'applications/json'
    }
});


//include the user token to the each request
//it is a necessity of Laravel 
LeadsAxios.interceptors.request.use(config =>{

    config.headers.Authorization = `Bearer ${store.state.UserModule.admin_data.token}`
    return config;
})


//Export
export default LeadsAxios;