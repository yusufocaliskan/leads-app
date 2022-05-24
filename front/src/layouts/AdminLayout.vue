<script setup>
    import Header from '../components/admin/Header.vue'
    import DashNavigation from '../components/admin/DashNavigation.vue'
  
</script>
<template>
  
  <div class="min-h-full">
    
      <DashNavigation />
      <Header />
      
      
    <main>
      <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
          
        <div class="px-4 py-6 sm:px-0">
            
          <div class="border-4 border-dashed border-gray-200 rounded-lg">
              <router-view></router-view>
             
          </div>


          
        </div>
        <!-- /End replace -->
      </div>
    </main>
  </div>
</template>