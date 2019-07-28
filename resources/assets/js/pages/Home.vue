<template>
   <div id="home">
       <span v-show="cafesLoadStatus == 1">Loading</span>
       <span v-show="cafesLoadStatus == 2">Cafes loaded sucessfully!</span>
       <span v-show="cafesLoadStatus == 3">Cafes loaded unsucessfully!</span>
   </div>
</template>

<script>
    export default {
        created() {
            this.$store.dispatch('loadCafes');
        },

        /**
         * 定义组件的计算属性
         */
        computed: {
            cafesLoadStatus(){
                return this.$store.getters.getCafesLoadStatus;
            },
            cafes(){
                return this.$store.getters.getCafes;
            }
        }
    }
</script>

<style scoped>

</style>