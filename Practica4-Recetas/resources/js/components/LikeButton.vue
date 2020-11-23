<template>
    <div>
         <span class="like-btn" @click="likeReceta" :class="{ 'like-active' : isActive }"></span>
         <!--Recargar si el like es positivo, tambien en base al toogle-->

         <p>{{ cantidadLikes }} Les gustó esta receta</p>
    </div>

</template>

<script>
    export default {
        props: ['recetaId', 'like', 'likes'],
        data: function() {
            return {
                isActive: this.like,
                totalLikes: this.likes //se encarga de mostrar cuantos likes contiene la receta
            }
        },
        methods: {
            likeReceta() {
                axios.post('/recetas/' + this.recetaId)
                    .then(respuesta => {
                        
                        if(respuesta.data.attached.length > 0 ) {
                            this.$data.totalLikes++; //Para acceder al data
                        } else {
                            this.$data.totalLikes--; //Cuando le quitan el meGusta
                        }

                        this.isActive = !this.isActive //Se requiere el this, si es como true pasa false,
                        //se esta como false pasa true.
                    })
                    .catch(error => {
                        if(error.response.status === 401) {
                            window.location = '/register';
                        }
                    });
            }
        }, 
        computed: {
            cantidadLikes: function() {
                return this.totalLikes //se encarga de mostrar cuantos likes contiene la receta
            }
        }
    }
</script>