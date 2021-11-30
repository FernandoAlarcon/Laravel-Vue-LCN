<template>
    <div class="container"> 
        <div class="row justify-content-center"> 
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="mb-4">
                                <div class="grid grid-cols-6 gap-4">
                                    <div class="col-start-1 col-end-7 ...">
                                        <center><br>
                                            <h1 class="text-xl font-medium text-black" >
                                               Gestion Ingresos
                                            </h1>
                                        </center>
                                    </div>
                                </div>
                                <div class="flex mb-4">
                                    <div class="w-1/2 bg-white-400 h-12">
                                        <center><br>
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                                Info Busqueda
                                            </label>
                                        </center>
                                    </div>
                                    <div class="w-3/4 bg-white-400 h-12"><br>
                                        <center>
                                            <button class=" bg-yellow-500 
                                                        hover:bg-yellow-700 
                                                        text-white 
                                                        font-bold 
                                                        h-10 w-10 flex items-center justify-center
                                                        border-yellow-700 
                                                        rounded-full
                                                        "
                                                        v-on:click="AbrirModalCrear()"
                                                        title="Nuevo registro">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
                                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                                                </svg>
                                            </button> 
                                        </center>
                                    </div>
                                </div>
                                <div class="flex mb-4">
                                    <div class="w-full bg-white-500 h-12"> 
                                            <center>
                                                <div class="w-1/2 bg-white-500 h-12">
                                                        <input 
                                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                                        type="text"
                                                        id="Data" 
                                                        placeholder="Mejora tu Busqueda"
                                                        v-model="DataSend"
                                                        v-on:keyup="getData()" />
                                                </div>
                                            </center> 
                                    </div>
                                </div>
                            </div>            
                        </div>
                    </div>
                    <div>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tipo Entradas
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tipo Ingreso
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Estado
                                    </th> 
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha Creacion
                                    </th> 
                                    <th scope="col" class="relative px-6 py-3">
                                        ACCIONES
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="( Gestion, index ) of Gestiones"  :key="index" >
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{Gestion.nombre_tipo_entradas}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{Gestion.tipo_ingreso}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{Gestion.estado}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{Gestion.created_at}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"> 
                                        <button 
                                            v-on:click.prevent="DeleteData(Gestion)"
                                            class="  bg-red-300 hover:bg-red-400 text-red-800 font-bold py-2 px-4  rounded-full 
                                                    inline-flex items-center">
                                            
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                                    <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
                                                </svg>
                                                <span>Eliminar</span>
                                        </button> 
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"> 
                                        <button 
                                            v-on:click.prevent="AbrirModalUpdate(Gestion)"
                                            class="  bg-green-300 hover:bg-green-400 text-green-800 font-bold py-2 px-4  rounded-full 
                                                    inline-flex items-center">
                                            
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush-fill" viewBox="0 0 16 16">
                                                    <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.117 8.117 0 0 1-3.078.132 3.658 3.658 0 0 1-.563-.135 1.382 1.382 0 0 1-.465-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.393-.197.625-.453.867-.826.094-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.2-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.175-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04z"/>
                                                </svg>
                                                <span>Actualizar</span>
                                        </button> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex mb-4" >
                            <div class="inline-flex">
                                    <button 
                                        v-if="pagination.current_page > 1"
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l"
                                        @click.prevent="changePage(pagination.current_page - 1)">
                                        <span>Atras</span>
                                    </button>
                                    <button 
                                        v-if="pagination.current_page < pagination.last_page"
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r"
                                        @click.prevent="changePage(pagination.current_page + 1)">
                                        <span>Siguiente</span>
                                    </button>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--MODAL DATA-->
        <div> 
            <div v-if="showModal" 
                class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
                <div class="relative w-auto my-6 mx-auto max-w-6xl">
                    <!--content-->
                    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                    <!--header-->
                    <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                        <p class="text-2xl font-semibold">
                            {{ActionType}}
                        </p>
                        <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" v-on:click="toggleModal()">
                        <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                            ×
                        </span>
                        </button>
                    </div>
                    <!--body-->
                    <div class="relative p-6 flex-auto">
                        <form class="w-full max-w-lg">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                        Gestiones Ingresos
                                    </label>
                                    <input  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="grid-first-name"
                                            type="text"
                                            placeholder="Nombre Categoria" 
                                            v-model="NuevaData.nombre_tipo_entradas"
                                            />
                                    <p class="text-red-500 text-xs italic">Por favor llene el campo.</p>
                                </div>
                            </div> 
                            <div class="flex flex-wrap -mx-3 mb-2"> 
                                <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                        Tipo Ingreso
                                    </label>
                                    <div class="relative">
                                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                                                id="grid-state" 
                                                v-model="NuevaData.tipo_ingreso">
                                        <option value="Unico" >Unico</option>
                                        <option value="Multiple Mensual" >Multiple Mensual</option> 
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                        estado Gestion
                                    </label>
                                    <div class="relative">
                                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                                                id="grid-state" 
                                                v-model="NuevaData.estado">
                                        <option value="Positivo"  >Positivo</option>
                                        <option value="Negativo"  >Negativo</option> 
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                    <!--footer-->
                    <div class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                         
                        <button class=" text-orange-500 bg-transparent border border-solid border-orange-500 hover:bg-orange-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1" 
                                type="button"
                                style="transition: all .15s ease" 
                                v-if="ButtonUpdate"
                                v-on:click="UpdateData()">

                          Actualizar
                        </button> 
                         <button class=" text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1" 
                                type="button"
                                style="transition: all .15s ease" 
                                v-if="ButtonNew"
                                v-on:click="CrearData()">

                          Nuevo Registro
                        </button> 
                        <button class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease" v-on:click="toggleModal()">
                          Cerrar
                        </button>
                        
                    </div>
                    </div>
                </div>
            </div>
            <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
        </div>
    </div>
    
