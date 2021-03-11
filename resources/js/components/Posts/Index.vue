<template>
    <div class="">
        <select v-model="category_id"
                class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-2 border border-gray-400 rounded shadow focus:outline-none">
            <option value="">-- Choose category --</option>
            <option v-for="category in categories" :value="category.id">
                {{ category.name }}
            </option>
        </select>

        <table class="min-w-full divide-y divide-gray-200 mt-7 shadow-2xl">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <a href="#" @click.prevent="change_sort('title')">Title</a>
                    <span v-if="this.sort_field == 'title' && this.sort_direction == 'asc'">&uarr;</span>
                    <span v-if="this.sort_field == 'title' && this.sort_direction == 'desc'">&darr;</span>
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <a href="#" @click.prevent="change_sort('post_text')">Post text</a>
                    <span v-if="this.sort_field == 'post_text' && this.sort_direction == 'asc'">&uarr;</span>
                    <span v-if="this.sort_field == 'post_text' && this.sort_direction == 'desc'">&darr;</span>
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <a href="#" @click.prevent="change_sort('created_at')">Created date</a>
                    <span v-if="this.sort_field == 'created_at' && this.sort_direction == 'asc'">&uarr;</span>
                    <span v-if="this.sort_field == 'created_at' && this.sort_direction == 'desc'">&darr;</span>
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="post in posts.data">
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ post.title.substring(0, 5) }} <br>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ post.post_text.substring(0, 50) }}... <br>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ post.created_at }} <br>
                </td>
                <td>
                    <router-link
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white
                    uppercase tracking-widest hover:bg-gray-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray
                    disabled:opacity-25 transition ease-in-out duration-150"
                        :to="{ name: 'posts.edit', params: { id: post.id } }">Edit
                    </router-link>
                    <button
                        class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150"
                        @click="delete_post(post.id)">Delete
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        <pagination :data="posts" @pagination-change-page="getResults"></pagination>

    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: {},
            categories: {},
            category_id: '',
            sort_field: 'created_at',
            sort_direction: 'desc',
            showForm: false,
            word: 'Show'
        }
    },
    mounted() {
        axios.get('/api/categories').then(response => {
            this.categories = response.data.data
        })
        this.getResults();
    },
    watch: {
        category_id(value) {
            this.getResults();
        }
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
                        swal("Error!", "", "error");
                    })
                }
            });
        }
    }

}
</script>
