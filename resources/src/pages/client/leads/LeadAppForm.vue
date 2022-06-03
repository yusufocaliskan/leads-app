<script setup>
  import AppForm from "../../../components/leads/AppForm.vue";

  import { ref, inject,computed } from 'vue'
  import { useToast } from 'vue-toastification';
  
  const Store = inject('Store')
  const Router = inject('Router')
  const Axios = inject('Axios')

  //catch the errros
  let errors = ref('')
  let toast = useToast()
  const is_Loading = computed(()=> Store.state.is_Loading )

  //Gett the data
  const lead_data = ref({
    'name': null,
    'email': null,
    'terms':null
  })
  

  function save_lead()
  {
      Store.dispatch('setLoading',true)
      
      Axios.post('/lead/create/',{
        'name':lead_data.value.name,
        'email':lead_data.value.email,
        'terms':lead_data.value.terms
      })
      .then(resp => {
        
        //If its created
        if(resp.data.error.type=='success')
        {
          //errors.value = resp.data.error.message
          toast.success(resp.data.error.message)

          //Clear variables.
          lead_data.value.email = null
          lead_data.value.name = null
          lead_data.value.terms = null
          errors.value = null
          

        }
        Store.dispatch('setLoading',false)
      })

      //Show them thee errors.
      .catch(err => {
          errors.value = err.response.data.errors
           Store.dispatch('setLoading',false)
      })
  }
</script>
<template>
    <div class="loading" v-if="is_Loading">
        <div class="loader"></div>
        <p>Loading...</p>
    </div>
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-lg w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="../../../assets/images/logo.png" alt="Workflow" />
            </div>
            <div class="min-h-full py-12 px-20 sm:px-6 lg:px-12">
                <AppForm  :lead_data="lead_data" :errors="errors" @save_lead="save_lead"/>
            </div>
        </div>
    </div>
</template>