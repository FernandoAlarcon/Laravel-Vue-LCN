function page (path) {
  return () => import(/* webpackChunkName: '' */ `../pages/${path}`).then(m => m.default || m)
}
import Home from '../components/Home.vue' 
import AdminDashboard from '../pages/admin/Dashboard.vue';


import Index from '../components/Index.vue';
import Dashboard from '../pages/admin/Dashboard.vue';

console.log('Archivo de rutas');
const routes = [
  // { path: '/register', name: 'register', component: Register, meta: { auth: false }},
  // { path: '/login',    name: 'login',    component: Login,    meta: { auth: false } }, 
  // ADMIN ROUTES
  { path: '/admin', name: 'admin.dashboard', component: AdminDashboard, meta: { auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'} } },

  { path: '/', name: 'home', component: Home, meta: { auth: undefined } },
 
  { path: '/index',           name: 'index',            component: AdminDashboard },
  { path: '/home',            name: 'home',            component:() => import('../components/Index.vue')},
  { path: '/categorias',      name: 'categorias',      component:() => import('../components/Data/Categorias.vue')      },
  { path: '/subcategorias',   name: 'subcategorias',   component:() => import('../components/Data/SubCategorias.vue')   },
  { path: '/gestioningresos', name: 'gestioningresos', component:() => import('../components/Data/GestionIngresos.vue') },
  { path: '/apuntesgastos',   name: 'apuntesgastos',   component:() => import('../components/Data/ApuntesGastos.vue')   },
  { path: '/dataanatlityc',   name: 'dataanatlityc',   component:() => import('../components/Data/DataAnalityc.vue')    },
  
  //, meta: { auth: true }
  //DataAnatlityc
  { 
    path: '/dashboard', 
    name: 'dashboard', 
    component:() => import('../components/Index.vue') 
  },
  //{ path: '*', component:() => import('../pages/errors/404.vue') }
]

export default routes;