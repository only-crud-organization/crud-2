<script setup>
    import { PhEye, PhPlusCircle, PhPencilSimpleLine, PhTrash } from '@phosphor-icons/vue'
</script>

<template>
       
          <nav>
            <ul>
                <!-- {/* Rota para Create */} -->
                <router-link to='/produtos/criar' className='icon'>
                   <ph-plus-circle weight="bold" />
                </router-link> 
                <!-- {/* Rota para Read */} -->
                <router-link to='/produtos'  className='icon' >
                    <ph-eye weight="bold" />
                </router-link>
                <!-- {/* Rota para Uptade */} -->
                <router-link to='/produtos/editar' className='icon'>
                    <ph-pencil-simple-line weight="bold" />
                </router-link>
                <!-- {/* Rota para Delete */} -->
                <router-link to='/produtos/excluir' className='icon'>
                    <ph-trash weight="bold" />
                </router-link>
            </ul>
        </nav>

</template>
<style scoped>
    /* Estilização do componente Nav e suas variantes */
    nav {
        display: flex;
        flex: row nowrap;
        align-items: center;
        border-bottom: solid .0938rem #d6d3d1;;
    }
    nav ul{
        display: flex;
        flex: row nowrap;
        align-items: center;
        justify-content: center;
        text-align: center;
        gap: 0rem .5rem;
        width: 100%;
        padding: 0rem  1rem;
        /* border: solid 2px red; */
    }

    nav ul .icon {
        font-size: 2rem;
        text-align: center; 
        color: #57534e;
        padding: 1rem 2rem;
        transition: .1s ease-in-out;
        /* border: solid 2px red; */
    }

    nav ul .icon:hover {
        background-color: #fafaf9;
    }
</style>