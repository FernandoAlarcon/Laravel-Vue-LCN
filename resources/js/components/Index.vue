<template>
    

    <p>
        Bienvenido a tu DashBoard Infinety
    </p>

</template>

<script>
    import axios from 'axios'

    export default {
        mounted() { 
            this.getData();
        },
        data(){
            return{
            Apuntes       : [],
            Categorias    : [],
            SubCategorias : [],
            Gestiones     : [],
            }
        },
        methods: {
            getData: function(){
            var URL_BASE_1 =  '/api/categorias';
            var URL_BASE_2 =  '/api/subcategorias';
            var URL_BASE_3 =  '/api/apuntesgastos';
            var URL_BASE_4 =  '/api/gestioningresos';

            axios.get(URL_BASE_1,{params: {DataSend: 'All'}}).then(response=>{
                this.Categorias = response.data.categorias 
            });
            axios.get(URL_BASE_2,{params: {DataSend: 'All'}}).then(response=>{
                this.SubCategorias = response.data.subcategorias 
            });
            axios.get(URL_BASE_3).then(response=>{
                this.Apuntes = response.data.apuntes.data 
            });
            axios.get(URL_BASE_4,{params: {DataSend: 'All'}}).then(response=>{
                this.Gestiones = response.data.gestioningresos 
            });
            }
        }
    }
</script>
