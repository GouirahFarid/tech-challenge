<template>
    <section class="section">
        <div class="columns is-multiline">
            <div class="column is-12">
                <router-link class="button is-primary is-fullwidth" to="/createCategory"> Create new category</router-link>
            </div>
            <div class="column is-12">
                <div class="table-container">
                    <vue-confirm-dialog></vue-confirm-dialog>
                    <table class="table is-fullwidth">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category name:</th>
                            <th>Category Parent</th>
                            <th>Category Children</th>
                            <th>Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(category,index) in categories" :key="index">
                            <td>{{category.categoryId}}</td>
                            <td>{{category.categoryName}}</td>
                            <td>
                                <span v-if="category.categoryParent" class="tag is-primary is-normal">{{category.categoryParent.categoryName}}</span>
                            </td>
                            <td>
                                <span v-for="(categoryChild,index) in category.categoryChildren" :key="index" class="tag is-primary is-normal mx-2">{{categoryChild.categoryName}}</span>
                            </td>
                            <td>
                                <button @click="deleteCategory(category.categoryId)" class="button is-danger">Delete</button>
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
export default {
name: "Categories",
    data(){
    return{
        categories:this.$store.state.category.categories
    }
    },
    computed:{
    },
    methods:{
        deleteCategory(id){
            this.$confirm(
                {
                    message: `Are you sure?`,
                    button: {
                        no: 'No',
                        yes: 'Yes'
                    },
                    callback: confirm => {
                        if (confirm) {
                          this.$store.dispatch('category/deleteCategory',id);
                        }
                    }
                }
            )
        }
    },
    mounted() {
        this.$store.dispatch('category/fetchCategories');
    }
}
</script>

<style scoped>

</style>
