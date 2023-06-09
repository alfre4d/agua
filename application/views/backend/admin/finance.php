<main>
    <div class="vd jd tto vv oq ar ri">
        <div class="_y js jn rw qa">
            <div class="rw _a">
                <h1 class="gg zj text-slate-800 font-bold"></h1>
            </div>
            <div class="sq fa _j fm ji fy">
                <div class="table-items-action hidden">
                    <div class="flex items-center">
                        <div class="hidden tnn text-sm gz mr-2 co"><span class="table-items-count"></span> items selected</div>
                        <button class="btn bg-white border-slate-200 hover--border-slate-300 yl xb">Delete</button>
                    </div>
                </div>
                <div class="hidden _m">
                    <form class="td">
                        <label for="action-search" class="tc">Search</label> <input id="myInput" class="tn mf kn" type="search" placeholder="Search…" />
                        <button class="tp tm tg kp" type="submit" aria-label="Search">
                            <svg class="ue on ap db yu kv ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                                <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                            </svg>
                        </button>
                    </form>
                </div>
                
                 <!-- Start -->
                           <div x-data="{ modalOpen: false }">
                              <button class="btn hb xs yo" @click.prevent="modalOpen = true" aria-controls="feedback-modal">
                               <svg class="ue on db bh ap" viewBox="0 0 16 16">
                                   <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                                </svg>
                               <span class="hidden tro r_">Nuevo pago</span>
                              </button>
                              <!-- Modal backdrop -->
                              <div class="th tm bg-slate-900 pb nm wi" x-show="modalOpen" x-transition:enter="wr wh wf" x-transition:enter-start="opacity-0" x-transition:enter-end="bv" x-transition:leave="wr wh wa" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" aria-hidden="true" style="display: none;"></div>
                              <!-- Modal dialog -->
                              <div id="feedback-modal" class="th tm nm lq flex items-center rf justify-center fe vd jd" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="wr wc wf" x-transition:enter-start="opacity-0 a_" x-transition:enter-end="bv ax" x-transition:leave="wr wc wf" x-transition:leave-start="bv ax" x-transition:leave-end="opacity-0 a_" style="display: none;">
                                 <div class="bg-white rounded by lj aap oq ok" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                    <!-- Modal header -->
                                    <div class="mn vm cx border-slate-200">
                                       <div class="flex fg items-center">
                                          <div class="g_ text-slate-800">Nuevo Pago</div>
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
                                        <?php echo form_open(base_url().'admin/insert_finance');?>
                                       <div class="ls">
                                           <div class="_y jn ln ju jl ig">
                                                <div class="_xx">
                                              <label class="block text-sm gk rx" for="sumnistro">No. De Sumnistro</label>
                                              <input id="sumnistro" name="supply" class="tn oq kf kl kh ka" type="text" value="" required="required">
                                          </div>
                                        <div class="_xx">
                                             <label class="block text-sm gk rx" for="doc_ruc">Cliente <span class="yl">*</span></label>
                                             <select name="client" id="country" class="tn oq" required="required">
                                            <option value="" selected disabled>Seleccionar</option>
                                                <?php 
                                                    $client= $this->db->query('SELECT * FROM clients')->result_array();
                                                    foreach($client as $row):
                                                ?>
                                                <option value="<?php echo $row['client_id']?>" ><?php echo $row['first_name'].' '.$row['last_name']?></option>
                                                <?php endforeach;?>
                                                </select>
                                            
                                          </div>
                                          <div class="_xx">
                                             <label class="block text-sm gk rx" for="name">Consumo<span class="yl">*</span></label>
                                             <input id="last_name" name="consumption" class="tn oq kf kl kh ka" type="text" value="" required="required"/>
                                          </div>
                                        
                                     </div>
                                     
                                       
                                        <div class="_y jn ln ju jl ig">
                                          <div class="_xx">
                                             <label class="block text-sm gk rx" for="doc_dni">Mes <span class="yl">*</span></label>
                                                <select class="tn oq" name="month" required>
                                                    <option value="" selected disabled>Seleccione una opción</option>
                                                    <option value="Enero">Enero</option>
                                                    <option value="Febrero">Febrero</option>
                                                    <option value="Marzo">Marzo</option>
                                                    <option value="Abril">Abril</option>
                                                    <option value="Mayo">Mayo</option>
                                                    <option value="Junio">Junio</option>
                                                    <option value="Julio">Julio</option>
                                                    <option value="Agosto">Agosto</option>
                                                    <option value="Sepriembre">Septiembre</option>
                                                    <option value="Octubre">Octubre</option>
                                                    <option value="Noviembre">Noviembre</option>
                                                    <option value="Diciembre">Diciembre</option>
                                                </select>
                                          </div>
                                    
                                          <div class="_xx">
                                             <label class="block text-sm gk rx" for="doc_ruc">Unidad<span class="yl">*</span></label>
                                             <select name="consumptio" id="country" class="tn oq" required>
                                            <option value="" selected disabled>Seleccionar</option>
                                                <?php 
                                                    $rates = $this->crud->get_rates();
                                                    foreach($rates as $row):
                                                ?>
                                                <option value="<?php echo $row['id']?>" ><?php echo $row['unit']?></option>
                                                <?php endforeach;?>
                                                </select>
                                          </div>
                                          
                                          
                                          </div>
                                        </div>
                                        <div class="_y jn ln ju jl ig">
                                          <div class="_xx">
                                             <label class="block text-sm gk rx" for="name">IGV <span class="yl">*</span></label>
                                             <input id="first_name" name="igv" class="tn oq kf kl kh ka" type="text" value="" required/>
                                          </div>
                                           <div class="_xx">
                                             <label class="block text-sm gk rx" for="name">Total <span class="yl">*</span></label>
                                             <input id="last_name" name="total" class="tn oq kf kl kh ka" type="text" value="" required/>
                                          </div>
                                        </div>
                            
                                        <div class="_y jn ln ju jl ig">
                                          <div class="_xx">
                                             
                                             <label class="block text-sm gk rx" for="social_reason">Fecha de creación <span class="yl">*</span></label>
                                             <input id="" name="creation_date" class="tn oq kf kl kkh ka" type="date" value="" required/>
                                          </div>
                                        
                                           <div class="_xx">
                                             <label class="block text-sm gk rx" for="phone">Estado de pago <span class="yl">*</span></label>
                                                 <select class="tn oq" id="statusinput" name="payment_status" onchange="changeStatus()" required>
                                                    <option value="" selected disabled>Seleccione una opción</option>
                                                    <option value="Pagado">Pagado</option>
                                                    <option value="Pendiente">Pendiente</option>
                                                 </select>
                                          </div>
                                        </div>
                                        
                                          <div class="_y jn ln ju jl ig" id="disabledinput" style="display:none">
                                       
                                           <div class="_xp">
                                             <label class="block text-sm gk rx" for="cancellation_date">Fecha de cancelación <span class="yl">*</span></label>
                                             <input id="person_type" name="cancellation_date" class="tn oq kf kl kh ka" type="date" value=""/>
                                           
                                          </div>
                            
                                        </div>
                                        
                                    </div>
                                    <!-- Modal footer -->
                                     <div class="flex fh vw vx ck border-slate-200">
                                         <div class="flex lk">
                                            <button class="tt border-slate-200 hover--border-slate-300 ys" @click="modalOpen = false">Cancel</button>
                                            <button type="submit" class="btn hb xs yo ml-3">Guardar</button>
                                         </div>
                                      </div>
                                    <?php echo form_close();?>
                                 </div>
                              </div>
                           </div>
                    <!-- End -->
            </div>
        </div>
        <div class="id" id="myBtnContainer">
            <ul class="flex flex-wrap -m-1">
                <li class="m-1">
                    <button onclick="filterSelection('all');" class="inline-flex items-center justify-center text-sm gk yr rounded-full me mt border he bw hb yo wu wc">Ver todo</button>
                </li>
                <li class="m-1">
                    <button class="inline-flex items-center justify-center text-sm gk yr rounded-full me mt border border-slate-200 hover--border-slate-300 bw bg-white text-slate-500 wu wc">Pendiente</button>
                </li>
                <li class="m-1">
                    <button class="inline-flex items-center justify-center text-sm gk yr rounded-full me mt border border-slate-200 hover--border-slate-300 bw bg-white text-slate-500 wu wc">Cancelado</button>
                </li>
                <li class="m-1">
                    <div style="position:absolute; right:80px;">
                    <a href="<?php echo base_url().'admin/export_pdf/finance'?>">
                    <img src="<?php echo base_url();?>public/uploads/icons/printier.png" alt="printier" width="25px" height="25px">
                    </a>
                    </div>
                </li>
            </ul>
        </div>
        
        <div class="bg-white">
            <div x-data="handleSelect">
                <div class="lz">
                    <table id="myTable1" class="av oq" @click.stop="$dispatch('set-transactionopen', true)">
                        <thead class="gb g_ gq text-slate-500 ck cx border-slate-200">
                            <tr>
                                <th class="v_ wk xe vm co ut">
                                    <div class="flex items-center">
                                        <label class="inline-flex"> <span class="tc">Select all</span> <input id="parent-checkbox" class="to" type="checkbox" @click="toggleAll" /> </label>
                                    </div>
                                </th>
                                <th class="v_ wk xe vm co"><div class="">No.DE SUMINISTRO</div></th>
                                <th class="v_ wk xe vm co"><div class="">Cliente</div></th>
                                <th class="v_ wk xe vm co"><div class="">Tarifa</div></th>
                                <th class="v_ wk xe vm co"><div class="">Mes</div></th>
                                <th class="v_ wk xe vm co"><div class="">Consumo</div></th>
                                <th class="v_ wk xe vm co"><div class="">IGV</div></th>
                                <th class="v_ wk xe vm co"><div class="">Total</div></th>
                                <th class="v_ wk xe vm co"><div class="">Fecha de creacion</div></th>
                                <th class="v_ wk xe vm co"><div class="">Estado de pago</div></th>
                                <th class="v_ wk xe vm co"><div class="">Fecha de cancelacion</div></th>
                                <th class="v_ wk xe vm co"><div class="">Opciones</div></th>
                            </tr>
                        </thead>
                        <tbody class="text-sm lg lb cx border-slate-200">
                            <?php
                            //$finance = $this->db->query("SELECT * FROM finance INNER JOIN rates ON rates.id = finance.id_rates INNER JOIN clients ON clients.client_id = finance.id_client")->result_array();
                            $finance = $this->crud->get_finance(); 
                           // var_dump($finance);
                            ?>
                            <?php foreach($finance as $row):?>
                            <tr>
                                <td class="v_ wk xe vm co ut">
                                    <div class="flex items-center">
                                        <label class="inline-flex"> <span class="tc">Select</span> <input class="table-item to" type="checkbox" @click.stop="uncheckParent" /> </label>
                                    </div>
                                </td>
                                <td class="v_ wk xe vm co qw">
                                    <div class="flex items-center">
                                        <div class="gk yj gp"><span class="gk yj gp">#</span><?=$row['supply']?></div>
                                    </div>
                                </td>
                                <td class="v_ wk xe vm co"><div class="gh">
                                     <div class="nz">
                          
                           <div x-data="{ modalOpen: false }">
                              <button class="gb inline-flex gk pn yd rounded-full gp vk mt" @click.prevent="modalOpen = true" aria-controls="feedback-modal">
                               Ver
                              </button>
                              
                              <div class="th tm bg-slate-900 pb nm wi" x-show="modalOpen" x-transition:enter="wr wh wf" x-transition:enter-start="opacity-0" x-transition:enter-end="bv" x-transition:leave="wr wh wa" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" aria-hidden="true" style="display: none;"></div>
                            
                              <div id="feedback-modal" class="th tm nm lq flex items-center rf justify-center fe vd jd" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="wr wc wf" x-transition:enter-start="opacity-0 a_" x-transition:enter-end="bv ax" x-transition:leave="wr wc wf" x-transition:leave-start="bv ax" x-transition:leave-end="opacity-0 a_" style="display: none;">
                                 <div class="bg-white rounded by lj aap oq ok" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                  
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
                                    
                                    <div class="mn mr">
                                    <div class="gk text-slate-800 it"></div>
                                        <div class="ls">
                                            <div class="_y jn ln ju jl ig">
                                                <div class="_xx">
                                                    <label class="block text-sm gk rx" for="doc_dni">DNI <span class="yl">*</span></label>
                                                    <input disabled="disabled" id="doc_dni" name="doc_dni" class="tn oq kf kl kkh ka" type="text" value="<?php echo $row['doc_dni']?>"/>
                                                </div>
                                               <?php if($row['doc_ruc']!=''):?>
                                                <div class="_xx">
                                                    <label class="block text-sm gk rx" for="doc_ruc">RUC <span class="yl">*</span></label>
                                                    <input disabled="disabled" id="doc_ruc" name="doc_ruc" class="tn oq kf kl kkh ka" type="text" value="<?php echo $row['doc_ruc']?>"/>
                                                </div>
                                               <?php endif;?>
                                            </div>
                                        </div>
                                        <div class="_y jn ln ju jl ig">
                                          <div class="_xx">
                                             <label class="block text-sm gk rx" for="name">Nombres <span class="yl">*</span></label>
                                             <input disabled="disabled" id="first_name" name="first_name" class="tn oq kf kl kkh ka" type="text" value="<?php echo $row['first_name']?>"/>
                                          </div>
                                           <div class="_xx">
                                             <label class="block text-sm gk rx" for="name">Apellidos <span class="yl">*</span></label>
                                             <input disabled="disabled" id="last_name" name="last_name" class="tn oq kf kl kkh ka" type="text" value="<?php echo $row['last_name']?>"/>
                                          </div>
                                        </div>
                                        
                                        <div class="_y jn ln ju jl ig">
                                        <?php if($clts['social_reason']!=''):?>
                                          <div class="_xx">
                                             <label class="block text-sm gk rx" for="social_reason">Razón social <span class="yl">*</span></label>
                                             <input disabled="disabled" id="social_reason" name="social_reason" class="tn oq kf kl kkh ka" type="text" value="<?php echo $row['social_reason']?>"/>
                                          </div>
                                           <?php endif;?>
                                             <div class="_xx">
                                             <label class="block text-sm gk rx" for="status">Estado <span class="yl">*</span></label>
                                             <input disabled="disabled" id="status" name="status" class="tn oq kf kl kkh ka" type="text" value="<?php echo $row['status']?>"/>
                                          </div>
                    
                                           <div class="_xx">
                                             <label class="block text-sm gk rx" for="phone">Celular <span class="yl">*</span></label>
                                             <input disabled="disabled" id="phone" name="phone" class="tn oq kf kl kkh ka" type="number" value="<?php echo $row['phone']?>"/>
                                          </div>
                                        </div>
                                        
                                        <div class="_y jn ln ju jl ig">
                                           <div class="_xx">
                                             <label class="block text-sm gk rx" for="person_type">Tipo de persona <span class="yl">*</span></label>
                                             <input disabled="disabled" id="person_type" name="person_type" class="tn oq kf kl kkh ka" type="email" value="<?php echo $row['person_type']?>"/>
                                           
                                          </div>
                                          <div class="_xx">
                                             <label class="block text-sm gk rx" for="email">Correo <span class="yl">*</span></label>
                                             <input disabled="disabled" id="email" name="email" class="tn oq kf kl kkh ka" type="email" value="<?php echo $row['email']?>"/>
                                          </div>
                                        </div>
                                         
                                        <div class="_y jn ln ju jl ig">
                                            <div class="_xx">
                                                <label class="block text-sm gk rx" for="address">Dirección <span class="yl">*</span></label>
                                                <textarea disabled="disabled" id="address" name="address" class="tn oq kf kl kkh ka" type="text"><?php echo $row['address']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                                </div></td>
                                <td class="v_ wk xe vm co"><div>
                                    
                                <div x-data="{ modalOpen: false }">
                                <button class="gb inline-flex gk pn yd rounded-full gp vk mt" @click.prevent="modalOpen = true" aria-controls="feedback-modal">
                                Ver
                                </button>                                  
                                   <div class="th tm bg-slate-900 pb nm wi" x-show="modalOpen" x-transition:enter="wr wh wf" x-transition:enter-start="opacity-0" x-transition:enter-end="bv" x-transition:leave="wr wh wa" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" aria-hidden="true" style="display: none;"></div>
                                   
                                   <div id="feedback-modal" class="th tm nm lq flex items-center rf justify-center fe vd jd" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="wr wc wf" x-transition:enter-start="opacity-0 a_" x-transition:enter-end="bv ax" x-transition:leave="wr wc wf" x-transition:leave-start="bv ax" x-transition:leave-end="opacity-0 a_" style="display: none;">
                                      <div class="bg-white rounded by lj aa oq ok" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                       
                                         <div class="mn vm cx border-slate-200">
                                            <div class="flex fg items-center">
                                               <div class="g_ text-slate-800">Datos de tarifa</div>
                                               <button class="yu xm" @click="modalOpen = false">
                                                  <div class="tc">Close</div>
                                                  <svg class="ue on db">
                                                     <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                                                  </svg>
                                               </button>
                                            </div>
                                         </div>
                                       
                                         <div class="mn mr">
                                            <div class="text-sm">
                                            </div>
                                            <div class="ls">
                                               <div>
                                                  <label class="block text-sm gk rx" for="name">Nombre <span class="yl">*</span></label>
                                                  <input disabled="disabled" id="name" class="tn oq kf kl kkh ka"  type="text" value="<?php echo $row['name']?>" required="">
                                               </div>
                                               <div>
                                                  <label class="block text-sm gk rx" for="email">Descripcion <span class="yl">*</span></label>
                                                  <input disabled="disabled" id="email" class="tn oq kf kl kkh ka" type="description" value="<?php echo $row['description']?>" required="">
                                               </div>
                                               <div>
                                                  <label class="block text-sm gk rx" for="feedback">Costo <span class="yl">*</span></label>
                                                  <input disabled="disabled" id="email" class="tn oq kf kl kkh ka"  type="email" value="<?php echo $row['coste']?>" required="">
                                               </div>
                                            </div>
                                         </div>
                                       
                                      </div>
                                   </div>
                                </div>
                                </div>
                                </td>
                                <td class="v_ wk xe vm co ">
                                    <div class="">
                                        <div class="gk text-slate-800"><?=$row['month'];?></div>
                                    </div>
                                </td>
                                    <td class="v_ wk xe vm co qw">
                                    <div class="flex items-center">
                                        <?php if($row['consumption']!=""):?>
                                        <div class="gk text-slate-800">S/<?=$row['consumption'].' '.$row['unit'];?></div>
                                        <?php else:?>
                                        <?php echo '---'.$row['unit'];?>
                                        <?php endif;?>
                                    </div>
                                    </td>
                                    <td class="v_ wk xe vm co qw">
                                    <div class="flex items-center">
                                        <div class="gk text-slate-800">S/<?=$row['igv'];?></div>
                                    </div>
                                    </td>
                                    <td class="v_ wk xe vm co qw">
                                    <div class="flex items-center">
                                        <div class="gk text-slate-800">S/<?=$row['total'];?></div>
                                    </div>
                                    </td>
                                    <td class="v_ wk xe vm co qw">
                                    <div class="flex items-center">
                                        <div class="gk text-slate-800"><?=$row['creation_date'];?></div>
                                    </div>
                                    </td>
                                    <td class="v_ wk xe vm co qw">
                                    <div class="flex items-center">
                                        <?php if($row['payment_status'] == 'Pendiente'):?>
                                        <div class="inline-flex gk hy text-slate-500 rounded-full gp vk vy"><?=$row['payment_status'];?></div>
                                        <?php endif;?>
                                        <?php if($row['payment_status'] == 'Pagado'):?>
                                        <div class="gb inline-flex gk pt yl rounded-full gp vk mt"><?=$row['payment_status'];?></div>
                                        <?php endif;?>
                                    </div>
                                    </td>
                                    <td class="v_ wk xe vm co qw">
                                    <div class="flex items-center">
                                        <?php if($row['cancellation_date']!=""):?>
                                        <div class="gk text-slate-800"><?=$row['cancellation_date'];?></div>
                                    <?php else:?>
                                   <?php  echo '<center><div class="gk text-slate-800">---</div></center>';?>
                                    <?php endif;?>
                                    </div>
                                    </td>
                                    <td class="v_wk xe vm co qw">
                                    <div class="flex items-center">
                                       
                                        <button class="slate-200 hover--border-slate-300">
                                            <svg class="ue on db text-slate-500 ap" viewBox="0 0 16 16">
                                                <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z"></path>
                                            </svg>
                                        </button>
                                        
                                        &nbsp;
                                        <a href="#0">
                                        <img src="<?php echo base_url();?>public/uploads/icons/check.png" alt="transaction-list" width="20px" height="20px">
                                        </a>
                                         &nbsp;
                                    <button id="eliminar" onclick="delete_finances('<?php echo $row['id_finance']?>')" class="slate-200 hover--border-slate-300">
                                            <svg class="ue on db yl ap" viewBox="0 0 16 16">
                                                <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z"></path>
                                            </svg>
                                        </button> 
                                    </div> 
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script>
        function changeStatus(){
            var status = document.getElementById("statusinput");
            if(status.value == "Pendiente"){
             document.getElementById("disabledinput").style.display = "none";   
            }else{
             document.getElementById("disabledinput").style.display ="";   
            }
        }
        </script>
        <script type="text/javascript">
            document.addEventListener("alpine:init", () => {
                Alpine.data("handleSelect", () => ({
                    selectall: !1,
                    selectAction() {
                        (countEl = document.querySelector(".table-items-action")),
                            countEl &&
                                ((checkboxes = document.querySelectorAll("input.table-item:checked")),
                                (document.querySelector(".table-items-count").innerHTML = checkboxes.length),
                                checkboxes.length > 0 ? countEl.classList.remove("hidden") : countEl.classList.add("hidden"));
                    },
                    toggleAll() {
                        (this.selectall = !this.selectall),
                            (checkboxes = document.querySelectorAll("input.table-item")),
                            [...checkboxes].map((e) => {
                                e.checked = this.selectall;
                            }),
                            this.selectAction();
                    },
                    uncheckParent() {
                        (this.selectall = !1), (document.getElementById("parent-checkbox").checked = !1), this.selectAction();
                    },
                }));
            });

            var table = $("#myTable1").DataTable();
            $("#myInput").on("keyup", function () {
                table.search(this.value).draw();
            });

            filterSelection("all");
            function filterSelection(c) {
                var x, i;
                x = document.getElementsByClassName("filterDiv");
                if (c == "all") c = "";
                for (i = 0; i < x.length; i++) {
                    w3RemoveClass(x[i], "show");
                    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
                }
            }

            function w3AddClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    if (arr1.indexOf(arr2[i]) == -1) {
                        element.className += " " + arr2[i];
                    }
                }
            }

            function w3RemoveClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    while (arr1.indexOf(arr2[i]) > -1) {
                        arr1.splice(arr1.indexOf(arr2[i]), 1);
                    }
                }
                element.className = arr1.join(" ");
            }

            // Add active class to the current button (highlight it)
            var btnContainer = document.getElementById("myBtnContainer");
            var btns = btnContainer.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function () {
                    var current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }
        </script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

        <script type="text/javascript">
            function Export() {
                html2canvas(document.getElementById("myTable1"), {
                    onrendered: function (canvas) {
                        var data = canvas.toDataURL();
                        var docDefinition = {
                            content: [
                                {
                                    image: data,
                                    width: 500,
                                },
                            ],
                        };
                        pdfMake.createPdf(docDefinition).download("Finanza.pdf");
                    },
                });
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
        <script>
    function delete_finances(id){
        Swal.fire({
            title: "¿Estás seguro?",
            text: "Se eliminará toda la información de finanza",
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
                location.href ="<?php echo base_url('/admin/delete_finance')?>/"+id;
            }
        })
    }
    </script>
        <div class="ie">
            <div class="flex fh _z jn js">
                <div class="text-sm text-slate-500 gp jy">Mostrando <span class="gk ys">1</span> a <span class="gk ys">10</span> de <span class="gk ys">1</span> resultado</div>
            </div>
        </div>
    </div>
</main>
