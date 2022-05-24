import {createStore} from 'vuex'

//Export all the modules
import AuthModule from './modules/AuthModule'
import LeadsModule from './modules/LeadsModule'
import UserModule from './modules/UserModule'

/**
 * Crate the store
 */
const store = createStore({
    state:{
        is_Loading: null
    },
    actions:{
        setLoading({commit}, val){
            commit('setLoading', val)
        }
    },
    mutations:{
        setLoading(state, val){
            state.is_Loading = val
        }
    },
    getters:{},
    modules:{
        LeadsModule:LeadsModule,
        AuthModule:AuthModule,
        UserModule:UserModule
    }
});

export default store;