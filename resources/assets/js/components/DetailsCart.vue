<template>
    <div class="details-cart">
        <a href="/cart">
            <div class="carrinho_compras">
                <div class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                <div class="titulo">Meu Carrinho</div>
                <div class="item_valor">{{this.details.total_quantity}} itens - <b>R$ {{this.details.total}}</b></div>
            </div>
        </a>
    </div>
</template>

<script>
export default {
    mounted() {
        this.loadCartDetails();
        console.log('Component DetailsCart mounted.')
    },
    data() {
        return{
            details: {
                sub_total: 0,
                total: 0,
                total_quantity: 0
            },
        }
    },
    methods: {
        loadCartDetails: function() {
            var _this = this;
            axios.get('/cart/details').then(function(success) {
                _this.details = success.data.data;
            }, function(error) {
                console.log(error);
            });
        }
    }
}
</script>
