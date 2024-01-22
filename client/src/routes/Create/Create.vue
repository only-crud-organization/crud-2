<script setup>
    import axios from 'axios';
    import Nav from '../../components/Nav/Nav.vue'
    import Label from '../../components/Label/Label.vue'
    import '../routes.css'
</script>
<template>
    <section className="section-container">
        <Nav></Nav>
        <!-- O @submit.prevent é a mesma coisa que o preventDefault() do REACT -->
        <!-- Ele impede que, ao enviar o formulário a página atualize -->
        <form @submit.prevent="createProduct">
            <div className="form-control-container">
                <h2>Cadastrar novo produto</h2>
            </div>
            <div className="form-control-container">
                <Label htmlFor='name' labelText='Nome do produto' />
                <input v-model="product.name" type='text' id='name' placeholder='Informe o nome do produto que deseja cadastrar' required />
            </div>
            <div className="form-control-container">
                <Label htmlFor='price' labelText='Preço do produto' />
                <input v-model="product.price" type='number' step="0.01" id='price' placeholder='Informe o preço do produto que deseja cadastrar' required />
            </div>
            <div className="form-control-container">
                <input class='submit-input' type='submit' value="Cadastrar novo produto"/>
            </div>
        </form>
    </section>
</template>
<script>
export default {
    name: 'create-product',
    data() {
        return {
            product : {
                name: '',
                price: 0
            }
        }
    },
    methods: {
        async createProduct() {
            await axios.post('http://localhost:8000/api/produtos/criar', this.product)
            .then(response => {
                alert(`Produto cadastrado com sucesso: '${this.product.name}''`)
                console.log(response.data)
                this.product.name = ""
                this.product.price = 0
            })
            .catch(error => {
                alert(`Houve um problema ao cadastrar o produto. Revise as informações.`)
                console.log(error)
            })
        }
    }
}
</script>