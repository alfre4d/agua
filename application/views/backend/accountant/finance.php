<main>
   <div class="vd jd tto vv oq ar ri">
      <!-- Page header -->
      <div class="_y js jn id">
         <!-- Left: Title -->
         <div class="rw _a">
            <h1 class="gg zj text-slate-800 font-bold">Pagos ✨</h1>
         </div>
         <!-- Right: Actions -->
         <div class="sq fa _j fm ji fy">
            <form class="td">
               <label for="action-search" class="tc">Search</label> <input id="action-search" class="tn mf kn" type="search" placeholder="Search by invoice ID…"> 
               <button class="tp tm tg kp" type="submit" aria-label="Search">
                  <svg class="ue on ap db yu kv ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                     <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                     <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                  </svg>
               </button>
            </form>
            <a href="<?php echo base_url();?>accountant/payment"> 
                <button class="btn hb xs yo">
                   <svg class="ue on db bh ap" viewBox="0 0 16 16">
                      <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                   </svg>
                   <span class="hidden tro r_">Nuevo Pago</span> 
                </button>
            </a>
         </div>
      </div>
      <br>
      <!-- More actions -->
      <div class="_y js jn id">
         <!-- Left side -->
         <div class="rw _a">
            <ul class="flex flex-wrap -m-1">
               <li class="m-1">
                  <button class="inline-flex items-center justify-center text-sm gk yr rounded-full me mt border he bw hb yo wu wc">Todos <span class="rq text-indigo-200">67</span></button>
               </li>
               <li class="m-1">
                  <button class="inline-flex items-center justify-center text-sm gk yr rounded-full me mt border border-slate-200 hover--border-slate-300 bw bg-white text-slate-500 wu wc">Pagado <span class="rq yu">14</span></button>
               </li>
               <li class="m-1">
                  <button class="inline-flex items-center justify-center text-sm gk yr rounded-full me mt border border-slate-200 hover--border-slate-300 bw bg-white text-slate-500 wu wc">Pendiente <span class="rq yu">34</span></button>
               </li>
            </ul>
         </div>
         <!-- Right side -->
         <div class="sq fa _j fm ji fy">
            <!-- Delete button -->
            <div class="table-items-action hidden">
               <div class="flex items-center">
                  <div class="hidden tnn text-sm gz mr-2 co"><span class="table-items-count"></span> items selected</div>
                  <button class="btn bg-white border-slate-200 hover--border-slate-300 yl xb">Delete</button>
               </div>
            </div>
            
         </div>
      </div>
      <!-- Table -->
      <div class="bg-white by rounded-sm border border-slate-200 ry">
         <header class="mn mr">
            <h2 class="g_ text-slate-800">Todos <span class="yu gk">67</span></h2>
         </header>
         <div x-data="handleSelect">
            <div class="lz">
               <table class="av oq">
                  <thead class="gb g_ gq text-slate-500 hq ck cx border-slate-200">
                     <tr>
                        <th class="v_ wk xe vm co ut">
                           <div class="flex items-center"> <label class="inline-flex"> <span class="tc">Select all</span> <input id="parent-checkbox" class="to" type="checkbox" @click="toggleAll"> </label> </div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gh">No. de suministro</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gh">Cliente</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gh">Tarifa</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gh">Mes</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gh">Consumo</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gh">IVG</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gh">Total</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gh">Fecha de creacion</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gh">Estado de pago</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gh">Fecha de cancelación</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gh">Opciones</div>
                        </th>
                     </tr>
                  </thead>
                  <tbody class="text-sm lg lb">
                     <tr>
                        <td class="v_ wk xe vm co ut">
                           <div class="flex items-center"> <label class="inline-flex"> <span class="tc">Select</span> <input class="table-item to" type="checkbox" @click="uncheckParent"> </label> </div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div class="gk yj">#143567</div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div class="gb inline-flex gk pn yd rounded-full gp vk mt">Ver</div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div class="gb inline-flex gk pn yd rounded-full gp vk mt">Ver</div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div class="gk text-slate-800">Enero</div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div>--M3</div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div>S/--</div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div>S/--</div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div class="flex items-center">22/07/2021</div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div class="gk text-slate-800">Pendiente</div>
                        </td>
                        <td class="v_ wk xe vm co">
                           <div class="flex items-center">
                              <svg class="ue on db yu ap mr-2" viewBox="0 0 16 16">
                                 <path d="M4.3 4.5c1.9-1.9 5.1-1.9 7 0 .7.7 1.2 1.7 1.4 2.7l2-.3c-.2-1.5-.9-2.8-1.9-3.8C10.1.4 5.7.4 2.9 3.1L.7.9 0 7.3l6.4-.7-2.1-2.1zM15.6 8.7l-6.4.7 2.1 2.1c-1.9 1.9-5.1 1.9-7 0-.7-.7-1.2-1.7-1.4-2.7l-2 .3c.2 1.5.9 2.8 1.9 3.8 1.4 1.4 3.1 2 4.9 2 1.8 0 3.6-.7 4.9-2l2.2 2.2.8-6.4z"></path>
                              </svg>
                              <div>Subscription</div>
                           </div>
                        </td>
                        <td class="v_ wk xe vm co ut">
                           <div class="lv">
                              <button class="yu xm rounded-full">
                                 <span class="tc">Edit</span> 
                                 <svg class="uu of db" viewBox="0 0 32 32">
                                    <path d="M19.7 8.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM12.6 22H10v-2.6l6-6 2.6 2.6-6 6zm7.4-7.4L17.4 12l1.6-1.6 2.6 2.6-1.6 1.6z"></path>
                                 </svg>
                              </button>
                              <button class="yu xm rounded-full">
                                 <span class="tc">Download</span> 
                                 <svg class="uu of db" viewBox="0 0 32 32">
                                    <path d="M16 20c.3 0 .5-.1.7-.3l5.7-5.7-1.4-1.4-4 4V8h-2v8.6l-4-4L9.6 14l5.7 5.7c.2.2.4.3.7.3zM9 22h14v2H9z"></path>
                                 </svg>
                              </button>
                              <button class="yl xb rounded-full">
                                 <span class="tc">Delete</span> 
                                 <svg class="uu of db" viewBox="0 0 32 32">
                                    <path d="M13 15h2v6h-2zM17 15h2v6h-2z"></path>
                                    <path d="M20 9c0-.6-.4-1-1-1h-6c-.6 0-1 .4-1 1v2H8v2h1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V13h1v-2h-4V9zm-6 1h4v1h-4v-1zm7 3v9H11v-9h10z"></path>
                                 </svg>
                              </button>
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <script>document.addEventListener("alpine:init",()=>{Alpine.data("handleSelect",()=>({selectall:!1,selectAction(){countEl=document.querySelector(".table-items-action"),countEl&&(checkboxes=document.querySelectorAll("input.table-item:checked"),document.querySelector(".table-items-count").innerHTML=checkboxes.length,checkboxes.length>0?countEl.classList.remove("hidden"):countEl.classList.add("hidden"))},toggleAll(){this.selectall=!this.selectall,checkboxes=document.querySelectorAll("input.table-item"),[...checkboxes].map(e=>{e.checked=this.selectall}),this.selectAction()},uncheckParent(){this.selectall=!1,document.getElementById("parent-checkbox").checked=!1,this.selectAction()}}))})</script>
      <div class="flex fh _z jn js">
         <nav class="rw _a _e" role="navigation" aria-label="Navigation">
            <ul class="flex justify-center">
               <li class="ml-3 first--ml-0"> <a class="btn bg-white border-slate-200 yv fr" href="#0" disabled="disabled">&lt;- Previous</a> </li>
               <li class="ml-3 first--ml-0"> <a class="btn bg-white border-slate-200 hover--border-slate-300 text-indigo-500" href="#0">Next -&gt;</a> </li>
            </ul>
         </nav>
         <div class="text-sm text-slate-500 gp jy"> Showing <span class="gk ys">1</span> to <span class="gk ys">10</span> of <span class="gk ys">467</span> results </div>
      </div>
   </div>
</main>

