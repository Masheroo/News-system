<template>
    <header>
        <div class="header-logo">
            <router-link @click="this.GET_CATEGORIES()" to="/">
                <img src="../../../uploads/logo.png" alt="" srcset="">
            </router-link>
        </div>
        <div class="header-category-list">
            
            <router-link 
            v-for="category in CATEGORIES" 
            :key="category.id"
            @click="
            this.GET_CATEGORY_POSTS( {
                id :category.id,
                page: 1
            } );
            this.GET_CATEGORY(category.id);
            " 
            :category_title="category.title"
            :to="{
                name: 'Category', 
                params:{id: category.id} 
            }">
                <div class="header-category-list-item" >{{ category.title }}</div>
            </router-link>
            
        </div>
        <div class="header-btns">
            <div class="header-btn">
                <img src="../../../uploads/find.png" alt="" srcset="">
            </div>
            <div @click="toggleMenu()" class="header-btn">
                <img src="../../../uploads/menu.png" alt="" srcset="">
            </div>
        </div>
    </header>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

    export default {
        data() {
            return {
            }
        },
        mounted(){
            this.GET_CATEGORIES();
        },
        computed:{
            ...mapGetters([
                'CATEGORIES'
            ]),
        },
        methods: {
            ...mapActions([
                'GET_CATEGORY_POSTS',
                'GET_CATEGORIES',
                'GET_CATEGORY'
            ]),
            toggleMenu(){
                let menu = document.querySelector('#menu');
                menu.classList.toggle('hide');
            }
        },
    }
</script>

<style scoped>
    header{
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 10px 15px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        height: 80px;
    }
    .header-category-list{
        display: flex;
        align-items: center;
        width: 60%;
    }
    .header-category-list-item{
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
        margin: 0 15px;
    }
    .header-btns{
        display: flex;
        justify-content: space-between;
        width: 7%;
    }
    .header-btn > img{
        width: 80%;
    }
</style>