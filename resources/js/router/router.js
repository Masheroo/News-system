import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path:'/',
        name:"Main",
        component:()=>import('../components/pages/nMain.vue')
    },
    {
        path:'/category/:id',
        name:"Category",
        component:()=>import('../components/pages/nCategory.vue')
    },
    {
        path:'/post/:id',
        name:"Post",
        component:()=>import('../components/pages/nPost.vue')
    },


]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router