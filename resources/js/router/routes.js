function page (path) {
  return () => import(/* webpackChunkName: '' */ `../pages/${path}`).then(m => m.default || m)
}
import Home from '../components/Home.vue' 
import AdminDashboard from '../pages/admin/Dashboard.vue';


import Index from '../components/Index.vue';
import Dashboard from '../pages/admin/Dashboard.vue';

console.log('Archivo de rutas');
const routes = [ 
  
  // ADMIN ROUTES
  { path: '/admin', name: 'admin.dashboard', component: AdminDashboard, meta: { auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'} } },

  { path: '/', name: 'home', component: Home, meta: { auth: undefined } },
 
  //{ path: '/index',           name: 'index',            component: AdminDashboard },
  { path: '/index',           name: 'index',            component: Index },
  { path: '/home',            name: 'home',            component:() => import('../components/Index.vue')},
  { path: '/personas',        name: 'personas',   component:() => import('../components/Data/Personas.vue')   }, 
  
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