</template>

<script>

    import axios from 'axios';
    import swal from 'sweetalert';
    export default {
        name: 'GestionIngresos',
        mounted() { 
        },
        created: function () {
			this.getData();
		},
        data(){
                return { 
                        pagination  : {
                                    'total': 0,
                                    'current_page': 0,
                                    'per_page': 0,
                                    'last_page': 0,
                                    'from': 0,
                                    'to': 0
                                },
                        NuevaData  : {
                                'id'   : '',
                                'nombre_tipo_entradas' : '',
                                'tipo_ingreso'         : '', 
                                'estado'               : ''
                            },
                        Gestiones    : [],
                        DataSend     : '',
                        showModal    : false,
                        SendData     : 'CrearData',
                        ActionType   : 'Nueva Info',
                        ButtonNew    : true,
                        Ruta         : '/api/gestioningresos/',
                        ButtonUpdate : false
                }
        },
        computed:{
            isActived: function() {
				return this.pagination.current_page;
			},
            pagesNumber: function() {
				if(!this.pagination.to){
					return [];
				}

				var from = this.pagination.current_page - this.offset;
				if(from < 1){
					from = 1;
				}

				var to = from + (this.offset * 2);
				if(to >= this.pagination.last_page){
					to = this.pagination.last_page;
				}

				var pagesArray = [];
				while(from <= to){
					pagesArray.push(from);
					from++;
				}
				return pagesArray;
			}
        },
        methods: {
            changePage: function(page) {
                this.pagination.current_page = page;
                this.getData(page);
            },
            getData: function(page){

                var URL_BASE =  this.Ruta + '?page=' + page;
                if (this.DataSend != '') {
					axios.get(URL_BASE,{params: {DataSend: this.DataSend}}).then(response=>{
						this.Gestiones  = response.data.gestioningresos.data,
						this.pagination = response.data.pagination
					});
				}else{                     
					axios.get(URL_BASE).then(response=>{
						this.Gestiones  = response.data.gestioningresos.data,
						this.pagination = response.data.pagination
					});
				}
            },
            CrearData: function(){
                var URL_BASE    = this.Ruta;
                console.log('Data '+ this.NuevaData.nombre_tipo_entradas); 
                axios.post(URL_BASE, this.NuevaData ).then(response => {
                     
                        this.getData(this.pagination.current_page);
						this.NuevaData.id = ''; 
                        this.NuevaData.nombre_tipo_entradas = '';
                        this.NuevaData.tipo_ingreso         = '';
                        this.NuevaData.estado               = '';
                         
						this.errors=[];
                        this.showModal = !this.showModal; 
                        swal("Informacion agregada", {
                            icon: "success",
                        }); 
                        
				}).catch(error => {
					this.errors = error.response.data
				});
            },
            DeleteData: function(Data){
                var URL_BASE = this.Ruta;
                swal({
                title: "Estas seguro ?",
                text: "Vas a eliminar al dato la Categoria " + Data.nombre_tipo_entradas + ", perderas este registro",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    let IdData = Data.id;
                        axios.delete(URL_BASE + IdData).then(response=>{
                        this.getData();
                        swal("Eliminaste la Categoria " + Data.nombre_tipo_entradas + " de la base de datos", {
                            icon: "success",
                        }); 
                    }).catch(error=>{
                        alert("Error "+error)
                    })
                    
                } else {
                    //swal("No se eliminara!");
                }
                });  
            },
            UpdateData: function(){
                
                var URL_BASE = this.Ruta + this.NuevaData.id;
                swal({
                title: "Estas seguro de actualizar ?",
                text: "Vas a actualizar la Categoria " + this.NuevaData.nombre_tipo_entradas + ", cambiaras este registro",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    let IdData = Data.id;
                        axios.put(URL_BASE,this.NuevaData).then(response=>{
                        
                        this.getData(this.pagination.current_page);
						this.NuevaData.id                   = ''; 
                        this.NuevaData.nombre_tipo_entradas = '';
                        this.NuevaData.tipo_ingreso         = '';
                        this.NuevaData.estado               = '';
                        this.showModal                  = !this.showModal;
  
                        swal("Actualizaste la Categoria " + Data.nombre_tipo_entradas + " de la base de datos", {
                            icon: "success",
                        }); 

                    }).catch(error=>{
                        alert("Error "+error)
                    })
                    
                } else {
                    //swal("No se eliminara!");
                }
                });  

            },
            toggleModal: function(){
                this.showModal = !this.showModal;
            },
            AbrirModalCrear: function(){
                this.showModal     = !this.showModal;
                this.ButtonNew     = true;
                this.ButtonUpdate  = false;
                this.ActionType    = 'Nueva Info';

                this.NuevaData.id                   = ''; 
                this.NuevaData.nombre_tipo_entradas = '';
                this.NuevaData.tipo_ingreso         = '';
                this.NuevaData.estado               = '';
            },
            AbrirModalUpdate: function(UpdateData){
                this.ButtonNew                  = false;
                this.ButtonUpdate               = true;
                this.showModal                  = !this.showModal;
                this.ActionType                 = 'Actualizar Info';

                this.NuevaData.id                   = UpdateData.id; 
                this.NuevaData.nombre_tipo_entradas = UpdateData.nombre_tipo_entradas;
                this.NuevaData.tipo_ingreso         = UpdateData.tipo_ingreso;
                this.NuevaData.estado               = UpdateData.estado;
            }
        },

    }
</script>
