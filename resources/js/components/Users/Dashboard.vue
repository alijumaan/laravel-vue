<template>
    <div class="">
        Dashboard <br>
<!--        Name: {{ user.name }}-->
<!--        Email: {{ user.email }}-->
        <button @click.prevent="logout">Logout</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: null,
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
                swal("Logout successfully", "", "success");
                this.$router.push({ name: 'home' });
            })
        }
    }
}
</script>

<style scoped>

</style>
