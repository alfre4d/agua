<div class="gm bf hy ys" :class="{ 'sidebar-expanded': sidebarExpanded }" x-data="{ page: 'messages', sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true', msgSidebarOpen: false }" x-init="() => { $refs.contentarea.scrollTop = 99999999 }; $watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <main>
      <div class="td flex">
         <!-- Profile sidebar --------------------------------------------------------------->
         <div id="profile-sidebar" class="tp ny tk ty oq qb jj qn qr sp qq fe ws wf wc -translate-x" :class="profileSidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            <div class="tv np bg-white ct ce ta ap cj border-slate-200 qj tnu ox">
               <div>
                  <div class="tv tk nv">
                     <div class="flex items-center bg-white cx border-slate-200 mn op">
                        <div class="oq flex items-center fg">
                           <div class="td" x-data="{ open: false }">
                              <button class="ad flex items-center ci" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open" aria-expanded="false">
                                 <img class="uu of rounded-full mr-2" src="<?php echo base_url();?>public/uploads/images/chat_prin.png" alt="Group 01" width="32" height="32"> 
                                 <div class="ci"> <span class="g_ text-slate-800">Chats</span> <?php echo $data['admin_id']?></div>
                                 <svg class="w-3 h-3 ap rq db yu" viewBox="0 0 12 12">
                                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                 </svg>
                              </button>
                              <div class="am nv tp tq tb uz bg-white border border-slate-200 ms rounded by lq iu" @click.outside="open = false" @keydown.escape.window="open = false" x-show="open" x-transition:enter="wr wh wf fe" x-transition:enter-start="opacity-0 aw" x-transition:enter-end="bv ax" x-transition:leave="wr wh wf" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" style="display: none;">
                                 <ul>
                                    <li>
                                       <a class="gk text-sm ys xy block ms me" href="#0" @click="open = false" @focus="open = true" @focusout="open = false"> 
                                       <div class="flex items-center fg">
                                          <div class="ad flex items-center ci">
                                             <img class="ul oh rounded-full mr-2" src="<?php echo base_url();?>public/uploads/images/chat_prin.png" alt="Channel 01" width="28" height="28"> 
                                             <div class="ci">Chats</div>
                                          </div>
                                          <svg class="w-3 h-3 ap db text-indigo-500 rq" viewBox="0 0 12 12">
                                             <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z"></path>
                                          </svg>
                                       </div>
                                       </a> 
                                    </li>
                                    <li>
                                       <a class="gk text-sm ys xy block ms me" href="<?php echo base_url();?>specialyst/create_message_group" @click="open = false" @focus="open = true" @focusout="open = false"> 
                                       <div class="flex items-center fg">
                                          <div class="ad flex items-center ci">
                                             <img class="ul oh rounded-full mr-2" src="<?php echo base_url();?>public/uploads/images/group.png" alt="Channel 02" width="28" height="28"> 
                                             <div class="ci">Nuevo grupo</div>
                                          </div>
                                       </div>
                                       </a> 
                                    </li>
                                 </ul>
                              </div>
                           </div>
                           <!-- Start -->
                     
                           <div class="td" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                              <button class="block" aria-haspopup="true" :aria-expanded="open" @focus="open = true" @focusout="open = false" aria-expanded="false">
                                 <div class="flex items-center" x-data="{ checked: false }">
                                    <div class="tf">
                                       <input type="checkbox" id="switch-1" class="tc" x-model="checked" value="1" onChange="ocult()" >
                                          <label class="pf" for="switch-1" >
                                             <span class="bg-white bw" aria-hidden="true" ></span>
                                             <span class="tc">Switch label</span>
                                          </label>
                                    </div>
                                 </div>
                              </button>
                              <div class="nv tp nr tx fe ay">
                              <div class="bg-white border border-slate-200 vc rounded by lq mr-2" x-show="open" x-transition:enter="wr wh wf fe" x-transition:enter-start="opacity-0 ak" x-transition:enter-end="bv ax" x-transition:leave="wr wh wf" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" style="display: none;">
                                 <div class="gb co">Precione el botón</div>
                              </div>
                              </div>
                           </div>
                           <!-- End -->
                        </div>                              
                     </div>
                  </div>
                  <!---------------------------------------------Panel de roles de usuario---------------------------------------------------------------->
                  <div class="mn mr" id="bloqueB" style="display:none;">
                     <form class="td" >
                           <label for="msg-search" class="tc">Search</label> <input id="myInputs" onkeyup="filters()" class="tn oq mf kn" type="search" placeholder="Buscar…"> 
                           <button class="tp tm tg kp" type="submit" aria-label="Search">
                              <svg class="ue on ap db yu kv ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                              <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                              <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                              </svg>
                           </button>
                     </form>
                     
                     <div id="myFilters">
                     <div class="ij">
                       
                       <div class="gb g_ yu gq it">Administrador</div>
                       <ul class="rb">
                        <?php
                           $admons = $this->crud-> get_admon($this->session->userdata('name')); 
                        ?>
                       <?php if(empty($admons)): ?>
                        <div class="flex justify-center in">
                                    <img class="rounded-full" src="<?php echo base_url(); ?>public/uploads/notfound.png" width="300" height="1024" alt="Authentication image">
                                </div>
                                <strong>
                                    <p>¡No se ha registrado ningún administrador! 😞</p>
                                </strong>
                            
                       <?php else:?>
                           <?php foreach($admons as $row):?>
                           <a>
                           <li class="rv">
                           <form method="GET">
                           <input type="hidden" name="iduser" id="iduser" value="<?php echo $row['admin_id']?>">
                           <button class="flex items-center fg oq vc rounded" @click="msgSidebarOpen = false; $refs.contentarea.scrollTop = 99999999;">
                               <div class="flex items-center ci">
                                   <img class="uu of rounded-full mr-2" src="<?php echo base_url();?>public/uploads/img_photography/<?php echo $row['photography']?>" alt="User 01" width="32" height="32"> 
                                   <div class="ci"> <span class="text-sm gk text-slate-800"><?php echo $row['first_name'].' '.$row['last_name'];?></span> </div>
                               </div>

                               <div class="flex items-center r_">
                                   <?php 
                                   if($row['status_message'])
                                   {
                                       echo '<div class="w-2 h-2 pcp rounded-full"></div>';   
                                   }
                                   else
                                   {
                                       echo '<div class="w-2 h-2 pco rounded-full"></div>';
                                   }
           
                                   ?>
                               </div>
                           </button>
                           </form>
                           </li>
                           </a>
                       <?php endforeach; ?>
                       </ul>
                       <?php endif;?>
                     </div>
                     
                     <div class="ij">
                       
                       <div class="gb g_ yu gq it">Contador</div>
                       <ul class="rb">
                       <?php
                           $account = $this->crud->get_accountants($this->session->userdata('name')); 
                       ?>
                       <?php if(empty($account)): ?>
                         <div class="flex justify-center in">
                                    <img class="rounded-full" src="<?php echo base_url(); ?>public/uploads/notfound.png" width="300" height="1024" alt="Authentication image">
                                </div>
                                <strong>
                                    <p>¡No se ha registrado ningún contador! 😞</p>
                                </strong>
                        
                       <?php else:?>
                           <?php foreach($account as $row):?>
                           <a>
                           <li class="rv">
                           <form method="GET">
                           <input type="hidden" name="iduser" id="iduser" value="<?php echo $row['admin_id']?>">
                           <button class="flex items-center fg oq vc rounded" @click="msgSidebarOpen = false; $refs.contentarea.scrollTop = 99999999;">
                               <div class="flex items-center ci">
                                   <img class="uu of rounded-full mr-2" src="<?php echo base_url();?>public/uploads/img_photography/<?php echo $row['photography']?>" alt="User 01" width="32" height="32"> 
                                   <div class="ci"> <span class="text-sm gk text-slate-800"><?php echo $row['first_name'].' '.$row['last_name'];?></span> </div>
                               </div>

                               <div class="flex items-center r_">
                                   <?php 
                                   if($row['status_message'])
                                   {
                                       echo '<div class="w-2 h-2 pcp rounded-full"></div>';   
                                   }
                                   else
                                   {
                                       echo '<div class="w-2 h-2 pco rounded-full"></div>';
                                   }
           
                                   ?>
                               </div>
                           </button>
                           </form>
                           </li>
                           </a>
                       <?php endforeach; ?>
                       </ul>
                       <?php endif;?>
                     </div>
                     <?php
                           $specialist = $this->crud->get_specialists($this->session->userdata('name')); 
                        ?>
                     <div class="ij">
                       <?php if(empty($specialist)): ?>
                        <div class="flex justify-center in">
                                    <img class="rounded-full" src="<?php echo base_url(); ?>public/uploads/notfound.png" width="300" height="1024" alt="Authentication image">
                                </div>
                                <strong>
                                    <p>¡No se ha registrado ningún especialista! 😞</p>
                                </strong>
                       <?php else:?>
                       <div class="gb g_ yu gq it">Especialista</div>
                       <ul class="rb">
                           <?php foreach($specialist as $rowe):?>
                           <a>
                           <li class="rv">
                           <form method="GET">
                           <input type="hidden" name="iduser" id="iduser" value="<?php echo $rowe['admin_id']?>">
                           <button class="flex items-center fg oq vc rounded" @click="msgSidebarOpen = false; $refs.contentarea.scrollTop = 99999999;">
                               <div class="flex items-center ci">
                                   <img class="uu of rounded-full mr-2" src="<?php echo base_url();?>public/uploads/img_photography/<?php echo $rowe['photography']?>" alt="User 01" width="32" height="32"> 
                                   <div class="ci"> <span class="text-sm gk text-slate-800"><?php echo $rowe['first_name'].' '.$rowe['last_name'];?></span> </div>
                               </div>

                               <div class="flex items-center r_">
                                   <?php 
                                   if($rowe['status_message'])
                                   {
                                       echo '<div class="w-2 h-2 pcp rounded-full"></div>';   
                                   }
                                   else
                                   {
                                       echo '<div class="w-2 h-2 pco rounded-full"></div>';
                                   }
           
                                   ?>
                               </div>
                           </button>
                           </form>
                           </li>
                           </a>
                       <?php endforeach; ?>
                       </ul>
                       <?php endif;?>
                     </div>
                     </div>
                  </div>
                  <!----------------------------------------End panel-------------------------------------------------------->

                  <!-------------------------------------------------Panel para usuarios directos--------------------------------------------------------->
                  <div class="mn mr" id="bloqueA">
                     <form>
                        <label for="profile-search" class="tc">Search</label> 
                        <div class="td">
                           <input id="mySearch" onkeyup="searchUsers()" class="tn oq mf kn" type="search" placeholder="Buscar…">    
                           <button class="tp tm tg kp" type="submit" aria-label="Search">
                              <svg class="ue on ap db yu kv ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                                 <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                              </svg>
                           </button>
                        </div>
                     </form>
                     <br>
                     <div class="gb g_ yu gq it">Mensajes directos</div>
                     <div  class="ij" >
                        <ul class="rb" id="msgdirect">
                        </ul>
                     </div>
                  </div>
                  <!----------------------------------------End panel-------------------------------------------------------->
               </div>
            </div>
         </div>
