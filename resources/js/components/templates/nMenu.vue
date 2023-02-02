<template>
    <div id="menu" class="menu hide">
        <div class="auth active">
            <div class="title ">
                <h1>Авторизация</h1>
                <div class="line"></div>
            </div>
            <form id="auth-form">
                <input class="input" name="email" type="text" placeholder="Логин">
                <input class="input" name="password" type="text" placeholder="Пароль">
                <input @click="authorize()" class="btn" type="button" value="Вход">
            </form>
            <p @click="toggleMenuFormat()">Регистрация</p>    
        </div>
        <div class="reg">
            <div class="title">
                <h1>Регистрация</h1>
                <div class="line"></div>
            </div>
            <form id="reg-form">
                <input class="input" type="text" placeholder="Имя пользователя">
                <input class="input" type="text" placeholder="Email">
                <input class="input" type="text" placeholder="Пароль">
                <input class="input" type="text" placeholder="Подтвердите пароль">
                <input class="btn" type="button" value="Зарегестрироваться">
            </form>
            <p @click="toggleMenuFormat()">Авторизация</p>    
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';

    export default {
        methods: {
            ...mapActions([
                'AUTHORIZE'
            ]),
            toggleMenuFormat() {
                let reg = document.querySelector('.reg');
                let auth = document.querySelector('.auth');

                reg.classList.toggle('active');
                auth.classList.toggle('active');
            },
            authorize(){
                let form = document.querySelector('#auth-form');
                console.log(form);
                console.log(this.AUTHORIZE(new FormData(form)));
            }
        },
    }
</script>

<style scoped>
.hide{
    left: 100% !important;
}
.reg, .auth{
    width: 100%;
    display: none;
    flex-direction: column;
    align-items: center;
}
.active{
    display: flex;
}
.menu{
    width: 400px;
    position: fixed;
    top: 80px;
    background-color: white;
    left: calc( 100% - 400px );
    height: calc(100vh - 80px) ;
    border-radius: 10px;
    border-top: 20px solid black;
    border-bottom: 20px solid black;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: .6s;
}
.title{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
}
.title > h1{
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 24px;
    display: flex;
    align-items: center;
    text-align: center;
    color: #000000;
    margin-bottom: 6px;
}
.line{
    height: 1px;
    width: 100%;
    background-color: black
}
.btn{
    font-family: 'Montserrat';
font-style: normal;
font-weight: 600;
font-size: 16px;
line-height: 20px;
/* identical to box height */

display: flex;
align-items: center;
text-align: center;

color: #000000;
    background: #FFFFFF;
    border: 0.5px solid #000000;
    border-radius: 5px;
    padding: 3px 40px;
    cursor: pointer;
}
.input{
    width: 60%;
    margin-bottom: 10px;
    border: 1px solid #717171;
    border-radius: 10px;
    padding: 10px;
    font-family: 'Montserrat';
font-style: normal;
font-weight: 400;
font-size: 16px;
line-height: 20px;
/* identical to box height */

display: flex;
align-items: center;

color: #717171;
}
form{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    margin-bottom: 10px;
}
p{
    color: black;
    cursor: pointer;
    text-decoration: underline;
}
</style>