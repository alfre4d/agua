<div class="gm bf hy ys" :class="{ 'sidebar-expanded': sidebarExpanded }" x-data="{ page: 'messages', sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true', msgSidebarOpen: false }" x-init="() => { $refs.contentarea.scrollTop = 99999999 }; $watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <main>
        <div class="td flex">
            <div id="profile-sidebar" class="tp ny tk ty oq qb jj qn qr sp qq fe ws wf wc -translate-x" :class="profileSidebarOpen ? 'translate-x-0' : '-translate-x-full'">
                <div class="tv np bg-white ct ce ta ap cj border-slate-200 qj tnu ox">
                    <div class="tv tk nv">
                        <div class="flex items-center bg-white cx border-slate-200 mn op">
                            <div class="oq flex items-center fg">
                                <div class="td" x-data="{ open: false }">
                                    <button class="ad flex items-center ci" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open" aria-expanded="false">
                                        <img class="uu of rounded-full mr-2" src="<?php echo base_url();?>public/uploads/images/group.png" alt="Group 01" width="32" height="32"> 
                                        <div class="ci"> <span class="g_ text-slate-800">Grupos</span> <?php echo $data['admin_id']?></div>
                                        <svg class="w-3 h-3 ap rq db yu" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                        </svg>
                                    </button>
                              
                                    <div class="am nv tp tq tb uz bg-white border border-slate-200 ms rounded by lq iu" @click.outside="open = false" @keydown.escape.window="open = false" x-show="open" x-transition:enter="wr wh wf fe" x-transition:enter-start="opacity-0 aw" x-transition:enter-end="bv ax" x-transition:leave="wr wh wf" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" style="display: none;">
                                        <ul>                                  
                                            <li>
                                                <a class="gk text-sm ys xy block ms me" href="<?php echo base_url();?>accountant/message" @click="open = false" @focus="open = true" @focusout="open = false"> 
                                                    <div class="flex items-center fg">
                                                        <div class="ad flex items-center ci">
                                                            <img class="ul oh rounded-full mr-2" src="<?php echo base_url();?>public/uploads/images/chat_prin.png" alt="Channel 02" width="28" height="28"> 
                                                            <div class="ci">Chats</div>
                                                        </div>
                                                    </div>
                                                </a> 
                                            </li>
                                            <li>
                                                <a class="gk text-sm ys xy block ms me" href="<?php echo base_url(); ?>accountant/group" @click="open = false" @focus="open = true" @focusout="open = false"> 
                                                    <div class="flex items-center fg">
                                                        <div class="ad flex items-center ci">
                                                            <img class="ul oh rounded-full mr-2" src="<?php echo base_url();?>public/uploads/images/group.png" alt="Channel 01" width="28" height="28"> 
                                                            <div class="ci">Grupos</div>
                                                        </div>
                                                        <svg class="w-3 h-3 ap db text-indigo-500 rq" viewBox="0 0 12 12">
                                                            <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z"></path>
                                                        </svg>
                                                    </div>
                                                </a> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>                              
                        </div>
                    </div>
                        <div class="mn mr" id="bloqueA">
                          
                                 <br>
                                 <?php  $group_messages = $this->db->get('group_message_thread')->result_array();?>
                                 <?php if(empty($group_messages)): ?>
                                 <center>
                                   <div  class="gb g_ yu gq it">Aún no se han creado grupos</div>
                                <img src="<?php echo base_url();?>public/uploads/images/404-illustration.svg" alt="404 illustration" width="176" height="176">
                                 </center>
                                 <?php else:?>
                                 <center>
                                 <div class="gb g_ yu gq it">Grupos en directo</div>
                                 </center>
                                 <div id="myDiv">
                                <div class="ij ">
                                    <?php if (sizeof($group_messages) > 0) :
                                        foreach ($group_messages as $row) :
                                    ?>
                                            <a href="<?php echo base_url('accountant/group/group_message_read/' . $row['group_message_thread_code']); ?>/">
                                                <div class="nz" style="<?php if (isset($current_message_thread_code) && $current_message_thread_code == $row['group_message_thread_code']) echo 'background:#e0e7ff;color:black;border-radius:10px;';?>">
                                                        <td class="vc co qw">
                                                            <div class="flex items-center">
                                                                <div class="nz">
                                                                    <div  class="user-info">
                                                        <div style="border-radius: 25px; border: 3px solid #8881ff; padding: 8px; width: 45px; height: 45px; text-align: center;"><?php echo strtoupper($row['group_name'][0]); ?></div>
                                                        </div>
                                                                </div>
                                                                  &nbsp;&nbsp;
                                                                <div  class="cii" title="<?php echo $row['group_name'] ?>">
                                                                <div class="gk text-slate-890"><?php echo ucfirst($row['group_name']);?> </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    
                                                        <div style="position:absolute;left:70px;margin-top:-20px;margin-left:25px;margin-top:-28px;" >
                                                  
                                                    <a style="display: inline-block;"  href="#0" onClick="delete_group('<?php echo $row['id']?>');" ><i class="picons-thin-icon-thin-0057_bin_trash_recycle_delete_garbage_full" style="color:black;font-size:15px"></i>
                                                    </a>
                                                        </div>
                                                        <hr style="border-top: 1px solid #ccc;">
                                               </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            <?php include $message_inner_page_name. '.php'; ?>
        </div>
    </main>
</div>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
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
    
    function delete_group(id){
        Swal.fire({
            title: "¿Estás seguro?",
            text: "Se eliminará toda la información del grupo",
            icon: 'question',
            iconColor: 'red',
            showCancelButton: true,
            confirmButtonText: "Si, eliminar",
            cancelButtonText: "Cancelar",
        }).then(resultado => {
            if (resultado.value) {
                Swal.fire({
                    title: 'Eliminando información',
                    type: 'success',
                    icon: 'success',
                    titleTextColor: '#000',
                    html: 'Esta ventana se cerrará en <strong></strong>.',
                    timer: 5000,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                        Swal.getContent().querySelector('strong').textContent = Swal
                            .getTimerLeft()
                        }, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                        }
                })
                location.href ="<?php echo base_url();?>accountant/group/delete_group/<?php echo $row['group_message_thread_code']; ?>/"+id;
            }
        })
    }
    </script>
    