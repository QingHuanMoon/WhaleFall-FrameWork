<template>
    <div>
        {{ msg }}
    </div>
</template>

<script>
    import store from '../Storage/index'
    import { mapState } from 'vuex'
    export default
    {
        name: 'Hello',
        data() {
            return {

            }
        },
        store,
        computed:
            {
                ...mapState(['msg'])
            },
        mounted() {
            console.log($)
            console.log(axios)
        }
    }
</script>