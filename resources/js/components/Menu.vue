<template>
    <div>
                <nav>
                    <ul>
                        <li>
                            <router-link :to="{ name: 'home' }">Home</router-link>
                        </li>
                        <li v-if="!$auth.check()">
                            <router-link :to="{ name: 'login' }">Login</router-link>
                        </li>
                        <li v-if="!$auth.check()">
                            <router-link :to="{ name: 'register' }">Register</router-link>
                        </li>
                        <li v-if="$auth.check()">
                            <router-link :to="{ name: 'dashboard' }">Dashboard</router-link>
                        </li>
                        <li v-if="$auth.check()">
                            <a href="#" @click.prevent="$auth.logout()">Logout ({{ $auth.user().name }})</a>
                        </li>
                    </ul>
                </nav>
    </div>
    
</template>

<script>
  export default {
    data() {
      return {
        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Inscription',
              path: 'register'
            },
            {
              name: 'Connexion',
              path: 'login'
            }
          ],

          // LOGGED USER
          user: [
            {
              name: 'Dashboard',
              path: 'dashboard'
            }
          ],
          // LOGGED ADMIN
          admin: [
            {
              name: 'Dashboard',
              path: 'admin.dashboard'
            }
          ]
        }
      }
    },
    mounted() {
      //
    }
  }
</script>
