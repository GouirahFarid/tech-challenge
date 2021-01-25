import CategoryService from "../../services/CategoryService";
export default {
    namespaced: true,
    state:{
        categories: [],
        category:{},
        message:'',
    },
    mutations:{
        ADD_CATEGORY(state, category) {
            state.categories.push(category)
        },
        SET_CATEGORIES(state, categories) {
            state.categories =categories
        },
        SET_CATEGORY(state, category) {
            state.CATEGORY = category
        },
        SET_MESSAGE(state, message) {
            state.message = message
        }
    },
    actions:{
        createCategory({ commit }, category) {
            return CategoryService.createCategory(category)
                .then(() => {
                    commit('ADD_CATEGORY', category)
                    commit('SET_CATEGORIES', category)
                })
                .catch(error => {
                    let message= 'There was a problem creating your CATEGORY:'+error.message
                    commit('SET_MESSAGE',message);
                })
        },
        fetchCategories({ commit}) {
            return CategoryService.getAllCategories()
                .then(response => {
                    console.log(response.data.data)
                    commit('SET_CATEGORIES', response.data.data)
                })
                .catch(error => {
                    let message= 'There was a problem creating your CATEGORY:'+error.message
                    commit('SET_MESSAGE',message);
                })
        },
        deleteCategory({ commit ,dispatch}, category) {
            return CategoryService.deleteCategory(category)
                .then(() => {
                    dispatch('fetchCategories')
                })
                .catch(error => {
                    let message= 'There was a problem creating your CATEGORY:'+error.message
                    commit('SET_MESSAGE',message);
                })
        },
    }

}
