<template>
    <div class="category-list">
        <nCategoryItem v-for="post in posts" :post="post" :key="post.id"></nCategoryItem>
    </div>
</template>

<script>
import nCategoryItem from './nCategoryItem.vue';
    export default {
        components: {
            nCategoryItem,
        },
        props: {
            posts: {
                type: Array,
                default: null
            },
        },
    }
</script>

<style scoped>
.category-list{
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}
</style>