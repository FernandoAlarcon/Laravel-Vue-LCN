// @ts-nocheck 
import routes from './routes' 
import { sync } from 'vuex-router-sync'
 
//import * as VueRouter from 'vue-router'
let  VueRouter = require('vue-router').default;
//Vue.use(VueRouter)

const router = new VueRouter({ 
  //hashbang: false,
  history: true,
  mode: 'history',
  //base: __dirname,
  routes
}); 

export default router;