<?php 
   $iduser = $this->input->get('iduser');
   $query = $this->db->where('admin_id',$iduser)->get('admin')->result_array();
?>
<!-- Messages body ---------------------------------------------------------------------------------------------------->
         <div class="ad flex fh qq fe ws wl wc translate-x" :class="profileSidebarOpen ? 'translate-x-1/3' : 'translate-x-0'">
            <div class="tv np">
               <div class="flex items-center fg bg-white cx border-slate-200 vd jd zx op">
                  <div class="flex items-center">
                     <button class="qg yu xm mr-4" @click.stop="profileSidebarOpen = !profileSidebarOpen" aria-controls="profile-sidebar" :aria-expanded="profileSidebarOpen" aria-expanded="false">
                        <span class="tc">Close sidebar</span> 
                        <svg class="ur oo db" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                           <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"></path>
                        </svg>
                     </button>
                     <?php foreach($query as $rows):?>
                        <div class="flex items-center ci"> 
                           <img class="uu of rounded-full mr-2"  src="<?php echo base_url();?>public/uploads/img_photography/<?php echo $rows['photography']?>" alt="User 04" width="40" height="40">                
                              <?php 
                                 if($rows['status_message']=='Activo ahora'){
                                    echo '<div class="wp-2 h-2 pcp rounded-full"></div><br>';
                                 }
                                 else
                                 {
                                    echo '<div class="wp-2 h-2 pco rounded-full"></div><br>';
                                 }
                              ?>
                              <div class="ci"><ul><li class="text-sm gk text-slate-800"><?php echo $rows['first_name']?></li>
                                 <?php 
                                    if($rows['status_message']=='Activo ahora'){
                                       echo '<li class="gb text-slate-500 gk">Activo ahora</li></ul>';
                                    }
                                    else
                                    {
                                       echo '<li class="gb text-slate-500 gk">Inactivo</li></ul>';
                                    }
                                 ?>
                                 <input type="hidden" value="<?php echo $rows['admin_id']?>">            
                              </div>
                        </div>
                     <?php endforeach; ?>  
                  </div>
                  <div class="flex">
                     <button class="vp ap rounded border border-slate-200 hover--border-slate-300 bw r_">
                        <svg class="ue on db yu" viewBox="0 0 16 16">
                           <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                        </svg>
                     </button>
                     
                  </div>
               </div>
            </div>
            <!----------------------------------------Chat box------------------------------------------------------------->
            <div class="ad vd jd zx mu" id="msgchat">
            <?php 
            $idsession = $this->session->userdata('login_user_id');
            $msg = $this->crud->view_message($id_session, $id_user);
            $queryss = $this->db->where('admin_id',$id_session)->get('admin')->result_array();
            $queryus = $this->db->where('admin_id',$id_user)->get('admin')->result_array();
            ?>
               <?php if(isset($id_user)):?>
                  <?php foreach($msg as $rowms):?> 
                  <?php 
                    $path = $rowms['message'];
                    $extension = pathinfo($path, PATHINFO_EXTENSION);
                  ?>
                     <?php if($rowms['sender_message_id'] == $id_session):?> 
                        <?php if($extension == ''):?> <!-------------------------Mensaje no es igual al path--------------------->
                           <div class="flex fd rw wj">
                              <?php foreach($queryss as $row):?>
                                 <img class="rounded-full mr-4" src="<?php echo base_url();?>public/uploads/img_profile/<?php echo $row['photography']?>" alt="User 01" width="40" height="40"> 
                              <?php endforeach;  ?>     
                                    <div>
                                       <div class="text-sm hb yo vf cl cg border he shadow-md rx"><?php echo $rowms['message']?></div>
                                       <div class="flex items-center fg">
                                          <div class="gb text-slate-500 gk"><?php echo date("H:i a",strtotime($rowms['time']))?></div>
                                       </div>
                                    </div>
                           </div>
                        <?php else:?>
                           <div class="flex fd rw wj">
                              <?php foreach($queryss as $row):?>
                                 <img class="rounded-full mr-4" src="<?php echo base_url();?>public/uploads/img_profile/<?php echo $row['photography']?>" alt="User 01" width="40" height="40"> 
                              <?php endforeach; ?>
                              <div>
                                 <div class="flex items-center">
                                    <?php 
                                    if($extension == 'pdf' ||$extension == 'docx'){
                                       echo $message = '
                                       <div class="text-sm hb yo vf cl cg border he shadow-md rx">'.$rowms['message'].'</div>
                                       ';
                                    }
                                    else if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'){
                                       echo $message = '
                                       <img class="cl shadow-md rx" src="'.base_url().'public/uploads/archive/'.$rowms['message'].'" alt="Chat image" width="250" height="190">
                                       ';
                                    }
                                    ?>
                                    <a href="<?php echo base_url();?>public/uploads/archive/<?php echo $rowms['message']?>" download="<?php echo $rowms['message']?>" class="vp rounded-full border border-slate-200 ix xp wr wu">
                                       <span class="tc">Download</span> 
                                       <svg class="ue on ap db yu" viewBox="0 0 16 16">
                                          <path d="M15 15H1a1 1 0 01-1-1V2a1 1 0 011-1h4v2H2v10h12V3h-3V1h4a1 1 0 011 1v12a1 1 0 01-1 1zM9 7h3l-4 4-4-4h3V1h2v6z"></path>
                                       </svg>
                                    </a>
                                 </div>
                                    <div class="flex items-center fg">
                                          <div class="gb text-slate-500 gk"><?php echo date("H:i a",strtotime($rowms['time']))?></div>
                                    </div>
                              </div> 
                           </div>  
                        
                        <?php endif;?>
                       
                     <?php else:?>
                        <?php if($extension == ''):?>
                            <div class="flex fd rw wj">
                                <?php foreach($queryus as $row):?>
                                     <img class="rounded-full mr-4" src="<?php echo base_url();?>public/uploads/img_photography/<?php echo $row['photography']?>" alt="User 01" width="40" height="40"> 
                                  <?php endforeach;  ?>  
                                    <div>
                                        <div class="text-sm bg-white text-slate-800 vf cl cg border border-slate-200 shadow-md rx"><?php echo $rowms['message']?></div>
                                        <div class="flex items-center fg">
                                           <div class="gb text-slate-500 gk"><?php echo date("H:i a",strtotime($rowms['time']))?></div>
                                        </div>
                                     </div>
                            </div>
                        <?php else:?>
                            <div class="flex fd rw wj">
                                <?php foreach($queryus as $row):?>
                                 <img class="rounded-full mr-4" src="<?php echo base_url();?>public/uploads/img_profile/<?php echo $row['photography']?>" alt="User 01" width="40" height="40"> 
                                <?php endforeach; ?>
                                <div>
                                    <div class="flex items-center">
                                    <?php 
                                    if($extension == 'pdf' ||$extension == 'docx'){
                                       echo $message = '
                                       <div class="text-sm bg-white text-slate-800 vf cl cg border border-slate-200 shadow-md rx">'.$rowms['message'].'</div>
                                       ';
                                    }
                                    else if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'){
                                       echo $message = '
                                       <img class="cl shadow-md rx" src="'.base_url().'public/uploads/archive/'.$rowms['message'].'" alt="Chat image" width="250" height="190">
                                       ';
                                    }
                                    ?>
                                    <a class="vp rounded-full border border-slate-200 ix xp wr wu">
                                        <span class="tc">Download</span> 
                                        <svg class="ue on ap db yu" viewBox="0 0 16 16">
                                            <path d="M15 15H1a1 1 0 01-1-1V2a1 1 0 011-1h4v2H2v10h12V3h-3V1h4a1 1 0 011 1v12a1 1 0 01-1 1zM9 7h3l-4 4-4-4h3V1h2v6z"></path>
                                        </svg>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        
                     <?php endif; ?>
                  <?php endforeach;  ?> 
               <?php else:?> 
               <div></div> 
               <?php endif; ?>
            </div>
            
            <?php if(isset($iduser)):?>
            <div class="tv ty">
               <div class="flex items-center fg bg-white ck border-slate-200 vd jd zx op">
                  <form action="" enctype="multipart/form-data" class="ad flex">
                     <input type="hidden" name="id_user" id="id_user" value="<?php echo $iduser?>">
                     <input type="file" name="archive" id="archive" style='display:none' onchange="onLoadImage_s(event.target.files)" >
                           <label class="ap yu xm rk" 
                              for="archive">
                                 <svg class="urr oo db" viewBox="0 0 24 24">
                                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12C23.98 5.38 18.62.02 12 0zm6 13h-5v5h-2v-5H6v-2h5V6h2v5h5v2z"></path>
                                 </svg>
                           </label>
                     <label>Archivo:<b><div class="text__limit" id="imgName_s">Niguno...</div></b></label> 
                     
                     <input type="button" value="X" id="boton" name="boton" style='display:none'>
                        <label for="boton">
                           <div class="vp ap rounded border border-slate-200 hover--border-slate-300 bw rp_">
                              <svg class="ue on db text-indigo-500" viewBox="0 0 16 16">
                                 <path d="M14.3 2.3L5 11.6 1.7 8.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"></path>
                              </svg>
                           </div>
                     </label>
                  
                    &nbsp;
                     <div class="ad rk"> <label for="message-input" class="tc">Type a message</label>
                        <textarea  class="tn oq hy he kr kn" id="input-field" style="height:52px" type="text" placeholder="Escribir mensaje..." ></textarea>
                     </div>
                 </form>
                     
                     <button id="sendd" class="btn hb xs yo co">Enviar -&gt;</button>
               </div>
            </div>
            <?php else:?>
                <div></div>
            <?php endif;?>
         </div>
