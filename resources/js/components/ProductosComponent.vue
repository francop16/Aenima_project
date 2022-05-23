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
        <div class="from-group">
          <label>Buscador</label>
          <input type="text" id="buscador" v-model="buscar" @keyup="filtrar()" class="form-control" />             
        </div>

        <ul class="row" id="productos" >
          <li style="list-style:none"  v-for="(producto, id) in productosCargados" :key="id" v-if="producto.activo" class="col-lg-4 col-md-6 col-sm-12 mt-2">
             
                  <div id="cards" class="card"  style="width: 18rem;">
                    <img class="card-img-top"  :src="producto.img" :alt="producto.img" >
                     
                    <div class="card-body bg-secondary text-white bg-gradient">
                      <h5 class="card-title ">{{producto.nombre}}</h5>
                      <p class="card-text">Descripción: {{producto.descripcion}}</p>
                      <p class="card-text">$ {{producto.precio}}</p>
                     
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
                buscar: '',
                buscarPrecio: 0,
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
             filtrar(){
                 const texto = this.buscar.toLocaleLowerCase();
                 for(let producto of this.productosCargados){
                  
                   let nombre = producto.nombre.toLocaleLowerCase();
            
                   if( nombre.indexOf(texto) !== -1){ // compara por nombre 
                   
                      producto.activo=1;
                   }else{
                      
                      let precio = String(producto.precio);
                   
                      if(precio.indexOf(texto) !== -1){ // compara por precio
                       
                         producto.activo=1;
                      }else{
                        producto.activo=0;
                      }
                    
                   }
                 }
            
             },


          }
    
    }

</script>

<style>
  #productos .col-lg-4{
    padding: 20px;
  }

  #productos img{
    widows: 100%;
    height: 180px;
  }
  #productos li:hover{
    border: 5px solid #f7f7f7;
    
   
  }
  #cards:hover{
    box-shadow: 2px 2px 5px #999;
  }



</style>