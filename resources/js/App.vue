<template>
    <div>
        <nheader></nheader>
        <router-view></router-view>
    </div>
</template>

<script>
    import nheader from './components/templates/nHeader.vue'
    export default {
        components:{
            nheader
        }
    }
</script>

<style>

</style>