<!-- End body ---------------------------------------------------------------------------------------------------->
      </div>
   </main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
   /*function searchUsers(){
      var input, filter, div, a, i;
      input = document.getElementById("mySearch");
      filter = input.value.toUpperCase();
      div = document.getElementById("vwfilter");
      a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
   }*/
   function ocult()
   {
      if (document.getElementById('switch-1').checked) 
         {
            document.getElementById('bloqueB').style.display = "";
            document.getElementById('bloqueA').style.display = "none";                 
         } 
         else 
         {
            document.getElementById('bloqueB').style.display = "none";
            document.getElementById('bloqueA').style.display = "";
         }                       
   }
    
</script>

    
<script type="text/javascript">
 $(document).ready(function(){

      $("#sendd").on("click", function(){
         
         var parametros = 
         {
         "id" : '<?php echo $iduser?>',
         "msg" : $("#input-field").val(),
         };

         $.ajax({
         data: parametros,
         url: '<?php echo base_url('register/add_msg');?>',
         type: 'POST',
         
         success: function(data)
         {
            $("#input-field").val("");
            console.log(data);
         }
         });
      });
      setInterval(function(){
         var parametros = 
         {
         "id" : '<?php echo $iduser?>',
         "msg" : $("#input-field").val(),
         };
         
         $.ajax({
         data: parametros,
         url: '<?php echo base_url('register/view_chat');?>',
         type: 'POST',
         success: function(data)
         {
            $("#msgchat").html(data);
         }
         });
      },200);

      setInterval(function(){
         var parametros = 
         {
         "id" : '<?php echo $iduser?>',
         "msg" : $("#input-field").val(),
         };
         
         $.ajax({
         data: parametros,
         url: '<?php echo base_url('register/view_user');?>',
         type: 'POST',
         success: function(data)
         {
            $("#msgdirect").html(data);
         }
         });
      },200);

   });
