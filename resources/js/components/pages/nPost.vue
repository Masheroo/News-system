<template>
    <div>
        {{ 'пост с id' + id }}
    </div>
</template>

<script>
import { useRoute } from 'vue-router'
    export default {
        data() {
            return {
                id: null
            }
        },
        mounted () {
            this.id = useRoute().params.id
        },
    }
</script>

<style scoped>

</style>