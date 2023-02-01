<template>
    <div>
        <nheader></nheader>
        <div class="main-wrapper">
            <div class="router-view">
                <router-view></router-view>
            </div>
            <nSidebar></nSidebar>
        </div>
    </div>
</template>

<script>
    import nheader from './components/templates/nHeader.vue'
    import nSidebar from './components/templates/nSidebar.vue';
    export default {
        components:{
            nheader, nSidebar
        },
        
    }
</script>

<style>
.main-wrapper{
    width: 100%;
    display: flex;
    justify-content: space-around;
    padding-top: 30px;

}   
.router-view{
    width: 80%;
}
.sidebar{
    width: 13%;
}
</style>