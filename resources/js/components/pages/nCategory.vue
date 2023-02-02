<template>
    <div class="category">
        <div class="title">
            <h1>{{CURRENT_CATEGORY_TITLE}}</h1>
            <div class="line"></div>
        </div>
        <nCategoryItemList :posts="CATEGORY_POSTS"></nCategoryItemList>
        <div class="pagination">
            <div class="pagination-item" 
            v-for="current in this.COUNT_OF_PAGES"
            @click="this.GET_CATEGORY_POSTS( {
                id :CURRENT_CATEGORY_ID,
                page: current
            } );" 
            >{{current}}</div>
        </div>
    </div>
</template>

<script>
import nCategoryItemList from '../templates/nCategory/nCategoryItemList.vue'
import { mapGetters, mapActions } from 'vuex'
import { useRoute } from 'vue-router'
// 
    export default {
        props: {
            category_title: {
                type: String,
                default: null
            },
        },
        components: {
            nCategoryItemList,
        },
        data() {
            return {
                title: null
            }
        },
        computed: {
            ...mapGetters([
                'CATEGORY_POSTS',
                'CURRENT_CATEGORY_TITLE',
                'CURRENT_CATEGORY_ID',
                'COUNT_OF_PAGES'
            ]),
        },
        mounted () {
            if(!this.CURRENT_CATEGORY_ID){
                this.GET_CATEGORY(useRoute().params.id);
                this.GET_CATEGORY_POSTS({id:useRoute().params.id ,page:1}); 
            }
        },
        methods: {
            ...mapActions([
                'GET_CATEGORY_POSTS',
                'GET_CATEGORY',
                'GET_CATEGORIES'
            ]),
            getPosts(page){
                this.GET_CATEGORY_POSTS(this.CURRENT_CATEGORY_ID, page)
                console.log(page);
            }
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