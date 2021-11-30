<template> 
        <div class="  content-center
                      items-center" >
          <center>
          <div class=" 
                       mt-10
                       px-12
                       sm:px-24 
                       md:px-48 
                       lg:px-12 
                       lg:mt-16 
                       xl:px-24 
                       xl:max-w-2xl
                       mx-auto">
                    <h2 class="text-center text-4xl text-indigo-900 font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold">Ingresa</h2>
                    <div class="mt-12">
                      <form autocomplete="off" @submit.prevent="login" method="post" >
                            <div>
                                <div class="text-sm font-bold text-gray-700 tracking-wide">
                                    Email
                                </div>
                                <input 
                                    class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" 
                                    type="email" 
                                    id="email" 
                                    placeholder="user@example.com" v-model="email" required />
                            </div>
                            <div class="mt-8">
                                <div class="flex justify-between items-center">
                                    <div class="text-sm font-bold text-gray-700 tracking-wide">
                                        Password
                                    </div>
                                    <div>
                                        <a 
                                        class="text-xs font-display font-semibold text-indigo-600 hover:text-indigo-800
                                        cursor-pointer">
                                            Olvidaste tu contraseña?.
                                        </a>
                                    </div>
                                </div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" 
                                       placeholder="Contraseña"
                                       type="password"
                                       id="password" 
                                       v-model="password"
                                       required />
                            </div>
                            <div class="mt-10">
                                <button
                                 class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600
                                shadow-lg" type="submit">
                                    Entrar
                                </button>
                            </div>
                        </form>
               </div><br><br>
            </div> 
            </center>
          </div>   
</template>

<script>
  export default {
    name: 'login',
    data(){
      return {
        email: null,
        password: null,
        error: false,
        has_error: false
      }
    },
    methods: {
      login(){
        var redirect = this.$auth.redirect()
        var app = this 
        console.log('Data '+app);
        this.$auth.login({
            
            params: {
              email: app.email,
              password: app.password
            },
            success: function () {
              const redirectTo = redirect ? redirect.from.name : this.$auth.user().role === 2 ? 'admin.dashboard' : 'dashboard'

              this.$router.push({name: redirectTo})
            },
            error: function () { 
              this.error = true;
              this.has_error = true; },
            rememberMe: true,
            redirect: '/dashboard',
            fetchUser: true,
        });
      },
    }
  }
</script> 