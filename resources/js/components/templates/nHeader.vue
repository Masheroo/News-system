<template>
    <header>
        <div class="header-logo">
            <router-link to="/">
                <img src="../../../uploads/logo.png" alt="" srcset="">
            </router-link>
        </div>
        <div class="header-category-list">
            
            <router-link 
            v-for="category in categories" 
            :key="category.id" 
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
            });
            console.log(this.categories);
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
</style>