
<main>
   <div class="vd jd tto vv oq ar ri">
 
      <!-- Page header -->
      <div class="_y js jn ry">
         <!-- Left: Title -->
         <div class="rw _a">
            <h1 class="gg zj text-slate-800 font-bold">Especialistas registrados ✨</h1>
            <?php if (isset($_SESSION['item'])): ?>
                  <div x-show="open" x-data="{ open: true }">
                                        <div class="vd vg rounded-sm text-sm hz border hr yf" id="alerta">
                                            <div class="flex oq fg fd">
                                                <div class="flex">
                                                    <svg class="ue on ap db bp if rk" viewBox="0 0 16 16">
                                                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z"></path>
                                                    </svg>
                                                    <div><?= $_SESSION['item']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif;?>
            
         </div>
         <!-- Right: Actions -->
         <div class="sq fa _j fm ji fy">
            <form class="td" method="POST">
               <label for="action-search" class="tc">Buscar</label> <input id="action-search" name="action-search" class="tn mf kn" type="text" placeholder="Buscar…"> 
               <button class="tp tm tg kp" type="submit" aria-label="Search">
                  <svg class="ue on ap db yu kv ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                     <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                     <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                  </svg>
               </button>
            </form>
            <a class="btn hb xs yo" href="<?php echo base_url()?>specialyst/specialists" >Limpiar</a>
         </div>
      </div>
      <!-- Cards -->
      <div class="sq ff fb">
      <?php
         $var = $this->input->post('action-search');

         if($var != ''){
            $speci = $this->db->query("SELECT * FROM admin WHERE type=3 AND first_name like '%" . $var . "%' OR last_name like '%" . $var . "%'")->result_array();
            if($speci==false){
               echo '';
            }
         }
         else
         {
         //$specialyst = $this->crud-> get_specialists($this->session->userdata('name'));
         }
         
         //print_r($counts);
           ?>
                <?php if(empty($speci)):?>
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
         <?php foreach($speci as $special):?>
         <!-- Users cards -->
         <div class="nk _s ttj bg-white by rounded-sm border border-slate-200">
            <div class="flex fh or">
               <div class="ad vl">
               
                              <?php 
                                   if($special['status']=='Inactivo')
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
             
                  <header>
                     <div class="flex justify-center in">
                        <a class="td inline-flex fd" href="#0">
                           <div class="tp tk tw sb bg-white rounded-full shadow" aria-hidden="true">
                              <svg class="uu of db ym" viewBox="0 0 32 32">
                                 <path d="M21 14.077a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 010 1.5 1.5 1.5 0 00-1.5 1.5.75.75 0 01-.75.75zM14 24.077a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z"></path>
                              </svg>
                           </div>
                           <img class="rounded-full" src="<?php echo base_url();?>public/uploads/img_specialyst/<?php echo $special['photography']?>" alt="User 01" width="64" height="64"> 
                        </a>
                     </div>
                     <div class="gp">
                        <a class="inline-flex text-slate-800 xk" href="#0">
                           <h2 class="gy yt justify-center g_"><?php echo $special['first_name'].' '.$special['last_name']?></h2>
                        </a>
                     </div>
                     <div class="flex justify-center items-center"><span class="text-sm gk yu sw mr-1">-&gt;</span> <span><?php echo $special['phone']?></span></div>
                  </header>
                  <div class="gp i_">
                     <div class="text-sm"><?php echo $special['email']?></div>
                     <div class="text-sm"><?php echo $special['doc_dni']?></div>
                     <div class="text-sm"><?php echo $special['address']?></div>
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
                                    <?php echo form_open(base_url().'/specialyst/message/send_new/');?>
                                        <div class="ls">
                                            <div class="_y jn ln ju jl ig">
                                                <div class="_xx">
                                                    <label class="block text-sm gk rx" for="default">Destinatario</label>
                                                    <input type="hidden" name="reciever" value="specialyst-<?php echo $special['admin_id'];?>">
                                                    <input id="disabled" disabled="disabled" class="tn oq kf kl kkh ka" type="text" value="<?php echo $special['first_name'].' '.$special['last_name'];?>"/>
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
         <?php endforeach;  ?>
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
