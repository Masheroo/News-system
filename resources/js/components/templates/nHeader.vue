<template>
    <header>
        <div class="header-logo">
            <router-link to="/">
                <img src="../../../uploads/logo.png" alt="" srcset="">
            </router-link>
        </div>
        <div class="header-category-list">
            <div class="header-category-list-item" v-for="category in categories" :key="category.id">{{ category.title }}</div>
            
        </div>
        <div class="header-btns">
            <div class="header-btn">
                <img src="../../../uploads/find.png" alt="" srcset="">
            </div>
            <div class="header-btn">
                <img src="../../../uploads/menu.png" alt="" srcset="">
            </div>
        </div>
    </header>
</template>

<script>
import axios from 'axios';
    export default {
        data() {
            return {
                categories: []
            }
        },
        mounted(){
            axios.get('/api/categories')
            .then((response)=>{
                this.categories = response.data.categories;
            })
        }
    }
</script>

<style scoped>
    header{
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 10px 15px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }
    .header-category-list{
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 60%;
    }
    .header-category-list-item{
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
    }
    .header-btns{
        display: flex;
        justify-content: space-between;
        width: 7%;
    }
</style>