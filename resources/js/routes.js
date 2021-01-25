
import Home from "./components/Home";
import NotFound from "./components/404"
import Products from "./components/Products";
import Categories from "./components/Categories";
import CreateCategory from "./components/CreateCategory";
import CreateProduct from "./components/CreateProduct";
export  default {
    mode: "history",
    linkActiveClass:'button',
    routes:[
        {
            path: "/",
            name: "Home",
            component: Home
        },
        {
            path: "/products",
            name: "products",
            component: Products
        },
        {
            path: "/categories",
            name: "categories",
            component: Categories
        },
        {
            path: "/createCategory",
            name: "createCategory",
            component: CreateCategory
        },
        {
            path: "/createProduct",
            name: "createProduct",
            component: CreateProduct
        },
        {
            path: "*",
            name: '404',
            component:NotFound
        }
    ]
}




