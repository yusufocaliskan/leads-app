import {createStore} from 'vuex'

//Export all the modules
import AuthModule from './modules/AuthModule'
import LeadsModule from './modules/LeadsModule'
import UserModule from './modules/UserModule'

/**
 * Crate the store
 */
const store = createStore({
    state:{},
    actions:{},
    mutations:{},
    getters:{},
    modules:{
        LeadsModule:LeadsModule,
        AuthModule:AuthModule,
        UserModule:UserModule
    }
});

export default store;