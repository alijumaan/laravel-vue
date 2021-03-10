<template>
    <div>
        <ul class="flex border-b">
            <li class="-mb-px mr-1">
                <a class="bg-white inline-block py-2 px-4 text-gray-400 font-semibold"
                   :class="{'py-2 px-4 text-gray-400': max_step < 2, 'border-l border-t border-r rounded-t py-2 px-4 text-blue-700': current_step === 1}"
                   @click.prevent="goToStep(1)"
                   href="#" >From</a>
            </li>
            <li class="mr-1">
                <a
                    class="bg-white inline-block py-2 px-4 text-gray-400 font-semibold"
                    :class="{'py-2 px-4 text-gray-400': max_step < 2, 'border-l border-t border-r rounded-t py-2 px-4 text-blue-700': current_step === 2}"
                    @click.prevent="goToStep(2)"
                    href="#">To</a>
            </li>
            <li class="mr-1">
                <a class="bg-white inline-block py-2 px-4 text-gray-400 font-semibold"
                   :class="{'py-2 px-4 text-gray-400': max_step < 3, 'border-l border-t border-r rounded-t py-2 px-4 text-blue-700': current_step === 3}"
                   @click.prevent="goToStep(3)"
                   href="#">Passengers</a>
            </li>
        </ul>

        <form class="w-full max-w-lg mt-5">

            <div v-show="current_step === 1">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="from_country">
                            From Country *
                        </label>
                        <div class="relative">
                            <select
                                v-model="from_country" @change="getFromCity" id="from_country"
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700
                                py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">-- From Country --</option>
                                <option value="1">Saudi Arabia</option> /* test */
                                <option :value="country" v-for="country in countries" :key="country.id">{country.name}</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="from_city">
                            From City *
                        </label>
                        <div class="relative">
                            <select
                                v-model="from_city" @change="getFromCity" id="from_city"
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700
                                py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">-- From City --</option>
                                <option value="1">Jeddah</option> /* test */
                                <option :value="city" v-for="city in from_cities" :key="city.id">{city.name}</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="from_date">
                            From Date *
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200
                        rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               v-model="from_date" id="from_date" type="date" >
                    </div>
                </div>

            </div>

            <div v-show="current_step === 2">

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="to_country">
                                To Country *
                            </label>
                            <div class="relative">
                                <select
                                    v-model="to_country" @change="getToCity" id="to_country"
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700
                                    py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">-- To Country --</option>
                                    <option value="1">Saudi Arabia</option> /* test */
                                    <option :value="country" v-for="country in countries" :key="country.id">{country.name}</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="to_city">
                                To City *
                            </label>
                            <div class="relative">
                                <select
                                    v-model="to_city" @change="getToCity" id="to_city"
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700
                                    py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">-- To City --</option>
                                    <option value="1">Abha</option> /* test */
                                    <option :value="city" v-for="city in to_cities" :key="city.id">{city.name}</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="to_date">
                            To Date *
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200
                        rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               v-model="to_date" id="to_date" type="date" >
                    </div>
                </div>

                </div>

            <div v-show="current_step === 3">

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="adults">
                            Adults *
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               step="1" min="0" v-model="adults" id="adults" type="number" >
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="children">
                            Children *
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               step="1" min="0" v-model="children" id="children" type="number" >
                    </div>
                </div>

            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 py-2">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Price : <strong>$5000</strong>
                    </label>
                </div>
                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
                        @click="advanceStep" type="button">
                    <span v-if="max_step === 3">Submit</span>
                    <span v-else>Next</span>
                </button>
            </div>

        </form>

    </div>
</template>

<script>
export default {
    data(){
        return {
            adults: 0,
            children: 0,
            from_country: {},
            from_city: {},
            from_cities: [],
            from_date: '',
            to_country: {},
            to_city: {},
            to_cities: [],
            to_date: '',
            countries: [],
            current_step: 1,
            max_step: 1,

        }
    },
    mounted() {
      axios.get('/countries')
          .then(response => this.countries = response.data.data)
    },
    computed: {
      price: function () {
          let month = this.getFromMonth()
          let coefficient = 1

          if (!isNaN(month)) {
              month++;

              if (month === 6) {
                  coefficient = 1.5
              }

              if (month === 7) {
                  coefficient = 1.3
              }

              if (month === 8) {
                  coefficient = 1.1
              }
          }

          let price = (this.adults * 100 + this.children * 50) * coefficient
          return (Math.round(price * 100) / 100).toFixed(2)
      }
    },
    methods: {
        getFromCity() {
            this.from_cities = []
            axios.get('/cities', {
                params: {
                    country: this.from_country.id
                }
            })
                .then(response => {
                    this.from_cities = response.data.data
                })
        },

        getToCity() {
          this.to_cities = []
          axios.get('/cities', {
              params: {
                  country: this.to_country.id
              }
          }).then(response => {
              this.to_cities = response.data.data
          })
        },

        validate() {
            if (this.current_step === 1) {
                if (_.isEmpty(this.from_country) || _.isEmpty(this.from_city || _.isEmpty(this.from_date))) {
                    return false
                }
            }

            if (this.current_step === 2) {
                if (_.isEmpty(this.to_country) || _.isEmpty(this.to_city) || _.isEmpty(this.to_date)) {
                    return false
                }
            }

            if (this.current_step === 3) {
                if (this.adults === 0 && this.children === 0) {
                    return false
                }
            }

            return true;
        },

        getFromMonth() {
            return moment(this.from_date).month()
        },

        advanceStep() {
            if (!this.validate()) {
                return
            }

            if (this.max_step === 3) {
                return this.submitForm()
            }

            this.current_step++

            if (this.max_step < this.current_step) {
                this.max_step = this.current_step
            }
        },

        goToStep(value) {
            if (!this.validate()) {
                return
            }
            this.current_step = value
        },

        submitForm() {
            axios.post('/trips', {
                'city_from_id': this.from_city.id,
                'date_from': this.from_date,
                'city_to_id': this.to_city.id,
                'date_to': this.to_date,
                'adults': this.adults,
                'children': this.children
            })
                .then( () => location.replace('/trips'))
        }
    }
}
</script>

<style scoped>

</style>
