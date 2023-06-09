
<main>
  <?php
         $var = $this->input->post('action-search');

         if($var != ''){
            $specialyst = $this->db->query("SELECT * FROM admin WHERE type=3 AND first_name like '%" . $var . "%' OR last_name like '%" . $var . "%'")->result_array();
            if($specialyst==false){
               echo '';
            }
         }
         else
         {
         // $specialyst = $this->crud-> getRows1();
         }
         
         //print_r($counts);
           ?>    
     <div class="vd jd tto vv oq ar ri">
          <!-- Page header -->
          <div class="_y js jn ry">
               <!-- Left: Title -->
               <div class="rw _a">
                   <?php
                   if(!empty($specialyst))
                   {
                     echo '<h1 class="gg zj text-slate-800 font-bold">Especialistas registrados ✨</h1>' ;
                   }
                   
                   
                   ?>
                    
         <!----------Alert------->
         <?php if (isset($_SESSION['item'])): ?> 
         <div x-show="open" x-data="{ open: true }" id="alert" class="fade show">
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

               </div>
               <!-- Right: Actions -->
               <div class="sq fa _j fm ji fy">
                    <form class="td" method="POST">
                         <label for="action-search" class="tc">Search</label><input id="action-search" name="action-search" class="tn mf kn" type="text" placeholder="Buscar..." />
                         <button class="tp tm tg kp" type="submit" aria-label="Search">
                              <svg class="ue on ap db yu kv ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                   <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                                   <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                              </svg>
                         </button>
                    </form>
                    <a class="btn hb xs yo" href="<?php echo base_url()?>admin/specialists" >Limpiar</a>
                    <a href="<?php echo base_url();?>admin/create_specialyst">
                    <button class="btn hb xs yo">
                         <svg class="ue on db bh ap" viewBox="0 0 16 16">
                              <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                         </svg>
                         <span class="hidden tro r_">Añadir miembro</span>
                    </button>
                    </a>
               </div>
          </div>
          <!-- Cards -->
          <div class="sq ff fb">
        
            <?php if(empty($specialyst)):?>
               <div class="nk">
                    <div class="flex fh or">
                         <div class="ad vl">
                         <div class="gp i_">
                         <div class="flex justify-center in">
                            <img  class="rounded-full" src="<?php echo base_url();?>public/uploads/notfound.png" width="300" height="1024" alt="Authentication image">
                            </div>
                            <strong><p>¡No se han encontrado resultados!😞</p></strong>  
                            </div>
            
            </div>
            </div>
            </div>
                    <?php else: ?>
            
            <?php foreach($specialyst as $row):?>
               <!-- Users cards -->
               <div class="nk _s ttj bg-white by rounded-sm border border-slate-200">
                    <div class="flex fh or">
                         <div class="ad vl">
                              <div class="td">
                              <?php 
                                   if($row['status']=='Inactivo')
                                   {
                                        $cadena = "Inactivo";
                                        $color = "#FF0000"; 
                                        echo "<p><font color='".$color."'>".$cadena."</font></p>";
                                   }
                                   else{
                                        $cadena = "Activo";
                                        $color = "#86D47B"; 
                                        echo "<p><font color='".$color."'>".$cadena."</font></p>";
                                   }

                              ?>     
                              
                                   <div class="tp tk tw inline-flex" x-data="{ open: false }">
                                        <button class="yu xm rounded-full" :class="{ 'hy text-slate-500': open }" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open" aria-expanded="false">
                                             <span class="tc">Menú</span>
                                             <svg class="uu of db" viewBox="0 0 32 32">
                                                  <circle cx="16" cy="16" r="2"></circle>
                                                  <circle cx="10" cy="16" r="2"></circle>
                                                  <circle cx="22" cy="16" r="2"></circle>
                                             </svg>
                                        </button>
                                        <div
                                             class="am nv tp tq tw ae bg-white border border-slate-200 ms rounded by lq iu"
                                             @click.outside="open = false"
                                             @keydown.escape.window="open = false"
                                             x-show="open"
                                             x-transition:enter="wr wh wf fe"
                                             x-transition:enter-start="opacity-0 aw"
                                             x-transition:enter-end="bv ax"
                                             x-transition:leave="wr wh wf"
                                             x-transition:leave-start="bv"
                                             x-transition:leave-end="opacity-0"
                                             style="display: none;"
                                        >

                                              <!----modal---->

                                    <div x-data="{ modalOpen: false }">
                                        <ul>
                                           
                                        <a @click.prevent="modalOpen = true" aria-controls="feedback-modal" class="gk text-sm ys xy flex mt me" href="#0">Editar</a>
                                        </ul>
                                             <ul>
                                                  <?php 
                                                       $id = $row['admin_id'];
                                                  ?>
                                                  <?php if($row['status']=='Inactivo'){ ?>
                                                       <li id="reactivar" ><a class="gk text-sm ysp xbp flex mt me" href="<?php echo base_url("admin/active_specialyst/".base64_encode($id));?>" @click="open = false" @focus="open = true" @focusout="open = false">Re-activar</a></li>
                                                  <?php }?>

                                                  <?php if($row['status']=='Activo'){ ?>
                                                       <li id="eliminar"><a class="gk text-sm yl xb flex mt me"  href="#0" onclick="deleteSpecialyst('<?php echo $id?>')" @click="open = false" @focus="open = true" @focusout="open = false">Eliminar/Desactivar</a></li>
                                                  <?php }?>
                                                      
                                             </ul>
                                <!-- Modal backdrop -->
                                <div
                                            class="th tm bg-slate-900 pb nm wi"
                                            x-show="modalOpen"
                                            x-transition:enter="wr wh wf"
                                            x-transition:enter-start="opacity-0"
                                            x-transition:enter-end="bv"
                                            x-transition:leave="wr wh wa"
                                            x-transition:leave-start="bv"
                                            x-transition:leave-end="opacity-0"
                                            aria-hidden="true"
                                            style="display: none;"
                                        ></div>
                                        <!-- Modal dialog -->
                                        <div
                                            id="feedback-modal"
                                            class="th tm nm lq flex items-center rf justify-center fe vd jd"
                                            role="dialog"
                                            aria-modal="true"
                                            x-show="modalOpen"
                                            x-transition:enter="wr wc wf"
                                            x-transition:enter-start="opacity-0 a_"
                                            x-transition:enter-end="bv ax"
                                            x-transition:leave="wr wc wf"
                                            x-transition:leave-start="bv ax"
                                            x-transition:leave-end="opacity-0 a_"
                                            style="display: none;"
                                        >
                                            <div class="bg-white rounded by lj aa oq ok" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                                <!-- Modal header -->
                                                <div class="mn vm cx border-slate-200">
                                                    <div class="flex fg items-center">
                                                        <div class="g_ text-slate-800">Actualizar especialista 🙌</div>
                                                        <button class="yu xm" @click="modalOpen = false">
                                                            <div class="tc">Cerrar</div>
                                                            <svg class="ue on db">
                                                                <path
                                                                    d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"
                                                                ></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Modal content -->
                                                <div class="mn mr">
                                                    <?php
                                                        $url = "admin/updateSpecialists/".$row['admin_id']."/".$row['photography'];
                                                        ?>
                                                    <form action="<?php echo base_url($url)?>" method="POST" enctype="multipart/form-data">
                                                        <div class="ls">
                                                            <div>
                                                                <label class="block text-sm gk rx" for="email">DNI</label>
                                                                <input id="disabled" disabled="disabled" id="email" class="tn oq kf kl kh ka" type="text" name="doc_dni" value="<?php echo $row['doc_dni']?>" />
                                                            </div>
                                                            <div>
                                                                <label class="block text-sm gk rx" for="name">Nombre </label>
                                                                <input id="name" class="tn oq v_ mt" type="text" name="first_name" value="<?php echo $row['first_name']?>" />
                                                            </div>
                                                            <div>
                                                                <label class="block text-sm gk rx" for="name">Apellidos</label>
                                                                <input id="name" class="tn oq v_ mt" type="text" name="last_name" value="<?php echo $row['last_name']?>" />
                                                            </div>
                                                            <div>
                                                                <label class="block text-sm gk rx" for="name">Teléfono</label>
                                                                <input id="name" class="tn oq v_ mt" type="text" name="phone" value="<?php echo $row['phone']?>" />
                                                            </div>
                                                            <div>
                                                                <label class="block text-sm gk rx" for="email">Correo electrónico</label>
                                                                <input id="email" class="tn oq v_ mt" type="email" name="email" value="<?php echo $row['email']?>" />
                                                            </div>
                                                            <div>
                                                            <label class="block text-sm gk rx" for="email">Foto actual</label>
                                                            <img class="rounded-full" src="<?php echo base_url();?>public/uploads/img_specialyst/<?php echo $row['photography']?>" width="64" height="64" alt="User 01" />
                                                            </div>
                                                            <div>
                                                                <label class="block text-sm gk rx" for="photography">Actualizar foto</label>
                                                                <input id="photography" class="tn oq v_ mt" type="file" name="photography" accept="image/*"/>
                                                            </div>
                                                            <div>
                                                                <label class="block text-sm gk rx" for="feedback">Dirección</label>
                                                                <textarea id="feedback" class="tr oq v_ mt" name="address" rows="2"><?php echo $row['address']?></textarea>
                                                            </div>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="mn mr ck border-slate-200">
                                                            <div class="flex flex-wrap justify-end lt">
                                                               <a href="#" class="tt border-slate-200 hover--border-slate-300 ys" @click="modalOpen = false">Cancelar</a>
                                                                <button class="tt hb xs yo">Actualizar</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                              <header>

                                   <div class="flex justify-center in">
                                        <a class="td inline-flex fd" href="#0">
                                             <div class="tp tk tw sb bg-white rounded-full shadow" aria-hidden="true">
                                                  <svg class="uu of db ym" viewBox="0 0 32 32">
                                                       <path
                                                            d="M21 14.077a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 010 1.5 1.5 1.5 0 00-1.5 1.5.75.75 0 01-.75.75zM14 24.077a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z"
                                                       ></path>
                                                  </svg>
                                             </div>
                                             <img class="rounded-full" src="<?php echo base_url();?>public/uploads/img_photography/<?php echo $row['photography']?>" alt="User 01" width="64" height="64"> 
                                        </a>
                                   </div>
                                   <div class="gp">
                                        <a class="inline-flex text-slate-800 xk" href="#0">
                                             <h2 class="gy yt justify-center g_"><?php echo $row['first_name'].' '.$row['last_name'];?></h2>
                                        </a>
                                   </div>
                                   <div class="flex justify-center items-center"><span class="text-sm gk yu sw mr-1">-&gt;</span> <span><?php echo $row['phone']?></span></div>
                              </header>
                              <div class="gp i_">
                                   <div class="text-sm"><?php echo $row['email'];?></div>
                                   <div class="text-sm"><?php echo $row['doc_dni']?></div>
                                   <div class="text-sm"><?php echo $row['address']?></div>
                              </div>
                         </div>
                         <div class="ck border-slate-200">
                             <div x-data="{ modalOpen: false }">
                    <center><button class="block gp text-sm text-indigo-500 xd gk me mr" @click.prevent="modalOpen = true" aria-controls="basic-modal">
                        <div class="flex items-center justify-center">
                            <svg class="ue on db ap mr-2" viewBox="0 0 16 16">
                                <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path>
                            </svg>
                            <span>Enviar mensaje</span> 
                        </div>
                    </button></center>
                    <!-- Modal backdrop -->
                    <div class="th tm bg-slate-900 pb nm wi" x-show="modalOpen" x-transition:enter="wr wh wf" x-transition:enter-start="opacity-0" x-transition:enter-end="bv" x-transition:leave="wr wh wa" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" aria-hidden="true" style="display: none;"></div>
                        <!-- Modal dialog -->
                        <div id="basic-modal" class="th tm nm lq flex items-center rf justify-center fe vd jd" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="wr wc wf" x-transition:enter-start="opacity-0 a_" x-transition:enter-end="bv ax" x-transition:leave="wr wc wf" x-transition:leave-start="bv ax" x-transition:leave-end="opacity-0 a_" style="display: none;">
                            <div class="bg-white rounded by lj aa oq ok" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                <!-- Modal header -->
                                <div class="mn vm cx border-slate-200">
                                    <div class="flex fg items-center">
                                        <div class="g_ text-slate-800">Enviar mensaje</div>
                                        <button class="yu xm" @click="modalOpen = false">
                                            <div class="tc">Close</div>
                                            <svg class="ue on db">
                                                <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <!-- Modal content -->
                                <div class="mn mw mx">
                                    <?php echo form_open(base_url().'/admin/message/send_new/');?>
                                        <div class="ls">
                                            <div class="_y jn ln ju jl ig">
                                                <div class="_xx">
                                                    <label class="block text-sm gk rx" for="default">Destinatario</label>
                                                    <input type="hidden" name="reciever" value="specialyst-<?php echo $row['admin_id'];?>">
                                                    <input id="disabled" disabled="disabled" class="tn oq kf kl kkh ka" type="text" value="<?php echo $row['first_name'].' '.$row['last_name'];?>"/>
                                                </div>
                                            </div>
                                            <div>  
                                                <label class="block text-sm gk rx" for="disabled">¿Que enviarás?</label>
                                                <textarea class="tn oq kf kl kh ka" name="message" required="" placeholder="Escribe tu mensaje...."></textarea>
                                            </div>
                                        </div><br>
                                        <div class="mn mr ck border-white-200">
                                            <div class="flex flex-wrap justify-end lt">
                                                <a href="#" class="tt border-slate-200 hover--border-slate-300 ys" @click="modalOpen = false">Cancelar</a>
                                                <button class="tt hb xs yo" type="submit">Enviar</button>
                                            </div>
                                        </div>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                        </div>  

                         </div>
                    </div>
               </div>
               </div>
               <?php endforeach; ?>
                <?php endif ?>
                
                
          </div>
          <!-- Pagination -->
          <div class="ie">
    <div class="flex justify-center">
        <nav class="flex" role="navigation" aria-label="Navigation">
            <!--enlaces de paginación -->
            <ul class="inline-flex text-sm gk le bw">
                <li>
                    <span><?php echo $this->pagination->create_links();?></span>
                </li>
            </ul>
        </nav>
    </div>
</div>
     </div>
</main>

