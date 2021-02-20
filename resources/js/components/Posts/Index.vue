<template>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Text</th>
            <th>Create At</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="post in posts">
            <td>{{  post.id }}</td>
            <td>{{  post.title }}</td>
            <td>{{  post.text.substring(0, 50) }}</td>
            <td>{{  post.createdAt }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    data(){
        return {
            posts: []
        }
    },
    mounted() {
        axios.get('/api/posts').then(response => {
            this.posts = response.data.data;
        })
    }

}
</script>
