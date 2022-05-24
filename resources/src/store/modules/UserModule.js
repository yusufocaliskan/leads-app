import axios from 'axios'


export default {

    state:{
        admin_data:{

            //Get the token from storage
            //That was setted in LoginForm.vue
            token: sessionStorage.getItem('token'),
        }
      
    },
    actions:{

        /** Basiclly logouts the user. */
        logout({commit}){

            //clear the token. From local
            commit('clear_user_token')

            //then clear from server
            axios.post('http://localhost:8000/api/users/logout')
            .then(response => {
                //location.reload()
            })
            
        }
    },
    mutations:{

        /**
         * It save the token
         * @param {object} state the state
         * @param {object} data user data
         */
        set_user_token(state, data){

            //set the state
            state.admin_data.token = data.token
            
            //also save it into the storega
            sessionStorage.setItem('token',data.token);

            //Reload the page 
            location.reload()
        },

        /**
         * Clears the user token
         * @param {object} state
         */
        clear_user_token(state)
        {
            //set the state
            state.admin_data.token = null
            
            //also save it into the storega
            sessionStorage.removeItem('token');
        }

    },

    getters:{

        /**
         * Checks if the admin is logged in
         * 
         * @param {object} state 
         * @returns boolean
         */
        isLoggedIn(state)
        {   
            
            if(state.admin_data.token != null)
            {
                return true
            }

            return false;
        }
    },
    

}