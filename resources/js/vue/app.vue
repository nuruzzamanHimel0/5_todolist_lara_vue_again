<template>
    <div id="motherAppComp">
          <div class="header">
                <h2>To DO List App</h2>
                <compItemForm
                    v-on:reloaditems="getItemList()"
                ></compItemForm>
<!--              {{items}}-->
          </div>
        <compItemView
            :items = "items"
            v-on:reloaditems="getItemList()"
        />
    </div>
</template>

<script >

import compItemForm from './itemForm.vue'
import compItemView from './itemView.vue'
export default{
    data(){
        return {
            items : []
        }
    },
    created(){
        this.getItemList();
    },
    methods:{
        getItemList(){
            axios.get("api/items")
            .then((response) =>{
                if(response != ""){
                    this.items = response.data;
                    console.log(response);
                }
            });
        }
    },
    components:{
        compItemForm,
        compItemView
    }
}
</script>

<style scoped>
#motherAppComp{
    width: 400px;
    margin: auto;
}
.header{
    background: #ddd;
    text-align: center;
    padding: 8px;
}
.header h2{
    margin: 6px;
}

</style>
