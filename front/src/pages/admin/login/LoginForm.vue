
<script setup>
  import Forms from '../../../components/login/Forms.vue'
  import {useStore} from 'vuex'
  const store = useStore()
  console.log(store)
</script>

<template>
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="../../../assets/images/logo.png" alt="Workflow" />
        
      </div>
    <div class="shadow bg-white px-4 py-5 bg-white sm:p-6 overflow-hidden sm:rounded-md">
      <h1 class="font-medium text-2xl green-color">Login Form</h1>
      <Forms />
  </div>
      <p class="mt-2 text-center text-sm text-gray-600 ">
        <router-link to="/" class="purple-color font-medium text-indigo-600 hover:text-indigo-500">
            Go back</router-link>
      </p>
    </div>
  </div>

</template>