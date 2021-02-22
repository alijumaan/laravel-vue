<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Laravel-Vue</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link
                        active-class="active-menu"
                        exact :to="{ name: 'posts.index'}"
                        class="nav-link">Posts list</router-link>
                </li>
                <li class="nav-item">
                    <router-link
                        active-class="active-menu"
                        exact :to="{ name: 'posts.create'}"
                        class="nav-link">Add new post</router-link>
                </li>
            </ul>
        </div>
    </nav>

</template>

<script>
export default {
    name: "Navbar"
}
</script>

<style scoped>

</style>
