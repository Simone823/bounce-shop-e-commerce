<template>

    <!-- App -->
    <div id="app" class="bg-dark">

        <!-- Main slot -->
        <main>
            <slot/>
        </main>

        <!-- Footer -->
        <MyFooter/>

    </div>

</template>

<script>
import MyFooter from '../components/MyFooter.vue';

    export default {
        name: 'layout',

        components: {
            MyFooter,
        }
    }
</script>

<style lang="scss" scoped>

// App vue
#app {
    color: white;

    ul,
    ol {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    img {
        width: 100%;
        height: 100%;
        display: block;
    }

    // main
    main {
        padding-top: 75px;
        width: 100%;
        min-height: 100vh;
        background: url('/img/background_dark.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;

        // section
        section {
            width: 100%;
            height: 100%;
            padding: 24px 0;
        }
    }
}

</style>