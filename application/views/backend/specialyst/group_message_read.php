<style>
    .modal{
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: 1;
    /*background-color:rgb(245, 245, 245) ;*/
    opacity: 0;
    visibility: hidden;
    transform: scale(1.1);
    transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;

}
.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 1rem 1.5rem;
    width: 24rem;
    border-radius: 0.5rem;
    border: 1px solid color #7c7c7c;
    padding: 10px;
    box-shadow: 1px 10px 18px #636363;
}

@media screen and (max-width: 600px) {
.modal{
    position: fixed;
    left: 0px;
    top: -150px;
    width: 105%;
    height: 105%;
    opacity: 1;
    /*background-color:rgb(245, 245, 245) ;*/
    opacity: 0;
    visibility: hidden;
    transform: scale(1.1);
    transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;  
    overflow-x:scroll;
    margin-left: 3px;
    margin-right: 3px;

}
}
.close-button {
    font-size: 25px;
    float: right;
    width: 1.5rem;
    line-height: 1.5rem;
    text-align: center;
    cursor: pointer;
    border-radius: 0.25rem;
    background-color: white;
}
.show-modal {
    opacity: 1;
    visibility: visible;
    transform: scale(1.0);
    transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}
</style>
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
                <a class="back-to-index d-xl-none d-md-none megasize" href="<?php echo base_url(); ?>specialyst/group/"><i class="icon-feather-chevron-left"></i></a>
                <div>
                    <strong>
                        <div>
                    <h1 style="float:rigth;"><?php echo ucfirst($this->db->get_where('group_message_thread', array('group_message_thread_code' => $current_message_thread_code))->row()->group_name);?></h1>
                        </div>
                    </strong>

                    <div class="nz">
                        <div class="gb inline-flex gk ps yy rounded-full gp vk mt">
                            <a id="add_info" class="trigger" href="javascript:void(0)" >
                                <?php echo ('Miembro del grupo'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
                <div class="flex">
                <button id="add_historial" class="vp ap rounded border border-slate-200 hover--border-slate-300 bw r_">
                    <svg class="ue on db yu" viewBox="0 0 16 16">
                       <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="ad vd jd zx mu" id="msgchat">
        <?php
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id'); $this->db->order_by('group_message_id','asc'); $messages = $this->db->get_where('group_message',
        array('group_message_thread_code' => $current_message_thread_code))->result_array(); ?>
       <?php if(empty($messages)):?>
       <br><br><br><br>
            <center><div class="gp vd">
                            <div class="inline-flex ry">
                                <img src="<?php echo base_url();?>public/uploads/images/auth-decoration.png" alt="Authentication decoration" width="218" height="224"alt="404 illustration" width="176" height="176">
                            </div>
                            <div class="rb">¡Sé el primero en escrbir mensaje en el grupo!</div>
                        </div><center> 
           <?php  else:?>
       <?php foreach ($messages as $row) : $sender = explode('-', $row['sender']); $sender_account_type = $sender[0]; $sender_id = $sender[1]; ?>
        <?php if ($row['sender'] != $current_user) : ?>
        <?php $recievers = $row['sender']; ?>
        <div class="flex fd rw wj fullw">
            <img class="rounded-full mr-4" src="<?php echo $this->crud->obtenerFotoAdmim($sender_id);?>" alt="User 01" width="40" height="40" />
            <div>
                <div class="flex items-center">
                <?php if($row['message'] != '' && $row['attached_file_name'] == '' ):?>
                <div class="text-sm bg-white text-slate-800 vf cl cg border border-slate-200 shadow-md rx"> <?php echo $row['message']; ?> </div>
                <? endif;?> 
                    <?php if($row['message'] != '' && $row['attached_file_name'] != '' ):?>
                                    <?php
                                        $path = $row['attached_file_name'];
                                        $extension = pathinfo($path, PATHINFO_EXTENSION);
                                    ?>
                                        <?php if($extension == 'pdf' ||$extension == 'docx'):?>
                                            <div class="text-sm bg-white text-slate-800 vf cl cg border border-slate-200 shadow-md rx"> 
                                            <ul>
                                                <li><a target="_blank" href="<?php echo base_url(); ?>public/uploads/group_messaging_attached_file/<?php echo $row['attached_file_name']; ?>" class="bu"><?php echo $row['attached_file_name']; ?></a></li>
                                                <li><?php echo $row['message']; ?></li>
                                            </ul>
                                            </div>
                                        <?php endif;?>    
                                        <?php if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'):?>
                                            <div class="text-sm bg-white text-slate-800  cl cg border border-slate-200 shadow-md rx">
                                                <ul>
                                                    <li><img class="cl shadow-md rx" src="<?php echo base_url();?>public/uploads/group_messaging_attached_file/<?php echo $row['attached_file_name'];?>" alt="Chat image" width="250" height="190"></li>
                                                    <li><div>&nbsp;<?php echo $row['message'];?></div></li>
                                                <ul>
                                            </div>
                                        <?php endif;?>
                                     <a href="<?php echo base_url();?>public/uploads/group_messaging_attached_file/<?php echo $row['attached_file_name'];?>" download="<?php echo $row['attached_file_name'];?>" class="vp rounded-full border border-slate-200 ix xp wr wu">
                                        <span class="tc">Download</span> 
                                        <svg class="ue on ap db yu" viewBox="0 0 16 16">
                                           <path d="M15 15H1a1 1 0 01-1-1V2a1 1 0 011-1h4v2H2v10h12V3h-3V1h4a1 1 0 011 1v12a1 1 0 01-1 1zM9 7h3l-4 4-4-4h3V1h2v6z"></path>
                                        </svg>
                                     </a>
                            <? endif;?>
                </div>
                <div class="chat-message-date">
                    <div class="nz">
                        <div class="gb inline-flex gk pi text-indigo-600 rounded-full gp vk mt"><?php echo $this->crud->get_name( $sender_id); ?></div>
                        </div>
                </div>
                <div class="flex items-center fg">
                    <div class="gb text-slate-500 gk"><?php echo $row['timestamp'];?></div>
                </div>
            </div>
        </div>
        
        <?php endif; ?>
        <?php if ($row['sender'] == $current_user) : ?>
        <div style="width: 100%; display: flow-root;">
            <div class="flex fd rw wj" style="float: right;">
                <img class="rounded-full mr-4" src="<?php echo $this->crud->obtenerFotoAdmim($sender_id);?>" alt="User 01" width="40" height="40" />
                <div>
                  <div class="flex items-center">
                            <?php if($row['message'] != '' && $row['attached_file_name'] == '' ):?>
                                <div class="text-sm hb yo vf cl cg border he shadow-md rx"> <?php echo $row['message']; ?> </div>
                            <? endif;?>    
                                <?php if($row['message'] != '' && $row['attached_file_name'] != '' ):?>
                                    <?php
                                        $path = $row['attached_file_name'];
                                        $extension = pathinfo($path, PATHINFO_EXTENSION);
                                    ?>
                                        <?php if($extension == 'pdf' ||$extension == 'docx'):?>
                                            <div class="text-sm hb yo vf cl cg border he shadow-md rx"> 
                                                <ul>
                                                    <li><a class="bu"><?php echo $row['attached_file_name']; ?></a></li>
                                                    <li><?php echo $row['message']; ?></li>
                                                </ul>
                                            </div>
                                        <?php endif;?>
                                        <?php if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'):?>
                                            <div class="text-sm hb yo cl cg border he shadow-md rx">
                                                <ul>
                                                    <li><img class="cl shadow-md rx" src="<?php echo base_url();?>public/uploads/group_messaging_attached_file/<?php echo $row['attached_file_name'];?>" alt="Chat image" width="250" height="190"></li>
                                                    <li><div>&nbsp;<?php echo $row['message'];?></div></li>
                                                </ul>
                                            </div>
                                        <?php endif;?>
                                     <a href="<?php echo base_url();?>public/uploads/group_messaging_attached_file/<?php echo $row['attached_file_name'];?>" download="<?php echo $row['attached_file_name'];?>" class="vp rounded-full border border-slate-200 ix xp wr wu">
                                        <span class="tc">Download</span> 
                                        <svg class="ue on ap db yu" viewBox="0 0 16 16">
                                           <path d="M15 15H1a1 1 0 01-1-1V2a1 1 0 011-1h4v2H2v10h12V3h-3V1h4a1 1 0 011 1v12a1 1 0 01-1 1zM9 7h3l-4 4-4-4h3V1h2v6z"></path>
                                        </svg>
                                     </a>
                                 <? endif;?>
                            </div>  
                           
                            <div class="chat-message-date">
                                 <div class="nz">
                                        <div class="gb inline-flex gk ps yy rounded-full gp vk mt"><?php echo $this->crud->get_name($sender_id); ?></div>
                                    </div>
                                    </div>
                    <div class="flex items-center fg">
                    <div class="gb text-slate-500 gk"><?php echo $row['timestamp'];?></div>
                </div>
                    
                </div>
            </div>
        </div>
        <br />
        <?php endif; ?>
        <?php endforeach; ?>
        <div></div>
        <?php endif;?>
    </div>

    <div class="tv ty">
        <div class="flex items-center fg bg-white ck border-slate-200 vd jd zx op">
            <?php echo form_open(base_url() . 'specialyst/group/send_reply/' . $current_message_thread_code, array('enctype' =>
            'multipart/form-data','class' => 'ad flex')); ?>
            <input type="hidden" name="reciever" value="<?php echo $recievers; ?>" />

            <input type="file" name="attached_file_on_messaging" id="file-3" style="display: none;" onchange="onLoadImage_s(event.target.files)" />
            <label class="ap yu xm rk" for="file-3" id="view_action">
                <svg class="urr oo db" viewBox="0 0 24 24">
                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12C23.98 5.38 18.62.02 12 0zm6 13h-5v5h-2v-5H6v-2h5V6h2v5h5v2z"></path>
                </svg>
            </label>
            <label id="occult_btn_file" style="display:none;">
                Archivo:<b><div class="text__limit" id="imgName_s">Niguno...</div></b>
            </label>
            &nbsp;

            <div class="ad rk">
                <label for="message-input" class="tc">Type a message</label>
                <textarea name="message" required="" class="tn oq hy he kr kn" id="input-field" style="height: 52px;" type="text" placeholder="Escribir mensaje..."></textarea>
            </div>
            <button type="submit" class="btn hb xs yo co">Enviar -&gt;</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

    <div class="group_info">
    <?php
    $group_info = $this->db->get_where('group_message_thread', array('group_message_thread_code' => $current_message_thread_code))->row_array();
    $group_members  = json_decode($group_info['members']);
    ?>   
    <div class="modal">
        <div style="width: 600px; position: absolute; top: 50%; left: 70%;" class="modal-content">
        <span class="close-button">×</span>
      <center><strong><h1>Información del grupo</h1></strong></center>
             <div class="lz">
            <table  class="av oq lg lb" >
            <h1><strong>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucfirst($this->db->get_where('group_message_thread', array('group_message_thread_code' => $current_message_thread_code))->row()->group_name);?></strong></h1>
                    <thead class="gb g_ gq text-slate-500 hq ck cx border-slate-200">
                        <tr>
                            <th class="v_ wk xe vm co"><?= ('Nombre'); ?></th>
                            <th class="v_ wk xe vm co"><?= ('Roles'); ?></th>
                        </tr>
                    </thead>
                     <?php
                      for ($i = 0; $i < sizeof($group_members); $i++):
                        $user_data = explode('_', $group_members[$i]);
                        $user_type = $user_data[0];
                        $user_id   = $user_data[1];
                    ?>
                    <tbody class="text-sm lg lb">
                        <tr>
                           <td class="v_ wk xe vm co">
                                <div class="flex items-center ci">
                                    <img style="right:20px;" src="<?php echo $this->crud->get_image_url($user_type, $user_id); ?>" class="rounded-full" heigth="40" width="40">
                                    &nbsp;&nbsp;&nbsp;
                                    <div class="ci"><span class="text-sm gk text-slate-800"><?php  echo $this->db->get_where($user_type, array($user_type . '_id' => $user_id))->row()->first_name . " " . $this->db->get_where($user_type, array($user_type . '_id' => $user_id))->row()->last_name; ?></span> </div>
                                </div>
                          </td> 
                          <td class="v_ wk xe vm co"><span><div class="gp"><?php echo $this->db->get_where($user_type, array($user_type . '_id' => $user_id))->row()->role; ?></div></span></td>
                        </tr>
                    </tbody>
                    <?php endfor ?>
                </table>
                </div>
            </div>
        </div>
    </div>

