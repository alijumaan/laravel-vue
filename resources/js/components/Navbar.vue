<template>
    <nav class="container mx-auto px-4 py-4 flex items-center justify-between">
        <ul class="flex">
            <li>
                <a href="/">Home</a>
                <router-link
                    active-class="active-menu px-2"
                    exact :to="{ name: 'posts.index'}"
                    class="nav-link">Posts list
                </router-link>
                <router-link
                    active-class="active-menu px-2"
                    exact :to="{ name: 'posts.create'}"
                    class="nav-link">Add new post
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {}
</script>

<style scoped>

</style>
