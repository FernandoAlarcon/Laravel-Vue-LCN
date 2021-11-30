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
                                               Planificador de Gastos
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
                        <div><br>
                            <!--div v-for=" ApuntesGasto of ApuntesGastos" >
                                {{ApuntesGasto}}
                            </div -->
                        
                            <div class="w-24 md:w-auto" v-for="(Edad, index) of Edades" >
                            
                                                    
                                <section class="shadow" :x-data="`{show_${Edad.id}:false}`" >
                                    <article class="border-b">
                                        <div class="border-l-2 border-transparent">
                                            <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none">
                                                <span class="text-grey-darkest font-thin text-xl">
                                                   {{Edad.fecha_year}}
                                                </span>
                                                <div class="rounded-full border border-grey w-7 h-7 flex items-center justify-center">
                                                    <!-- icon by feathericons.com -->
                                                    <svg aria-hidden="true" 
                                                        class=""
                                                        data-reactid="266" 
                                                        fill="none" 
                                                        height="24"
                                                        stroke="#606F7B" 
                                                        stroke-linecap="round" 
                                                        stroke-linejoin="round" 
                                                        stroke-width="2" 
                                                        viewbox="0 0 24 24" 
                                                        width="24" 
                                                        :x-on:click.prevent="`show_${Edad.id}=!show_${Edad.id}`" >
                                                        <polyline points="6 9 12 15 18 9">
                                                        </polyline>
                                                    </svg>
                                                </div>
                                            </header>
                                        </div>
                                    </article>
                                    <article class="border-b"  :x-show="`show_${Edad.id}`" >
                                        <div class="border-l-2 bg-grey-lightest border-indigo">
                                            <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none">
                                                <span class="text-indigo font-thin text-xl">
                                                    Resumen  {{Edad.fecha_year}}
                                                </span>
                                                <div class="rounded-full border border border-indigo w-7 h-7 flex items-center justify-center bg-indigo">
                                                    <!-- icon by feathericons.com -->
                                                    
                                                </div>
                                            </header>
                                            <div>
                                            <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                                                <thead class="bg-gray-50">
                                                    <tr class="text-gray-600 text-left">
                                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                                            Concepto
                                                        </th>
                                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                                            Enero
                                                        </th>
                                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                                            Febrero
                                                        </th>
                                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                                            Marzo
                                                        </th>
                                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                                            Abril
                                                        </th>
                                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                                            Mayo
                                                        </th>
                                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                                            Junio
                                                        </th>
                                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                                            Julio
                                                        </th>
                                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                                            Agosto
                                                        </th>
                                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                                            Septiembre
                                                        </th>
                                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                                            Octubre
                                                        </th>
                                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                                            Noviembre
                                                        </th>
                                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                                            Diciembre
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200">
                                                    <tr v-for=" ApuntesGasto of ApuntesGastos "
                                                        v-if="ApuntesGasto.fecha_year ==  Edad.fecha_year" >
                                                        <td v-if="Edad.fecha_year == ApuntesGasto.fecha_year " class="px-6 py-4">
                                                            <p>
                                                                {{ApuntesGasto.concepto}}
                                                            </p>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <p v-if="Edad.fecha_year == ApuntesGasto.fecha_year && 
                                                                  ApuntesGasto.mes_year == 'January'  " >
                                                                {{ApuntesGasto.importe}}
                                                            </p>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <p v-if="Edad.fecha_year == ApuntesGasto.fecha_year && 
                                                                  ApuntesGasto.mes_year == 'February'  " >
                                                                {{ApuntesGasto.importe}}
                                                            </p>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <p v-if="Edad.fecha_year == ApuntesGasto.fecha_year && 
                                                                  ApuntesGasto.mes_year == 'March'  " >
                                                                {{ApuntesGasto.importe}}
                                                            </p>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <p v-if="Edad.fecha_year == ApuntesGasto.fecha_year && 
                                                                  ApuntesGasto.mes_year == 'April'  " >
                                                                {{ApuntesGasto.importe}}
                                                            </p>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <p v-if="Edad.fecha_year == ApuntesGasto.fecha_year && 
                                                                  ApuntesGasto.mes_year == 'May'  " >
                                                                {{ApuntesGasto.importe}}
                                                            </p>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <p v-if="Edad.fecha_year == ApuntesGasto.fecha_year && 
                                                                  ApuntesGasto.mes_year == 'June'  " >
                                                                {{ApuntesGasto.importe}}
                                                            </p>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <p v-if="Edad.fecha_year == ApuntesGasto.fecha_year && 
                                                                  ApuntesGasto.mes_year == 'July'  " >
                                                                {{ApuntesGasto.importe}}
                                                            </p>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <p v-if="Edad.fecha_year == ApuntesGasto.fecha_year && 
                                                                  ApuntesGasto.mes_year == 'August'  " >
                                                                {{ApuntesGasto.importe}}
                                                            </p>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <p v-if="Edad.fecha_year == ApuntesGasto.fecha_year && 
                                                                  ApuntesGasto.mes_year == 'September'  " >
                                                                {{ApuntesGasto.importe}}
                                                            </p>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <p v-if="Edad.fecha_year == ApuntesGasto.fecha_year && 
                                                                  ApuntesGasto.mes_year == 'October'  " >
                                                                {{ApuntesGasto.importe}}
                                                            </p>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <p v-if="Edad.fecha_year == ApuntesGasto.fecha_year && 
                                                                  ApuntesGasto.mes_year == 'November'  " >
                                                                {{ApuntesGasto.importe}}
                                                            </p>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <p v-if="Edad.fecha_year == ApuntesGasto.fecha_year && 
                                                                  ApuntesGasto.mes_year == 'December'  " >
                                                                {{ApuntesGasto.importe}}
                                                            </p>
                                                        </td>
                                                       
                                                    </tr>
                                                </tbody>
                                            </table>
                                            
                                                <div class="pl-8 pr-8 pb-5 text-grey-darkest">
                                                    <ul class="pl-4">
                                                        <li class="pb-2">
                                                            consectetur adipiscing elit
                                                        </li>
                                                        <li class="pb-2">
                                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                                                        </li>
                                                        <li class="pb-2">
                                                            Viverra orci sagittis eu volutpat odio facilisis mauris
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </section>
                               
                            </div>                                    
                             
                        </div>

                        <!--div class="flex mb-4" >
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
                        </div -->
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
                                        Categoria
                                    </label>
                                    <input  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="grid-first-name"
                                            type="text"
                                            placeholder="Nombre Categoria" 
                                            v-model="NuevaData.nombrecategorias"
                                            />
                                    <p class="text-red-500 text-xs italic">Por favor llene el campo.</p>
                                </div>
                            </div> 
                            <div class="flex flex-wrap -mx-3 mb-2"> 
                                <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                        Tipo Categoria
                                    </label>
                                    <div class="relative">
                                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                                                id="grid-state" 
                                                v-model="NuevaData.tipocategoria">
                                        <option value="Gasto vital" >Gasto vital</option>
                                        <option value="Gasto no vital" >Gasto no vital</option> 
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 px-4 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                        Estado Categoria
                                    </label>
                                    <div class="relative">
                                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                                                id="grid-state" 
                                                v-model="NuevaData.estadocategoria">
                                        <option value="Activado"    >Activado</option>
                                        <option value="Desactivado" >Desactivado</option> 
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
    import * as moment from 'moment'
    //const moment = require('moment');

    export default {
        name: 'DataAnatlityc',
        mounted() {
            console.log('Lllego al Index.')
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
                                'NombreCategorias' : '',
                                'TipoCategoria'    : '', 
                                'EstadoCategoria'  : ''
                            },
                        Edades:[],
                        Meses:[],
                        ApuntesGastos : [],
                        ElementosApuntes : [],
                        DataSend      : 'ALL-DATA',
                        showModal     : false,
                        SendData      : 'CrearData',
                        ActionType    : 'Nueva Info',
                        ButtonNew     : true,
                        Ruta          : '/apuntesgastos',
                        ButtonUpdate  : false
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

                        //this.pagination    = response.data.pagination,
						this.ApuntesGastos = response.data.apuntes,
                        this.Edades        = response.data.edades

                        console.log('cole ke');
					});
				}else{                     
					axios.get(URL_BASE).then(response=>{
						this.ApuntesGastos = response.data.apuntes.data,
						this.pagination = response.data.pagination

                        for (let index = 0; index < this.ApuntesGastos.length; index++) {
                            let Datos = this.ApuntesGastos[index];

                            console.log(moment(Datos.fecha).format("Y")+' Data');
                            
                            
                        }///FINAL FOR
					});
				}
            },
            CrearData: function(){
                var URL_BASE    = this.Ruta;
                console.log('Data '+ this.NuevaData.NombreCategorias); 
                axios.post(URL_BASE, this.NuevaData ).then(response => {
                     
                        this.getData(this.pagination.current_page);
						this.NuevaData.id = ''; 
                        this.NuevaData.NombreCategorias = '';
                        this.NuevaData.TipoCategoria    = '';
                        this.NuevaData.EstadoCategoria  = '';
                         
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
                text: "Vas a eliminar al dato la Categoria " + Data.nombrecategorias + ", perderas este registro",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    let IdData = Data.id;
                        axios.delete(URL_BASE + IdData).then(response=>{
                        this.getData();
                        swal("Eliminaste la Categoria " + Data.nombrecategorias + " de la base de datos", {
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
                text: "Vas a actualizar la Categoria " + this.NuevaData.nombrecategorias + ", cambiaras este registro",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    let IdData = Data.id;
                        axios.put(URL_BASE,this.NuevaData).then(response=>{
                        
                        this.getData(this.pagination.current_page);
						this.NuevaData.id = ''; 
                        this.NuevaData.nombrecategorias = '';
                        this.NuevaData.tipocategoria    = '';
                        this.NuevaData.estadocategoria  = '';
                        this.showModal                  = !this.showModal;
                            
                        swal("Actualizaste la Categoria " + Data.nombrecategorias + " de la base de datos", {
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
                this.NuevaData.id               = ''; 
                this.NuevaData.NombreCategorias = '';
                this.NuevaData.TipoCategoria    = '';
                this.NuevaData.EstadoCategoria  = '';
            },
            AbrirModalUpdate: function(UpdateData){
                this.ButtonNew                  = false;
                this.ButtonUpdate               = true;
                this.showModal                  = !this.showModal;
                this.ActionType                 = 'Actualizar Info';
                this.NuevaData.id               = UpdateData.id; 
                this.NuevaData.NombreCategorias = UpdateData.NombreCategorias;
                this.NuevaData.TipoCategoria    = UpdateData.TipoCategoria;
                this.NuevaData.EstadoCategoria  = UpdateData.EstadoCategoria;
            }
        },

    }
</script>
