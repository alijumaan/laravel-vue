<template>
    <div class="row justify-content-center">
        <div class="col-8">
            <router-link class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semi bold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bgbg-blue-500 focus:outline-none focus:border bg-blue-500 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                         :to="{ name: 'posts.index'}">Back</router-link>
            <form @submit.prevent="submit_form">
                <div class="mt-3">
                    <label for="title"
                           class="block font-medium text-sm text-gray-700 mb-3 mt-3">Post title:</label>
                    <input v-model="fields.title"
                           type="text"
                           class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm p-1"
                           id="title"
                           placeholder="title">

                    <div v-if="errors && errors.title">
                        <div v-for="error in errors.title"
                             class="mt-3 list-disc list-inside text-sm text-red-600">
                            <p>{{ error }}</p>
                        </div>
                    </div>

                </div>
                <div class="mt-3">
                    <label class="block font-medium text-sm text-gray-700 mb-3 mt-3"
                        for="post_text">Post text:</label>
                    <textarea v-model="fields.post_text"
                              class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm p-1"
                              id="post_text"
                              rows="10"></textarea>

                    <div v-if="errors && errors.post_text">
                        <div v-for="error in errors.post_text"
                             class="mt-3 list-disc list-inside text-sm text-red-600">
                            <p>{{ error }}</p>
                        </div>
                    </div>

                </div>
                <div class="mt-3">
                    <label class="block font-medium text-sm text-gray-700 mb-3 mt-3"
                        for="category_id">Category:</label>
                    <select v-model="fields.category_id"
                            class="relative px-3 py-2 bg-white text-gray-500 rounded focus:outline-none"
                            id="category_id">
                        <option value="">-- Select category --</option>
                        <option v-for="category in categories" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>

                    <div v-if="errors && errors.category_id">
                        <div v-for="error in errors.category_id"
                             class="mt-3 list-disc list-inside text-sm text-red-600">
                            <p>{{ error }}</p>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label class="block font-medium text-sm text-gray-700 mb-3 mt-3">Thumbnail:</label>
                    <input type="file" @change="select_file">
                </div>

                <div class="mt-3">
                    <input class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                           type="submit" :class="form_submitting ? 'btn btn-secondary' : 'btn btn-primary'" :value="form_submitting ? 'Saving post...' : 'Save post'" :disabled="form_submitting" />
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            categories: {},
            fields: {
                title: '',
                post_text: '',
                category_id: '',
                thumbnail: null
            },
            errors: {},
            form_submitting: false,
        }
    },
    mounted() {
        axios.get('/api/categories').then(response => {
            this.categories = response.data.data;
        })
        axios.get('/api/posts/' + this.$route.params.id).then(response => {
            this.fields = response.data.data;
        })
    },
    methods: {
        select_file(event) {
            this.fields.thumbnail = event.target.files[0]
        },
        submit_form() {
            this.form_submitting = true;
            axios.put('/api/posts/' + this.$route.params.id, this.fields).then(response => {
                swal("Post updated successfully", "", "success");
                this.$router.push('/posts');
                this.form_submitting = false;
            }).catch(error => {
                // swal("Error happened!", "", "error");
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
                if (error.response.status === 403) {
                    swal("Unauthorized edit this post!", "", "warning");
                }
                this.form_submitting = false;
            })
        }
    }
}
</script>
