
<script setup>
  import Forms from '../../../components/login/forms.vue'
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
      <Forms />
      
    </div>
  </div>

</template>