
//export the object directly
export default {
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
    getters:{}
}