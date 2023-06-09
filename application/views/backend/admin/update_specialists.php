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
      <!----------Alert Error en Imagen------->
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
           
            <div class="ad"><!-- Mostrar form -->
            <?php 
                $url = "admin/UpdateSpecialists/".$specialyst['admin_id']."/".$specialyst['photography'];
            ?>
            <form action="<?php echo base_url($url)?>" method="POST" enctype="multipart/form-data">
               <!-- Panel body -->
               <div class="vs fz">
               <div class="flex fh vw vx border-slate-200">
                     <div class="flex lk">
                     <a href="https://app.msbox.gt/admin/empleados/" class="btn hb xs yo ml-3">
                        <span class="svg-icon svg-icon-md">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <rect x="0" y="0" width="24" height="24"></rect>
                                 <circle fill="#ffffff" cx="9" cy="15" r="6"></circle>
                                 <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#ffffff" opacity="0.3"></path>
                              </g>
                           </svg>
                        </span>
                        Regresar
                     </a>
               </div>
               </div>   
              
               <h2 class="gg zj text-slate-800 font-bold">Editar especialista</h2>   
                  
                  <!-- Business Profile -->
                  <section>
                     <div class="_y jn ln ju jl ig">
                     
                        <div class="_xx">
                           <label class="block text-sm gk rx" for="role">Cargo</label>
                           <input id="role" name="role" class="tn oq" type="text" value="<?php echo $specialyst['role']?>" disabled style="background-color: #f1f1f1;">
                        </div>
                        <div class="_xx">
                           <label class="block text-sm gk rx" for="location">DNI</label>
                           <input id="doc_dni" name="doc_dni" class="tn oq" type="number" value="<?php echo $specialyst['doc_dni']?>" disabled style="background-color: #f1f1f1;">
                        </div>              
                     </div>

                     <div class="_y jn ln ju jl ig"> 
                        <div class="_xx">
                           <label class="block text-sm gk rx" for="name">Nombres <span class="yl">*</span></label>
                           <input id="first_name" name="first_name" class="tn oq" type="text" value="<?php echo $specialyst['first_name']?>">
                        </div>
                        <div class="_xx">
                           <label class="block text-sm gk rx" for="business-id">Apellidos <span class="yl">*</span></label>
                           <input id="last_name" name="last_name" class="tn oq" type="text" value="<?php echo $specialyst['last_name']?>">
                        </div>
                     </div>

                     <div class="_y jn ln ju jl ig">  
                        <div class="_x">
                           <label class="block text-sm gk rx" for="name">Fecha de nacimiento</label>
                           <input id="date_of_birth" name="date_of_birth" class="tn oq" type="date" value="<?php echo $specialyst['date_of_birth']?>">
                        </div>
                        <div class="_x">
                           <label class="block text-sm gk rx" for="phone">Celular</label>
                           <input id="phone" name="phone" class="tn oq" type="number" value="<?php echo $specialyst['phone']?>">
                        </div>
                        <div class="_x">
                        <label class="block text-sm gk rx" for="business-id">Genero</label>
                           <select id="gender" name="gender" class="tn oq">
                              <option><?php echo $specialyst['gender']?></option>
                              <option>Masculino</option>
                              <option>Femenino</option>
                           </select>
                        </div>
                     </div>

                  </section>
                  <!-- Picture & email -->
                  <section>
                     <div class="_y jn ln ju jl ig"> 
                     <div class="mr-4">
                        <img class="uy os rounded-full" src="<?php echo base_url();?>public/uploads/img_specialyst/<?php echo $specialyst['photography']?>" alt="User upload" width="80" height="80">
                        </div>
                     <div class="_xx">
                        <label> Agregar fotografía</label>
                           <div class="input-group">
                              <input type="file" name="photography" 
                              accept="image/*" id="kt_uppy_5_input_control" style='display:none' onchange="onLoadImage_s(event.target.files)" required>
                              <label class="btn tt hb xs yo" 
                              for="kt_uppy_5_input_control">Seleccionar fotografía</label>
                           </div>
                              <label>Imagen seleccionada: <b><span id="imgName_s">Niguno</span></b></label>  
                     </div>
                        <div class="_xx">
                           <label class="block text-sm gk rx" for="email">Correo <span class="yl">*</span></label>
                           <input id="email" name="email" class="tn oq" type="email" value="<?php echo $specialyst['email']?>">
                        </div>
                     </div>

                     <div class="_y jn ln ju jl ig"> 
                        <div class="_xx">
                           <label class="block text-sm gk rx" for="address">Dirección</label>
                           <textarea id="address" name="address" class="tn oq" type="text"><?php echo $specialyst['address']?></textarea>
                        </div> 
                    
                  </section>                  
               </div>
               <!-- Panel footer -->
               <footer>
                  <div class="flex fh vw vx ck border-slate-200">
                     <div class="flex lk">
                        <button class="btn border-slate-200 hover--border-slate-300 ys">Cancelar</button>
                        <button type="submit" id="submit" class="btn hb xs yo ml-3">Aplicar cambios</button>
                     </div>
                  </div>
               </footer>
               </form>
            </div>
         </div>
      </div>
   </div>
</main>
