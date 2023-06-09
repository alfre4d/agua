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
                    <h4><?php echo ('Crear nuevo grupo'); ?></h4>
                </strong>
            </div>
        </div>
    
    </div>
    <br>
    
    <?php echo form_open(base_url().'/admin/group/create_group/');?>
    <div style="margin: auto; display: block;">
        <input id="error" style="height: 50px;" class="tn oq ho" type="text" name="group_name" required="" placeholder="Escribe el nombre del grupo" />
    </div>
    &nbsp;
            <div class="td">
               <label for="action-search" class="tc">Search</label> <input id="myInput" class="oq cw ks bl fu vm mh mk" type="search" placeholder="Buscar…"> 
               <button class="tp tm tg kp" type="submit" aria-label="Search">
                  <svg class="ue on ap db yu kv ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                     <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                     <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                  </svg>
               </button>
            </div>
     
     &nbsp;            
    <div class="bg-white by rounded-sm border border-slate-200 ry">
        <div class="lz">
           
                        <?php
                        //$user_array= ['administrador','contador','especialista'];
                        $user_array = ['admin'];
                        for ($i = 0; $i < sizeof($user_array); $i++):
                       //$user_list = $this->db->get_where('admin', array('role' => $user_array[$i]))->result_array();
                       
                       $this->db->order_by('role', 'ASC');
                       $user_list = $this->db->get($user_array[$i])->result_array();
                        ?>
                <hr style="height:80%;text-align:left;margin-left:0; color:red;">
            <div >
               
                <table id="myTable" class="av oq lg lb">
                
                <header class="mn mr">
                    <h2 class="g_ text-slate-800">Usuarios registrados <span class="yu gk">
                    <?php
                        $users_registers = $this->db->query("SELECT COUNT(*) as Total FROM admin")->row_array();
                        echo $users_registers['Total'];
                    ?>
                    </span></h2>
                </header>
                
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
                        <tr>
                            <th class="v_ wk xe vm co"><div class="g_ gh">Seleccionar</div></th>
                            <th class="v_ wk xe vm co"><div class="g_ gh">Nombre</div></th>
                            <th class="v_ wk xe vm co"><div class="g_ gh">Roles</div></th>
                        </tr>
                    </thead>

                    <tbody class="text-sm" x-data="{ open: false }">
                        <?php foreach ($user_list as $user) : ?>
                        <?php if($user['admin_id']!= $this->session->userdata('login_user_id')):?>
                        <tr>
                            <td class="v_ wk xe vm co ut">
                                <div class="flex items-center">
                                    <label class="inline-flex">
                                        <span class="tc">Select</span>
                                        <input type="checkbox" class="<?php echo $user_array[$i]; ?> table-item to" name="user[]" value="<?php echo $user_array[$i] . '_' . $user[$user_array[$i] . '_id']; ?>" />
                                    </label>
                                </div>
                            </td>
                            <td class="v_ wk xe vm co">
                                <div ><?php echo $user['first_name'].' '.$user['last_name'] ?></div>
                            </td>
                            
                            <td class="v_ wk xe vm co">
                                
                                <?php if($user['role']=='Contador'){ ?>
                                    <div class="inline-flex gk hy text-slate-500 rounded-full gp vk vy"><?php echo $user['role']?></div>
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
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <?php endfor;?>
        </div>
        <div class="pull-right">
        <br>
        <button type="submit" name="submit" class="btn hb xs yo"><?php echo ('Crear grupo'); ?></button>
    </div>
    </div>
    
    <?php echo form_close();?>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
</script>

<script type="text/javascript">
    function checkAllBoxes(check) {
        var checkboxes = document.getElementsByTagName("input");
        if (check.checked) {
            $("." + check.id).prop("checked", true);
        } else {
            $("." + check.id).prop("checked", false);
        }
    }
     var table =  $('#myTable').DataTable();
        $('#myInput').on( 'keyup', function () {
        table.search( this.value ).draw();
        });
</script>
    
            

                                           


