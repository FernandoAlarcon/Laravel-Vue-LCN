<template>
 <div id="Aplicacion">  
   <Navbar /> 
 </div>
   
</template>

  

<script> 
import Navbar from './Navbar.vue'
import Footer from './Footer.vue' 

export default {
  // el: '#Aplicacion',
   props: ['auth'],
   components: { 
      Navbar,
      Footer 
   },
    created() {
         

    },
    

}
</script>
