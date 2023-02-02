import { createStore } from 'vuex'
import axios  from 'axios';

let store = createStore({
    state(){
        return{
            category_posts:[],
            categories: [],
            current_category: {
                title:null,
                id:null,
            },
            count_of_pages:null,
            current_post :[]
        }
    },
    mutations:{
        SET_CATEGORY_POSTS_TO_STATE: (state, category_posts)=>{
            state.category_posts = category_posts;
        },
        SET_CATEGORIES_STATE: (state, categories)=>{
            state.categories = categories;
        },
        SET_CURRENT_CATEGORY: (state, category)=>{
            state.current_category = category
        },
        SET_COUNT_OF_PAGES: (state, count)=>{
            state.count_of_pages = count
        },
        SET_CURRENT_POST: (state, post)=>{
            state.current_post = post
        }
    },
    actions:{
        GET_CATEGORY_POSTS({commit}, data){
            return axios.get('/api/posts/category/' + data.id + '/page/' + data.page)
            .then((response) =>{
                    commit('SET_CATEGORY_POSTS_TO_STATE', response.data.data.posts);
                    commit('SET_COUNT_OF_PAGES', response.data.data.count_of_pages);
            })
        },
        GET_CATEGORY({commit}, id){
            return  axios.get('/api/categories/' + id)
            .then((category)=>{
                commit('SET_CURRENT_CATEGORY', category.data);
            })
        },
        GET_CATEGORIES({commit}){
            return axios.get('/api/categories')
            .then((response) =>{
                commit('SET_CATEGORIES_STATE', response.data.categories);
            })
        },
        GET_POST({commit}, id){
            return axios.get('/api/posts/' + id)
            .then((response) =>{
                commit('SET_CURRENT_POST', response.data);
            })
        },
        AUTHORIZE(form){
            return axios.post('api/user/authorize', form)
                .then((response)=>{
                    return response.data
                })
                .catch((error)=>{
                    return error.response.data.error

                }   
            );
        }
    },
    getters:{
        CATEGORY_POSTS(state){
            return state.category_posts
        },
        CATEGORIES(state){
            return state.categories
        },
        CURRENT_CATEGORY_TITLE(state){
            return state.current_category.title
        },
        CURRENT_CATEGORY_ID(state){
            return state.current_category.id
        },
        COUNT_OF_PAGES(state){
            return state.count_of_pages
        },
        CURRENT_POST(state){
            return state.current_post
        }

    }
})

export default store