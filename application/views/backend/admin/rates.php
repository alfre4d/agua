<main>
   <div class="vd jd tto vv oq ar ri">
      <div class="_y js jn id">
         <div class="rw _a">
            <h1 class="gg zj text-slate-800 font-bold">T A R I F A S ✨</h1>
<?php if (isset($_SESSION['msg'])): ?>
<div x-show="open" x-data="{ open: true }">
    <div class="vd vg rounded-sm text-sm hz border hr yf" id="alerta">
        <div class="flex oq fg fd">
            <div class="flex">
                <svg class="ue on ap db bp if rk" viewBox="0 0 16 16">
                    <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z"></path>
                </svg>
                <div><?= $_SESSION['msg']; ?></div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
        
         </div>
         <div class="sq fa _j fm ji fy">
            <form class="td">
               <label for="action-search" class="tc">Search</label> <input id="myInput" onkeyup="myFunction()" class="tn mf kn" type="text" placeholder="Buscar…"> 
               <button class="tp tm tg kp" type="submit" aria-label="Search">
                  <svg class="ue on ap db yu kv ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                     <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                     <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                  </svg>
               </button>
            </form>
                <div x-data="{ modalOpen: false }">
                        <button class="btn hb xs yo" @click.prevent="modalOpen = true" aria-controls="basic-modal"><svg class="ue on db bh ap" viewBox="0 0 16 16">
                            <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                        </svg> <span class="hidden tro r_">Añadir tarifas</span></button>
                                          
                                            <div class="th tm bg-slate-900 pb nm wi" x-show="modalOpen" x-transition:enter="wr wh wf" x-transition:enter-start="opacity-0" x-transition:enter-end="bv" x-transition:leave="wr wh wa" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" aria-hidden="true" style="display: none;"></div>
                                            
                                            <div id="basic-modal" class="th tm nm lq flex items-center rf justify-center fe vd jd" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="wr wc wf" x-transition:enter-start="opacity-0 a_" x-transition:enter-end="bv ax" x-transition:leave="wr wc wf" x-transition:leave-start="bv ax" x-transition:leave-end="opacity-0 a_" style="display: none;">
                                                <div class="bg-white rounded by lj aa oq ok" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                                    
                                                    <div class="mn vm cx border-slate-200">
                                                        <div class="flex fg items-center">
                                                            <div class="g_ text-slate-800">Registro de tarifas</div>
                                                            <button class="yu xm" @click="modalOpen = false">
                                                                <div class="tc">Close</div>
                                                                <svg class="ue on db">
                                                                    <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                   
                                                    <form action="<?php echo base_url();?>/admin/insert_rates" method="POST">
                                                    <div class="mn mw mx">
                                                        <div class="text-sm">
                                                            <div class="li">
                                                                 <div class="_y jn ln ju jl ig">
                                                                <div>
                                                                <label class="block text-sm gk rx" for="placeholder">UNIDAD<span class="yl">*</span></label>
                                                                <input name="unit" id="placeholder" class="tn oq" type="text" placeholder="Ej: M3" required>
                                                                </div>
                                                                <div>
                                                                <label class="block text-sm gk rx" for="placeholder">DESCRIPCIÓN<span class="yl">*</span></label>
                                                                <input name="description" id="placeholder" class="tn oq" type="text" placeholder="Descripción" required>
                                                                </div>
                                                                </div>
                                                                
                                                                <div>
                                                                    <label class="block text-sm gk rx" for="business-id">Tipo de servicio / nombre <span class="yl">*</span></label>
                                                                    <select class="tn oq" name="name" id="cifrado" onchange="mostrarInput();" required>
                                                                     <option value="" selected disabled>Seleccione una opción</option>
                                                                     <option value="Agua">AGUA</option>
                                                                     <option value="Desague">DESAGÜE</option>
                                                                     <option value="Agua y Desague">AGUA Y DESAGÜE</option>
                                                                     
                                                                    </select>
                                                               </div>
                                                                <div class="_y jn ln ju jl ig">
                                                                
                                                               <div class="_xx">
                                                                <div >
                                                                    <label class="block text-sm gk rx" for="prefix">Precio Total / Costo<span class="yl">*</span></label>
                                                                    <div class="td">
                                                                        <input style="color:blue;" name="coste" id="total"class="tn oq my" type="number"  required >
                                                                        <div class="tp tm tg flex items-center pointer-events-none">
                                                                            <span class="text-sm yu gk me">S/</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mn mr">
                                                        <div class="flex flex-wrap justify-end lt">
                                                            <a href="#" class="tt border-slate-200 hover--border-slate-300 ys" @click="modalOpen = false">Cancelar</a>
                                                            <button type="submit" class="tt hb xs yo">Guardar</button>
                                                        </div>
                                                    </div>
                                                     </form>
                                                </div>
                                            </div>                                            
                                        </div>
         </div>
      </div>
      <div class="_y js jn id">
         <div class="sq fa _j fm ji fy">
            <div class="table-items-action hidden">
               <div class="flex items-center">
                  <div class="hidden tnn text-sm gz mr-2 co"><span class="table-items-count"></span> datos seleccionados</div>
                  <button id="master" class="btn btn-primary delete_all_rates" data-url="/itemDelete">Eliminar</button>
               </div>
            </div>
         </div>
      </div>
      
      <div class="bg-white by rounded-sm border border-slate-200 ry">
         <header class="mn mr">
            <h2 class="g_ text-slate-800">Todos <span class="yu gk">
                 <?php
                     $rates = $this->db->query("SELECT COUNT(*) as Total FROM rates where name != 'Agua and Agua y Desague'")->row_array();
                      echo $rates['Total'];
                     ?>
            </span></h2>
         </header>
         <div x-data="handleSelect">
            <div class="lz">
               <table id="example" class="av oq">
                  <thead class="gb g_ gq text-slate-500 hq ck cx border-slate-200">
                     <tr>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gp">Nombre</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gp">Descripción</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gp">Unidad</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gp">Costo</div>
                        </th>
                        <th class="v_ wk xe vm co">
                           <div class="g_ gp">Opciones</div>
                        </th>
                     </tr>
                  </thead>
                  <tbody class="text-sm lg lb">
                     <?php 
                       // $rates = $this->crud->get_rates();
                        $rates = $this->db->query("SELECT * FROM rates ORDER BY id ASC")->result_array();                     ?>
                  <?php foreach($rates as $row):?>
                     <tr>
                      
                        <td class="v_ wk xe vm co">
                                 <div class="gp">
                              <div><?php echo $row['name'];?></div>
                           </div>
                        </td>
 
                        <td class="v_ wk xe vm co" >
                           <div class="gp"><?php echo $row['description'];?></div>
                        </td>
        
                        <td class="v_ wk xe vm co">
                           <div class="gp"><?php echo $row['unit'];?></div>
                        </td>
                
                        <td class="v_ wk xe vm co">
                           <div class="gp">S/ <?php echo $row['coste'];?></div>
                        </td>
   
    <td class="v_ wk xe vm co ut">
    <div class="nz">
   <div x-data="{ modalOpen: false }">
      <button @click.prevent="modalOpen = true" aria-controls="feedback-modal" style="color: #9e9e9e;">
        
      <span class="tc">Edit</span> 
         <svg class="uu of db" viewBox="0 0 32 32">
            <path d="M19.7 8.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM12.6 22H10v-2.6l6-6 2.6 2.6-6 6zm7.4-7.4L17.4 12l1.6-1.6 2.6 2.6-1.6 1.6z"></path>
         </svg>
      </button>
      
      <button class="yl xb rounded-full" id="eliminar" onclick="eliminar_rates('<?php echo $row['id']?>')" >
         <span class="tc">Delete</span> 
            <svg class="uu of db" viewBox="0 0 32 32">
               <path d="M13 15h2v6h-2zM17 15h2v6h-2z"></path>
               <path d="M20 9c0-.6-.4-1-1-1h-6c-.6 0-1 .4-1 1v2H8v2h1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V13h1v-2h-4V9zm-6 1h4v1h-4v-1zm7 3v9H11v-9h10z"></path>
            </svg>
      </button>
      <div class="th tm bg-slate-900 pb nm wi" x-show="modalOpen" x-transition:enter="wr wh wf" x-transition:enter-start="opacity-0" x-transition:enter-end="bv" x-transition:leave="wr wh wa" x-transition:leave-start="bv" x-transition:leave-end="opacity-0" aria-hidden="true" style="display: none;"></div>
      <div id="feedback-modal" class="th tm nm lq flex items-center rf justify-center fe vd jd" role="dialog" aria-modal="true" x-show="modalOpen" x-transition:enter="wr wc wf" x-transition:enter-start="opacity-0 a_" x-transition:enter-end="bv ax" x-transition:leave="wr wc wf" x-transition:leave-start="bv ax" x-transition:leave-end="opacity-0 a_" style="display: none;">
         <div class="bg-white rounded by lj aa oq ok" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
            <div class="mn vm cx border-slate-200">
               <div class="flex fg items-center">
                  <div class="g_ text-slate-800">Editar Tarifas</div>
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
            <?php
               $url = "admin/update_rates/".$row['id'];
            ?>
            <form action="<?php echo base_url($url)?>" method="POST">
               <div class="ls">
                  <div class="_y jn ln ju jl ig">
                    <div>
                    <label class="block text-sm gk rx" for="default">Nombre</label>
                    <input id="default" class="tn oq" name="name" type="text" value="<?php echo $row['name'];?>">
                    </div>
                     <div>
                    <label class="block text-sm gk rx" for="default">Descripción</label>
                    <input id="default" class="tn oq" name="description" type="text" value="<?php echo $row['description'];?>">
                    </div>
               </div>
               <div class="_y jn ln ju jl ig">
                   <div>
                    <label class="block text-sm gk rx" for="default">Unidad</label>
                    <input id="default" class="tn oq" name="unit"  type="text" value="<?php echo $row['unit'];?>">
                    </div>
                  </div>
                  
                <div>
                <label class="block text-sm gk rx" for="disabled">Costo</label>
                <input id="coste" class="tn oq kf kl kh ka" type="number" name="coste" value="<?php echo $row['coste']?>" >
                </div>
            </div><br>
            <div class="mn mr ck border-slate-200">
               <div class="flex flex-wrap justify-end lt">
                  <a href="#" class="tt border-slate-200 hover--border-slate-300 ys" @click="modalOpen = false">Cancelar</a>
                  <button class="tt hb xs yo">Actualizar</button>
               </div>
            </div>
            </form> 
         </div>
      </div>
   </div>
