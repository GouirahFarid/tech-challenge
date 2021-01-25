import api from "./api";
export default {
  getAllCategories(){
    return api.get('/categories');
  },
  getCategoryById(id){
    return api.get('/categories/'+id)
  },
  createCategory(category){
    return api.post('/categories',category);
  },
  deleteCategory(id){
    return api.delete('/categories/'+id)
  }
}
