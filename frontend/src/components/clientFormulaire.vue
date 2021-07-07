<template>
  <form @submit.prevent="handleSubmit">
      <label >Entrer votre code:</label>
      <input type="text" required v-model="ref">


      
      <div class="submit">
          
          <!-- <button>Envoyer</button> -->
          <button>Envoyer</button> 
      </div>


      

  </form>
  
  
</template>

<script>
export default {
    name: 'clientFormulaire',
    data() {
        return {
            ref: "",
           }
    },
     methods: {
    async handleSubmit() {
      // const data = {
      //   reference_user: this.reference_user,
      // };
      let res = await fetch(
        "http://localhost/creer_api/users/authentifier.php",
        { mode: 'no-cors',
          method: "GET",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            ref: this.ref
          }),
        }
      )
      let data = await res.json();
      console.log(data.id);
      if (data.existe == true) {
        sessionStorage.setItem("ref", data.id);
        this.$router.push({ name: "Reservation" });
      }
    },
  },
  beforeMount() {
    if (sessionStorage.getItem("ref")) {
      this.$router.push({ name: "Reservation" });
    }
  }

}
</script>

<style>
form{
    max-width: 420px;
    margin: 30px auto;
    background: white;
    text-align: left;
    padding: 40px;
    border-radius: 10px;
}
label{
    color: #aaa;
    display: inline-block;
    margin: 25px 0 15px;
    font-size: 0.6em;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: bold;
}
input{
    display: block;
    padding: 10px 6px;
    width: 100%;
    box-sizing: border-box;
    border: none;
    border-bottom: 1px solid #ddd;
    color: #555;
}
button {
    background: #60c1ad;
    border: 0;
    padding:10px 20px;
    margin-top: 20px;
    color: white;
    border-radius: 20px;
}
.submit {
    text-align: center;
}

a {
    font-weight: bold;
    color: white;
    text-decoration: none;

  }


</style>