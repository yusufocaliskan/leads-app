<script setup>
    import { useRoute } from "vue-router"
    const Route = useRoute()
</script>
<template>

    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-xl font-bold text-gray-900">{{Route.meta.dashboard_title}}</h1>
      </div>
    </header>

</template>