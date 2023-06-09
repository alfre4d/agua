<main>
   <div class="vd jd tto vv oq ar ri">
      <!-- Page header -->
      <div class="_y js jn id">
         <!-- Left: Title -->
         <div class="rw _a">
            <h1 class="gg zj text-slate-800 font-bold">Contratos ✨</h1>
            <?php if (isset($_SESSION['message'])): ?>
                <div x-show="open" x-data="{ open: true }">
                    <div class="vd vg rounded-sm text-sm hz border hr yf" id="alerta">
                        <div class="flex oq fg fd">
                            <div class="flex">
                                <svg class="ue on ap db bp if rk" viewBox="0 0 16 16">
                                    <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z"></path>
                                </svg>
                                <div><?= $_SESSION['message']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
         </div>
         <!-- Right: Actions -->
         <div class="sq fa _j fm ji fy">
            <form class="td">
               <label for="action-search" class="tc">Search</label> <input id="myInput" class="tn mf kn" type="search" placeholder="Buscar…"> 
               <button class="tp tm tg kp" type="submit" aria-label="Search">
                  <svg class="ue on ap db yu kv ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                     <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                     <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                  </svg>
               </button>
            </form>
         </div>
      </div>
      <!-- More actions -->
      <div class="_y js jn id">
         <!-- Left side -->
         <div class="rw _a">
            <ul class="flex flex-wrap -m-1">
               <li class="m-1">
                  <button class="inline-flex items-center justify-center text-sm gk yr rounded-full me mt border he bw hb yo wu wc">Todos <span class="rq text-indigo-200">
                    <?php
                     $clients = $this->db->query("SELECT COUNT(*) as Total FROM clients ")->row_array();
                      echo $clients['Total'];
                     ?>
                  </span></button>
               </li>
            </ul>
         </div>
         <!-- Right side -->
         <div class="sq fa _j fm ji fy">
            <!-- Delete button -->
            <div class="table-items-action hidden">
               <div class="flex items-center">
                  <div class="hidden tnn text-sm gz mr-2 co"><span class="table-items-count"></span> datos seleccionados</div>
                  <button class="btn bg-white border-slate-200 hover--border-slate-300 yl xb">Eliminar</button>
               </div>
            </div>
         </div>
      </div>
      <!-- Table -->
      <div class="bg-white by rounded-sm border border-slate-200 ry">
         <header class="mn mr">
            <h2 class="g_ text-slate-800">Todos <span class="yu gk">
                 <?php
                     $clients = $this->db->query("SELECT COUNT(*) as Total FROM clients")->row_array();
                      echo $clients['Total'];
                     ?>
            </span></h2>
         </header>
         <div x-data="handleSelect">
            <div class="lz">
               <table id="myTable" class="av oq">
                  <thead class="gb g_ gq text-slate-500 hq ck cx border-slate-200">
                     <tr>
                        <th class="v_ wk xe vm co ut">
                           <div class="flex items-center"> <label class="inline-flex"> <span class="tc">Select all</span> <input id="parent-checkbox" class="to" type="checkbox" @click="toggleAll"> </label> </div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gp">No. de suministro</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gp">Tipo de persona</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gp">Cliente</div>
                        </th>
                         <th class="v_ wk xe vm co">
                           <div class="g_ gp">Fecha de creación</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gp">Opciones</div>
                        </th>
                     </tr>
                  </thead>
                  <tbody class="text-sm lg lb">

                     <?php foreach($contract as $clts):?>
                     <tr>
                        <td class="v_ wk xe vm co ut">
                           <div class="flex items-center"> <label class="inline-flex"> <span class="tc">Select</span> <input class="table-item to" type="checkbox" @click="uncheckParent"> </label> </div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div class="gk yj gp"><span class="gk yj gp">#</span><?php echo $clts['supply_number']?></div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div class="gp">
                              
                           <?php if($clts['person_type']=='Jurídica'){ ?>
                             <div class="inline-flex gk hy text-slate-500 rounded-full gp vk vy">
                              
                              <?php }?>

                              <?php if($clts['person_type']=='Natural'){ ?>   
                               <div class="inline-flex gk hz yf rounded-full vk vy">
                              <?php }?>
                              
                              <div><?php echo $clts['person_type']?></div>
                           </div>
                        </td>
                        <td class="v_ wk xe vm co ut">
                           <div class="nz">
                           <!-- Start -->
                           <div x-data="{ modalOpen: false }">
                              <button class="gb inline-flex gk pn yd rounded-full gp vk mt" @click.prevent="modalOpen = true" aria-controls="feedback-modal">
                               Ver
                              </button>
                              <!-- Modal backdrop -->
                              <div class="th tm bg-slate-900 pb nm wi" x-show="modalOpen" x-transition:enter="wr wh wf" x-transition:enter-start="opacity-0" x-transition:enter-end="bv" x-transition:leave="wr wh wa" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" aria-hidden="true" style="display: none;"></div>
                              <!-- Modal dialog -->
                              <div id="feedback-modal" class="th tm nm lq flex items-center rf justify-center fe vd jd" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="wr wc wf" x-transition:enter-start="opacity-0 a_" x-transition:enter-end="bv ax" x-transition:leave="wr wc wf" x-transition:leave-start="bv ax" x-transition:leave-end="opacity-0 a_" style="display: none;">
                                 <div class="bg-white rounded by lj aap oq ok" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                    <!-- Modal header -->
                                    <div class="mn vm cx border-slate-200">
                                       <div class="flex fg items-center">
                                          <div class="g_ text-slate-800">Datos del cliente</div>
                                          <button class="yu xm" @click="modalOpen = false">
                                             <div class="tc">Close</div>
                                             <svg class="ue on db">
                                                <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                                             </svg>
                                          </button>
                                       </div>
                                    </div>
                                    <!-- Modal content -->
                                    <div class="mn mr">
                                    <div class="gk text-slate-800 it"></div>
                                        <div class="ls">
                                            <div class="_y jn ln ju jl ig">
                                                <div class="_xx">
                                                    <label class="block text-sm gk rx" for="doc_dni">DNI <span class="yl">*</span></label>
                                                    <input disabled="disabled" id="doc_dni" name="doc_dni" class="tn oq kf kl kkh ka" type="text" value="<?php echo $clts['doc_dni']?>"/>
                                                </div>
                                               <?php if($clts['doc_ruc']!=''):?>
                                                <div class="_xx">
                                                    <label class="block text-sm gk rx" for="doc_ruc">RUC <span class="yl">*</span></label>
                                                    <input disabled="disabled" id="doc_ruc" name="doc_ruc" class="tn oq kf kl kkh ka" type="text" value="<?php echo $clts['doc_ruc']?>"/>
                                                </div>
                                               <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="_y jn ln ju jl ig">
                                          <div class="_xx">
                                             <label class="block text-sm gk rx" for="name">Nombres <span class="yl">*</span></label>
                                             <input disabled="disabled" id="first_name" name="first_name" class="tn oq kf kl kkh ka" type="text" value="<?php echo $clts['first_name']?>"/>
                                          </div>
                                           <div class="_xx">
                                             <label class="block text-sm gk rx" for="name">Apellidos <span class="yl">*</span></label>
                                             <input disabled="disabled" id="last_name" name="last_name" class="tn oq kf kl kkh ka" type="text" value="<?php echo $clts['last_name']?>"/>
                                          </div>
                                        </div>
                                        
                                        <div class="_y jn ln ju jl ig">
                                        <?php if($clts['social_reason']!=''):?>
                                          <div class="_xx">
                                             <label class="block text-sm gk rx" for="social_reason">Razón social <span class="yl">*</span></label>
                                             <input disabled="disabled" id="social_reason" name="social_reason" class="tn oq kf kl kkh ka" type="text" value="<?php echo $clts['social_reason']?>"/>
                                          </div>
                                           <?php endif;?>
                                             <div class="_xx">
                                             <label class="block text-sm gk rx" for="status">Estado <span class="yl">*</span></label>
                                             <input disabled="disabled" id="status" name="status" class="tn oq kf kl kkh ka" type="text" value="<?php echo $clts['status']?>"/>
                                          </div>
                    
                                           <div class="_xx">
                                             <label class="block text-sm gk rx" for="phone">Celular <span class="yl">*</span></label>
                                             <input disabled="disabled" id="phone" name="phone" class="tn oq kf kl kkh ka" type="number" value="<?php echo $clts['phone']?>"/>
                                          </div>
                                        </div>
                                        
                                        <div class="_y jn ln ju jl ig">
                                           <div class="_xx">
                                             <label class="block text-sm gk rx" for="person_type">Tipo de persona <span class="yl">*</span></label>
                                             <input disabled="disabled" id="person_type" name="person_type" class="tn oq kf kl kkh ka" type="email" value="<?php echo $clts['person_type']?>"/>
                                           
                                          </div>
                                          <div class="_xx">
                                             <label class="block text-sm gk rx" for="email">Correo <span class="yl">*</span></label>
                                             <input disabled="disabled" id="email" name="email" class="tn oq kf kl kkh ka" type="email" value="<?php echo $clts['email']?>"/>
                                          </div>
                                        </div>
                                         
                                        <div class="_y jn ln ju jl ig">
                                            <div class="_xx">
                                                <label class="block text-sm gk rx" for="address">Dirección <span class="yl">*</span></label>
                                                <textarea disabled="disabled" id="address" name="address" class="tn oq kf kl kkh ka" type="text"><?php echo $clts['address']?></textarea>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <!-- Modal footer -->
                               
                                 </div>
                              </div>
                           </div>
                           <!-- End -->
                        </div>
                        </div>
                                                  
                        </td>
                       
                        <td class="v_ wk xe vm co">
                            <?php if($clts['creation_date'] != ''):?>
                                <div class="gp"><?php echo $clts['creation_date']?></div>
                            <?php else:?>
                                <div class="gp">---</div>                                
                            <?php endif;?>
                        </td>
                        <td class="v_ wk xe vm co ut">
                            <div class="lv"> 
                                <div class="nz">
                                    <!-- Start -->
                                    <div x-data="{ modalOpen: false }">
                                        <?php if($clts['file_pdf'] != ''):?>
                                        <a href="<?php echo base_url();?>public/uploads/archive_contract/<?php echo $clts['file_pdf'];?>" download="<?php echo $clts['file_pdf'];?>">
                                        <button class="yu xm rounded-full"> 
                                            <span class="tc">Archive</span> 
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="26" height="26" viewBox="0 0 30 30" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                              <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                              <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                              <line x1="9" y1="9" x2="10" y2="9" />
                                              <line x1="9" y1="13" x2="15" y2="13" />
                                              <line x1="9" y1="17" x2="15" y2="17" />
                                            </svg>
                                        </button>
                                        </a>
                                        <?php else:?>    
                                        <button class="yu xm rounded-full" @click.prevent="modalOpen = true" aria-controls="feedback-modal"> 
                                            <span class="tc">Upload</span> 
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="26" height="26" viewBox="0 0 24 30" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                              <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                              <polyline points="7 9 12 4 17 9" />
                                              <line x1="12" y1="4" x2="12" y2="16" />
                                            </svg>
                                        </button>
                                        <?php endif;?>    
                                        <button class="yl xb rounded-full" id="eliminar" onclick="eliminarClient('<?php echo $clts['client_id']?>')"> 
                                            <span class="tc">Delete</span> 
                                            <svg class="uu of db" viewBox="0 0 32 32"> 
                                                <path d="M13 15h2v6h-2zM17 15h2v6h-2z"></path> <path d="M20 9c0-.6-.4-1-1-1h-6c-.6 0-1 .4-1 1v2H8v2h1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V13h1v-2h-4V9zm-6 1h4v1h-4v-1zm7 3v9H11v-9h10z"></path> 
                                            </svg> 
                                        </button> 
                                            
                                        <!-- Modal backdrop -->
                                        <div class="th tm bg-slate-900 pb nm wi" x-show="modalOpen" x-transition:enter="wr wh wf" x-transition:enter-start="opacity-0" x-transition:enter-end="bv" x-transition:leave="wr wh wa" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" aria-hidden="true" style="display: none;"></div>
                                        <!-- Modal dialog -->
                                        <div id="feedback-modal" class="th tm nm lq flex items-center rf justify-center fe vd jd" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="wr wc wf" x-transition:enter-start="opacity-0 a_" x-transition:enter-end="bv ax" x-transition:leave="wr wc wf" x-transition:leave-start="bv ax" x-transition:leave-end="opacity-0 a_" style="display: none;">
                                            <div class="bg-white rounded by lj aa oq ok" >
                                                <!-- Modal header -->
                                                <div class="mn vm cx border-slate-200">
                                                    <div class="flex fg items-center">
                                                        <div class="g_ text-slate-800">Agregar contrato</div>
                                                        <button class="yu xm" @click="modalOpen = false">
                                                            <div class="tc">Close</div>
                                                            <svg class="ue on db">
                                                                <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- Modal content -->
                                                <div class="mn mr">
                                                        <div class="text-sm"> <h3 class="gk text-slate-800">Usuario</h3> 
                                                            <div><?php echo $clts['first_name'].' '.$clts['last_name']?></div> 
                                                        </div>
                                                    <div class="ir">
                                                        <form class="rounded hy border cz hl gp mn vv" action="<?php echo base_url(); ?>admin/up_clientpdf/<?php echo $clts['client_id']?>" method="POST" enctype="multipart/form-data">     
                                                            <svg class="inline-flex ue on dx it" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"> 
                                                                <path d="M8 4c-.3 0-.5.1-.7.3L1.6 10 3 11.4l4-4V16h2V7.4l4 4 1.4-1.4-5.7-5.7C8.5 4.1 8.3 4 8 4ZM1 2h14V0H1v2Z"></path> 
                                                            </svg> 
                                                        <br>
                                                        <div>
                                                            <input class="btn oq border-slate-200 hover--border-slate-300 ys" type="file" id="file" name="file_pdf"  accept="application/pdf" required> 
                                                        </div>
                                                        <?php 
                                                        date_default_timezone_set('America/Peru_City');
                                                        $fecha=date("d-m-Y");
                                                        ?>
                                                        <div class="text-sm" style="display:none;"><h3 class="gk text-slate-800">Fecha</h3> 
                                                            <input type="text" name="creation_date" value="<?= $fecha?>" placeholder="<?= $fecha?>"> 
                                                        </div>
                                                        <br>
                                                        
                                                        <button class="tt hb xs yo">Subir 
                                                        
                                                        </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <!-- End -->
                                </div>                                
                            </div>
                        </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <script>document.addEventListener("alpine:init",()=>{Alpine.data("handleSelect",()=>({selectall:!1,selectAction(){countEl=document.querySelector(".table-items-action"),countEl&&(checkboxes=document.querySelectorAll("input.table-item:checked"),document.querySelector(".table-items-count").innerHTML=checkboxes.length,checkboxes.length>0?countEl.classList.remove("hidden"):countEl.classList.add("hidden"))},toggleAll(){this.selectall=!this.selectall,checkboxes=document.querySelectorAll("input.table-item"),[...checkboxes].map(e=>{e.checked=this.selectall}),this.selectAction()},uncheckParent(){this.selectall=!1,document.getElementById("parent-checkbox").checked=!1,this.selectAction()}}))})</script>
      <div class="flex fh _z jn js">
            <nav class="rw _a _e" role="navigation" aria-label="Navigation">
            <!--enlaces de paginación -->
            <ul class="flex justify-center">
                <li>
                    <span><?php echo $this->pagination->create_links();?></span>
                </li>
            </ul>
        </nav>
         <div class="text-sm text-slate-500 gp jy"> Mostrando <span class="gk ys">1</span> a <span class="gk ys">8</span> de <span class="gk ys">
                <?php
                     $clients = $this->db->query("SELECT COUNT(*) as Total FROM clients ")->row_array();
                      echo $clients['Total'];
                     ?>
         </span> resultados </div>
      </div>
   </div>
</main>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript">



function eliminarClient(id) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Se eliminará toda la información del cliente",
        icon: "question",
        iconColor: "red",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Eliminando información",
                type: "success",
                icon: "success",
                titleTextColor: "#000",
                html: "Esta ventana se cerrará en <strong></strong>.",
                timer: 4000,
                onBeforeOpen: () => {
                    Swal.showLoading();
                    timerInterval = setInterval(() => {
                        Swal.getContent().querySelector("strong").textContent = Swal.getTimerLeft();
                    }, 200);
                },
                onClose: () => {
                    clearInterval(timerInterval);
                },
            });
            location.href = "<?php echo base_url('/admin/deleteClientArchive')?>/" + id;
        }
    });
}

var table = $("#myTable").DataTable();
$("#myInput").on("keyup", function () {
    table.search(this.value).draw();
});

</script>