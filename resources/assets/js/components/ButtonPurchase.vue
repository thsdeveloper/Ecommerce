<template>
   <div class="button-purchase">
      <el-button type="success" round icon="el-icon-goods" :loading="btnLoading" @click="purchase">{{buttonTextPurchase}}</el-button>
      <el-button type="text" icon="el-icon-circle-plus-outline" @click="addCart" v-loading.fullscreen.lock="fullscreenLoading">Adicionar no carrinho</el-button>
      <el-input-number size="mini" v-model="quantity"></el-input-number>
   </div>
</div>
</template>

<script>
export default {
    props: ['product'],
   data() {
      return{
         buttonTextPurchase: 'Comprar agora',
         buttonTextLoading: 'Aguarde...',
         btnLoading: false,
         fullscreenLoading: false,
         quantity: 1,

         //Arrays
         items: [],
         itemCount: '',

         details: {
            sub_total: 0,
            total: 0,
            total_quantity: 0
         },
      }
   },
   mounted() {
      this.loadItems();
      console.log('Component Button Purchase mounted.')
   },
   methods: {
      purchase(){
         var _this = this;
         _this.buttonTextPurchase = _this.buttonTextLoading;
         _this.btnLoading = true;

         axios.post('/cart',{
            id: _this.product.code,
            name: _this.product.name,
            price: _this.product.promotional_price,
            qty: _this.quantity,
         }).then(function(success){
            window.location.href = "/cart";
         }, function(error) {
            console.log(error);
         });
      },
      addCart() {
         var _this = this;
         _this.fullscreenLoading = true;
         axios.post('/cart',{
            id: _this.product.code,
            name: _this.product.name,
            price: _this.product.promotional_price,
            qty: _this.quantity,
         }).then(function(success){
            _this.loadItems();
            _this.fullscreenLoading = false;
            _this.$message({
               message: 'Produto adicionado ao carrinho!',
               type: 'success'
            });
         }, function(error) {
            _this.fullscreenLoading = false;
            console.log(error);
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
         }, function(error) {
            console.log(error);
         });
      }
   }
}
</script>
<style>
.button-purchase {
   background-color: white;
   text-align: center!important;
   padding-top: 20px;
   padding-bottom: 10px;
   border-radius: 7px;
}
</style>
