<script setup>
    defineProps(['forElement', 'className', 'labelText'])
</script>
<template>
        <label 
            htmlFor='forElement'
            className='className'
        >
            {{labelText}}
        </label>
</template>
<style scoped>
    /* Estilização do componente Label e suas variantes */
    label {
        color: #57534e;
        font-size: 1rem;
        font-weight: 600;
    }
</style>