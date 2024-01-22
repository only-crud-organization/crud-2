<script setup >
    import '../routes.css'
    import Nav from '../../components/Nav/Nav.vue'
    import axios from 'axios'
</script>
<template>
    <section className="section-container">
        <Nav></Nav>
        <div className="form-control-container">
            <h2>Lista de produtos</h2>
        </div>
        <div className="form-control-container .table-container">
            <table>
                <thead>
                    <tr>
                        <th>Id do produto</th>
                        <th id="name-th">Nome</th>
                        <th id="price-th">Preço</th>
                    </tr>
                </thead>
                <tbody v-if="products.length > 0 ">
                    <!-- CONTEÚDO PUXADO PELA API -->

                    <!-- O 'v-if' é usado para renderização condicional -->
                    <!-- O 'v-for' para iteração/mapeamento -->
                    <tr v-for="(product) in products" className="row">
                        <td id="td-id">{{product.id}}</td>
                        <td id="td-name">{{product.name}}</td>
                        <td id="td-price">{{product.price}}</td>
                    </tr>      
                </tbody>
                <tbody v-else>
                    <tr className="row">
                        <td>Buscando dados...</td>
                        <td>Buscando dados...</td>
                        <td>Buscando dados...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>
<script>
    export default {
        name: 'product-list',
        data() {
            return {
                products: []
            }
        },
        mounted() {
            this.getAllProducts()
        },
        methods: {
            async getAllProducts() {
                await axios.get('http://localhost:8000/api/produtos')
                .then((response) => {
                    this.products = response.data
                })
                .catch(error => {
                console.log(error)
                this.products = []
            })
            }
        }
    }
</script>