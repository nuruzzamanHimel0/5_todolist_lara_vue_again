<template>
    <div id="itemList">
        <input type="checkbox"
               v-model="item.completed"
                @change.prevent="updateItem()"
        >
        <span
            :class="[ item.completed == 0 ? 'uncheck' : '' , 'listname'  ]"
        >  {{item.name}}</span>

        <font-awesome-icon
            class="trash"
            icon="trash"
            @click.prevent="deleteItem()"
        />
    </div>
</template>

<script>
export default {
    data(){
        return {

        }
    },
    props:['item'],
    created(){

    },
    methods:{
        deleteItem(){
            axios.delete(`api/items/${this.item.id}`)
            .then((response) =>{
                if(response != ""){
                    this.$emit('itemchange')
                    console.log(response);
                }
            }).catch((error) => {
                console.log(error);
            });
        },
        updateItem(){
            axios.put(`api/items/${this.item.id}`,{
                item:this.item
            })
                .then((response) =>{
                    if(response != ""){
                        // this.items = response.data;
                        console.log(response);
                    }
                }).catch((error) => {
                console.log(error);
            });
        }
    }
}
</script>
<style>
#itemList{
    display: flex;
    flex-direction: row;
    border-bottom: 1px dotted #000;
}
.listname{
    width: 100%;
    margin-left: 5px;
    padding: 5px;
}
.trash{
    color: red;
    border: 1px solid red;
    padding: 4px;
}
.uncheck{
    text-decoration: line-through;
    color: #806969;
}
</style>