</div>

                        </td>
                    </tr>
                <?php endforeach;?>
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
                     $rates = $this->db->query("SELECT COUNT(*) as Total FROM rates where name != 'agua and agua y desague'")->row_array();
                      echo $rates['Total'];
                     ?>
         </span> resultados </div>
      </div>
   </div>
   
</main>

<script type="text/javascript">
       function eliminar_rates(id){
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Se eliminará toda la información de las Tarifas",
                    icon: 'question',
                    iconColor: 'red',
                    showCancelButton: true,
                    confirmButtonText: "Si, eliminar",
                    cancelButtonText: "Cancelar",
                })
                .then((result) => {
                    if (result.value) {
                        Swal.fire({
                            title: 'Eliminando información',
                            type: 'success',
                            icon: 'success',
                            titleTextColor: '#000',
                            html: 'Esta ventana se cerrará en <strong></strong>.',
                            timer: 4000,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                    Swal.getContent().querySelector('strong').textContent = Swal
                                        .getTimerLeft()
                                }, 200)
                            },
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                        location.href = "<?php echo base_url('/admin/delete_rates')?>/"+id;
                    }
                })
    }
    
    $(document).ready(function () {  
   
        $('#master').on('click', function(e) {  
         if($(this).is(':checked',true))    
         {  
            $(".table-item to sub_chk").prop('checked', true);    
         } else {    
            $(".table-item to sub_chk").prop('checked',false);    
         }    
        });  
   
        $('.delete_all_rates').on('click', function(e) {  
   
            var allVals = [];    
            $(".table-item to sub_chk:checked").each(function() {    
                allVals.push($(this).attr('data-id'));  
            });    
   
            if(allVals.length <=0)    
            {    
                alert("selecciona.");    
            }  else {    
   
                var check = confirm("Estas seguro?");    
                if(check == true){    
   
                    var join_selected_values = allVals.join(",");   
   
                    $.ajax({  
                        url: $(this).data('url'),  
                        type: 'POST',  
                        data: 'ids='+join_selected_values,  
                        success: function (data) {  
                          console.log(data);  
                          $(".table-item to sub_chk:checked").each(function() {    
                              $(this).parents("tr").remove();  
                          });  
                          alert("Item Deleted successfully.");  
                        },  
                        error: function (data) {  
                            alert(data.responseText);  
                        }  
                    });  
   
                  $.each(allVals, function( index, value ) {  
                      $('table tr').filter("[data-row-id='" + value + "']").remove();  
                  });  
                }    
            }    
        });  
    }); 
    
function sumar()
{
  const $total = document.getElementById('total');
  let subtotal = 0;
  [ ...document.getElementsByName( "monto" ) ].forEach( function ( element ) {
    if(element.value !== '') {
      subtotal += parseFloat(element.value);
    }
  });
  $total.value = subtotal;
}

//funcion de activar y desactivar
var cifrado = document.getElementById('cifrado');

cifrado.addEventListener('change',function(){

if(this.value == 'Agua'){

document.getElementById('numero1').style.display = 'block';
document.getElementById('numero').style.display = 'none';
//document.getElementById('numero1').removeAttribute('required','');

}else if(this.value == "Agua y Desague"){
document.getElementById('numero').style.display = 'block';
document.getElementById('numero1').style.display = 'block';
//document.getElementById('numero').setAttribute('required','');

}else if(this.value == "Desague"){
 document.getElementById('numero').style.display = 'block';
document.getElementById('numero1').style.display = 'none';   
}

});

</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
</script>
<script type="text/javascript">
var table = $("#example").DataTable();
$("#myInput").on("keyup", function () {
    table.search(this.value).draw();
});
</script> 

    