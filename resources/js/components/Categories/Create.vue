<template>
    <div class="row justify-content-center">
        <div class="col-8">
            <form @submit.prevent="submit_form">

                <div class="mt-3">
                    <label class="block font-medium text-sm text-gray-700 mb-3 mt-3" for="name">Category name:</label>
                    <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm p-1"
                           v-model="fields.name" type="text" id="name" placeholder="category name">

                    <div v-if="errors && errors.name">
                        <div v-for="error in errors.name"
                             class="mt-3 list-disc list-inside text-sm text-red-600">
                            <p>{{ error }}</p>
                        </div>
                    </div>

                </div>

                <div class="mt-3">
                    <input class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                           type="submit" :value="form_submitting ? 'Saving post...' : 'Save category'" :disabled="form_submitting" />
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fields: {
                name: '',
            },
            errors: {},
            form_submitting: false,
        }
    },
    methods: {
        submit_form() {
            this.form_submitting = true;

            let fields = new FormData();
            for (let key in this.fields) {
                fields.append(key,this.fields[key])
            }

            axios.post('/api/categories', fields).then(response => {
                swal("Category created successfully", "", "success");
                this.$router.push('/posts');
                this.form_submitting = false;
            }).catch(error => {
                // swal("Error happened!", "", "error");
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
                this.form_submitting = false;
            })
        }
    }
}
</script>
