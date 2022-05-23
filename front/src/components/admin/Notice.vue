<script setup>
    import { defineProps, computed } from "vue"
    const props = defineProps({
                        errors: Object
                    })
 
</script>
<template>

    <div role="alert"  v-for="error in props.errors"  >
        <div class="bg-red-500 rounded text-white font-bold px-4 mb-1 py-2">
            <p v-if=" Object.keys(error).length > 0 " v-for="e in error">{{e}}</p>
        </div>
    </div>
</template>