<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<body onload="getLocation();">
   <main>
      <div class="vd jd tto vv oq ar ri">
         <!-- Page header -->
         <div class="ry">
            <!-- Title -->

            <div id="map">

            </div>

         </div>
         <div class="bg-white by rounded-sm ry">
            <div class="flex fh zt qo">
               <!-- Sidebar -->

               <!-- Panel -->
               <div class="ad">
                  <!-- Mostrar form -->
                  <!-- Panel body -->
                  <div class="vs fz">
                     <h2 class="gg text-slate-800 font-bold id">Agregar nuevo cliente ✨</h2>

                     <form action="<?php echo base_url(); ?>admin/insert_client" method="POST" class="myForm" id="formulario" autocomplete="off">

                        <!-- Picture -->
                        <section>
                           <div class="flex items-center">

                           </div>
                        </section>
                        <!-- Business Profile -->
                       
                        <section>
                            
                        <div x-show="open" x-data="{ open: true }">
                           <div class=" fh vd vg rounded-sm text-sm bg-white by border border-slate-200 ys">
                              <div class="flex oq fg fd">
                                 <div class="flex">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="28" height="28" viewBox="0 0 35 24" stroke-width="1.5" stroke="#ff4500" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                      <circle cx="12" cy="11" r="3" />
                                      <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                    </svg>
                                    <div>
                                       <div class="gk text-slate-800 rx">Ubicación</div>
                                       <div>Preciona el botón de "Permitir" si deseas ingresar tu ubicación automaticamente</div>
                                       <div>Preciona el botón de "Bloquear" para ingresar tu ubicación manualmente</div>
                                    </div>
                                 </div>
                                
                              </div>
                            
                           </div>
                           <!-- End -->
                        </div>
                        <br>

                           <div x-show="open" x-data="{ open: true }">
                              <div class="vd vg rounded-sm text-sm pt border hi yp">
                                 <div class="flex oq fg fd">
                                    <div class="flex">
                                       <svg class="ue on ap db bp if rk" viewBox="0 0 16 16">
                                          <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm3.5 10.1l-1.4 1.4L8 9.4l-2.1 2.1-1.4-1.4L6.6 8 4.5 5.9l1.4-1.4L8 6.6l2.1-2.1 1.4 1.4L9.4 8l2.1 2.1z"></path>
                                       </svg>
                                       <div>Los campos marcados con * son obligatorios.</div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           
                            <div class="_y jn ln ju jl ig">
                              <div class="_xx">
                                 <label class="block text-sm gk rx" for="phone">No. de suministro <span class="yl">*</span></label>
                                 <input id="supply_number" name="supply_number" class="tn oq" type="number" required>
                            </div>
                                
                            <div class="_xx">
                                 <label class="block text-sm gk rx" for="business-id">Tipo de persona <span class="yl">*</span></label>
                                 <select class="tn oq" id="statusinput" name="person_type" onchange="changeStatus()" required>
                                    <option value="" selected disabled>Seleccione una opción</option>
                                    <option value="Jurídica">Jurídica</option>
                                    <option value="Natural">Natural</option>
                                 </select>
                            </div>
                            
                            </div>
                           
                             <div class="_y jn ln ju jl ig" id="disabledinput" style="display:none">
                            
                              <div class="_xx">
                                 <label class="block text-sm gk rx" for="location">RUC <span class="yl">*</span> </label>
                                 <input id="doc_ruc" name="doc_ruc" min="1" class="tn oq" type="number">
                        
                             </div>
                             
                              
                              <div class="_xx">
                                 <label class="block text-sm gk rx" for="phone">Razón social <span class="yl">*</span></label>
                                 <input id="social_reason" name="social_reason" class="tn oq" type="text">
                              </div>
                             
                            </div>
                            
                            <div class="_y jn ln ju jl ig">
                            
                              <div class="_xx">
                                 <label class="block text-sm gk rx" for="location">DNI <span class="yl">*</span> </label>
                                 <div class="td">
                                    <input id="doc_dni" name="doc_dni" min="1" class="tn oq mf" type="number" required="">
                                    <button style="background-color: #C0B9FF;" id="send_a" class="tp tm tg kp" type="button">
                                       <svg class="ue on ap db yu kv ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                                          <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                                       </svg>
                                    </button>
                                 </div>
                                 <center><small><span>Presione el icono morado para buscar</span></small></center>
                              </div>

                              <div class="_xx">
                                 <label class="block text-sm gk rx" for="name">Nombres <span class="yl">*</span></label>
                                 <input id="first_name" name="first_name" class="tn oq" type="text" required>
                                 <center><small style="color: white"><span>.</span></small></center>
                              </div>
                          
                            </div>
                            
                           <div class="_y jn ln ju jl ig">
                               
                              <div class="_xx">
                                 <label class="block text-sm gk rx" for="last_name">Apellido Paternos <span class="yl">*</span></label>
                                 <input id="last_name" name="last_name" class="tn oq" type="text" required>
                              </div>
                              
                              <div class="_xx">
                                 <label class="block text-sm gk rx" for="last_name">Apellido Maternos <span class="yl">*</span></label>
                                 <input id="last_name_mom" name="last_name_mom" class="tn oq" type="text" required>
                              </div>

                           </div>

                           <div class="_y jn ln ju jl ig">
                            <div class="_xx">
                                 <label class="block text-sm gk rx" for="phone">Celular <span class="yl">*</span></label>
                                 <input id="phone" name="phone" class="tn oq" type="number" required>
                                 
                              </div>
                            
                              <div class="_xx">
                                 <label class="block text-sm gk rx" for="business-id">Correo <span class="yl">*</span></label>
                                 <input id="email" name="email" class="tn oq" type="email" required>
                              </div>

                           </div>

                        </section>
                        <!-- Address-->
                        <section>
                           <div class="_y jn ln ju jl ig">
                        
                                <div class="_xx">
                                    <label class="block text-sm gk rx" for="name">Tipo de servicio <span class="yl">*</span></label>
                                        <select name="reciever" id="country" class="tn oq" required>
                                            <option value="" selected disabled>Seleccionar</option>
                                                <?php 
                                                    $rates = $this->crud->get_rates();
                                                    foreach($rates as $rw):
                                                ?>
                                                <option value="<?php echo $rw['id']?>" ><?php echo $rw['name']?></option>
                                                <?php endforeach;?>
                                        </select>
                                </div>
                                                 
                              <div class="_xx">
                                 <label class="block text-sm gk rx" for="business-id">Dirección <span class="yl">*</span></label>
                                 <textarea id="address" name="address" class="tn oq" type="text" required></textarea>
                              </div>

                           </div>
                        
                        </section>
                        <br>
                        <section>
                            <label class="block text-sm gk rx" for="business-id"><b>Coordenadas de su ubicación</b></label>
                            <div class="_y jn ln ju jl ig">
                           
                            <div class="_xx">
                           
                            <label class="block text-sm gk rx" for="business-id">Latitud <span class="yl">*</span></label>
                            <input type="text" class="tn oq" id="latitude" name="latitude" value="">
                           
                           </div>
                           
                           <div class="_xx">
                            <label class="block text-sm gk rx" for="business-id">Longitud <span class="yl">*</span></label>
                            <input type="text" class="tn oq" id="longitude" name="longitude" value="">
                            </div>
                            </div>
                        </section>
                        
                    <br>
                    
                  <script type="text/javascript" >
                     function OcultarMap()
                     {
                         if (document.getElementById('switch-3').checked) 
                          {
                            document.getElementById('ocultcaja').style.display = "";
                            document.getElementById('mapa').required = "true";
                          } 
                          else {
                            document.getElementById('ocultcaja').style.display = "none";
                            document.getElementById('mapa').required = "false";
                          }
                        
                     }
                  </script>
                  
                  <h2 class="lower_messages">Preciona el botón para registrar su ubiación manualmente</h2>  
                  <div class="rt uh">
                        <!-- Start -->
                           <div class="flex items-center" x-data="{ checked: false }">
                              <div class="tf">
                                 <input type="checkbox" id="switch-3" class="tc" x-model="checked" value="1" onChange="OcultarMap()" >
                                    <label class="pf" for="switch-3" >
                                       <span class="bg-white bw" aria-hidden="true" ></span>
                                       <span class="tc">Switch label</span>
                                    </label>
                              </div>
                           <div class="text-sm yu gz r_" x-text="checked ? '' : 'Activar'">Off</div>

                        </div>
                        <!-- End -->
                     </div>
              
                        <!-- View Google Maps -->
                          <section>
                            <div class="_y jn ln ju jl ig" id="ocultcaja" style="display:none;">
                            <div class="_xx">
                              <div id="mapa" style="width: 100%; height: 500px;">
                                  
                              </div>
                           </div>
                           </div>
                           
                        </section>
                        
                        
                           <br>
                           <!-- Panel footer -->
                           <footer>
                              <div class="flex fh vw vx ck border-slate-200">
                                 <div class="flex lk">
                                    <a href="<?php echo base_url() ?>admin/clients" class="btn border-slate-200 hover--border-slate-300 ys">Cancelar</a>
                                    <button type="submit" class="btn hb xs yo ml-3">Guardar</button>
                                 </div>
                              </div>
                           </footer>
                     </form>
                  </div>
               </div>
            </div>
         </div>
