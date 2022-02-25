<template>
    <div id="itemForm">
        <input type="text" v-model="item.name" >
        <font-awesome-icon
            :class="[ item.name != '' ? 'active' : 'inactive' , 'plus' ]"
            @click.prevent="addItem()"
            icon="plus-square"
        />
    </div>
</template>

<script>
export default {
    data(){
        return {
            item: {
                name: ''
            }
        }
    },
    methods:{
        addItem(){

            axios.post('api/items',{
                item : this.item
            }).then((response) =>{
                if(response != ""){

                    if(response.status == 200){
                        this.item.name = '';
                        this.$emit('reloaditems');
                    }
                    console.log(response.data.status);
                }
            }).catch((error) =>{
                console.log(error);
            });
        }
    }
}
</script>

<style>
#itemForm{
    display: flex;
    flex-direction: row;
    justify-content: center;
}
#itemForm input{
    width: 95%;
    padding: 4px;
    margin-right: 10px;
}
.plus{
    font-size: 22px;
    margin-top: 2px;
    cursor: pointer;
}
.active{
    color:green;
}
.inactive{
    color:#b66e6e;
}

</style>
