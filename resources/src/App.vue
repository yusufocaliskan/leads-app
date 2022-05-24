<script setup>

import {computed, inject} from 'vue';
import { useRoute } from 'vue-router';

//Import the layouts
//in those files are hosted the router-view template
import LoginLayout from './layouts/LoginLayout.vue';
import AdminLayout from './layouts/AdminLayout.vue'
import NoticeLayout from './layouts/NoticeLayout.vue'
import ClientLayout from './layouts/ClientLayout.vue'

//Use the route to gett the layout
const route = useRoute()

//Define the layout container
const default_layout = ClientLayout;
const layout_container = {
  'LoginLayout' : LoginLayout,
  'AdminLayout' : AdminLayout,
  'NoticeLayout' : NoticeLayout,
  'ClientLayout' : ClientLayout,
};

/**
 * Deffine the layout of the page
 */
const setting_the_layout = computed( () => {

    if(route.meta.layout != '')
    {
      return layout_container[route.meta.layout]
    }
    else{
      return default_layout
    }
    
    
  }
);
 


</script>

<template>
  <component :is="setting_the_layout"></component>
</template>

<style>

</style>