</body>
</main>
</body>

<script>
function changeStatus(){
    var status = document.getElementById("statusinput");
    if(status.value == "Natural"){
     document.getElementById("disabledinput").style.display = "none";   
    }else{
     document.getElementById("disabledinput").style.display ="";   
    }
}
</script>

<script>
    function iniciarMapa(){
        var latitude= -12.04318;
        var longitude=  -77.02824;
        
        coordenadas = {
            lng: longitude,
            lat: latitude
        }
        generarMapa(coordenadas);
    }
    function generarMapa(coordenadas){
        var mapa = new google.maps.Map(document.getElementById('mapa'),
        {
            zoom: 12,
            center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
        });
        marcador = new google.maps.Marker({
           map: mapa, 
           draggable: true,
           position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)    
        });
        marcador.addListener('dragend',function(event){
            document.getElementById("latitude").value = this.getPosition().lat();
            document.getElementById("longitude").value = this.getPosition().lng();
        })
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcB4XuZB1-vGkjbk8ZFda45EhbvGxlEIs&callback=iniciarMapa"></script>



<script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>

<script type="text/javascript">
   function getLocation() {
      if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(showPosition);
      }
   }

   function showPosition(position) {
      document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
      document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
        var mensaje= "Su ubicación fue registrada con exito";
        alert(mensaje);


   }

   function showError(error) {
      switch (error.code) {
         case error.PERMISSION_DENIED:
            alert("Activa tu ubicacion para utilizar la geolocalización");
            location.reload();
            break;
      }
   }

   $("#send_a").click(function() {
      var dni = $("#doc_dni").val();
      $.ajax({
         url: "<?php echo base_url(); ?>admin/apiDNInames/" + dni,
         success: function(data) {
            if (data == "Not Found") {
               alert("Persona no encontrada");
               $("#first_name").val("");
               $("#last_name").val("");
               $("#last_name_mom").val("");
            } else {
               var datos = JSON.parse(data);
               $("#first_name").val(datos.nombres);
               $("#last_name").val(datos.apellidoPaterno);
               $("#last_name_mom").val(datos.apellidoMaterno);
            }
         },
      });
   });
</script>