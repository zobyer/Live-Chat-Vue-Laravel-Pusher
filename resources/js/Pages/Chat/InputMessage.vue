<template>
<div class="relative h-10 m-1">
    <div style="border-top: 1px solid #e6e6e6" class="grid grid-cols-6">
        <input type="text"
        v-model="message"
        @keyup.enter="SendMessage"
        placeholder="Enter Something...."
        class="col-span-5 outline-none p-1"
        >
        <button class="place-self-end bg-gray-500 hover:bg-blue-700 p-1 mt-1 rounded text-white"
        @click="SendMessage"
        >
            Send
        </button>
    </div>
</div>
</template>

<script>
export default {
    props:["current_room"],
    data: function(){
        return{
            message : []
        }
    },
    methods:{
        SendMessage(){
            if( this.message == ''){
                return;
            }

            axios.post('/chat/room/'+ this.current_room.id+"/message", {
                message: this.message
            }).then( responce =>{
                if ( responce.status == 201){
                    this.message = '';
                    this.$emit('Message_Sent');
                    console.warn("waring")
                }
            })
            .catch(error =>{
                    console.log("error sending message");
            })
        }
    }
}
</script>

<style>

</style>