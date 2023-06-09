<style>
    .fullw{
        width:100%!important;
    }
</style>
<?php
    $send = $this->db->get_where('message_thread', array('message_thread_code' => $current_message_thread_code))->row()->sender;
    $se = explode('-', $send);
    $send_id = $se[1];
   
    $rece = $this->db->get_where('message_thread', array('message_thread_code' => $current_message_thread_code))->row()->reciever;
    $re = explode('-', $rece);
    $rece_id = $re[1];
    
    $recievers;
    $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
    $this->db->order_by('message_id','asc');
    $messages = $this->db->get_where('message', array('message_thread_code' => $current_message_thread_code))->result_array();
?>
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
                <div class="flex items-center ci"> 
                    <?php if($send == $current_user):?>
                        <?php 
                            //$firstname = $this->db->get_where('admin', array('admin_id' => $rece_id))->row()->first_name;
                            //$lastname = $this->db->get_where('admin', array('admin_id' => $rece_id))->row()->last_name;
                            $query = $this->db->where('admin_id',$rece_id)->get('admin')->result_array();
                        ?>
                        <img class="uu of rounded-full mr-2"  src="<?php echo $this->crud->obtenerFotoAdmim($rece_id);?>" alt="User 04" width="40" height="40">
                        <?php foreach($query as $rows):?>
                            <?php 
                                if($rows['status_message']=='Activo ahora')
                                {
                                    echo '<div class="wp-2 h-2 pcp rounded-full"></div><br>';
                                }
                                else
                                {
                                    echo '<div class="wp-2 h-2 pco rounded-full"></div><br>';
                                }
                            ?>
                            <div class="ci">
                                <ul><li class="text-sm gk text-slate-800"><?php echo $rows['first_name']?></li></ul>
                                <?php 
                                if($rows['status_message']=='Activo ahora'){
                                    echo '<ul><li class="gb text-slate-500 gk">Activo ahora</li></ul>';
                                }
                                else
                                {
                                    echo '<ul><li class="gb text-slate-500 gk">Inactivo</li></ul>';
                                }
                                ?>
                            </div>
                        <?php endforeach;?>
                    <?php else:?>
                        <?php 
                            $query = $this->db->where('admin_id',$send_id)->get('admin')->result_array();
                        ?>
                        <img class="uu of rounded-full mr-2"  src="<?php echo $this->crud->obtenerFotoAdmim($send_id);?>" alt="User 04" width="40" height="40">
                        <?php foreach($query as $rows):?>
                            <?php 
                                if($rows['status_message']=='Activo ahora'){
                                    echo '<div class="wp-2 h-2 pcp rounded-full"></div><br>';
                                }
                                else
                                {
                                    echo '<div class="wp-2 h-2 pco rounded-full"></div><br>';
                                }
                            ?>
                            <div class="ci">
                                <ul><li class="text-sm gk text-slate-800"><?php echo $rows['first_name']?></li></ul>
                                <?php 
                                if($rows['status_message']=='Activo ahora'){
                                    echo '<ul><li class="gb text-slate-500 gk">Activo ahora</li></ul>';
                                }
                                else
                                {
                                    echo '<ul><li class="gb text-slate-500 gk">Inactivo</li></ul>';
                                }
                                ?>
                            </div>
                            <?php endforeach; ?>  
                        <?php endif;?>
                </div>
            </div>
            <div class="flex">
                <button id="addhis" class="vp ap rounded border border-slate-200 hover--border-slate-300 bw r_">
                    <svg class="ue on db yu" viewBox="0 0 16 16">
                       <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!--------------------------------Chat----------------------------------------->
    <div class="ad vd jd zx mu" id="msgchat">
        <?php
            foreach ($messages as $row):
                $sender = explode('-', $row['sender']);
                $sender_account_type = $sender[0];
                $sender_id = $sender[1];
            ?>
            <?php if($row['sender'] != $current_user):?>
                <?php $recievers = $row['sender'];?>
                <div class="flex fd rw wj">
                    <img class="rounded-full mr-4" src="<?php echo $this->crud->obtenerFotoAdmim($sender_id);?>" alt="User 01" width="40" height="40"> 
                    <div>
                        <div class="flex items-center">
                            <?php if($row['message'] != '' && $row['file_name'] == '' ):?>
                                <div class="text-sm bg-white text-slate-800 vf cl cg border border-slate-200 shadow-md rx"> <?php echo $row['message']; ?> </div>
                            <? endif;?>    
                                <?php if($row['message'] != '' && $row['file_name'] != '' ):?>
                                    <?php
                                        $path = $row['file_name'];
                                        $extension = pathinfo($path, PATHINFO_EXTENSION);
                                    ?>
                                        <?php if($extension == 'pdf' ||$extension == 'docx'):?>
                                            <div class="text-sm bg-white text-slate-800 vf cl cg border border-slate-200 shadow-md rx"> 
                                            <ul>
                                                <li><a class="bu"><?php echo $row['file_name']; ?></a></li>
                                                <li><?php echo $row['message']; ?></li>
                                            </ul>
                                            </div>
                                        
                                        <?php endif;?>
                                        <?php if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'):?>
                                            <div class="text-sm bg-white text-slate-800  cl cg border border-slate-200 shadow-md rx">
                                                <ul>
                                                    <li><img class="cl shadow-md rx" src="<?php echo base_url();?>public/uploads/archive/<?php echo $row['file_name'];?>" alt="Chat image" width="250" height="190"></li>
                                                    <li><div>&nbsp;<?php echo $row['message'];?></div></li>
                                                <ul>
                                            </div>
                                        <?php endif;?>
                                     <a href="<?php echo base_url();?>public/uploads/archive/<?php echo $row['file_name'];?>" download="<?php echo $row['file_name'];?>" class="vp rounded-full border border-slate-200 ix xp wr wu">
                                        <span class="tc">Download</span> 
                                        <svg class="ue on ap db yu" viewBox="0 0 16 16">
                                           <path d="M15 15H1a1 1 0 01-1-1V2a1 1 0 011-1h4v2H2v10h12V3h-3V1h4a1 1 0 011 1v12a1 1 0 01-1 1zM9 7h3l-4 4-4-4h3V1h2v6z"></path>
                                        </svg>
                                     </a>
                            <? endif;?>
                        </div>
                        <?php 
                            $hora = explode(' ',$row['timestamp']); 
                        ?>
                        <div class="flex items-center fg">
                                <div class="gb text-slate-500 gk"><?php echo $hora[1];?></div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <?php if($row['sender'] == $current_user):?>
                <?php $recievers = $this->db->get_where('message_thread', array('message_thread_code' => $current_message_thread_code))->row()->reciever;?>
                <div style="width:100%;display:flow-root">
                    <div class="flex fd rw wj" style="float:right"> 
                        <img class="rounded-full mr-4" src="<?php echo $this->crud->obtenerFotoAdmim($sender_id);?>" alt="User 01" width="40" height="40">
                        <div>
                            <div class="flex items-center">
                            <?php if($row['message'] != '' && $row['file_name'] == '' ):?>
                                <div class="text-sm hb yo vf cl cg border he shadow-md rx"> <?php echo $row['message']; ?> </div>
                            <? endif;?>    
                                <?php if($row['message'] != '' && $row['file_name'] != '' ):?>
                                    <?php
                                        $path = $row['file_name'];
                                        $extension = pathinfo($path, PATHINFO_EXTENSION);
                                    ?>
                                        <?php if($extension == 'pdf' ||$extension == 'docx'):?>
                                            <div class="text-sm hb yo vf cl cg border he shadow-md rx"> 
                                                <ul>
                                                    <li><a class="bu" href="<?php echo base_url();?>public/uploads/archive/<?php echo $row['file_name'];?>" download="<?php echo $row['file_name'];?>"><?php echo $row['file_name']; ?></a></li>
                                                    <li><?php echo $row['message']; ?></li>
                                                </ul>
                                            </div>
                                        <?php endif;?>
                                        <?php if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'):?>
                                            <div class="text-sm hb yo cl cg border he shadow-md rx">
                                                <ul>
                                                    <li><img class="cl shadow-md rx" src="<?php echo base_url();?>public/uploads/archive/<?php echo $row['file_name'];?>" alt="Chat image" width="250" height="190"></li>
                                                    <li><div>&nbsp;<?php echo $row['message'];?></div></li>
                                                </ul>
                                            </div>
                                        <?php endif;?>
                                     <a href="<?php echo base_url();?>public/uploads/archive/<?php echo $row['file_name'];?>" download="<?php echo $row['file_name'];?>" class="vp rounded-full border border-slate-200 ix xp wr wu">
                                        <span class="tc">Download</span> 
                                        <svg class="ue on ap db yu" viewBox="0 0 16 16">
                                           <path d="M15 15H1a1 1 0 01-1-1V2a1 1 0 011-1h4v2H2v10h12V3h-3V1h4a1 1 0 011 1v12a1 1 0 01-1 1zM9 7h3l-4 4-4-4h3V1h2v6z"></path>
                                        </svg>
                                     </a>
                                 <? endif;?>
                            </div>
                            <div class="flex items-center fg">
                                <?php 
                                    $hora = explode(' ',$row['timestamp']); 
                                ?>
                                <div class="gb text-slate-500 gk"><?php echo $hora[1]?></div>
                            </div>
                        </div>    
                    </div>
                </div><br>
            <?php endif;?>
            <?php endforeach;?>
           <div></div> 
    </div>
    <!---------------------------------------------End chat------------------------------------------------------------>
    <div class="tv ty">
        <div class="flex items-center fg bg-white ck border-slate-200 vd jd zx op">
            <?php echo form_open(base_url() . 'specialyst/message/send_reply/' . $current_message_thread_code, array('enctype' => 'multipart/form-data', 'class' => 'ad flex')); ?>
                <input type="hidden" name="reciever" value="<?php echo $recievers;?>">
                 <input type="file" name="file_name" id="file-3" style='display:none' onchange="onLoadImage_s(event.target.files)" >
                    <label class="ap yu xm rk" for="file-3" id="viewaction">
                        <svg class="urr oo db" viewBox="0 0 24 24">
                            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12C23.98 5.38 18.62.02 12 0zm6 13h-5v5h-2v-5H6v-2h5V6h2v5h5v2z"></path>
                        </svg>
                    </label>
                 <label id="ocultaction" style="display:none">Archivo:<b><div class="text__limit" id="imgName_s">Niguno...</div></b></label> 
              
                &nbsp;
                 <div class="ad rk"> <label for="message-input" class="tc">Type a message</label>
                    <textarea name="message"  required="" class="tn oq hy he kr kn" id="input-field" style="height:52px" type="text" placeholder="Escribir mensaje..." ></textarea>
                 </div>
                 <button type="submit" class="btn hb xs yo co">Enviar -&gt;</button>
            <?php echo form_close();?>
        </div>
    </div>
    <!----------------------------------------------Historial--------------------------------------------------------------------->
    <div class="tp tm kz ny fe bx ws wf wc" id="hist_arch" style='display:none'>
        <div class="tv np hq ct ce ta ap cq border-slate-200 oq _k ox">
            <button onclick="Closex()" class="tp tk tw ir ik kp vc">
                <svg class="ue on dx kd" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path d="m7.95 6.536 4.242-4.243a1 1 0 1 1 1.415 1.414L9.364 7.95l4.243 4.242a1 1 0 1 1-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 0 1-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 0 1 1.414-1.414L7.95 6.536Z"></path>
                </svg>
            </button>
            <div class="vv vd tto">
                <div class="as ri teb">
                    <div class="text-slate-800 g_ gp rx">Archivos</div>
                    <div class="ir">
                        <div class="text-sm g_ text-slate-800 in">Archivos compartidos</div>
                        <table class="av oq">
                               <!-- Table header -->
                                <thead class="gb gq yu">
                                  <tr class="flex flex-wrap qm md:flex-no-wrap">
                                     <th class="oq hidden qb qv vg">
                                        <div class="g_ gd"></div>
                                     </th>
                                  </tr>
                                </thead>
                                <!-- Table body -->
                                <tbody class="text-sm">
                                    <!-- Row -->
                                    <?php 
                                       
                                        $this->db->where('file_name !=', ""); 
                                        $this->db->where('message_thread_code', $current_message_thread_code); 
                                        $files = $this->db->get('message');
                                    ?>
                                    <?php if($files->num_rows() > 0):?>
                                        <?php foreach($files->result_array() as $file):?>
                                            <?php
                                                $path = $file['file_name'];
                                                $extension = pathinfo($path, PATHINFO_EXTENSION);
                                            ?>
                                            <?php if($extension == 'pdf' || $extension == 'docx'):?>
                                                <tr class="flex flex-wrap qm md:flex-no-wrap cx border-slate-200 vg zy">
                                                    <td class="oq block qb qv vy zb">
                                                        <div class="text-sm gk text-indigo-500 xd"><?php echo $file['file_name']?></div>
                                                    </td>
                                                    <td class="oq block qb qv vy zb">
                                                        <div class="gd flex items-center zs">
                                                           <span class="block ut on hw rs" aria-hidden="true"></span>
                                                           <a class="gk text-indigo-500 xd" href="<?php echo base_url();?>public/uploads/archive/<?php echo $file['file_name'];?>" download="<?php echo $file['file_name'];?>" ><?php echo $extension?></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    <?php else:?>
                                <center><span>Sin archivos compartidos</span>😞</center>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
                    
                    <div class="ir">
                        <div class="text-sm g_ text-slate-800 in">Fotos compartidas</div>
                        <div class="ie">
                            <?php 
                                //$cons = $this->users->viewhist($current_message_thread_code);
                               
                                $this->db->where('file_name !=', ""); 
                                $this->db->where('message_thread_code', $current_message_thread_code); 
                                $image = $this->db->get('message');
        
                            ?>
                            <?php if($image->num_rows() > 0):?>
                                <?php foreach($image->result_array() as $img):?>
                                    <?php 
                                        $path = $img['file_name'];
                                        $extension = pathinfo($path, PATHINFO_EXTENSION);
                                    ?>
                                    <?php if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'):?>
                                        <div class="nk _s ttj bg-white by rounded-sm border border-slate-200 lq">
                                            <div class="flex fh or">
                                                <img class="oq" src="<?php echo base_url();?>public/uploads/archive/<?php echo $img['file_name'];?>" alt="Application 01" width="186" height="60"> 
                                            </div>
                                        </div>                
                                    <?php endif?>
                                <?php endforeach;?>
                            <?php else:?>
                                <center><span>Sin fotografías compartidas</span>😞</center>
                            <?php endif;?>
                    
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script type="text/javascript">
    $(function(){
        $('#viewaction').click(function(){
            $('#ocultaction').show();
        });
        $('#hide').click(function(){
            $('#ocultaction').hide();
        });
    })
    function Closex(){
        document.getElementById('hist_arch').style.display = "none"; 
    }
            $(document).ready(function(){
                $("#addhis").on("click", function(){
                //alert('Se hizo click');
                document.getElementById('hist_arch').style.display = ""; 
            });
        }); 
 
</script>