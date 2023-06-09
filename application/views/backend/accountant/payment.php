<main>
    <div class="zz tef">
        <!-- Content -->
        <div class="vd jd tto vv oq ar ri">
            <!-- Page header -->
            <div class="_y js jn id">
                <!-- Left: Title -->
                <div class="rw _a">
                   <h1 class="gg zj text-slate-800 font-bold">Nuevo Pago ✨</h1>
                </div>
            </div>
            <!-- Page header -->
            <div class="_y js jn id">
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
         <!-- Credit cards -->
         <div class="li">
            <!-- Card 1 -->
            <?php 
                $this->db->select('*');
                $this->db->from('clients');
                $this->db->join('rates', 'rates.id = clients.rates_id');
                $this->db->order_by('client_id', 'DESC');
                $query = $this->db->get();
                $result = $query->result_array();
            ?>
            <?php foreach($result as $data):?>
            <label class="td block fn gh oq">
               <input type="radio" name="radio-buttons" class="kx tc" checked="checked">
               <div class="va rounded border border-slate-200 hover--border-slate-300 bw wu wc">
                  <div class="sq ff items-center f_">
                     <!-- Name -->
                     <div class="n_ nx _t _n gh jb ttv trn">
                        <div class="text-sm gk text-slate-800 ci"><?php echo $data['first_name'].' '.$data['last_name']?></div>
                     </div>
                     <!-- Card limits -->
                     <div class="n_ nw _t _r gd jb ttp trt">
                        <div class="text-sm">Servicio: <?php echo $data['name'].' '.$data['coste'].'$'?></div>
                     </div>
                     <!-- Card status -->
                     <div class="n_ nx _t _i gd ttv trn">
                        <a href="https://www.youtube.com/watch?v=JhxWvqgOGWE"><div class="gb inline-flex gk hz yf rounded-full gp vk mt">Seleccionar</div></a>
                     </div>
                  </div>
               </div>
               <div class="tp tm cy he kk rounded pointer-events-none" aria-hidden="true"></div>
            </label>
            <?php endforeach;?>
         </div>
        </div>
        <?php $sidebar. '.php';?>
      <!-- Sidebar -->
      <div>
         <div class="tee tet hq ttr ttn ta tew ck tti tts border-slate-200 tem tep">
            <div class="vv vd tto">
               <div class="as ri teb">
                  <div class="text-slate-800 g_ gp rb">Physical Metal Card Summary</div>
                  <!-- Details -->
                  <div class="ir">
                     <div class="text-sm g_ text-slate-800 rx">Details</div>
                     <ul>
                        <li class="flex items-center fg vm cx border-slate-200">
                           <div class="text-sm">Card Name</div>
                           <div class="text-sm gk text-slate-800 r_">Physical Metal Card</div>
                        </li>
                        <li class="flex items-center fg vm cx border-slate-200">
                           <div class="text-sm">Status</div>
                           <div class="flex items-center co">
                              <div class="w-2 h-2 rounded-full hk mr-2"></div>
                              <div class="text-sm gk text-slate-800">Active</div>
                           </div>
                        </li>
                     </ul>
                  </div>
                  <!-- Payment Limits -->
                  <div class="ir">
                     <div class="text-sm g_ text-slate-800 rw">Payment Limits</div>
                     <div class="mj cx border-slate-200">
                        <div class="flex fg text-sm in">
                           <div>Spent This Month</div>
                           <div class="gz">$750,00 <span class="yu">/</span> $1,500.00</div>
                        </div>
                        <div class="td oq h-2 pl">
                           <div class="tp tm hk" aria-hidden="true" style="width: 50%;"></div>
                        </div>
                     </div>
                  </div>
                  <!-- Withdrawal Limits -->
                  <div class="ir">
                     <div class="text-sm g_ text-slate-800 rw">Withdrawal Limits</div>
                     <div class="mj cx border-slate-200">
                        <div class="flex fg text-sm in">
                           <div>Withdrawn This Month</div>
                           <div class="gz">$100,00 <span class="yu">/</span> $1,500.00</div>
                        </div>
                        <div class="td oq h-2 pl">
                           <div class="tp tm hk" aria-hidden="true" style="width: 7.5%;"></div>
                        </div>
                     </div>
                  </div>
                  <!-- Edit / Delete -->
                  <div class="flex items-center lu ir">
                     <div class="uv">
                        <button class="btn oq border-slate-200 hover--border-slate-300 ys">
                           <svg class="ue on db text-slate-500 ap" viewBox="0 0 16 16">
                              <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z"></path>
                           </svg>
                           <span class="r_">Edit Card</span>
                        </button>
                     </div>
                     <div class="uv">
                        <button class="btn oq border-slate-200 hover--border-slate-300 yl">
                           <svg class="ue on db ap" viewBox="0 0 16 16">
                              <path d="M14.574 5.67a13.292 13.292 0 0 1 1.298 1.842 1 1 0 0 1 0 .98C15.743 8.716 12.706 14 8 14a6.391 6.391 0 0 1-1.557-.2l1.815-1.815C10.97 11.82 13.06 9.13 13.82 8c-.163-.243-.39-.56-.669-.907l1.424-1.424ZM.294 15.706a.999.999 0 0 1-.002-1.413l2.53-2.529C1.171 10.291.197 8.615.127 8.49a.998.998 0 0 1-.002-.975C.251 7.29 3.246 2 8 2c1.331 0 2.515.431 3.548 1.038L14.293.293a.999.999 0 1 1 1.414 1.414l-14 14a.997.997 0 0 1-1.414 0ZM2.18 8a12.603 12.603 0 0 0 2.06 2.347l1.833-1.834A1.925 1.925 0 0 1 6 8a2 2 0 0 1 2-2c.178 0 .348.03.512.074l1.566-1.566C9.438 4.201 8.742 4 8 4 5.146 4 2.958 6.835 2.181 8Z"></path>
                           </svg>
                           <span class="r_">Block Card</span>
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </div>
</main>
