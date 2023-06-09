<?php
    $group_info = $this->db->get_where('group_message_thread', array('group_message_thread_code' => $current_message_thread_code))->row_array();
    $group_members = json_decode($group_info['members']);
    //var_dump($group_members);
?>
    <div class="vd jd tto vv oq ar ri">
        <div class="flex items-center">
        <button class="qg yu xm mr-4" @click.stop="profileSidebarOpen = !profileSidebarOpen" aria-controls="profile-sidebar" :aria-expanded="profileSidebarOpen" aria-expanded="false">
            <span class="tc">Close sidebar</span>
            <svg class="ur oo db" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"></path>
            </svg>
        </button>
        
        <div class="chat-head">
            <div class="user-actions">
                <strong>
                    <h4><?php echo ('Actualizar grupo'); ?></h4>
                </strong>
            </div>
        </div>
        
        </div>
        <br>
        
            <form class="" action="<?php echo base_url();?>admin/group/edit_group/<?php echo $current_message_thread_code;?>" method="post">
                        <div style="margin: auto; display: block;">
                        <input id="error" style="height: 50px;" class="tn oq ho" type="text" name="group_name" value="<?php echo $group_info['group_name'];?>"  />
                        </div>
                        &nbsp;
                        <div class="bg-white by rounded-sm border border-slate-200 ry">
                        <div x-data="handleSelect">
                        <?php
                            //$user_array = ['1','2','3'];
                            $user_array =['admin'];
                            for ($i=0; $i < sizeof($user_array); $i++):
                            //$user_list = $this->db->get_where('admin',array('type'=>$user_array[$i]))->result_array();
                            $this->db->order_by('role', 'ASC');
                            $user_list = $this->db->get($user_array[$i])->result_array();
                        ?>
                         <hr style="height:80%;text-align:left;margin-left:0; color:red;">
                            <div class="lz">
                            <table class="av oq lg lb">
                                <h4 class="col-md-6" style="color: #000; text-align: left; padding: 0; margin: 0;">
                                <b><?php //echo $this->crud->getType($i); ?></b>
                                </h4>
                                <thead class="gb gq text-slate-500 hq ck border-slate-200">
                                    <tr>
                                        <th class="v_ wk xe vm co ut">
                                    <div>
                                        <label class="inline-flex">
                                            <span class="tc">Select all</span> <input class="to" type="checkbox" id="<?php echo $user_array[$i]; ?>" onchange="checkAllBoxes(this)" />&nbsp;<?php echo ('Seleccionar todo'); ?>
                                        </label>
                                    </div>
                                </th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th class="v_ wk xe vm co"><div class="g_ gh">Seleccionar</div></th>
                                        <th class="v_ wk xe vm co"><div class="g_ gh">Nombre</div></th>
                                        <th class="v_ wk xe vm co"><div class="g_ gh">Roles</div></th>
                                    </tr>
                                </thead class="text-sm" x-data="{ open: false }">
                                    <?php foreach ($user_list as $user):?>
                                    <?php if($user['admin_id']!= $this->session->userdata('login_user_id')):?>
                                <tr>
                                    <td class="v_ wk xe vm co ut">
                                    <div class="flex items-center">
                                        <label class="inline-flex">
                                            <span class="tc">Select</span>
                                            <input type="checkbox" class="<?php echo $user_array[$i];?> table-item to" name="user[]" value="<?php echo $user_array[$i] . '_' . $user[$user_array[$i] . '_id']; ?>" 
                                                        <?php
                                                    for ($j = 0; $j < sizeof($group_members); $j++) 
                                                    {
                                                        if ($group_members[$j] == $user_array[$i].'_'.$user[$user_array[$i].'_id']) 
                                                        {
                                                            echo 'checked';
                                                            break;
                                                        }
                                                    }
                                                        ?>
                                            />
                                        </label>
                                    </div>
                                </td>
                                    <td class="v_ wk xe vm co">
                                    <div><?php echo $user['first_name'].' '.$user['last_name'] ?></div>
                                </td>
                                <td class="v_ wk xe vm co">
                                    <?php if($user['role']=='Contador'){ ?>
                                        <div class="gb inline-flex gk hy text-slate-500 rounded-full gp vk mt"><?php echo $user['role']?></div>
                                    <?php }?>
                
                                    <?php if($user['role']=='Especialista'){ ?>   
                                        <div class="gb inline-flex gk po yb rounded-full gp vk mt"><?php echo $user['role']?></div>
                                    <?php }?>
                                             
                                    <?php if($user['role']=='Administrador'){ ?>   
                                        <div class="gb inline-flex gk pi text-indigo-600 rounded-full gp vk mt"><?php echo $user['role']?></div>
                                    <?php }?>
                                </td>
                                </tr>
                                <?php endif;?>
                            <?php endforeach ?>
                        </table>
                   
                    <?php endfor; ?>
                    </div>
                    <div class="pull-right">
                         <br>
                        <button type="submit" name="submit" class="btn hb xs yo"><?php echo ('Actualizar');?></button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
                                           
    
    <script type="text/javascript">
    function checkAllBoxes(check)
    {
        var checkboxes = document.getElementsByTagName("input");
        if (check.checked) {
            $("." + check.id).prop("checked", true);
        } else {
            $("." + check.id).prop("checked", false);
        }
    }
</script>
