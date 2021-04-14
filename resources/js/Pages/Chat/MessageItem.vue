<template>
  {{message.user.name}}:{{message.message}}
</template>

<script>
export default {
    props:["message"],
}
</script>

<style>

</style>