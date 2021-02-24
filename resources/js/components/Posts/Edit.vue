<template>
    <div class="row justify-content-center">
        <div class="col-8">
            <router-link :to="{ name: 'posts.index'}"
                         class="btn btn-secondary btn-sm mb-3">Back</router-link>
            <form @submit.prevent="submit_form">
                <div class="form-group">
                    <label for="title">Post title:</label>
                    <input v-model="fields.title" type="text" class="form-control" id="title" placeholder="title">
                    <div class="alert alert-danger mt-1" v-if="errors && errors.title">
                        <span v-for="error in errors.title">
                            {{ error }}<br>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="post_text">Post text:</label>
                    <textarea v-model="fields.post_text" class="form-control" id="post_text" rows="10"></textarea>
                    <div class="alert alert-danger mt-1" v-if="errors && errors.post_text">
                        <span v-for="error in errors.post_text">
                            {{ error }}<br>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select v-model="fields.category_id" class="form-control" id="category_id">
                        <option value="">-- Select category --</option>
                        <option v-for="category in categories" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                    <div class="alert alert-danger mt-1" v-if="errors && errors.category_id">
                        <span v-for="error in errors.category_id">
                            {{ error }}<br>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Thumbnail:</label><br>
                    <input type="file" @change="select_file">
                </div>

                <input type="submit" :class="form_submitting ? 'btn btn-secondary' : 'btn btn-primary'" :value="form_submitting ? 'Saving post...' : 'Save post'" :disabled="form_submitting" />
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
                this.$router.push('/');
                this.form_submitting = false;
            }).catch(error => {
                swal("Error happened!", "", "error");
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
                this.form_submitting = false;
            })
        }
    }
}
</script>
