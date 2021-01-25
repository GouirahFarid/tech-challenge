import ProductService from "../../services/ProductService";
export default {
    namespaced: true,
    state:{
        products: [],
        product:{},
        message:'',
    },
    mutations:{
        ADD_PRODUCT(state, product) {
            state.products.push(product)
        },
        SET_PRODUCTS(state, products) {
            state.products = products
        },
        SET_PRODUCT(state, product) {
            state.product = product
        },
        SET_MESSAGE(state, message) {
            state.message = message
        }
    },
    actions:{
        createProduct({ commit }, product) {
            return ProductService.createProduct(product)
                .then(() => {
                    commit('ADD_PRODUCT', product)
                    commit('SET_PRODUCTS', product)
                })
                .catch(error => {
                    let message= 'There was a problem creating your product:'+error.message
                    commit('SET_MESSAGE',message);
                })
        },
        fetchProducts({ commit}) {
            return ProductService.getAllProducts()
                .then(response => {
                    console.log(response.data.data)
                    commit('SET_PRODUCTS', response.data.data)
                })
                .catch(error => {
                    let message= 'There was a problem creating your product:'+error.message
                    commit('SET_MESSAGE',message);
                })
        },
        deleteProduct({ commit ,dispatch}, productId) {
            return ProductService.deleteProduct(productId)
                .then(() => {
                    dispatch('fetchProducts')
                })
                .catch(error => {
                    let message= 'There was a problem creating your product:'+error.message
                    commit('SET_MESSAGE',message);
                })
        },
    }

}
