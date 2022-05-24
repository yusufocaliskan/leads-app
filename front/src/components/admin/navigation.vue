
<script setup>
    import {defineProps} from "vue"
    import { useRoute } from "vue-router";

    const props = defineProps({
        links: Object,
        is_mobile: Boolean
    });
    const Route = useRoute()
    
</script>
<template>
    <div class="ml-10 flex items-baseline space-x-4" v-if="is_mobile == false">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <router-link v-for="item in props.links" 
        :key="item.name"
        :to="item.path" 
        :active-class="'yellow-bg text-black'"
        :class="[
            item.path === Route.path ? 'bg-gray-400 text-white' 
                                : 'text-gray-500 hover:bg-gray-300 hover:text-white mr-5', ' mr-5 px-3 py-2 rounded-md text-base font-medium']" 
        >{{ item.name }}</router-link>
        </div>
    </div>

    <div class="headlessui-disclosure-panel-2" v-if="props.is_mobile" >
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <router-link v-for="item in props.links" 
        :key="item.name"
        :to="item.path" 
        :active-class="'yellow-bg text-black'"
        :class="[
            item.path === Route.path ? 'bg-gray-400 text-white' 
                                : 'text-gray-500 hover:bg-gray-300 hover:text-white', 'block px-3 py-2 rounded-md text-base font-medium']" 
        >{{ item.name }}</router-link>
        </div>
    </div>

    
</template>