<div class="tp tm kz ny fe bx ws wf wc" id="historial_archivo_foto" style="display: none;">
    <div class="tv np hq ct ce ta ap cq border-slate-200 oq _k ox">
        <button onclick="Closex()" class="tp tk tw ir ik kp vc">
            <svg class="ue on dx kd" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <path d="m7.95 6.536 4.242-4.243a1 1 0 1 1 1.415 1.414L9.364 7.95l4.243 4.242a1 1 0 1 1-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 0 1-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 0 1 1.414-1.414L7.95 6.536Z"></path>
            </svg>
        </button>

        <div class="full-chat-right">
            <div class="user-intro">
                <center>
                    <div class="avatar">
                        <img alt="" src="<?php echo base_url(); ?>public/uploads/<?php echo $this->crud->getInfo('user'); ?>" style="border-radius: 0px;" />
                    </div>
                    <div class="user-intro-info">
                        <h5 class="user-name"><?php echo $this->crud->getInfo('system_title'); ?></h5>
                    </div>
                </center>
            </div>
            <br />
            <div class="chat-info-section">
                <div style="text-align: center;" class="ci-header">
                    <strong>
                        <span><?php echo ('Archivos compartidos'); ?></span>
                    </strong>
                </div>
                <div class="ci-content mCustomScrollbar">
                    <div class="ci-file-list">
                        <?php
                    $this->db->where('attached_file_name !=', ""); $this->db->where('group_message_thread_code', $current_message_thread_code); $files = $this->db->get('group_message'); if ($files->num_rows() > 0) : ?>

                        <ul>
                            <?php foreach ($files->result_array() as $file) : ?>
                            <?php if ($file['file_type'] != "png" && $file['file_type'] != "jpg" && $file['file_type'] != "JPEG" && $file['file_type'] != "GIF") : ?>

                            <li>
                                <a class="text-sm gk text-indigo-500 xd" target="_blank" href="<?php echo base_url(); ?>public/uploads/group_messaging_attached_file/<?php echo $file['attached_file_name']; ?>">
                                    <?php echo $file['attached_file_name']; ?>
                                    <svg style="float: left; margin-left: 20px;" class="ue on ap db yg if rk" viewBox="0 0 16 16">
                                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z"></path>
                                    </svg>
                                </a>
                            </li>

                            <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>

                        <?php else : ?>
                        <br />
                        <center>
                            <span><?php echo ('Sin archivos compartidos'); ?></span>
                            &#128542;
                        </center>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <br />
            <hr style="width:90%; background-color:black" />
            <br />
            <div class="chat-info-section">
                <center>
                    <div class="ci-header">
                        <strong>
                            <span><?php echo ('Fotos compartidas'); ?></span>
                        </strong>
                    </div>
                </center>
                <br />
                <div class="ci-content mCustomScrollbar">
                    <div class="ci-edu-list">
                        <?php
                    $this->db->where('attached_file_name !=', ""); $this->db->where('group_message_thread_code', $current_message_thread_code); $imgs = $this->db->get('group_message'); if ($imgs->num_rows() > 0) : ?>
                        <ul class="w-last-photo js-zoom-gallery">
                            <?php foreach ($imgs->result_array() as $img) : ?>
                            <?php if ($img['file_type'] == "png" || $img['file_type'] == "jpg" || $img['file_type'] == "JPEG" || $img['file_type'] == "GIF") : ?>
                            <li>
                                <center>
                                    <a href="<?php echo base_url(); ?>public/uploads/group_messaging_attached_file/<?php echo $img['attached_file_name']; ?>">
                                        <img
                                            onclick="openModal();currentSlide(4)"
                                            src="<?php echo base_url(); ?>public/uploads/group_messaging_attached_file/<?php echo $img['attached_file_name']; ?>"
                                            style="min-height: 50px; min-width: 50px; object-fit: cover;"
                                        />
                                    </a>
                                </center>
                            </li>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <?php else : ?>

                        <center>
                            <span><?php echo ('Sin fotografías compartidas'); ?></span>
                            &#128542;
                        </center>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
    function Closex() {
        document.getElementById("historial_archivo_foto").style.display = "none";
    }
    $(document).ready(function () {
        $("#add_historial").on("click", function () {
            document.getElementById("historial_archivo_foto").style.display = "";
        });
    });
    
    $(function(){
        $('#view_action').click(function(){
          $('#occult_btn_file').show();
        });
        $('#hide').click(function(){
          $('#occult_btn_file').hide();
        });
      })
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
    function Closes() {
        document.getElementById("info").style.display = "none";
    }
    $(document).ready(function () {
        $("#add_info").on("click", function () {
            document.getElementById("info").style.display = "";
        });
    });
    
    $(function(){
        $('#view_action').click(function(){
          $('#occult_btn_file').show();
        });
        $('#hide').click(function(){
          $('#occult_btn_file').hide();
        });
      })
</script>

<script>
   var modal = document.querySelector(".modal");
var trigger = document.querySelector(".trigger");
var closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);
</script>

