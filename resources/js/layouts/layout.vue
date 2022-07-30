<template>

    <!-- App -->
    <div id="app" class="bg-dark">

        <!-- Main slot -->
        <main>
            <slot/>
        </main>

    </div>

</template>

<script>
    export default {
        name: 'layout',
    }
</script>

<style lang="scss" scoped>

// App vue
#app {
    height: calc(100vh - 75px);
    color: white;

    ul,
    ol {
        list-style: none;
    }

    img {
        width: 100%;
        height: 100%;
        display: block;
    }

    // main
    main {
        width: 100%;
        height: 100%;
        background: url('/img/background_dark.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        overflow: hidden;

        // section
        section {
            width: 100%;
            height: 100%;
            padding: 24px 0;
            overflow-y: auto;
        }
    }
}

</style>