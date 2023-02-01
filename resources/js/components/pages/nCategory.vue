<template>
    <div class="category">
        <div class="title">
            <h1>Название категории</h1>
            <div class="line"></div>
        </div>
        <nCategoryItemList :posts="posts"></nCategoryItemList>
    </div>
</template>

<script>
import nCategoryItemList from '../templates/nCategory/nCategoryItemList.vue'
import  axios  from 'axios'
import { useRoute } from 'vue-router'
    export default {
        components: {
            nCategoryItemList,
        },
        data() {
            return {
                posts: []
            }
        },
        mounted () {
            axios.get('/api/posts/category/' + useRoute().params.id)
            .then((response) =>{
                this.posts = response.data.data.posts;
            })
                console.log(this.posts);
        },

    }
</script>

<style scoped>
.title{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin-bottom: 40px;
}
h1{
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 44px;
    margin-bottom: 15px;
}
.line{
    background-color: black;
    width: 60%;
    height: 1px;
}
</style>