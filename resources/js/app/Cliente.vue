<template>
    <div class="container" >
        <button class="btn btn-info" @click.prevent='logout()'> CerrarSesion</button>
        <h4>Datos Clientes</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">nombre</th>
                    <th scope="col">img</th>
                    <th scope="col">cedula</th>
                    <th scope="col">observacion</th>
                    <th scope="col">accion</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="cli in array" :key="cli.id">
                    <td>{{cli.nombre}}</td>
                    <td> <button  @click.prevent='redirect(cli.img)'>img</button></td>
                    <td>{{cli.cedula}}</td>
                    <td>{{cli.observacion}}</td>
                    <td><button class="btn btn-info" @click.prevent='detalle(cli.id)'> Detalles</button></td>
                </tr>
            </tbody>
        </table>
        <h4 v-if="swuit">Detalles De Servicio Cliente</h4>

        <table v-if="swuit" class="table">
            <thead v-if="swuit">

                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo Servicio</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fin</th>
                    <th scope="col">Observacion</th>

                </tr>
            </thead>

            <tbody>
                <tr v-for="serv in array2" :key="serv.id">
                    <td>{{serv.nombre}}</td>
                    <td v-if="serv.tipoid == 1">Basico</td>
                    <td v-if="serv.tipoid == 2">Avanzado</td>
                    <td>{{serv.fechaInicio}}</td>
                    <td>{{serv.fechaFin}}</td>
                    <td>{{serv.observacion}}</td>
                </tr>
            </tbody>

        </table>

    </div>

</template>

<script>
    export default {
        name: "Cliente",
        data() {
            return {
                array: [],
                array2: [],
                swuit: false
            }
        },
        methods: {
            detalle(id) {
                axios.get('/api/servicios/' + id, {

                    })
                    .then(res => {
                        console.log(res.data)

                        this.array2 = res.data;

                        console.log()
                        if (res.data.length == 0) {
                            this.switch = false;
                            alert("no tienes servicios")
                        } else {
                            this.swuit = true

                        }
                    })
                    .catch(err => {
                        console.log(err)
                    })
            },
            redirect(img) {
                window.open(img)
            },

            logout() {
                localStorage.removeItem('auth');
                this.$router.push('/login')

            }
        },

        mounted() {
            if (localStorage.getItem('auth') != null) {
                axios.get('/api/clientes', {
                    headers: {
                        "Authorization": "Bearer " + localStorage.getItem('auth')
                    },
                    token: localStorage.getItem('auth')
                })

                .then(res => {
                        this.array = res.data;
                        console.log(array)
                    })
                    .catch(err => {
                        console.log(err)
                    })
            } else {
                this.$router.push('/login')
                console.log("vacio")
            }
        },
    }
</script>

<style scoped>

</style>