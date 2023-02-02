<template>
    <div class="post-wrapper">
        <div class="post">
            <div class="title">
                <h1>{{ this.CURRENT_POST.title }}</h1>
                <div class="title-line"></div>
            </div>
            <img :src="'/api/uploads/' + this.CURRENT_POST.image" alt="Нету картинки(">
            <div class="text">
                {{this.CURRENT_POST.text}}
            </div>
        </div>
    </div>
</template>

<script>
import { useRoute } from 'vue-router'
import { mapGetters, mapActions } from 'vuex'
    export default {
        data() {
            return {
                id: null
            }
        },
        mounted () {
            if(!this.CURRENT_POST[0]){
                this.GET_POST( useRoute().params.id)
            }
            this.id = useRoute().params.id
        },
        methods: {
            ...mapActions([
                'GET_POST',
            ]),
        },
        computed: {
            ...mapGetters([
                'CURRENT_POST',
            ]),
        }
    }
</script>

<style scoped>
.post-wrapper, .post{
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}
.post{
    width: 50%;
}
.title{
    display: flex;
    width: 100%;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    margin-bottom: 40px;
}
.title > h1{
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 44px;
    color: #000000;
    margin-bottom: 10px;

}
.title-line{
    width: 40%;
    height: 1px;
    background-color:black;
}
img{
max-width: 100%;
margin-bottom: 40px;
}
.text{
    font-family: 'Montserrat';
font-style: normal;
font-weight: 400;
font-size: 20px;
line-height: 24px;
text-align: justify;

color: #000000;
}
</style>