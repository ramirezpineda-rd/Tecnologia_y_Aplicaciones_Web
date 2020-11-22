<template>
    <span>{{formatearFecha}}</span>
</template>
<!--Acomodo de la fecha-->
<script>
    export default {
        props: ['fecha'],
        computed:{
            formatearFecha(){
                return moment(this.fecha).locale('es').format('DD [de] MMM [del] YYYY')
            }
        }
    }
</script>