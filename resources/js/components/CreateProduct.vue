<template>
<form>
    <div class="field">
        <label class="label">Product Name:</label>
        <div class="control">
            <v-select style="background-color:#c4edf6;" multiple v-model="product.categoriesId" :options="this.$store.state.category.categories" label="categoryName" :reduce="option => option.categoryId"></v-select>
        </div>
    </div>
    <div class="field">
        <label class="label">Product Name:</label>
        <div class="control">
            <input v-model="product.name" class="input" type="text" placeholder="Text input">
        </div>
        <p  v-if="!$v.product.name.required" class="help is-danger">Field is required</p>
        <p  v-if="!$v.product.name.minLength" class="help is-danger">Name must have at least {{$v.product.name.$params.minLength.min}} letters.</p>
    </div>
    <div class="field">
        <label class="label">Product Price:</label>
        <div class="control">
            <input v-model="product.price" class="input" type="number" placeholder="price">
        </div>
        <p  v-if="!$v.product.price.required" class="help is-danger">Field is required</p>
    </div>
    <div class="field">
        <label class="label">Product Image:</label>
        <div class="control">
            <input type="file" @change="previewFiles()" ref="myImage" class="input" placeholder="choose your file">
        </div>
        <p  v-if="!$v.product.image.required" class="help is-danger">Field is required</p>
    </div>
    <div class="field">
        <label class="label">Product Description:</label>
        <div class="control">
            <textarea v-model="product.description"  class="textarea is-small" placeholder="Description"></textarea>
        </div>
        <p  v-if="!$v.product.description.required" class="help is-danger">Field is required</p>
        <p  v-if="!$v.product.description.minLength" class="help is-danger">Name must have at least {{$v.product.description.$params.minLength.min}} letters.</p>
    </div>
    <div class="field">
        <div class="control">
            <input @click.prevent="saveProduct()" class="button is-primary"  value="Save" type="submit" placeholder="Text input">
        </div>
    </div>
</form>
</template>

<script>
import { required, minLength, between } from 'vuelidate/lib/validators'
export default {
  name: "CreateProduct",
  data(){
    return{
      product:{
        name:'',
        description:'',
          price:'',
        image:'',
          categoriesId:[]
      },
        message:'',
    }
  },
    validations: {
        product: {
            name:{
                required,
                minLength: minLength(8)
            },
            price:{
                required,
            },
            description: {
                required,
                minLength: minLength(8)
            },
            image: {
                required,
            }

        },
    },
  methods:{
    previewFiles() {
      this.product.image = this.$refs.myImage.files[0];
    },
    saveProduct(){
        this.$v.$touch()
        if (!this.$v.$invalid) {
            let pro=new FormData();
            pro.append('name',this.product.name);
            pro.append('description',this.product.description);
            pro.append('image',this.product.image);
            pro.append('price',this.product.price);
            pro.append('categoriesId',this.product.categoriesId);
            this.$store.dispatch('product/createProduct',pro)
                .then(() => {
                    this.$router.push('products')
                })
                .catch((err) => {
                    console.log(err.response.status)
                })

    }
  },
    mounted() {
      console.log('helsdjskiajdasijdiasjdkasjd');
        this.$store.dispatch('category/fetchCategories')
        this.options=this.$store.state.categories;
    }
}
};
</script>

<style scoped>

</style>
