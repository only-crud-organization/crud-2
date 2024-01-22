// Importação de dependências
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import App from './App.vue'
import Create from './routes/Create/Create.vue';
import Delete from './routes/Delete/Delete.vue';
import Read from './routes/Read/Read.vue';
import Update from './routes/Update/Update.vue';
import './main.css'

// Config de roteamento

// Rotas
const routes = [
    { path: '/', component: Read},
    { path: '/produtos', component: Read},
    { path: '/produtos/criar', component: Create},
    { path: '/produtos/editar', component: Update},
    { path: '/produtos/excluir', component: Delete},
]

// Router
const router = createRouter({
    history: createWebHistory(),
    routes
})

const app = createApp(App)
app.use(router).mount('#app')
