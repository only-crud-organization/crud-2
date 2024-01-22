<script setup>
    import axios from 'axios';
    import '../routes.css'
    import Nav from '../../components/Nav/Nav.vue'
    import Label from '../../components/Label/Label.vue'
</script>
<template>
      <section className="section-container">
            <Nav></Nav>
            <form @submit.prevent="deleteProduct(product.id)">
                <div class="form-control-container">
                    <h2>Deletar produto existente</h2>
                </div>
                <div class="form-control-container">
                    <Label
                     htmlFor='id'
                     labelText='ID do produto' 
                    />
                    <input
                        type='number' id='id'
                        v-model="product.id"
                        placeholder='Informe o número de ID do produto que deseja editar' 
                        required
                    />
                </div>

                <div class="form-control-container">
                    <input
                        class='submit-input delete'
                        type='submit' 
                        value='Excluir produto'
                        required
                    />
                </div>
            </form>
        </section>
</template>
<script>
    export default {
        name: 'delete-product',
        data() {
            return {
               product: {
                    id: 0,
                    name: '',
                    price: 0
               }
            }
        },
        methods: {
            async deleteProduct(id) {
                await axios.delete(`http://localhost:8000/api/produtos/excluir/${id}`)
                .then(response=>{
                    console.log(response.data)
                    alert(`Produto deletado com sucesso: 'ID ${this.product.id}''`)
                    this.product.id = 0
                }).catch(error=>{
                    alert('Erro ao tentar excluir produto. Revise as informações')
                    console.log(error)
                })
            }
        }
    }
</script>