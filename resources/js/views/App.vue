<template>

    <div>

        <!-- Router view -->
        <router-view></router-view>

    </div>

</template>

<script>
import home from '../pages/home.vue';

    export default {
        components: {
            home,
        }
        
    }
</script>

<style lang="scss" scoped>

</style>