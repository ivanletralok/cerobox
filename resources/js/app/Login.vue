<template>
    <div class="container">
        <form class="form">
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="email" class="form-control" placeholder="Correo" v-model="credencial.email">
            </div>
             <div class="form-group">
                <label for="" class="form-label">Contraseña</label>
                <input type="password" class="form-control" placeholder="Contraseña" v-model="credencial.password">
            </div>
            <button  class="btn btn-primary" @click.prevent="login">Login</button>
        </form>
    </div>
</template>

<script>

import axios from 'axios';

export default {
    name: "Login",
    data(){
        return {
            credencial: {
                email: '',
                password: '',
            }
        }
    },

    mounted() {
        if(localStorage.getItem('auth') != null){
            console.log( "-->" +localStorage.getItem('auth'))
        }else{

            console.log("no token")
        }
    },

    methods: {
        login(){
            axios.post('/api/login', this.credencial)
            .then(res => {
                console.log(res.data)
                localStorage.setItem('auth',res.data.token)
                 this.$router.push('/cliente')

            })
            .catch(err => {
                console.log(err)
            })
        },

    },


};

</script>

<style scoped></style>
