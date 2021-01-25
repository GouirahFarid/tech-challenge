import api from "./api";
export default {
  getAllProducts(){
    return api.get('/products');
  },
  getProductById(id){
    return api.get('/products/'+id)
  },
  createProduct(product){
    return api.post('/products',product,{headers:{'Content-Type':'multipart/form-data'}});
  },
  deleteProduct(id){
    return api.delete('/products/'+id)
  }
}
