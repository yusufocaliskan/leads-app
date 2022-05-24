
<script setup>
    import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
    import { LogoutIcon, MenuIcon, XIcon } from '@heroicons/vue/outline'
    import { inject } from 'vue'
    import navigation from './navigation.vue'
    import { useRoute } from "vue-router";

    const Route = useRoute()
    

    const navs = [
    { name: 'Dashboard', path: '/dashboard', current: true },
    { name: 'Leads', path: '/leads', current: false },
    { name: 'Home', path: '/', current: false }

    ]

    const userNavigation = [
        { name: 'Sign out', href: '#'},
    ]

   //Get the variables.
    const Store = inject('Store')
    const Router = inject('Router')
    

    /**
     * Logouts the user.
     */
    function logout()
    {
        //Delete token in the server
        //And sent her to index page
        Store.dispatch('logout')
        Router.push({name:'index'})
       
    }
    
</script>
<template>
   <Disclosure as="nav" class="bg-slate-200" v-slot="{ open }">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <router-link :to="'/'">
                <img class="h-8 w-auto sm:h-10" src="../../assets/images/logo.png" alt="Learnworlds" />
              </router-link>
            </div>
            <div class="hidden md:block">
              <navigation :links="navs" />
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <button type="button" class=" p-1 rounded-full text-gray-400 hover:text-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                
                 <LogoutIcon  @click="logout" class="h-6 w-6" aria-hidden="true" />
              </button>

              <!-- Profile dropdown -->
              <Menu as="div" class="ml-3 relative">
                <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                  <MenuItems class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                 
                    <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                      <a :href="item.href" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item.name }}</a>
                    </MenuItem>
                  </MenuItems>
                </transition>
              </Menu>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <DisclosureButton class=" inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-300 ">
              <span class="sr-only">Open main menu</span>
              <MenuIcon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
              <XIcon v-else class="block h-6 w-6" aria-hidden="true" />
            </DisclosureButton>
          </div>
        </div>
      </div>

      <DisclosurePanel class="md:hidden">
        <navigation :links="navs" :is_mobile="true"/>
        
        <div class="pt-4 pb-3 border-t border-gray-300">
          <div class="mt-3 px-2 space-y-1">
            <DisclosureButton v-for="item in userNavigation" :key="item.name" as="a" :href="item.href" @click="logout" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">{{ item.name }}</DisclosureButton>
          </div>
        </div>
      </DisclosurePanel>
    </Disclosure>
</template>