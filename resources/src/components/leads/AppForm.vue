<script setup>
  import Notice from '../../components/admin/Notice.vue'
  import { defineProps } from 'vue';

  const props = defineProps({
      errors: Object,
      lead_data: Object
  })
</script>

<template>
  <div class="mt-10 sm:mt-0">
    <div class=" ">
      
      <div class="mt-5 md:mt-0">
        <form @submit.prevent="$emit('save_lead')">
          <div class="shadow overflow-hidden sm:rounded-md">
             
            <div class="px-4 py-5 bg-white sm:p-6 mt-4">
                <h1 class="font-medium text-2xl green-color">Application form</h1>
                 <p class="mt-2 text-md mb-5 text-gray-500">
                   
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed ullam eveniet commodi amet hic nulla est eum debitis porro nisi? Ducimus, debitis quasi voluptas velit?
                </p>
                
                <Notice :errors="errors" v-if="errors"/>
              <div class="grid grid-cols-1">

               <div class="col-span-1 sm:col-span-4">
                  <label for="name" class="block mb-2 mt-4 text-sm font-medium text-gray-700">Your Full name</label>
                  <input v-model="lead_data.name" type="text" placeholder="Type your full name" name="name" id="name" autocomplete="name" class="appearance-none  relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" />
                </div>

                <div class="col-span-1 sm:col-span-4">
                  <label for="email" class="block text-sm mb-2 mt-4  font-medium text-gray-700">Email address</label>
                  <input v-model="lead_data.email" placeholder="Your e-mail address" type="text" name="email" id="email" autocomplete="email" class="appearance-none  relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" />
                </div>

                <div class="col-span-6 mt-7">
                    <fieldset>
                    <div class="mb-14 space-y-4">
                  <div class="flex items-start">
                    <div class="flex items-center h-5">
                      <input v-model="lead_data.terms" value="yes" id="terms" name="terms" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                    </div>
                    <div class="ml-3 text-sm">
                      <label for="terms" class="font-medium text-gray-700"> 
                      <p class="text-gray-500 font-normal">
                        By clicking Apply, you agree to our Terms, Data Policy and Cookie Policy. You may receive SMS notifications from us and can opt out at any time.
                      </p>
                      </label>
                    </div>
                  </div>
                  
                  
                </div>
              </fieldset>

                </div>
           
               
              </div>
            </div>
            
            <div class="px-4 py-3 bg-gray-50 flex justify-end text-right sm:px-6">
                <router-link to="/" class="purple-color mt-2 mr-5 text-center text-sm text-gray-600">
                    Go Back
                </router-link>
              <button type="submit" id="apply-form" class="  relative pl-30 yellow-bg inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="absolute left-2 inset-y-0 flex items-center ">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"></path></svg>
                    </span>
                  Apply</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


</template>

<style scoped>
    body{
        background:#E3EEFF 
    }
    #apply-form{
        padding-left: 40px
    }
</style>