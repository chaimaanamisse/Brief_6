<template>
  <div class="hello">
   
    <p>
      Maître Manon Lauron, avocat à la cour, vous reçoit et vous oriente dans toutes vos démarches juridiques. <br>
      100 Bis av St Mandé, 75012 PARIS TEL: 01 40 53 60 00

    </p>
    <div class="home_btns">
          
          <button><router-link to="/firstFormulaire">Votre première visite ?</router-link></button>
          <button><router-link to="/clientFormulaire">vous êtes client ?</router-link></button>
      </div>
    
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  props: {
    msg: String
  },
   methods: {
    showModel() {
    alert('work')
    },
    showModel2() {
      alert('work2')
    }
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: white;
  text-decoration: none;
  
}

button {
    background: #60c1ad;
    border: 0;
    padding:10px 20px;
    margin-top: 20px;
    margin-left: 20px;
    color: white;
    border-radius: 20px;
}
</style>
