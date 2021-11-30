import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

// Load store modules dynamically. 
const store = new Vuex.Store({
  state:{
    count:0,
  },
  mutations:{
    INCREMENTS(state){
      state.count++
    },
  },
  actions:{}
})

export default store;