</script>
<script>
   $(document).ready(function(){

      $("#boton").on("click", function(){
         var file_data = $("#archive").prop('files')[0];
         var iduser = $("#id_user").val();
         if(file_data != undefined) {
	                var form_data = new FormData();                  
	                form_data.append('archive', file_data);
                    form_data.append('id_user', iduser);    
	                $.ajax({
	                    type: 'POST',
	                    url: '<?php echo base_url('register/add_archive');?>',
	                    contentType: false,
	                    processData: false,
	                    data: form_data,
	                    success:function(data) {

                        document.getElementById('imgName_s').innerHTML = 'Ninguno';
                        //console.log(data);
	                    }
	                });
	      }
         return false;

      });
   });
   
    function filters()
   {
        var input,a,filter,i,div;
        input = document.getElementById('myInputs');
        filter = input.value.toUpperCase();
        div = document.getElementById('myFilters');
        a = div.getElementsByTagName('a');
        for (i =0; i<a.length ; i++){
            txtValue = a[i].textContent || a[i].innerText;
            if(txtValue.toUpperCase().indexOf(filter) > -1){
                a[i].style.display = "";
           }else {
                a[i].style.display = "none";
           }
        }
   }
   
   function hourglass() {
  var a;
  a = document.getElementById("div1");
  a.innerHTML = "&#xf251;";
  setTimeout(function () {
      a.innerHTML = "&#xf252;";
    }, 1000);
  setTimeout(function () {
      a.innerHTML = "&#xf253;";
    }, 2000);
}
hourglass();
setInterval(hourglass, 3000);
   
</script>

</div>