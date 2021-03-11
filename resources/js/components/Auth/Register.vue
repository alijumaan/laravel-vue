<template>
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-6/12 px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0">

                    <div class="flex-auto px-4 lg:px-10 py-10 pt-4">
                        <div class="text-gray-500 text-center mb-3 font-bold">
                            <h3>Register Form</h3>
                        </div>
                        <form>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="name">
                                    Name
                                </label>
                                <input v-model="fields.name" id="name" type="email"
                                       class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                                       placeholder="Name"/>

                                <div v-if="errors && errors.name">
                                    <div v-for="error in errors.name"
                                         class="mt-3 list-disc list-inside text-sm text-red-600">
                                        <p>{{ error }}</p>
                                    </div>
                                </div>

                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                       for="email">
                                    Email
                                </label>
                                <input v-model="fields.email" id="email" type="email"
                                       class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                                       placeholder="Email"/>

                                <div v-if="errors && errors.email">
                                    <div v-for="error in errors.email"
                                         class="mt-3 list-disc list-inside text-sm text-red-600">
                                        <p>{{ error }}</p>
                                    </div>
                                </div>

                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="password">
                                    Password
                                </label>
                                <input v-model="fields.password" type="password" id="password"
                                       class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                                       placeholder="Password"/>

                                <div v-if="errors && errors.password">
                                    <div v-for="error in errors.password"
                                         class="mt-3 list-disc list-inside text-sm text-red-600">
                                        <p>{{ error }}</p>
                                    </div>
                                </div>

                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                       for="password_confirmation">
                                    Confirm Password
                                </label>
                                <input v-model="fields.password_confirmation" type="password" id="password_confirmation"
                                       class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                                       placeholder="Confirm Password"/>

                                <div v-if="errors && errors.password_confirmation">
                                    <div v-for="error in errors.password_confirmation"
                                         class="mt-3 list-disc list-inside text-sm text-red-600">
                                        <p>{{ error }}</p>
                                    </div>
                                </div>

                            </div>

                            <div>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input id="customCheckLogin"
                                           type="checkbox"
                                           class="form-checkbox text-gray-800 ml-1 w-5 h-5 ease-linear transition-all duration-150"/>
                                    <span class="ml-2 text-sm font-semibold text-gray-700">
                    I agree with the
                    <a href="javascript:void(0)" class="text-green-500">
                      Privacy Policy
                    </a>
                  </span>
                                </label>
                            </div>

                            <div class="text-center mt-6">
                                <button @click.prevent="save_form"
                                    class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                    type="submit"
                                    :value="form_submitting ? 'Create...' : 'Create Account'"
                                    :disabled="form_submitting">
                                    Create Account
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fields: {
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
            errors: {},
            form_submitting: false,
        }
    },
    methods: {
        save_form() {
            axios.post('/api/register', this.fields).then(() => {
                swal("Created successfully", "", "success");
                this.$router.push({name: 'dashboard'});
                this.form_submitting = false;
            }).catch((error) => {
                this.errors = error.response.data.errors;
            })
        }
    }
}
</script>

<style scoped>

</style>
