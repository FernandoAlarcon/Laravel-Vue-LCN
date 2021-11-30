<template>
  <div id="Aplicacion">  
    <header id="header">
            <Navbar />
             
            <!-- <navigationMenu></navigationMenu> -->
    </header>
    <div id="content">
            <router-view></router-view> 
    </div> 
    
    <Footer />
  </div>
</template>

<script> 
import Navbar from './Navbar.vue'
import Footer from './Footer.vue'
import navigationMenu from './Menu.vue'


export default {
  // el: '#Aplicacion',
   props: ['auth'],
   components: { 
      Navbar,
      Footer
      //navigationMenu
   }
  

}
</script>
