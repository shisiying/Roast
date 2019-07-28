<template>
        <div id="app-layout">
            <Navication></Navication>
            <router-view></router-view>
        </div>
</template>

<script>
    import Navication from '../components/global/Navication.vue';
    export default {
        components: {
            Navication
        },
        created(){
            this.$store.dispatch( 'loadCafes' );
            this.$store.dispatch( 'loadUser' );
        }
    }
</script>

<style scoped>

</style>