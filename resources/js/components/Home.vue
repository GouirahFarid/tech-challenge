<template>
    <div class="columns is-multiline">
        <div class="column is-12 has-text-centered"><h1 class="is-size-2">Tech-challenge by Farid Gouirah</h1></div>
    </div>
</template>

<script>
import CreateProductForm from "./CreateProduct";
export default {
name: "Home",
    components: {CreateProductForm},
    mounted() {
        this.$store.dispatch('product/fetchProducts');
        this.$store.dispatch('category/fetchCategories');
    }
}
</script>

<style scoped>

</style>
