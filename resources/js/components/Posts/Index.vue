<template>
<div>
    <select v-model="category_id" class="form-control col-md-4 mb-3">
        <option value="">-- choose category</option>
        <option v-for="category in categories" :value="category.id">
            {{ category.name }}
        </option>
    </select>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>
                <a href="#" @click.prevent="change_sort('title')">Title</a>
                <span v-if="this.sort_field === 'title' && this.sort_direction === 'asc'">&uarr;</span>
                <span v-if="this.sort_field === 'title' && this.sort_direction === 'desc'">&darr;</span>
            </th>
            <th>
                <a href="#" @click.prevent="change_sort('post_text')">Post text</a>
                <span  v-if="this.sort_field === 'post_text' && this.sort_direction === 'asc'">&uarr;</span>
                <span  v-if="this.sort_field === 'post_text' && this.sort_direction === 'desc'">&darr;</span>
            </th>
            <th>
                <a href="#" @click.prevent="change_sort('created_at')">Created date</a>
                <span  v-if="this.sort_field === 'created_at' && this.sort_direction === 'asc'">&uarr;</span>
                <span  v-if="this.sort_field === 'created_at' && this.sort_direction === 'desc'">&darr;</span>
            </th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="post in posts.data">
            <td>{{  post.id }}</td>
            <td>{{  post.title }}</td>
            <td>{{  post.post_text.substring(0, 50) }}</td>
            <td>{{  post.created_at }}</td>
            <td>
                <router-link :to="{ name: 'posts.edit', params: { id: post.id } }"
                             class="btn btn-primary btn-sm">Edit</router-link>
                <button class="btn btn-danger btn-sm" @click="delete_post(post.id)">Delete</button>
            </td>
        </tr>
        </tbody>
    </table>
    <pagination :data="posts" @pagination-change-page="getResults"></pagination>
</div>
</template>

<script>
export default {
    data(){
        return {
            posts: {},
            categories: {},
            category_id: '',
            sort_field: 'created_at',
            sort_direction: 'desc',
        }
    },
    mounted() {
        axios.get('/api/categories').then(response => {
            this.categories = response.data.data
        })
        this.getResults();
        // axios.get('/api/posts').then(response => {
        //     this.posts = response.data.data;
        // })
    },
    watch: {
      category_id(value) { this.getResults(); }
    },
    methods: {
        change_sort(field) {
            if (this.sort_field === field) {
                this.sort_direction = this.sort_direction === 'asc' ? 'desc' : 'asc';
            } else {
                this.sort_field = field;
                this.sort_direction = 'asc';
            }
            this.getResults();
        },
        // Our method to GET results from a Laravel endpoint
        getResults(page = 1) {
            axios.get('/api/posts?page=' + page
                + '&category_id=' + this.category_id
                + '&sort_field=' + this.sort_field
                + '&sort_direction=' + this.sort_direction)
                .then(response => {
                    this.posts = response.data;
                });
        },
        delete_post(post_id) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary post!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    axios.delete('/api/posts/' + post_id).then(response => {
                        this.getResults();
                        swal("Post deleted successfully!", {
                            icon: "success",
                        });
                    }).catch(error => {
                        swal("Error!", "", "Error happened");
                    })
                }
            });
        }
    }


}
</script>
