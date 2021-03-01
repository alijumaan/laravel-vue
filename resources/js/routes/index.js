import PostsIndex from '../components/Posts/Index.vue'
import PostsCreate from '../components/Posts/Create.vue'
import PostsEdit from '../components/Posts/Edit.vue'
import TripsIndex from '../components/Trips/TripForm.vue'

export default {
    mode: 'history',
    routes: [
        {
            path: '/',
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
        }
    ]
}


