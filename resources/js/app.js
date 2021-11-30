// @ts-nocheck
require('./bootstrap');

let axios            = require('axios').default; 
let VueAxios         = require('vue-axios').default; 

let VueRouter        = require('vue-router').default; 

let Vuex             = require('vuex');  
let VueI18n          = require('vue-i18n'); 
let VueCookie        = require('vue-cookies');  
let VueMoment        = require('vue-moment'); 

// // @ts-ignore
let fullscreen       = require('vue-fullscreen')
// // @ts-ignore
let vueEventCalendar = require('vue-event-calendar')
 
import router           from './router/index.js' 

//import store            from './store/index.js' 
import App              from './components/App.vue'  

// Set Vue globally
// @ts-ignore
window.Vue = require('vue').default;
 
// Set Vue authentication 
// @ts-ignore

Vue.use(VueMoment);
Vue.use(Vuex)  
Vue.use(VueI18n)
Vue.use(VueCookie) 
Vue.use(fullscreen)
Vue.use(vueEventCalendar, {locale: 'pt-br'}) 

Vue.use(VueRouter)
Vue.router = router

Vue.use(VueAxios, axios); 
 
var BASE_URL =  `${process.env.MIX_APP_URL}`;
//axios.defaults.baseURL =  BASE_URL;//`${process.env.MIX_APP_URL}/api`; //api 

// @ts-ignore
//new Vue(App).$mount('#Aplicacion');
const app = new Vue({
    el: '#Aplicacion', 
    //store,	
    router,  
    ...App
});