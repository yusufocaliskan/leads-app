
<script setup> 
    
    import { inject } from 'vue'
    const Store = inject('Store')

    /**
     * Logouts the user.
     */
    function logout()
    {
        Store.dispatch('logout')
       // location.reload()
    }

</script>
<template>
    <h1>Dashboard</h1>
    <h1 @click="logout">Logout</h1>
</template>

