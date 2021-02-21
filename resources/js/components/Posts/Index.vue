<template>
<div>
    <select v-model="category_id" class="form-control col-md-4">
        <option value="">-- choose category</option>
        <option v-for="category in categories" :value="category.id">
            {{ category.name }}
        </option>
    </select>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Post text</th>
            <th>Create At</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="post in posts.data">
            <td>{{  post.id }}</td>
            <td>{{  post.title }}</td>
            <td>{{  post.text.substring(0, 50) }}</td>
            <td>{{  post.createdAt }}</td>
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
            category_id: ''
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
        // Our method to GET results from a Laravel endpoint
        getResults(page = 1) {
            axios.get('/api/posts?page=' + page + '&category_id=' + this.category_id)
                .then(response => {
                    this.posts = response.data;
                });
        }
    }


}
</script>
