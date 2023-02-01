<template>
    <div class="category-list-item">
        <div class="description">
            <div class="description-text">
                <router-link :to="{name: 'Post', params:{id: post.id} }">
                    <div class="title">{{ post.title }}</div>
                </router-link>
                <div class="text">{{ post.text }}
                </div>
            </div>
            <p class="date">{{ post.created_at}}</p>
        </div>
        <img :src="'/api/uploads/' + post.image" alt="нету картинки(">
    </div>
</template>

<script>
    export default {
        props: {
            post: {
                type: Object,
                default: null
            },
        },
    }
</script>

<style scoped>
.category-list-item{
    display: flex;justify-content: space-between;
    width: 950px;
    height: 200px;
    box-shadow: 9px 10px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px;
}
.description{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 600px;
    padding: 30px;
}
.title{
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 500;
    font-size: 24px;
    line-height: 29px;
    text-decoration-line: underline;
    color: #000000;
    margin-bottom: 5px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.text{
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 300;
    font-size: 14px;
    line-height: 17px;
    text-align: justify;
    display: -webkit-box;
    color: #000000;
    overflow: hidden;
    width: 100%;
    -webkit-line-clamp: 3; /* количество строк */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
.date{
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 20px;
    color: #717171;
    
}
img{
    object-fit: cover;
    width: 350px;
    flex-shrink: 0,
}
</style>