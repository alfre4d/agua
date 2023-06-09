<main>
   <div class="vd jd tto vv oq ar ri">
      <!-- Page header -->
      <div class="ry">
         <!-- Title -->

              <!----------Alert------->
         <?php if (isset($_SESSION['item'])): ?> 
         <div x-show="open" x-data="{ open: true }" id="alert">
            <div class="inline-flex u_ vd vg rounded-sm text-sm hz border hr yf">
               <div class="flex oq fg fd">
                  <div class="flex">
                     <svg class="ue on ap db bp if rk" viewBox="0 0 16 16">
                     <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z"></path>
                     </svg>
                        <div><?php echo $_SESSION['item']; ?></div>
                  </div>
                  <button class="bd ke ml-3 if" @click="open = false">
                     <div class="tc">Close</div>
                        <svg class="ue on db">
                        <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                        </svg>
                  </button>
               </div>
            </div>
         </div>
         <?php endif;?>
      <!----------Alert Error al aclualizar sin contraseña------->
      <?php if (isset($_SESSION['error'])): ?> 
      <div x-show="open" x-data="{ open: true }" id="alert" class="fade show">
         <div class="inline-flex u_ vd vg rounded-sm text-sm pt border hi yp">
            <div class="flex oq fg fd">
               <div class="flex">
                  <svg class="ue on ap db bp if rk" viewBox="0 0 16 16">
                     <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm3.5 10.1l-1.4 1.4L8 9.4l-2.1 2.1-1.4-1.4L6.6 8 4.5 5.9l1.4-1.4L8 6.6l2.1-2.1 1.4 1.4L9.4 8l2.1 2.1z"></path>
                  </svg>
                  <div><?php echo $_SESSION['error']; ?></div>
               </div>
               <button class="bd ke ml-3 if" @click="open = false">
                  <div class="tc">Close</div>
                  <svg class="ue on db">
                     <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                  </svg>
               </button>
            </div>
         </div>
      </div>
      <?php endif;?>
 
      </div>
      <div class="bg-white by rounded-sm ry">
         <div class="flex fh zt qo">

            <!-- Panel -->
            <?php 
               
               $specialyst = $this->crud->get_specialyst($this->session->userdata('login_user_id'));
               //print_r($contador);
            ?>
            <?php foreach($specialyst as $special):?> 
            <div class="ad"><!-- Mostrar form -->
            <?php 
                $url = "specialyst/profileUpdate/".$special['admin_id'];
            ?>
            <form action="<?php echo base_url($url)?>" method="POST" enctype="multipart/form-data" class="formulario" id="formulario">
               <!-- Panel body -->
               <div class="vs fz">
                  <h2 class="gg text-slate-800 font-bold id">Mi perfil especialista ✨</h2>
                  
                  <!-- Picture -->
                  <section>
                     <div class="flex items-center">
                        <input type="hidden" value="<?php echo $special['admin_id']?>">
                        <div class="mr-4">
                        <img class="uy os rounded-full" src="<?php echo base_url();?>public/uploads/img_specialyst/<?php echo $special['photography']?>" alt="User upload" width="80" height="80">
                        </div>
                        <div class="container">
                           <label> Agregar fotografía</label>
                              <div class="input-group">
                                    <input type="file" name="photography" 
                                    accept="image/*" id="kt_uppy_5_input_control" style='display:none' onchange="onLoadImage_s(event.target.files)" >
                                    <label class="btn tt hb xs yo" 
                                       for="kt_uppy_5_input_control">Seleccionar Imagen</label>
                                    
                              </div>
                              <label>Imagen seleccionada: <b><span id="imgName_s">Niguno</span></b></label>  
                         </div>
                     </div>
                  </section>
                  <!-- Business Profile -->
                  <section>
                      

                    <div x-show="open" x-data="{ open: true }">
                       <div class="vd vg rounded-sm text-sm pe border hn yh">
                          <div class="flex oq fg fd">
                             <div class="flex">
                                <svg class="ue on ap db bp if rk" viewBox="0 0 16 16">
                                   <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                                </svg>
                                <div>Para aplicar los cambios, es necesario ingresar tu contraseña</div>
                             </div>
                         
                          </div>
                       </div>
                    </div>
                    <br>

                  <h3 class="gy yt text-slate-800 font-bold rx">Usuario</h3>
                     <div class="_y jn ln ju jl ig">
                     
                        <div class="_xx">
                           <label class="block text-sm gk rx" for="role">Cargo</label>
                           <input id="role" name="role" class="tn oq" type="text" value="<?php echo $special['role']?>" disabled style="background-color: #f1f1f1;">
                        </div>
                        <div class="_xx">
                           <label class="block text-sm gk rx" for="location">DNI</label>
                           <input id="doc_dni" name="doc_dni" class="tn oq" type="number" value="<?php echo $special['doc_dni']?>" disabled style="background-color: #f1f1f1;">
                        </div>              
                     </div>

                     <div class="_y jn ln ju jl ig"> 
                        <div class="_xx">
                           <label class="block text-sm gk rx" for="name">Nombres <span class="yl">*</span></label>
                           <input id="first_name" name="first_name" class="tn oq" type="text" value="<?php echo $special['first_name']?>">
                        </div>
                        <div class="_xx">
                           <label class="block text-sm gk rx" for="business-id">Apellidos <span class="yl">*</span></label>
                           <input id="last_name" name="last_name" class="tn oq" type="text" value="<?php echo $special['last_name']?>">
                        </div>
                     </div>

                     <div class="_y jn ln ju jl ig">  
                        <div class="_x">
                           <label class="block text-sm gk rx" for="name">Fecha de nacimiento</label>
                           <input id="date_of_birth" name="date_of_birth" class="tn oq" type="date" value="<?php echo $special['date_of_birth']?>" max="2005-01-01">
                        </div>
                        <div class="_x">
                           <label class="block text-sm gk rx" for="phone">Celular</label>
                           <input id="phone" name="phone" class="tn oq" type="number" value="<?php echo $special['phone']?>">
                        </div>
                        <div class="_x">
                        <label class="block text-sm gk rx" for="business-id">Genero</label>
                           <select id="gender" name="gender" class="tn oq">
                              <option><?php echo $special['gender']?></option>
                              <option value="Masculino">Masculino</option>
                              <option value="Femenino">Femenino</option>
                           </select>
                        </div>
                     </div>

                     <div class="_y jn ln ju jl ig"> 
                        <div class="_xx">
                           <label class="block text-sm gk rx" for="address">Dirección</label>
                           <textarea id="address" name="address" class="tn oq" type="text"><?php echo $special['address']?></textarea>
                        </div> 

                  </section>
                  <!-- Email -->
                  <section>
                     <h3 class="gy yt text-slate-800 font-bold rx">Correo</h3>
                     <div class="flex flex-wrap ig">
                        <div class="_xp">
                           <label class="block text-sm gk rx" for="email">Correo <span class="yl">*</span></label>
                           <input id="email" name="email" class="tn oq" type="email" value="<?php echo $special['email']?>">
                        </div>
                     </div>
                  </section>
                  
                  <h2 class="lower_messages">Precione el botón para modificar la contraseña</h2>  
                  <div class="rt uh">
                        <!-- Start -->
                           <div class="flex items-center" x-data="{ checked: false }">
                              <div class="tf">
                                 <input type="checkbox" id="switch-2" class="tc" x-model="checked" value="1" onChange="Ocultar()" >
                                    <label class="pf" for="switch-2" >
                                       <span class="bg-white bw" aria-hidden="true" ></span>
                                       <span class="tc">Switch label</span>
                                    </label>
                              </div>
                           <div class="text-sm yu gz r_" x-text="checked ? '' : 'Activar'">Off</div>

                        </div>
                        <!-- End -->
                     </div>
                     
                  <!-- Password -->
                  <section>
                     <h3 class="gy yt text-slate-800 font-bold rx">Contraseña</h3>
                     <div class="_y jn ln ju jl ig" id="caja" style="display:none;" >
                        <div class="_xx">
                           <label class="block text-sm gk rx" for="name">Contraseña actual </label>
                           <input name="password_actual" id="password_actual" class="tn oq" type="password" >
                           <div class="container" id="contenedor" style="margin-top: 10px;color:red;padding:5px;border-radius:25px;display:none;"><ul id="respuesta" style="list-style:none;"></ul></div>
                        </div>

                        <div class="_xx" id="grupo__password">
                           <label class="block text-sm gk rx" for="password">Nueva contraseña</label>
                           <div class="formulario__grupo-input">
                              <input type="password" class="tn oq" minlength="6" name="password" id="password">
                              <i class="formulario__validacion-estado fas fa-times-circle"></i>
                           </div>
                           <p style="color:red;" class="formulario__input-error">La contraseña tiene que ser de 6 a 8 dígitos</p>
                        </div>
                     </div>
                  </section>
                    <!-- Password Validation-->
                    <section>
                       <div class="_xp">
                             <label class="block text-sm gk rx" for="name">Contraseña validación / actual </label>
                                   <input name="password_actual_veri" id="password_actual_veri" class="tn oq" type="password" required>
                                   <div class="container" id="contenedor" style="margin-top: 10px;color:red;padding:5px;border-radius:25px;display:none;"><ul id="respuesta" style="list-style:none;"></ul></div>
                                                         
                             </div>
                    </section>
                    
               </div>
               <!-- Panel footer -->
               <footer>
                  <div class="flex fh vw vx ck border-slate-200">
                     <div class="flex lk">
                     <a href="<?php echo base_url()?>specialyst/panel" class="btn border-slate-200 hover--border-slate-300 ys" >Cancelar</a>
                        <button type="submit" id="submit" class="btn hb xs yo ml-3">Aplicar cambios</button>
                     </div>
                  </div>
               </footer>
               </form>
            </div>
            <?php endforeach;  ?>
         </div>
      </div>
   </div>
</main>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>