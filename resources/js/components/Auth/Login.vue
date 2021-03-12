<template>
    <div class="">
        <div class="flex content-center items-center justify-center h-full">
            <div v-show="!user" class="w-full lg:w-6/12 px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0">
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-4">
                        <div class="text-gray-500 text-center mb-3 font-bold">
                            <h3>Login Form</h3>
                        </div>
                        <form @submit.prevent="submit_form">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2">
                                    Email
                                </label>
                                <input v-model="fields.email" type="email"
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
                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2">
                                    Password
                                </label>
                                <input v-model="fields.password" type="password"
                                       class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                                       placeholder="Password"/>

                                <div v-if="errors && errors.password">
                                    <div v-for="error in errors.password"
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
                                    <span class="ml-2 text-sm font-semibold text-gray-700">Remember me</span>
                                </label>
                            </div>

                            <div class="text-center mt-6">
                                <button @click.prevent="submit_form"
                                        class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                        type="submit"
                                        :value="form_submitting ? 'Login...' : 'Sign In'"
                                        :disabled="form_submitting">
                                    Sign In
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="flex flex-wrap mt-6 relative">
                    <div class="w-1/2">
                        <a href="javascript:void(0)" class="text-gray-300">
                            <small>Forgot password?</small>
                        </a>
                    </div>
                    <div class="w-1/2 text-right">
                        <router-link to="/auth/register" class="text-gray-300">
                            <small>Create new account</small>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

let auth = true;

export default {
    data() {
        return {
            user: false,
            fields: {
                email: '',
                password: ''
            },
            errors: [],
            form_submitting: false,
        }
    },
    methods: {
        submit_form() {
            this.form_submitting = true;

            axios.get('/sanctum/csrf-cookie').then(response => {

                axios.post('/api/login', this.fields).then(response => {
                    this.user = true;
                    swal("Welcome back", "", "success");
                    this.$router.push({name: 'dashboard'});
                    this.form_submitting = false;

                })
                    .catch(error => {
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors;
                        }
                        this.form_submitting = false;
                    })
            })
        }
    },
    beforeRouteEnter(to, from, next) {
      if ( auth ) {
          next()
      } else {
          next({ name: 'home'})
      }
    },
}
</script>

<style scoped>

</style>
