<template>
 <div id="Aplicacion">  
   <Navbar /> 
 </div>
   
</template>

  

<script> 
import Navbar from './Navbar.vue'
import Footer from './Footer.vue'
import navigationMenu from './Menu.vue'
import * as useRouter from 'vue-router';

export default {
  // el: '#Aplicacion',
   props: ['auth'],
   components: { 
      Navbar,
      Footer
      //navigationMenu
   },
    created() {
         

    },
    

}
</script>
