<template>
  <!-- <div class="home"> -->
    <img alt="Vue logo" src="../assets/logo.png">

    <firstFormulaire/>
  <!-- </div> -->
</template>

<script>
// @ is an alias to /src
import firstFormulaire from '@/components/firstFormulaire.vue'

export default {
  name: 'FirstForm',
  components: {
    firstFormulaire
  }
}
</script>

