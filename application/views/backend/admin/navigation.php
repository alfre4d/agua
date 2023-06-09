<!-- Sidebar -->
<div>
   <div class="th tm bg-slate-900 pb nb tec tei wi wf" :class="sidebarOpen ? 'bv' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak=""></div>
   <div id="sidebar" class="flex fh tp nb tb tk zq ten ter tek fe ot cr ttn ta uk teg ttg 2xl:!w-64 ap pa va wo wf wc" :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'" @click.outside="sidebarOpen = false" @keydown.escape.window="sidebarOpen = false" x-cloak="lg">
      <div class="flex fg iv gu jm">
         <button class="tec text-slate-500 xv" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
            <span class="tc">Cerrar</span> 
            <svg class="ur oo db" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
               <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"></path>
            </svg>
         </button>
         <a class="block" href="<?php echo base_url();?>">
            <svg width="32" height="32" viewBox="0 0 32 32">
               <defs>
                  <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                     <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%"></stop>
                     <stop stop-color="#A5B4FC" offset="100%"></stop>
                  </linearGradient>
                  <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                     <stop stop-color="#38BDF8" stop-opacity="0" offset="0%"></stop>
                     <stop stop-color="#38BDF8" offset="100%"></stop>
                  </linearGradient>
               </defs>
               <rect fill="#6366F1" width="32" height="32" rx="16"></rect>
               <path d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z" fill="#4F46E5"></path>
               <path d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z" fill="url(#logo-a)"></path>
               <path d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z" fill="url(#logo-b)"></path>
            </svg>
         </a>
      </div>
      <div class="la">
         <div>
            <h3 class="gb gq text-slate-500 g_ ga"> <span class="hidden tea ttv 2xl:hidden gp ur" aria-hidden="true">•••</span> <span class="tec ttd 2xl:block">Menú</span> </h3>
            <ul class="im">
               
               
               <li class="me vg rounded-sm ib wj <?php if($page_name == 'panel') echo 'bg-slate-900';?>" x-data="{ open: false }" x-init="$nextTick(() => open = page.startsWith('dashboard-'))">
                  <a class="block ya xw ci wr wu" :class="page.startsWith('dashboard-') &amp;&amp; 'hover--text-slate-200'" href="<?php echo base_url();?>admin/panel">
                     <div class="flex items-center fg">
                        <div class="flex items-center">
                           <svg class="ap oo ur" viewBox="0 0 24 24">
                              <path class="db yu <?php if($page_name == 'panel') echo 'text-indigo-500';?>" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"></path>
                              <path class="db ys <?php if($page_name == 'panel') echo 'text-indigo-600';?>" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"></path>
                              <path class="db yu <?php if($page_name == 'panel') echo 'text-indigo-200';?>" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"></path>
                           </svg>
                           <span class="text-sm gk ml-3 ttl ttb 2xl:opacity--100 wf">Panel de Administración</span> 
                        </div>
                        <div class="flex ap r_ ttl ttb 2xl:opacity--100 wf">
                           <svg class="w-3 h-3 ap rq db yu" :class="open &amp;&amp; 'fe az'" viewBox="0 0 12 12">
                              <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                           </svg>
                        </div>
                     </div>
                  </a>
                </li>
                
                 
                
               
               <li class="me vg rounded-sm ib wj <?php if($page_name == 'message' || $page_name == 'group') echo 'bg-slate-900';?>">
               <a class="block ya xw ci wr wu" :class="page === 'messages' &amp;&amp; 'hover--text-slate-200'" href="<?php echo base_url();?>admin/message">
                  <div class="flex items-center fg">
                     <div class="ad flex items-center">
                        <svg class="ap oo ur" viewBox="0 0 24 24">
                           <path class="db ys  <?php if($page_name == 'message' || $page_name == 'group') echo 'text-indigo-500';?>" d="M14.5 7c4.695 0 8.5 3.184 8.5 7.111 0 1.597-.638 3.067-1.7 4.253V23l-4.108-2.148a10 10 0 01-2.692.37c-4.695 0-8.5-3.184-8.5-7.11C6 10.183 9.805 7 14.5 7z"></path>
                           <path class="db yu  <?php if($page_name == 'message' || $page_name == 'group') echo 'text-indigo-300';?>" d="M11 1C5.477 1 1 4.582 1 9c0 1.797.75 3.45 2 4.785V19l4.833-2.416C8.829 16.85 9.892 17 11 17c5.523 0 10-3.582 10-8s-4.477-8-10-8z"></path>
                        </svg>
                        <span class="text-sm gk ml-3 ttl ttb 2xl:opacity--100 wf">Mensajes</span> 
                     </div>
                    <div class="flex ah r_"> <span class="inline-flex items-center justify-center oy gb gk yo hb v_ rounded"><?php echo $this->crud->count_unread_message_of_thread_nav();?></span></div>
                  </div>
               </a>
            </li>
                
               <li class="me vg rounded-sm ib wj <?php if($page_name == 'admins' || $page_name == 'accountants' || $page_name == 'specialists') echo 'bg-slate-900';?>" x-data="{ open: false }" x-init="$nextTick(() => open = page.startsWith('users-'))">
                  <a class="block ya xw ci wr wu" :class="page.startsWith('users-') &amp;&amp; 'hover--text-slate-200'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                     <div class="flex items-center fg">
                        <div class="flex items-center">
                           <svg class="ap oo ur" viewBox="0 0 24 24">
                              <path class="db ys  <?php if($page_name == 'admins' || $page_name == 'accountants' || $page_name == 'specialists') echo 'text-indigo-500';?>" d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z"></path>
                              <path class="db yu  <?php if($page_name == 'admins' || $page_name == 'accountants' || $page_name == 'specialists') echo 'text-indigo-300';?>" d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z"></path>
                           </svg>
                           <span class="text-sm gk ml-3 ttl ttb 2xl:opacity--100 wf">Usuarios</span> 
                        </div>
                        <div class="flex ap r_ ttl ttb 2xl:opacity--100 wf">
                           <svg class="w-3 h-3 ap rq db yu" :class="open &amp;&amp; 'fe az'" viewBox="0 0 12 12">
                              <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                           </svg>
                        </div>
                     </div>
                  </a>
                  <div class="tec ttd 2xl:block">
                     <ul class="mf iu" :class="!open &amp;&amp; 'hidden'" x-cloak="">
                        <li class="rx wj"> <a class="block yu hover--text-slate-200 wr wu ci" :class="page === 'admins' &amp;&amp; '!text-indigo-500'" href="<?php echo base_url();?>admin/admins"> <span class="text-sm gk ttl ttb 2xl:opacity--100 wf">Administradores</span> </a> </li>
                        <li class="rx wj"> <a class="block yu hover--text-slate-200 wr wu ci" :class="page === 'accountants' &amp;&amp; '!text-indigo-500'" href="<?php echo base_url();?>admin/accountants"> <span class="text-sm gk ttl ttb 2xl:opacity--100 wf">Contadores</span> </a> </li>
                        <li class="rx wj"> <a class="block yu hover--text-slate-200 wr wu ci" :class="page === 'specialists' &amp;&amp; '!text-indigo-500'" href="<?php echo base_url();?>admin/specialists"> <span class="text-sm gk ttl ttb 2xl:opacity--100 wf">Especialistas</span> </a> </li>
                     </ul>
                  </div>
               </li>
               
               
               
                <li class="me vg rounded-sm ib wj <?php if($page_name == 'clients') echo 'bg-slate-900';?>" x-data="{ open: false }" x-init="$nextTick(() => open = page.startsWith('finance-'))">
                  <a class="block ya xw ci wr wu" :class="page.startsWith('finance-') &amp;&amp; 'hover--text-slate-200'" href="<?php echo base_url();?>admin/clients">
                     <div class="flex items-center fg">
                        <div class="flex items-center">
                           <svg class="ap oo ur" viewBox="0 0 24 24">
                              <path class="db yu <?php if($page_name == 'clients') echo 'text-indigo-300';?>" d="M13 6.068a6.035 6.035 0 0 1 4.932 4.933H24c-.486-5.846-5.154-10.515-11-11v6.067Z"></path>
                              <path class="db bo <?php if($page_name == 'clients') echo 'text-indigo-500';?>" d="M18.007 13c-.474 2.833-2.919 5-5.864 5a5.888 5.888 0 0 1-3.694-1.304L4 20.731C6.131 22.752 8.992 24 12.143 24c6.232 0 11.35-4.851 11.857-11h-5.993Z"></path>
                              <path class="db ys <?php if($page_name == 'clients') echo 'text-indigo-600';?>" d="M6.939 15.007A5.861 5.861 0 0 1 6 11.829c0-2.937 2.167-5.376 5-5.85V0C4.85.507 0 5.614 0 11.83c0 2.695.922 5.174 2.456 7.17l4.483-3.993Z"></path>
                           </svg>
                           <span class="text-sm gk ml-3 ttl ttb 2xl:opacity--100 wf">Clientes</span> 
                        </div>
                        
                     </div>
                  </a>
                  
               </li>
               
                <li class="me vg rounded-sm ib wj <?php if($page_name == 'requests') echo 'bg-slate-900';?>">
                   <a class="block ya xw ci wr wu <?php if($page_name == 'requests') echo 'hover--text-slate-200';?>" href="<?php echo base_url();?>admin/requests">
                      <div class="flex items-center">
                         <svg class="ap oo ur" viewBox="0 0 24 24">
                            <path class="db ys <?php if($page_name == 'requests') echo 'text-indigo-500';?>" d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z"></path>
                            <path class="db yu <?php if($page_name == 'requests') echo 'text-indigo-500';?>" d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z"></path>
                         </svg>
                         <span class="text-sm gk ml-3 ttl ttb 2xl:opacity--100 wf">Solicitudes</span> 
                      </div>
                   </a>
                </li>
             
               
               <li class="me vg rounded-sm ib wj <?php if($page_name == 'contracts') echo 'bg-slate-900';?>" x-data="{ open: false }" x-init="$nextTick(() => open = page.startsWith('tasks-'))">
                   <a class="block ya xw ci wr wu" :class="page.startsWith('tasks-') &amp;&amp; 'hover--text-slate-200'" href="<?php echo base_url();?>admin/contracts" >
                      <div class="flex items-center fg">
                         <div class="flex items-center">
                            <svg class="ap oo ur" viewBox="0 0 24 24">
                               <path class="db ys <?php if($page_name == 'contracts') echo 'text-indigo-500';?>" d="M8 1v2H3v19h18V3h-5V1h7v23H1V1z"></path>
                               <path class="db ys <?php if($page_name == 'contracts') echo 'text-indigo-500';?>" d="M1 1h22v23H1z"></path>
                               <path class="db yu <?php if($page_name == 'contracts') echo 'text-indigo-500';?>" d="M15 10.586L16.414 12 11 17.414 7.586 14 9 12.586l2 2zM5 0h14v4H5z"></path>
                            </svg>
                            <span class="text-sm gk ml-3 ttl ttb 2xl:opacity--100 wf">Contratos</span> 
                         </div>
                         
                      </div>
                   </a>
                   
                </li>
              
               
               <li class="me vg rounded-sm ib wj <?php if($page_name == 'rates') echo 'bg-slate-900';?>" x-data="{ open: false }" x-init="$nextTick(() => open = page.startsWith('job-'))">
                   <a class="block ya xw ci wr wu <?php if($page_name == 'rates') echo 'hover--text-slate-200';?>" href="<?php echo base_url();?>admin/rates">
                      <div class="flex items-center fg">
                         <div class="flex items-center">
                            <svg class="ap oo ur" viewBox="0 0 24 24">
                               <path class="db bo <?php if($page_name == 'rates') echo 'text-indigo-500';?>" d="M4.418 19.612A9.092 9.092 0 0 1 2.59 17.03L.475 19.14c-.848.85-.536 2.395.743 3.673a4.413 4.413 0 0 0 1.677 1.082c.253.086.519.131.787.135.45.011.886-.16 1.208-.474L7 21.44a8.962 8.962 0 0 1-2.582-1.828Z"></path>
                               <path class="db ys <?php if($page_name == 'rates') echo 'text-indigo-500';?>" d="M10.034 13.997a11.011 11.011 0 0 1-2.551-3.862L4.595 13.02a2.513 2.513 0 0 0-.4 2.645 6.668 6.668 0 0 0 1.64 2.532 5.525 5.525 0 0 0 3.643 1.824 2.1 2.1 0 0 0 1.534-.587l2.883-2.882a11.156 11.156 0 0 1-3.861-2.556Z"></path>
                               <path class="db yu <?php if($page_name == 'rates') echo 'text-indigo-500';?>" d="M21.554 2.471A8.958 8.958 0 0 0 18.167.276a3.105 3.105 0 0 0-3.295.467L9.715 5.888c-1.41 1.408-.665 4.275 1.733 6.668a8.958 8.958 0 0 0 3.387 2.196c.459.157.94.24 1.425.246a2.559 2.559 0 0 0 1.87-.715l5.156-5.146c1.415-1.406.666-4.273-1.732-6.666Zm.318 5.257c-.148.147-.594.2-1.256-.018A7.037 7.037 0 0 1 18.016 6c-1.73-1.728-2.104-3.475-1.73-3.845a.671.671 0 0 1 .465-.129c.27.008.536.057.79.146a7.07 7.07 0 0 1 2.6 1.711c1.73 1.73 2.105 3.472 1.73 3.846Z"></path>
                            </svg>
                            <span class="text-sm gk ml-3 ttl ttb 2xl:opacity--100 wf">Tarifas</span> 
                         </div>
                         
                      </div>
                   </a>
                </li>
                
                

               <li class="me vg rounded-sm ib wj <?php if($page_name == 'finance') echo 'bg-slate-900';?>" x-data="{ open: false }" x-init="$nextTick(() => open = page.startsWith('finance-'))">
                  <a class="block ya xw ci wr wu" :class="page.startsWith('finance-') &amp;&amp; 'hover--text-slate-200'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                     <div class="flex items-center fg">
                        <div class="flex items-center">
                           <svg class="ap oo ur" viewBox="0 0 24 24">
                              <path class="db yu <?php if($page_name == 'finance') echo 'text-indigo-500';?>" d="M13 6.068a6.035 6.035 0 0 1 4.932 4.933H24c-.486-5.846-5.154-10.515-11-11v6.067Z"></path>
                              <path class="db bo <?php if($page_name == 'finance') echo 'text-indigo-500';?>" d="M18.007 13c-.474 2.833-2.919 5-5.864 5a5.888 5.888 0 0 1-3.694-1.304L4 20.731C6.131 22.752 8.992 24 12.143 24c6.232 0 11.35-4.851 11.857-11h-5.993Z"></path>
                              <path class="db ys <?php if($page_name == 'finance') echo 'text-indigo-500';?>" d="M6.939 15.007A5.861 5.861 0 0 1 6 11.829c0-2.937 2.167-5.376 5-5.85V0C4.85.507 0 5.614 0 11.83c0 2.695.922 5.174 2.456 7.17l4.483-3.993Z"></path>
                           </svg>
                           <span class="text-sm gk ml-3 ttl ttb 2xl:opacity--100 wf">Finanzas</span> 
                        </div>
                        <div class="flex ap r_ ttl ttb 2xl:opacity--100 wf">
                           <svg class="w-3 h-3 ap rq db yu" :class="open &amp;&amp; 'fe az'" viewBox="0 0 12 12">
                              <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                           </svg>
                        </div>
                     </div>
                  </a>
                    <div class="tec ttd 2xl:block">
                     <ul class="mf iu" :class="!open &amp;&amp; 'hidden'" x-cloak="">
                        <li class="rx wj"> <a class="block yu hover--text-slate-200 wr wu ci" :class="page === 'admins' &amp;&amp; '!text-indigo-500'" href="<?php echo base_url();?>admin/finance"> <span class="text-sm gk ttl ttb 2xl:opacity--100 wf">Pagos</span> </a> </li>
                        <li class="rx wj"> <a class="block yu hover--text-slate-200 wr wu ci" :class="page === 'accountants' &amp;&amp; '!text-indigo-500'" href="#0"> <span class="text-sm gk ttl ttb 2xl:opacity--100 wf">Egresos</span> </a> </li>
                     </ul>
                  </div>
               </li>
               
               
               
               
               
               
               
               
   
               
               
               
               
               
               <li class="me vg rounded-sm ib wj <?php if($page_name == 'settings') echo 'bg-slate-900';?>" x-data="{ open: false }" x-init="$nextTick(() => open = page.startsWith('settings-'))">
                  <a class="block ya xw ci wr wu" :class="page.startsWith('settings-') &amp;&amp; 'hover--text-slate-200'" href="<?php echo base_url();?>admin/settings">
                     <div class="flex items-center fg">
                        <div class="flex items-center">
                           <svg class="ap oo ur" viewBox="0 0 24 24">
                              <path class="db ys <?php if($page_name == 'settings') echo 'text-indigo-500';?>" d="M19.714 14.7l-7.007 7.007-1.414-1.414 7.007-7.007c-.195-.4-.298-.84-.3-1.286a3 3 0 113 3 2.969 2.969 0 01-1.286-.3z"></path>
                              <path class="db yu <?php if($page_name == 'settings') echo 'text-indigo-300';?>" d="M10.714 18.3c.4-.195.84-.298 1.286-.3a3 3 0 11-3 3c.002-.446.105-.885.3-1.286l-6.007-6.007 1.414-1.414 6.007 6.007z"></path>
                              <path class="db ys <?php if($page_name == 'settings') echo 'text-indigo-500';?>" d="M5.7 10.714c.195.4.298.84.3 1.286a3 3 0 11-3-3c.446.002.885.105 1.286.3l7.007-7.007 1.414 1.414L5.7 10.714z"></path>
                              <path class="db yu <?php if($page_name == 'settings') echo 'text-indigo-300';?>" d="M19.707 9.292a3.012 3.012 0 00-1.415 1.415L13.286 5.7c-.4.195-.84.298-1.286.3a3 3 0 113-3 2.969 2.969 0 01-.3 1.286l5.007 5.006z"></path>
                           </svg>
                           <span class="text-sm gk ml-3 ttl ttb 2xl:opacity--100 wf">Configuración</span> 
                        </div>
                        
                     </div>
                  </a>
                  
               </li>
             
            </ul>
         </div>
         
      </div>
      
   </div>
</div>