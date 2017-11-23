<template>
    <div class="shopping-cart" v-loading.fullscreen.lock="fullscreenLoading">
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in items">
                            <td>{{ item.id }}</td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.quantity }}</td>
                            <td>R$ {{ item.price }}</td>
                            <td>
                                <el-button type="danger" v-on:click="removeItem(item.id)" icon="el-icon-delete" size="mini" round>Remover</el-button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table">
                    <tr>
                        <td>Itens do carrinho:</td>
                        <td>{{itemCount}}</td>
                    </tr>
                    <tr>
                        <td>Quantidade total de produtos:</td>
                        <td>{{ details.total_quantity }}</td>
                    </tr>
                    <tr>
                        <td>Sub Total:</td>
                        <td>{{ 'R$ ' + details.sub_total.toFixed(2) }}</td>
                    </tr>
                    <tr>
                        <td>Total:</td>
                        <td>{{ 'R$ ' + details.total.toFixed(2) }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                <el-button type="success" round>Finalizar compra</el-button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return{
            fullscreenLoading: false,
            details: {
                sub_total: 0,
                total: 0,
                total_quantity: 0
            },
            itemCount: 0,
            items: [],
            item: {
                id: '',
                name: '',
                price: 0.00,
                qty: 1
            }
        }
    },
    mounted() {
        this.loadItems();
        console.log('Carrinho de Compra mounted.')
    },
    methods: {
        removeItem: function(id) {
            var _this = this;

            this.$confirm('Deseja remover este produto do carrinho?', 'Remover produto?', {
                confirmButtonText: 'Remover',
                cancelButtonText: 'Cancelar',
            }).then(() => {
                _this.fullscreenLoading = true;
                axios.post('/cart/'+id).then(function(success) {
                    _this.loadItems();
                }, function(error) {
                    console.log(error);
                });
            }).catch(() => {
                _this.$message({
                    type: 'info',
                    message: 'Ação cancelada.'
                });
            });


        },
        loadItems: function() {
            var _this = this;
            axios.get('/cart',{
                params: {
                    limit:10
                }
            }).then(function(success) {
                _this.items = success.data.data;
                _this.itemCount = success.data.data.length;
                _this.loadCartDetails();
            }, function(error) {
                console.log(error);
            });
        },
        loadCartDetails: function() {
            var _this = this;
            axios.get('/cart/details').then(function(success) {
                _this.details = success.data.data;
                _this.fullscreenLoading = false;
            }, function(error) {
                console.log(error);
            });
        }
    }
}
</script>
