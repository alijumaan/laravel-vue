import Home from '../components/Home.vue'
import Errors from '../components/Errors/NotFound.vue'
import PostsIndex from '../components/Posts/Index.vue'
import PostsCreate from '../components/Posts/Create.vue'
import PostsEdit from '../components/Posts/Edit.vue'
import TripsIndex from '../components/Trips/TripForm.vue'
import CategoriesCreate from '../components/Categories/Create.vue'
import Register from '../components/Auth/Register.vue'
import Login from '../components/Auth/Login.vue'
import Dashboard from '../components/Users/Dashboard.vue'

export default {
    mode: 'history',
    linkActiveClass: 'font-semibold text-red-800',
    routes: [
        {
            path: '*',
            component: Errors,
            name: 'notFound'
        },
        {
            path: '/',
            component: Home,
            name: 'home'
        },
        {
            path: '/posts',
            component: PostsIndex,
            name: 'posts.index'
        },
        {
            path: '/posts/create',
            component: PostsCreate,
            name: 'posts.create'
        },
        {
            path: '/posts/edit/:id',
            component: PostsEdit,
            name: 'posts.edit'
        },
        {
            path: '/trips',
            component: TripsIndex,
            name: 'trips.index'
        },
        {
            path: '/categories/create',
            component: CategoriesCreate,
            name: 'categories.create'
        },
        {
            path: '/register',
            component: Register,
            name: 'register'
        },
        {
            path: '/login',
            component: Login,
            name: 'login'
        },
        {
            path: '/dashboard',
            component: Dashboard,
            name: 'dashboard',
            beforeEnter: (to, from, next) => {
                axios.get('/api/authenticated').then(() => {
                    next()
                }).catch(() => {
                    return next({name: 'login'})
                })
            }
        }
    ]
}


