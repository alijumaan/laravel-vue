<template>
    <div class="">
        Dashboard <br>
        Name: {{ user.name }}<br>
        Email: {{ user.email }}<br>
        <button @click.prevent="logout">Logout</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: '',
        }
    },
    mounted() {
        axios.get('/api/user').then((res) => {
            this.user = res.data
        })
    },
    methods: {
        logout() {
            axios.post('/api/logout').then(() => {
                this.$router.push({name: 'home'});
                location.reload();
                swal("Logout successfully", "", "success");
            })
        }
    }
}
</script>

<style scoped>

</style>
