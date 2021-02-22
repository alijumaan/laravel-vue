<template>
    <div>
        <Navbar />

        <main class="py-4">
            <div class="container">
                <router-view />
            </div>
        </main>
    </div>
</template>

<script>
import Navbar from "./Navbar.vue";

export default {
    components: {Navbar}
}
</script>

<style>

</style>
