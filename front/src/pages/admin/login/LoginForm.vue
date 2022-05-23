
<script setup>
  import { LockClosedIcon, UserAddIcon } from '@heroicons/vue/solid'
  import {ref, inject} from 'vue'
  import { useToast } from "vue-toastification";
  
 
 //Get the providers
  const Axios = inject('Axios')
  const Store = inject('Store');

  const toast = useToast()

  //define the varialbes.
  const data = ref({
    email: '',
    password: ''
  })

  const errors = ref('')

  function Login(){

    Axios.post('http://localhost:8000/login',{
      email: data.value.email,
      password: data.value.password
    })
    .then((response) => {
      console.log(response)
      if(response.status == 200)
      {
        toast.create()
      }
    })  
  }

</script>

<template>

    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="../../../assets/images/logo.png" alt="Workflow" />
        
      </div>
    <div class="shadow bg-white px-4 py-5 bg-white sm:p-6 overflow-hidden sm:rounded-md">
      <h1 class="font-medium text-2xl green-color">Login Form</h1>
      <form class="mt-8 space-y-6" @submit.prevent="Login" >
        <input type="hidden" name="remember" value="true" />

        <div v-if="errors">
          {{errors}}
        </div>

        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input v-model="data.email"  id="email-address" name="email" type="text" autocomplete="email" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address" />
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input v-model="data.password"  id="password" name="password" type="password" autocomplete="current-password" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password" />
          </div>
        </div>

        <div>
          <button type="submit" class="yellow-bg group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <LockClosedIcon class="black-color h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true" />
            </span>
            Sign in
          </button>
        </div>
      </form>
  </div>
      <p class="mt-2 text-center text-sm text-gray-600 ">
        <router-link to="/" class="purple-color font-medium text-indigo-600 hover:text-indigo-500">
            Go back</router-link>
      </p>
    </div>
    
  </div>

</template>