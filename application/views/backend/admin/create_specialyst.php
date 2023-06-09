<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<main>
   <div class="vd jd tto vv oq ar ri">
      <!-- Page header -->
      <div class="ry">
         <!-- Title -->

      </div>
      <div class="bg-white by rounded-sm ry">
         <div class="flex fh zt qo">
            <!-- Sidebar -->

            <!-- Panel -->
            <div class="ad">
               <!-- Mostrar form -->
               <!-- Panel body -->

               <div class="vs fz">

                  <h2 class="gg text-slate-800 font-bold id">Agregar nuevo especialista ✨</h2>

                  <form action="<?php echo base_url(); ?>admin/insert_specialyst" method="POST" class="formulario" id="formulario" enctype="multipart/form-data">

                     <!-- Picture -->
                     <section>
                        <div class="flex items-center">

                        </div>
                     </section>
                     <!-- Business Profile -->
                     <br>
                     <section>
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
                              <label class="block text-sm gk rx" for="name">Nombres <span class="yl">*</span></label>
                              <input id="first_name" name="first_name" class="tn oq" type="text" required>
                           </div>
                           <div class="_xx">
                              <label class="block text-sm gk rx" for="business-id">Apellido Paterno <span class="yl">*</span></label>
                              <input id="last_name" name="last_name" class="tn oq" type="text" required>
                           </div>
                           <div class="_xx">
                              <label class="block text-sm gk rx" for="business-id">Apellido Materno <span class="yl">*</span></label>
                              <input id="last_name_mom" name="last_name_mom" class="tn oq" type="text" required>
                           </div>
                        </div>

                        <div class="_y jn ln ju jl ig">

                           <div class="_xx">
                              <label class="block text-sm gk rx" for="business-id">Fecha de nacimiento <span class="yl">*</span></label>
                              <input id="date_of_birth" name="date_of_birth" class="tn oq" type="date" required min="1" max="2005-01-01">
                           </div>
                           <div class="_xx">
                              <label class="block text-sm gk rx" for="phone">Celular <span class="yl">*</span></label>
                              <input id="phone" name="phone" min="1" class="tn oq" type="number" required>
                           </div>

                        </div>

                        <div class="_y jn ln ju jl ig">

                           <div class="_xx">
                              <label class="block text-sm gk rx" for="location">DNI <span class="yl">*</span> </label>
                              <div class="td">
                                 <input id="doc_dni" name="doc_dni" min="1" class="tn oq mf" type="number" required="">
                                 <button style="background-color:  #C0B9FF;" id="send_a" class="tp tm tg kp" type="button">
                                    <svg class="ue on ap db yu kv ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                                       <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                                    </svg>
                                 </button>
                              </div>
                             <!--- <div class="container" id="contenedor" style="margin-top: 10px;color:red;padding:5px;border-radius:25px;display:none;">
                                 <ul id="respuesta" style="list-style:none;"></ul>
                              </div>--->
                              <center><small><span>Presione el icono morado para buscar</span></small></center>
                           </div>
                           <div class="_xx">
                              <label class="block text-sm gk rx" for="business-id">Correo <span class="yl">*</span></label>
                              <input id="email" name="email" class="tn oq" type="email" required>
                              <center><small style="color: white"><span>.</span></small></center>
                           </div>
                        </div>

                     </section>
                     <!-- Email and phone -->
                     <section>
                        <div class="_y jn ln ju jl ig">
                           <div class="_xx">
                              <label> Agregar fotografía</label>
                              <div class="input-group">
                                 <input type="file" name="photography" accept="image/*" id="kt_uppy_5_input_control" style='display:none' onchange="onLoadImage_s(event.target.files)">
                                 <label class="btn tt hb xs yo" for="kt_uppy_5_input_control">Seleccionar fotografía</label>
                              </div>
                              <label>Imagen seleccionada: <b><span id="imgName_s">Niguno</span></b></label>
                           </div>

                           <div class="_xx">
                              <label class="block text-sm gk rx" for="business-id">Genero <span class="yl">*</span></label>
                              <select class="tn oq" id="gender" name="gender" required>
                                 <option value="">Seleccione una opción</option>
                                 <option value="Masculino">Masculino</option>
                                 <option value="Femenino">Femenino</option>
                              </select>
                           </div>

                        </div>

                        <div class="_y jn ln ju jl ig">

                           <div class="_xx">
                              <label class="block text-sm gk rx" for="business-id">Dirección <span class="yl">*</span></label>
                              <textarea id="address" name="address" class="tn oq" type="text" required></textarea>
                           </div>

                        </div>
                     </section>
                     <!-- Password -->
                     <section>
                        <div class="_y jn ln ju jl ig">
                           <!-- Grupo: Contraseña -->
                           <div class="_xx" id="grupo__password">
                              <label class="block text-sm gk rx" for="password">Contraseña</label>
                              <div class="formulario__grupo-input">
                                 <input type="password" class="tn oq" minlength="6" name="password" id="password" required>
                                 <i class="formulario__validacion-estado fas fa-times-circle"></i>
                              </div>
                              <p style="color:red;" class="formulario__input-error">La contraseña tiene que ser de 6 a 8 dígitos</p>
                           </div>

                           <!-- Grupo: Contraseña 2 -->
                           <div class="_xx" id="grupo__password2">
                              <label class="block text-sm gk rx" for="password2">Repetir Contraseña</label>
                              <div class="formulario__grupo-input">
                                 <input type="password" class="tn oq" minlength="6" name="password2" id="password2" required>
                                 <i class="formulario__validacion-estado fas fa-times-circle"></i>
                              </div>
                              <p style="color:red;" class="formulario__input-error">Ambas contraseñas deben ser iguales</p>
                           </div>
                        </div>
                     </section>
                     <br>
                     <!-- Panel footer -->
                     <footer>
                        <div class="flex fh vw vx ck border-slate-200">
                           <div class="flex lk">
                              <a href="<?php echo base_url() ?>admin/specialists" class="btn border-slate-200 hover--border-slate-300 ys">Cancelar</a>
                              <button type="submit" class="btn hb xs yo ml-3">Guardar</button>
                           </div>
                        </div>
                     </footer>
                  </form>
               </div>
            </div>
         </div>
      </div>
</main>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
<script>
   $('#send_a').click(function() {
      var dni = $('#doc_dni').val();
      $.ajax({
         url: '<?php echo base_url(); ?>admin/apiDNInames/' + dni,
         success: function(data) {
            if (data == 'Not Found') {
               alert('Persona no encontrada');
               $('#first_name').val('');
               $('#last_name').val('');
               $('#last_name_mom').val('');
            } else {
               var datos = JSON.parse(data);
               $('#first_name').val(datos.nombres);
               $('#last_name').val(datos.apellidoPaterno);
               $('#last_name_mom').val(datos.apellidoMaterno);
            }
         }
      })
   });
</script>