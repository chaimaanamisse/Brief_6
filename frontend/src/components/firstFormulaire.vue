<template>
  <form @submit.prevent="handleSubmit">
      <label >Nom complet:</label>
      <input type="text" required v-model="fullName">


      <label >Carte d'identité nationale</label>
      <input type="text" required v-model="cin">

      <label >Numero de téléphone:</label>
      <input type="text" required v-model="phoneNumber">

      <div class="token">   {{}} </div>
      
      <div class="submit">
          <button>Envoyer</button>
      </div>


      

  </form>
  
  
</template>

<script>
export default {
    name: 'firstFormulaire',
    data() {
        return {
            fullName: '',
            phoneNumber: '',
            cin: ''
            }
    },
    
      methods: {
      async handleSubmit() {
        const data = {
          fullName: this.fullName,
          phoneNumber: this.phoneNumber,
          cin: this.cin,
          
        };
  
        fetch("http://localhost/creer_api/users/creer.php", {
          method: "POST",
          header: "Content-type: application/json",
          body: JSON.stringify(data),
        })
          .then((reponseBis) => reponseBis.json())
          .then(function (dataBis) {
            // this.reference = dataBis.ref;
            console.log(dataBis.ref);
            // sessionStorage.setItem("reference", dataBis.ref);
            // console.log(sessionStorage.getItem("reference"));
            alert("votre code client est : " + dataBis.ref);
          });
      },
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


</style>