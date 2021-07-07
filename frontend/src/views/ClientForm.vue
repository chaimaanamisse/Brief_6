<template>
<img alt="Vue logo" src="../assets/logo.png">
    <clientFormulaire/>
  </template>

<script>
// @ is an alias to /src
import clientFormulaire from '@/components/clientFormulaire.vue'

export default {
  name: 'ClientForm',
  components: {
    clientFormulaire
  }
}
</script>
