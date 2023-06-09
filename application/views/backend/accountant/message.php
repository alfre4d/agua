<div class="gm bf hy ys" :class="{ 'sidebar-expanded': sidebarExpanded }" x-data="{ page: 'messages', sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true', msgSidebarOpen: false }" x-init="() => { $refs.contentarea.scrollTop = 99999999 }; $watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <main>
      <div class="td flex">
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
                                       <a class="gk text-sm ys xy block ms me" href="<?php echo base_url();?>accountant/group" @click="open = false" @focus="open = true" @focusout="open = false"> 
                                       <div class="flex items-center fg">
                                          <div class="ad flex items-center ci">
                                             <img class="ul oh rounded-full mr-2" src="<?php echo base_url();?>public/uploads/images/group.png" alt="Channel 02" width="28" height="28"> 
                                             <div class="ci">Grupos</div>
                                          </div>
                                       </div>
                                       </a> 
                                    </li>
                                 </ul>
                              </div>
                           </div>
                           <!-- Start -->
                      
                        </div>                              
                     </div>
                  </div>
                  <!---------------------------------------------Panel de roles de usuario---------------------------------------------------------------->
                  <div class="mn mr" id="bloqueA">
                        <div x-data="{ modalOpen: false }">
                            <center><button id="hide1" @click.prevent="modalOpen = true" aria-controls="feedback-modal" class="btn hb xs yo" style="color: #fff;">
                            <span class="tc">Nuevo mensaje</span> 
                                Nuevo mensaje &nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-telegram" width="17" height="17" viewBox="0 0 23 23" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                  <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
                                </svg>
                            </butto></center>
                            <div class="bg-slate-900 pb nm wi" x-show="modalOpen" x-transition:enter="wr wh wf" x-transition:enter-start="opacity-0" x-transition:enter-end="bv" x-transition:leave="wr wh wa" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" aria-hidden="true" style="display: none;"></div>
                                <div id="feedback-modal" class="tm nm lq flex items-center rff justify-center fe vd jd" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="wr wc wf" x-transition:enter-start="opacity-0 a_" x-transition:enter-end="bv ax" x-transition:leave="wr wc wf" x-transition:leave-start="bv ax" x-transition:leave-end="opacity-0 a_" style="display: none;">
                                    <div class="bg-blue rounded by lj aa oq ok">
                                        <div class="mn mr">
                                            <div class="flex fg items-center">
                                               <div class="g_ text-slate-800"></div>
                                               <button class="yu xm" @click="modalOpen = false" id="viewaction1">
                                                  <div class="tc">Close</div>
                                                  <svg class="ue on db">
                                                     <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                                                  </svg>
                                               </button>
                                            </div>
                                            <div class="gk text-slate-800 it"></div>
                                            <?php echo form_open(base_url().'/accountant/message/send_new/');?>
                                                <div class="ls">
                                                    <div class="_y jn ln ju jl ig">
                                                        <div class="_xx">
                                                            <label class="block text-sm gk rx" for="default">Destinatario</label>
                                                            <select name="reciever" class="tn oq kf kl kh ka" style="max-width:100%" required="">
                                                                <option value="">Seleccionar</option>
                                                                <optgroup label="Administradores">
                                                                    <?php 
                                                                        $admins = $this->db->get_where('admin', array('type' => 1))->result_array();
                                                                        foreach($admins as $rw):
                                                                    ?>
                                                                        
                                                                            <option value="admin-<?php echo $rw['admin_id'];?>"><?php echo $rw['first_name'].' '.$rw['last_name'];?></option>
                                                                        
                                                                    <?php endforeach;?>
                                                                </optgroup>
                                                                <optgroup label="Contadores">
                                                                    <?php 
                                                                        $admins = $this->db->get_where('admin', array('type' => 2))->result_array();
                                                                        foreach($admins as $rw):
                                                                    ?>
                                                                    <?php if($rw['admin_id']!= $this->session->userdata('login_user_id')):?>
                                                                        <option value="accountant-<?php echo $rw['admin_id'];?>"><?php echo $rw['first_name'].' '.$rw['last_name'];?></option>
                                                                    <?php endif;?>
                                                                    <?php endforeach;?>
                                                                </optgroup>
                                                                <optgroup label="Especialista">
                                                                    <?php 
                                                                        $admins = $this->db->get_where('admin', array('type' => 3))->result_array();
                                                                        foreach($admins as $rw):
                                                                    ?>
                                                                    <option value="specialyst-<?php echo $rw['admin_id'];?>"><?php echo $rw['first_name'].' '.$rw['last_name'];?></option>
                                                                    <?php endforeach;?>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div>   
                                                        <label class="block text-sm gk rx" for="disabled">¿Que enviarás?</label>
                                                        <textarea class="tn oq kf kl kh ka" name="message" required="" placeholder="Escribe tu mensaje...."></textarea>
                                                    </div>
                                                </div><br>
                                                <div class="mn mr ck border-blue-200">
                                                   <div class="flex flex-wrap justify-end lt">
                                                      <a href="#" class="tt border-blue-200 hover--border-blue-300 ys" @click="modalOpen = false" id="viewaction2">Cancelar</a>
                                                      <button class="tt hb xs yo" type="submit">Enviar</button>
                                                   </div>
                                                </div>
                                            <?php echo form_close();?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <br>
                        <div id="ocultaction1">
                        <form>
                            <label for="profile-search" class="tc">Buscar</label> 
                            <div class="td">
                               <input id="myInput" onkeyup="search_messages_direct()" class="tn oq mf kn" type="search" placeholder="Buscar...">    
                               <button class="tp tm tg kp" type="submit" aria-label="Search">
                                  <svg class="ue on ap db yu kv ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                                     <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                                  </svg>
                               </button>
                            </div>
                        </form> 
                     <br>
                     <?php $message_threads = $this->db->get('message_thread')->result_array(); ?>
                     <?php if(empty($message_threads)):?>
                     <?php else: ?>
                     <div class="gb g_ yu gq it">Mensajes directos</div>
                     <?php endif; ?>
                     <div id="myDiv">
                     <div class="ij ">
                        <ul>
                            <?php 
                     			$current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
                          		$this->db->where('sender', $current_user);
                          		$this->db->or_where('reciever', $current_user);
                          		$this->db->order_by('message_thread_id', 'DESC');
                          		$message_threads = $this->db->get('message_thread')->result_array();
                          		foreach ($message_threads as $row):
                            	if ($row['sender'] == $current_user)
                            	{
                              		$user_to_show = explode('-', $row['reciever']);
                            	}
                            	if ($row['reciever'] == $current_user)
                            	{
                              		$user_to_show = explode('-', $row['sender']);
                            	}
                            	$user_to_show_type = $user_to_show[0];
                            	$user_to_show_id = $user_to_show[1];
                            	$unread_message_number = $this->crud->count_unread_message_of_thread($row['message_thread_code']);
                    		?>
                    	    <?php $this->db->where('message_thread_code',$row['message_thread_code']); $rw= $this->db->get('message')->last_row();?>
                            <?php $dbinfo = explode('-',$rw->sender);?>
                            <?php 
                               $firstname = $this->db->get_where('admin', array('admin_id' => $user_to_show_id))->row()->first_name;
                               $lastname = $this->db->get_where('admin', array('admin_id' => $user_to_show_id))->row()->last_name;
          					    //$firstname = $this->db->get_where($user_to_show_type, array($user_to_show_type . '_id' => $user_to_show_id))->row()->first_name;
            					//$lastname = $this->db->get_where($user_to_show_type, array($user_to_show_type . '_id' => $user_to_show_id))->row()->last_name; 
                            ?>
                            <a href="<?php echo base_url(); ?>accountant/message/message_read/<?php echo $row['message_thread_code']; ?>">
                                <li class="rv" style="<?php if (isset($current_message_thread_code) && $current_message_thread_code == $row['message_thread_code']) echo 'background:#e0e7ff;color:black;border-radius:10px'; ?>">
                                    <button class="flex items-center fg oq vc rounded" @click="msgSidebarOpen = false; $refs.contentarea.scrollTop = 99999999;">
                                        <div class="flex items-center ci">
                                            <div class="td mr-2">
                                                <img class="uu of rounded-full mr-2" src="<?php echo $this->crud->obtenerFotoAdmim($user_to_show_id);?>" alt="User 01" width="32" height="32">
                                            </div>
                                            <div class="ci"><span class="text-sm gk text-slate-800" style="<?php if (isset($current_message_thread_code) && $current_message_thread_code == $row['message_thread_code']) echo 'color:black'; ?>"><?php echo $firstname." ". $lastname; ?></span>
                                            </div>
                                        </div>
                                        <div class="flex items-center r_">
                                            <small>
                                        <?php if ($unread_message_number > 0): ?>
                                            <?php echo  '<div class="gb inline-flex gk pc yo rounded-full gp yr v_">'.$unread_message_number.'</div>' ; ?>
                                            
                                        <?php else:?>    
                                            <span style="font-size:10px"><?php $hora = explode(' ',$rw->timestamp); echo $hora[1];?></span>
                                        <?php endif;?>
                                        </small>
                                        </div>
                                    </button>
                                </li>
                            </a>
                           <?php endforeach;?>
                           </ul>
                        </div>
                     </div>
                     </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include $message_inner_page_name . '.php'; ?>
      </div>
   </main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(function(){
        $('#viewaction1').click(function(){
          $('#ocultaction1').show();
        });
        $('#hide1').click(function(){
          $('#ocultaction1').hide();
        });
        $('#viewaction2').click(function(){
          $('#ocultaction1').show();
        });
    })
</script>
   
<script type="text/javascript">
    function search_messages_direct()
    {
        var input, a, i, div,filter;
        input = document.getElementById('myInput');
        filter = input.value.toUpperCase();
        div = document.getElementById('myDiv');
        a = div.getElementsByTagName('a');
        for(i = 0; i < a.length; i++){
            txtValue = a[i].textContent || a[i].innerText;
            if(txtValue.toUpperCase().indexOf(filter) > -1){
                a[i].style.display = "";
           }else {
                a[i].style.display = "none";
           }
        }
    }
</script>
</div>