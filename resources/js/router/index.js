import Vue from 'vue'
import Router from 'vue-router'
import Home from  '../components/Home'
import Login from '../components/LoginComponent'
import Register from '../components/RegisterComponent'
import Products from '../components/ProductsComponent'
import Product from '../components/ProductComponent'
import ProductsComponent from '../components/dashboard/Productscomponents'
import CreateProduct from '../components/dashboard/CreateProduct'
import UpdateProduct from '../components/dashboard/UpdateProduct'
import UsersComponent from '../components/dashboard/UsersComponent'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/register',
      name: 'register',
      component: Register
    },
    {
      path: '/products',
      name: 'products',
      component: Products
    },
    {
      path: '/product/:id',
      name: 'product',
      component: Product
    },
    {
      path: '/dashboard/products',
      name: 'dashboard',
      component: ProductsComponent
    },
    {
      path: '/dashboard/users',
      name: 'users',
      component: UsersComponent
    },
    {
      path:'/dashboard/addProduct',
      name:'addProduct',
      component:CreateProduct
    },
    {
      path:'/dashboard/updateProduct/:id',
      name:'updateProduct',
      component:UpdateProduct
    }
  ]
})
