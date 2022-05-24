import {createStore} from 'vuex'

//Export all the modules
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
        UserModule:UserModule
    }
});

export default store;