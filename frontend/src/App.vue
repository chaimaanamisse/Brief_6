<template>
  <div id="nav">
   
     <router-link to="/">Accueil</router-link>  
     <!-- <router-link to="/firstFormulaire">première visite</router-link> |
    <router-link to="/clientFormulaire">fidèle</router-link>  -->
    <!-- <router-link to="/r">test</router-link>  -->
  </div>
  <router-view/>
</template>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #999999;
}

#nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #999999;
    text-decoration: none;

    &.router-link-exact-active {
      color: #60c1ad;
    }
  }
  
}
</style>
