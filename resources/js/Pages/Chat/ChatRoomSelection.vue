<template>
  <div class="grid grid-cols-2">
    <div class="font-bold txt-xl">
      {{selected.name}} Chat
    </div>
    <select v-model="selected" @change="$emit('room_change', selected)" class="float-right">
      <option 
      v-for = "(room,index) in rooms" :key="index"
      :value="room">
      {{room.name}}
      </option>

    </select>

  </div>
</template>

<script>
export default {
  props:['rooms','current_room'],
  data: function(){
    return{
      selected : ''
    }
  },
  created(){
    //console.warn(this.current_room)
    this.selected = this.current_room;
  }
}
</script>

<style>

</style>