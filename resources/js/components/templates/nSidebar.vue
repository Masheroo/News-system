<template>
    <div class="sidebar">
        <div class="sidebar-item">
            <div class="sidebar-title">
                <h1>Последние <br> новости</h1>
                <div class="line"></div>
            </div>
            <nSidebarList></nSidebarList>
            
        </div>
        <div class="sidebar-item">
            <div class="sidebar-title">
                <h1>Последние новости</h1>
                <div class="line"></div>
            </div>
            <nSidebarList></nSidebarList>
        </div>
    </div>
</template>

<script>
import nSidebarList from './nSidebarList.vue';
    export default {
        components: {
            nSidebarList,
        },
    }
</script>

<style scoped>
.sidebar-item{
    height: 50%;
}
.sidebar{
    padding: 10px;
}
.sidebar-title{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
}
h1{
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 24px;
    text-align: center;
}
.line{
    width: 100%;
    height: 1px;
    background-color: black;
}
</style>