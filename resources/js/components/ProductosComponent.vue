<template>
  <div class="container">
       <div class="row">
         <hr>
         <a href="/productos/agregar" class="btn btn-primary m-auto mt-4 mb-4">Agregar Producto</a>
       </div>
       <div v-if="errores">
           <h3 class="alert alert-danger text-center">{{errormense}}</h3>
      </div>
      <div v-else>

        <ul class="col-lg-12 col-md-12 col-sm-12 row container d-flex">
          <li style="list-style:none" v-for="(producto, id) in productosCargados" :key="id" class="col-lg-4 col-md-6 col-sm-12 mt-2">
             
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top background-size: cover;"  :src="producto.img" >
                    <div class="card-body">
                      <h5 class="card-title ">{{producto.nombre}}</h5>
                      <p class="card-text">{{producto.descripcion}}</p>
                      <p class="card-text">{{producto.precio}}</p>
                      <a @click="editar(producto.id)"  class="btn btn-primary">Ver Detalle</a>
                  
                  </div>
               </div>       
          </li>
        </ul>
      </div>
    </div>

</template>


<script>
    export default {
        data(){
            return{
                errores: false,
                errormense:'',
                producto:[],
                productosCargados:[],
            }
        },
        mounted() {
               axios.get('/productos')
              .then(res=>{
               this.productosCargados = res.data
          
               }).catch((err) => {
                         this.errores=true
                         this.errormense='No hay productos cargados'
               });
        },
        methods:{
              editar(id){
               setTimeout(()=> location.href=`/productos/editar/${id}`,500);
                

                
             }, 


          }
    
    }

</script>
