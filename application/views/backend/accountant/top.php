<!-- Site header -->
<header class="tv tk bg-white cx border-slate-200 ng">
   <div class="vd jd tto">
      <div class="flex items-center fg op sn">
         <div class="flex">
            <button class="text-slate-500 hover--text-slate-600 tec" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
               <span class="tc">Open sidebar</span> 
               <svg class="ur oo db" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <rect x="4" y="5" width="16" height="2"></rect>
                  <rect x="4" y="11" width="16" height="2"></rect>
                  <rect x="4" y="17" width="16" height="2"></rect>
               </svg>
            </button>
         </div>
         <div class="flex items-center lu">
            <div x-data="{ searchOpen: false }">
               <button class="uu of flex items-center justify-center hy xl wr wu rounded-full" :class="{ 'hw': searchOpen }" @click.prevent="searchOpen = true;if (searchOpen) $nextTick(()=>{$refs.searchInput.focus()});" aria-controls="search-modal">
                  <span class="tc">Buscar</span> 
                  <svg class="ue on" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                     <path class="db text-slate-500" d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                     <path class="db yu" d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                  </svg>
               </button>
               <div class="th tm bg-slate-900 pb nm wi" x-show="searchOpen" x-transition:enter="wr wh wf" x-transition:enter-start="opacity-0" x-transition:enter-end="bv" x-transition:leave="wr wh wa" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" aria-hidden="true" x-cloak=""></div>
               <div id="search-modal" class="th tm nm lq flex fd nn rw justify-center fe vd jd" role="dialog" aria-modal="true" x-show="searchOpen" x-transition:enter="wr wc wf" x-transition:enter-start="opacity-0 a_" x-transition:enter-end="bv ax" x-transition:leave="wr wc wf" x-transition:leave-start="bv ax" x-transition:leave-end="opacity-0 a_" x-cloak="">
                  <div class="bg-white lj ai oq ok rounded by" @click.outside="searchOpen = false" @keydown.escape.window="searchOpen = false">
                     <form class="cx border-slate-200">
                        <div class="td">
                           <label for="modal-search" class="tc">Buscar</label> <input id="modal-search" class="oq cw ks bl fu vm mh mk" type="search" placeholder="Buscar en el sistema…" x-ref="searchInput"> 
                           <button class="tp tm tg kp" type="submit" aria-label="Search">
                              <svg class="ue on ap db yu kv ix mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                                 <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                              </svg>
                           </button>
                        </div>
                     </form>
                     
                  </div>
               </div>
            </div>
            <div class="td inline-flex" x-data="{ open: false }">
               <button class="uu of flex items-center justify-center hy xl wr wu rounded-full" :class="{ 'hw': open }" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                  <span class="tc">Mensajes</span> 
                  <svg class="ue on" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                     <path class="db text-slate-500" d="M6.5 0C2.91 0 0 2.462 0 5.5c0 1.075.37 2.074 1 2.922V12l2.699-1.542A7.454 7.454 0 006.5 11c3.59 0 6.5-2.462 6.5-5.5S10.09 0 6.5 0z"></path>
                     <path class="db yu" d="M16 9.5c0-.987-.429-1.897-1.147-2.639C14.124 10.348 10.66 13 6.5 13c-.103 0-.202-.018-.305-.021C7.231 13.617 8.556 14 10 14c.449 0 .886-.04 1.307-.11L15 16v-4h-.012C15.627 11.285 16 10.425 16 9.5z"></path>
                  </svg>
                  <div class="tp tk tw uf oc pr cy ht rounded-full"></div>
               </button>
               <div class="am nv tp tq tw ip _l u_ bg-white border border-slate-200 ms rounded by lq iu" @click.outside="open = false" @keydown.escape.window="open = false" x-show="open" x-transition:enter="wr wh wf fe" x-transition:enter-start="opacity-0 aw" x-transition:enter-end="bv ax" x-transition:leave="wr wh wf" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" x-cloak="">
                  <div class="gb g_ yu gq mp mv vd">Mensajes</div>
                  <ul>
                      
                      <li class="cx border-slate-200 wz"> 
                     <a class="block vg vd xo" href="#0" @click="open = false" @focus="open = true" @focusout="open = false"> 
                        <span class="block text-sm in">
                            <span class="gk text-slate-800">Sin mensajes
                        </span> 
                        
                        
                     </a>
                     </li>
                     
                      
                     <!--<li class="cx border-slate-200 wz"> 
                     <a class="block vg vd xo" href="#0" @click="open = false" @focus="open = true" @focusout="open = false"> 
                        <span class="block text-sm in">📣 
                            <span class="gk text-slate-800">Edit your information in a swipe</span> 
                            Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.
                        </span> 
                        
                        <span class="block gb gk yu">Feb 12, 2021</span>
                     </a>
                     </li>
                     <li class="cx border-slate-200 wz"> 
                     <a class="block vg vd xo" href="#0" @click="open = false" @focus="open = true" @focusout="open = false"> 
                        <span class="block text-sm in">📣 
                            <span class="gk text-slate-800">Edit your information in a swipe</span> 
                            Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.
                        </span> 
                        
                        <span class="block gb gk yu">Feb 12, 2021</span>
                     </a>
                     </li>
                     <li class="cx border-slate-200 wz"> 
                     <a class="block vg vd xo" href="#0" @click="open = false" @focus="open = true" @focusout="open = false"> 
                        <span class="block text-sm in">📣 
                            <span class="gk text-slate-800">Edit your information in a swipe</span> 
                            Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.
                        </span> 
                        
                        <span class="block gb gk yu">Feb 12, 2021</span>
                     </a>
                     </li>-->
                     
                  </ul>
               </div>
            </div>
            
            <hr class="ut oo hw">
            <div class="td inline-flex" x-data="{ open: false }">
               <button class="inline-flex justify-center items-center kp" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
               <?php 
                  $contador = $this->crud->get_contador($this->session->userdata('login_user_id'));
                  //print_r($contador);
               ?>
               <?php foreach($contador as $cont):?> 
                  <img class="uu of rounded-full" src="<?php echo base_url();?>public/uploads/img_profile/<?php echo $cont['photography']?>" width="32" height="32" alt="User"> 
               <?php endforeach;  ?>   
                  <div class="flex items-center ci">
                     <span class="ci r_ text-sm gk km"><?php echo $this->session->userdata('name');?></span> 
                     <svg class="w-3 h-3 ap rq db yu" viewBox="0 0 12 12">
                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                     </svg>
                  </div>
               </button>
               <div class="am nv tp tq tw uj bg-white border border-slate-200 ms rounded by lq iu" @click.outside="open = false" @keydown.escape.window="open = false" x-show="open" x-transition:enter="wr wh wf fe" x-transition:enter-start="opacity-0 aw" x-transition:enter-end="bv ax" x-transition:leave="wr wh wf" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" x-cloak="">
                  <div class="mm mv me rx cx border-slate-200">
                     <div class="gk text-slate-800"><?php echo $this->session->userdata('name');?></div>
                     <div class="gb text-slate-500 gz">Contador</div>
                  </div>
                  <ul>
                      <li> <a class="gk text-sm text-indigo-500 xd flex items-center mt me" href="<?php echo base_url();?>accountant/my_profile" @click="open = false" @focus="open = true" @focusout="open = false">Mi perfil</a> </li>
                     <li> <a class="gk text-sm text-indigo-500 xd flex items-center mt me" href="#0" onclick="logout1()" @click="open = false" @focus="open = true" @focusout="open = false">Cerrar Sesión</a> </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>