<script setup>
  import { Popover } from '@headlessui/vue'
  import { inject } from 'vue';

  const Store = inject('Store')

</script>

<template>
  <div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
      <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
        <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
          <polygon points="50,0 100,0 50,100 0,100" />
        </svg>

        <Popover>
          <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
            <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
              <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                <div class="flex items-center justify-center w-full md:w-auto">
                  <a href="#">
                    <span class="sr-only">learnwolds</span>
                    <img alt="Workflow" class="h-8 w-auto sm:h-10" src="../../../assets/images/logo.png" />
                  </a>
                 
                </div>
              </div>
            </nav>
          </div>
        </Popover>

        <main class=" -translate-y-6 mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
          <div class="sm:text-center lg:text-left">
            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
              <span class="block xl:inline">Do you want to work with us?</span>
              {{ ' ' }}
              <span class="block text-indigo-600 xl:inline-block green-color">Let's get started</span>
            </h1>
            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
              We are looking for a talented and competitive Software Engineer that has a passion for software development and technology. 
              </p>
            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
              <div class="rounded-md shadow">
                <router-link to="/app-form" class="yellow-bg w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg> <span class="pl-5">Application Form</span>
                </router-link>

              </div>
              <div class="mt-3 sm:mt-0 sm:ml-3" v-if="Store.getters.isLoggedIn != true">

                <router-link to="/login" class="purple-bg w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                  </svg> <span class="pl-5">Login</span>
                </router-link>
              </div>
              <div class="mt-3 sm:mt-0 sm:ml-3" v-else>

                <router-link to="/leads" class="green-bg w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-black-300 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                  </svg> 
                  <span class="pl-5">Dashboard</span>
                </router-link>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
      <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="../../../../public/front-image.avif" alt="" />
    </div>
  </div>
</template>



