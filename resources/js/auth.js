import Vue from 'vue' 
import driverAuthBearer      from '@websanova/vue-auth/dist/drivers/auth/bearer.js';
import driverHttpAxios       from '@websanova/vue-auth/dist/drivers/http/axios.1.x.js';
import driverRouterVueRouter from '@websanova/vue-auth/dist/drivers/router/vue-router.2.x.js';
import driverOAuth2Google    from '@websanova/vue-auth/dist/drivers/oauth2/google.js';
import driverOAuth2Facebook  from '@websanova/vue-auth/dist/drivers/oauth2/facebook.js';

var auth            = require('@websanova/vue-auth/dist/v2/vue-auth.common.js');
var authBasic       = require('@websanova/vue-auth/dist/drivers/auth/basic.common.js');
var httpVueResource = require('@websanova/vue-auth/dist/drivers/http/vue-resource.1.x.common.js');
var routerVueRouter = require('@websanova/vue-auth/dist/drivers/router/vue-router.2.x.common.js');
var oauth2Google    = require('@websanova/vue-auth/dist/drivers/oauth2/google.common.js');
var oauth2Facebook  = require('@websanova/vue-auth/dist/drivers/oauth2/facebook.common.js');


import axios                 from 'axios';
import routes                from './router/index.js' 

// Auth base configuration some of this options
// can be override in method calls
  
const Auth = {
  plugins: {
      http: axios, // Axios 
      router: routes,
  },
  drivers: {
      http: driverHttpAxios,
      auth: driverAuthBearer,
      router: driverRouterVueRouter
  },
  options: {
      rolesKey: 'type',
      notFoundRedirect: {name: 'user-account'}, tokenDefaultName: 'laravel-vue-spa',
      tokenStore: ['localStorage'],
      rolesVar: 'role',
      registerData: { url: '/auth/register', method: 'POST', redirect: '/login'},
      loginData:    { url: '/auth/login',    method: 'POST', redirect: '', fetchUser: true},
      logoutData:   { url: '/auth/logout',   method: 'POST', redirect: '/', makeRequest: true},
      fetchData:    { url: '/auth/user',     method: 'GET', enabled: true},
      refreshData:  { url: '/auth/refresh',  method: 'GET', enabled: true, interval: 30}
  }
};

export default Auth