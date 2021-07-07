<template>



  <form @submit.prevent="CreateRDV">
      <label >Sujet:</label>
      <input type="text" required v-model="sujet">


      <label >Choisissez une date:</label>
      <input type="date" required v-model="date_reservation"  :min="getTodayDate()" @change="getTimeSlot">

      <label>Choisissez le creneau qui vous correspand</label>
    <select name="heure_debut" v-model="heure_debut">
      <option v-for="o in obj" :key="o.id" :value="o.id">
        {{ o.heure_debut }}
      </option>

    </select>

      
      
      <div class="submit">
          <button v-if="hundelUpdate">Envoyer</button>
      </div>
      
      <div class="mesBtns">
      <router-link to="/gestionReservation"><button> Voir mes anciennes réservations</button> </router-link>
      <button class="dec" id="out" @click="mylogout()">Déconnecter</button>
     </div>
      
      
      


      

  </form>
  
  
</template>

<script>
export default {
    name: 'r',
    data() {
        return {
            id: this.$route.params.name,
            hundelUpdate: true,
            sujet: '',
            date_reservation : '',
            heure_debut : '',
            obj: '',
           
        }
    },
   methods: {
    getTodayDate() {
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, "0");
      var mm = String(today.getMonth() + 1).padStart(2, "0");
      var yyyy = today.getFullYear();
      today = yyyy + "-" + mm + "-" + dd;
      return today;
    },
    getTimeSlot() {
      var myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/json");

      var raw = JSON.stringify({
        date_reservation: this.date_reservation,
      });

      var requestOptions = {
          mode: 'no-cors',
        method: "POST",
        headers: myHeaders,
        body: raw,
        redirect: "follow",
      };
      var self = this;
      fetch(
        "http://localhost/creer_api/creneaux/lire.php",
        requestOptions
      )
        .then((response) => response.text())
        .then(function (result) {
          console.log(result);
          var availableTimes = JSON.parse(result);
          console.log(availableTimes);
          self.obj = availableTimes;
        })
        .catch((error) => console.log("error", error));
    },
    async CreateRDV() {
      let res = await fetch(
        "http://localhost/creer_api/reservations/creer.php",
        {  mode: 'no-cors',
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            id_user: sessionStorage.getItem("ref"),
            id_creneau: this.heure_debut,
            sujet: this.sujet,
            date_reservation: this.date_reservation,
          }),
        }
      );
      let data = await res.json();
      console.log(data);
    },
    getSingelAppointment: async function (id) {
      let res = await fetch(
        "http://localhost/Backend%20RDV/API/reservation/GetSpecifique",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            id: id,
          }),
        }
      );
      let [data] = await res.json();

      console.log(data);
      this.date_reservation = data.date_reservation;
      this.sujet = data.sujet;
      this.heure_debut = data.heure_debut;
      (this.hundelUpdate = id != "" ? false : true),
        //   this.dataUpdated = data;
        this.$router.push({ path: "/r", params: { myData: data } });
    },

   },
    beforeMount() {
    console.log(this.id);
    this.getSingelAppointment(this.id);
  },
  UpdateRDV: async function () {
      let res = await fetch(
        "http://localhost/Backend%20RDV/API/reservation/update",
        {
         
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            id_RDV: this.id_RDV,
            date: this.date,
            fk_creneau: this.heur,
            sujet: this.sujet,
          }),
        }
      );
      let data = await res.json();
      console.log(data);
      this.$router.push({ path: "/gestionReservation" });
    },
};
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
input, select{
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

.dec {
    margin-left: 30px;
}
.mesBtns {
    margin-top: 30px;
}


</style>