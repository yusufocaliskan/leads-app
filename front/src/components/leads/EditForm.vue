<script setup>
    import { defineProps, ref, toRef } from "vue";
    import Notice from '../../components/admin/Notice.vue'
    const props = defineProps({
        lead_data: Object,
        show: Boolean,
        errors: Object
    })
    
   
</script>

<template>
  
  <div v-if="props.lead_data != '' " class="mt-10 mb-10  sm:mt-0 bg-gray-50">
      <div class="relative">
            <div @click="props.lead_data=''" class="absolute right-5 top-5  bg-slate-100 hover:bg-slate-500 hover:bg-red-300 hover:text-rose-600	 rounded-full border-solid hover:border-rose-200 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
      </div>
    <div class="md:grid md:grid-cols-1 p-10 px-20 md:gap-6">
      
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-2xl font-medium leading-6 text-gray-900">{{props.lead_data.name}}</h3>
          <p class="mt-1 text-sm text-gray-600">
              <a class="text-indigo-700 hover:underline" href="mailto:{{props.lead_data.email}}">{{props.lead_data.email}}</a>
          </p>
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form @submit.prevent="$emit('save-lead')">
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">

              <Notice :errors="props.errors" v-if="props.errors"/>

              <div class="grid grid-cols-6 gap-6">
                
                <div class="col-span-6 sm:col-span-3">
                  <label   for="name" class="block text-sm font-medium text-gray-700">First name</label>
                  <input v-model="props.lead_data.name" type="text" name="name" id="name" autocomplete="given-name" class="mt-1 p-2 border-1 focus:ring-indigo-500 border-zinc-700 focus:border-indigo-500 block w-full shadow-sm sm:text-sm  rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                  <input v-model="props.lead_data.email" type="text" name="email" id="email" autocomplete="family-name" class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm  rounded-md" />
                </div>

               <div class="col-span-8 text-red">
                   The lead  <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-emerald-600 bg-emerald-200 uppercase last:mr-0 mr-1">
                        {{props.lead_data.terms ? 'approves' : props.lead_data.terms}}
                    </span> terms policy
               </div>
                <input type="hidden" name="_id" v-model="props.lead_data._id">
                <input type="hidden" name="terms" v-model="props.lead_data.terms">
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="green-bg inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  
</template>
