<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <center><br>
                    <h1 class="text-xl font-medium text-black" >
                        Todas mis listas
                    </h1><br><br>
                </center>
            </div>
            <div class="col-md-12" > 
                 
                <div class="row" >
                     <div class="col-md-3 max-w-sm rounded overflow-y-auto h-40 shadow-lg ">
                        <h1 class="text-xl font-medium text-black text-center " >
                                Categorias
                        </h1><br>
                        <div v-for="Categoria in Categorias" >
                            {{Categoria.NombreCategorias}}
                            <hr/>
                        </div>
                    </div>
                    <div class="col-md-3 max-w-sm rounded overflow-y-auto h-40 shadow-lg">
                        <h1 class="text-xl font-medium text-black text-center " >
                                SubCategorias
                        </h1><br>
                        <div v-for="SubCategoria in SubCategorias" >
                            {{SubCategoria.NombreSubcategorias}}
                            <hr/>
                        </div>
                    </div>
                    <div class="col-md-3 max-w-sm rounded overflow-y-auto h-40 shadow-lg">
                        <h1 class="text-xl font-medium text-black text-center " >
                                Gestiones
                        </h1><br>
                        <div v-for="Gestion in Gestiones" >
                            {{Gestion.Nombre_Tipo_Entradas}}
                            <hr/>
                        </div>
                    </div>
                    <div class="col-md-3 max-w-sm rounded overflow-y-auto h-40 shadow-lg">
                        <h1 class="text-xl font-medium text-black text-center " >
                                Apuntes (Concepto)
                        </h1><br>
                        <div v-for="Apunte in Apuntes" >
                            {{Apunte.Concepto}}
                            <hr/>
                        </div>
                    </div>
                     
                </div>
               <br><br>
            </div>
        </div>
    </div>
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
            var URL_BASE_1 =  '/categorias';
            var URL_BASE_2 =  '/subcategorias';
            var URL_BASE_3 =  '/apuntesgastos';
            var URL_BASE_4 =  '/gestioningresos';

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
