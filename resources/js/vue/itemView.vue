<template>
    <div id="itemView">
        <div v-for="(value , key) in items" :key="key">
            <compItemList
                :item = "value"
                v-on:itemchange = "$emit('reloaditems')"
            />
        </div>


    </div>
</template>

<script>
import compItemList from './itemList'
export default {
    data(){
        return {

        }
    },
    props: ['items'],
    components:{
        compItemList
    }
}
</script>
