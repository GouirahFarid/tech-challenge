<template>
<form>
    <div class="field">
        <label class="label">Parent Category:</label>
        <div class="control">
            <v-select style="background-color:#c4edf6;"  v-model="category.categoryId"
                      :options="this.$store.state.category.categories" label="categoryName" :reduce="option => option.categoryId"></v-select>
        </div>
    </div>
    <div class="field">
        <label class="label">Category Name:</label>
        <div class="control">
            <input v-model="category.categoryName" class="input" type="text" placeholder="Text input">
        </div>
        <p  v-if="!$v.category.categoryName.required" class="help is-danger">Field is required</p>
        <p  v-if="!$v.category.categoryName.minLength" class="help is-danger">Name must have at least {{$v.category.categoryName.$params.minLength.min}} letters.</p>
    </div>
    <div class="field">
        <div class="control">
            <input @click.prevent="saveCategory()" class="button is-primary"  value="Save" type="submit" placeholder="Text input">
        </div>
    </div>
</form>
</template>

<script>
import {minLength, required} from "vuelidate/lib/validators";

export default {
  name: "CreateCategory",
  data(){
    return{
      category:{
        categoryName:'',
          categoryId:''
      },
    }
  },
    validations: {
        category: {
            categoryName:{
                required,
                minLength: minLength(8)
            },

        },
    },
  methods:{

    saveCategory(){
      let cat=new FormData();
      cat.append('name',this.category.categoryName);
      cat.append('categoryId',this.category.categoryId);
        this.$store.dispatch('category/createCategory',cat)
            .then(() => {
                this.$router.push('categories')
            })
            .catch((err) => {
              console.log(err.response.status)
            })

    }
  },
    mounted() {
      this.$store.dispatch('category/fetchCategories')
    }
};
</script>

<style scoped>

</style>
