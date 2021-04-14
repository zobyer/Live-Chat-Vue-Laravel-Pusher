<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <message-container />
                    <input-message :current_room="currentRoom"/>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import MessageContainer from './MessageContainer.vue'
    import InputMessage from './InputMessage.vue'


    export default {
        components: {
            AppLayout,
            MessageContainer,
            InputMessage,

        },
        data: function(){
            return{
                chatRooms: [],
                currentRoom:[],
                messages:[]
            }
        },
        methods:{
            getRooms(){
                axios.get('/chat/rooms')
                .then( response =>{
                    this.chatRooms = response.data;
                    this.setRoom(response.data[0]);
                })
                .catch(error =>{
                    console.log("error");
                })

            },
            setRoom(current_room){
                this.currentRoom = current_room;
                this.getmessages();
            },
            getmessages(){
                axios.get('/chat/room/'+ this.currentRoom.id+'/messages')
                .then( response =>{
                    this.messages = response.data;
                })
                .catch( error=>{
                    console.log("error in getmessages");
                })
            },
        },
        created(){
            //console.warn("Hello")
            this.getRooms();
                
        }
    }
</script>
