<template>
    <div>
        <div class="wrapper">
            <div class="total-popular">
                <div class="total-popular-main">
                    <div class="total-popular-main-title">НазваниеНазваниеНазваниеНазваниеНазваниеНазваниеНазвание Название Название Название   </div>
                    <p>18.01.2023</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style scoped>
.wrapper{
    width: 100%;
    
}
.total-popular{
    width: 100%;
    height: 600px;
}
.total-popular-main{
    background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../../../uploads/cat.png);
    background-color:rgb(128, 128, 128);
    background-position: center;
    background-repeat: no-repeat;
    background-size:contain;
    
    width: 100%;
    height: 400px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}
.total-popular-main-title{
    font-family: 'Montserrat';
    font-style: normal;
    font-weight: 600;
    font-size: 32px;
    line-height: 39px;
    color: #FFFFFF;
    width: 100%;
    height: 80px;
    overflow: hidden;
    display: inline-block;
    text-overflow: ellipsis;
    margin-bottom: 10px;
}
p{
    font-family: 'Montserrat';
font-style: normal;
font-weight: 600;
font-size: 16px;
line-height: 20px;
color: white;
}
</style>