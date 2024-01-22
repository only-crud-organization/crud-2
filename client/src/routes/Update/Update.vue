<script setup>
    import '../routes.css'
    import Nav from '../../components/Nav/Nav.vue'
    import Label from '../../components/Label/Label.vue'
import axios from 'axios';
</script>
<template>
  <section className="section-container">
            <Nav></Nav>
            <form @submit.prevent="updateProduct(product.id)">
                <div className="form-control-container">
                    <h2>Atualizar produto existente</h2>
                </div>
                <div className="form-control-container">
                    <Label
                     htmlFor='id'
                     labelText='ID do produto' 
                    />
                    <input
                        type='number' 
                        v-model='product.id'
                        id='id'
                        name='id' 
                        placeholder='Informe o número de ID do produto que deseja editar' 
                        required
                    />
                    
                </div>
                <div className="form-control-container">
                    <Label
                     htmlFor='name'
                     labelText='Nome do produto' 
                    />
                    <input
                        type='text' 
                        v-model='product.name'
                        id='name'
                        name='name' 
                        placeholder='Informe o nome do produto que deseja editar' 
                        onChange=handleNameChange
                        required
                    />
                </div>
                <div className="form-control-container">
                    <Label
                     htmlFor='price'
                     labelText='Preço do produto' 
                    />
                    <input
                        type='number' 
                        v-model='product.price'
                        step='0.01'
                        id='price'
                        placeholder='Informe o preço do produto que deseja editar' 
                        required
                    />
                </div>
                <div className="form-control-container">
                    <input
                        className='submit-input update'
                        type='submit' 
                        value='Salvar alterações'
                    />
                </div>
            </form>
        </section>
</template>
<script>
    export default {
        name: 'update-product',
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
            async updateProduct(id) {
                await axios.put(`http://localhost:8000/api/produtos/editar/${id}`, {
                    name: this.product.name,
                    price: this.product.price
                })
                .then(response => {
                    console.log(response.data);
                    alert(`Produto editado com sucesso: 'ID ${this.product.id}''`)
                    this.product.id = 0;
                    this.product.name = "";
                    this.product.price = 0;
                })
                .catch(error => {
                    console.log(error);
                });
                
            }
        }
    }
</script>