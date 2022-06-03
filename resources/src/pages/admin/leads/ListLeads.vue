<script setup>
    import {ref, inject, onMounted, computed} from 'vue'
    import { useToast,POSITION } from 'vue-toastification';
    import EditForm from "../../../components/leads/EditForm.vue";


    //Define the provides.
    const Axios = inject('Axios')
    const Store = inject('Store')

    //Toast Message
    const Toast = useToast()
    
    //Leads...
    const all_leads = ref([])
    const current_lead = ref([])
    
    //errors
    const errors = ref([])

    //show edit form
    const show_edit_form = ref([])

    //To show the loading bar. 
    const is_Loading = computed(()=> Store.state.is_Loading )

    /**
     * Get all the leads..
     */
    onMounted(() => {   
        get_all_leads()
    })

    function get_all_leads(){

        Store.dispatch('setLoading',true)

        //Get all the leads
        Axios.post('/leads')
        .then(resp => {

            //set them
            all_leads.value = resp.data.leads
            Store.dispatch('setLoading',false)
        })
    }

    /**
     * Deleting a lead by giving it's id
     * @param {mixed} leadId The deleted lead's Id
     */
    function delete_lead(leadId, email)
    {
        Store.dispatch('setLoading',true)

        //Ask her if she was sure?
        if(!confirm("Do you realy want to delete?"))
        {
            Store.dispatch('setLoading',false)
            return false;
        }



        //deleted
        Axios.post('/lead/delete/'+leadId, {'email':email})
        .then(resp=>{
            
            //Load the leads again..
            //Refresh the table
            get_all_leads()
            Store.dispatch('setLoading',false)

            //Show the responeded message
            Toast.success(resp.data.error.message,{ position: POSITION.BOTTOM_LEFT })
          
        })
        .catch(err => {
            Store.dispatch('setLoading',false)
            errors.value = err.response.data.errors
        })
    }

    /**
     * Gets the leads data from sever
     * using its id.
     * 
     * @param {mixed} leadId leads id
     */
    function edit_lead(leadId){
       show_edit_form.value = true
      
        //Get the leads data via id
        Axios.post('/lead/show/'+leadId)
        .then(resp => {
            current_lead.value = resp.data.lead;
            window.scrollTo(0, 0);
           
        })

    }

    /**
     * Saves the leads' data to database
     */
    function save_lead()
    {
        Store.dispatch('setLoading',true)
       Axios.put('/lead/update/'+current_lead.value._id,current_lead.value)
       .then(resp => {
            Toast.success(resp.data.error.message)
            errors.value = null
            Store.dispatch('setLoading',false)

            //Load the leads again..
            //Refresh the table
            get_all_leads()
       })
       .catch(err => {
           console.log(err)
            //errors.value = err.response.data.errors
       })
    }
   
</script>

<template>
    
<EditForm :show="show_edit_form" :errors="errors" :lead_data="current_lead" @save-lead="save_lead" />

<div class="loading" v-if="is_Loading">
    <div class="loader"></div>
    <p>Loading...</p>
</div>

<div v-else class="relative overflow-x-auto shadow-md sm:rounded-lg">
    
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Terms
                </th>
               
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                    
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="lead in all_leads"
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{lead.name}}
                </th>
                <td class="px-6 py-4">
                    {{lead.email}}
                </td>
                <td class="px-6 py-4">
                    <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-emerald-600 bg-emerald-200 uppercase last:mr-0 mr-1">
                        {{lead.terms ? 'approves' : lead.terms}}
                    </span>
                    
                </td>
                
                <td class="px-6 py-4 text-right">
                    <a @click="delete_lead(lead._id, lead.email)"   href="#" class="inline-block font-medium text-blue-600 dark:text-blue-500 hover:text-black hover:bg-amber-300 rounded p-1  ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a @click.prevent="edit_lead(lead._id,$event)" href="#" class="inline-block  ml-4 text-blue-600 dark:text-blue-500  dark:text-blue-500 hover:text-black hover:bg-amber-300 rounded p-1 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5  " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </a>
                    
                </td>
            </tr>
            
        </tbody>
    </table>
</div>
    
</template>