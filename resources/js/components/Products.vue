<template>
    <section class="section">
        <div class="columns is-multiline">
            <div class="column is-12">
                <router-link class="button is-primary is-fullwidth" to="/createProduct"> Create new Product</router-link>
            </div>
            <div class="column is-12">
                <div class="level">
                    <div class="level-left">
                        <div class="field">
                            <label class="label">Category filter</label>
                            <div class="control">
                                <div class="select is-primary">
                                    <select @change="filterCategory" v-model="catSelect">
                                        <option value="all" selected="selected">All</option>
                                        <option :value="category.categoryId" v-for="(category,index) in categories" :key="index">{{category.categoryName}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="level-right">
                        <button class="button mx-2" @click="sortDesc()">DESC</button>
                        <button class="button is-primary" @click="sortTAsc">ASC</button>
                    </div>
                </div>
            </div>
            <div class="column is-12">
                <div class="table-container">
                    <vue-confirm-dialog></vue-confirm-dialog>
                    <table class="table is-fullwidth">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>IMAGE</th>
                            <th>PRODUCT NAME</th>
                            <th>PRICE</th>
                            <th>PRODUCT DESCRIPTION</th>
                            <th>CATEGORIES</th>
                            <th>Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(product,index) in products" :key="index">
                            <td>{{product.productId}}</td>
                            <td>
                                <figure class="image is-128x128">
                                    <img :src="'./storage/'+product.productImage" :alt="product.productImage">
                                </figure>

                            </td>
                            <td>{{product.productName}}</td>
                            <td>{{product.price}}</td>
                            <td>{{product.productDescription}}</td>
                            <td>
                                <span v-for="(category,index) in product.categories" :key="index" class="tag is-primary is-normal mx-2">{{category.categoryName}}</span>
                            </td>
                            <td>
                                <button @click="deleteProduct(product.productId)" class="button is-danger">Delete</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

import store from "../store/store";
export default {
name: "Products",
    data(){
        return{
            products:this.$store.state.product.products,
            categories:this.$store.state.category.categories,
            catSelect:'all',
            sortType:"desc"
        }
    },
    methods:{
        deleteProduct(id){
            this.$confirm(
                {
                    message: `Are you sure?`,
                    button: {
                        no: 'No',
                        yes: 'Yes'
                    },
                    callback: confirm => {
                        if (confirm) {
                          this.$store.dispatch('product/deleteProduct',id);
                        }
                    }
                }
            )
        },
        sortDesc(){
            this.products=this.products.sort((a,b)=>(a.price>b.price)?1:-1)
        },
        sortTAsc(){
            this.products=this.products.sort((a,b)=>(a.price<b.price)?1:-1)
        },
        filterCategory(){
            if (this.catSelect==='all'){
                this.products=this.$store.state.product.products
            }else{
               this.products=this.$store.state.category.categories.filter(category=>category.categoryId===this.catSelect)[0].categoryProducts;
            }
        }
    },
    mounted() {
        store.dispatch('category/fetchCategories');
        store.dispatch('product/fetchProducts');
    }
}
</script>

<style scoped>

</style>
