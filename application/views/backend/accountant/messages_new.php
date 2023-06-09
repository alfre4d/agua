<div>

         <main>
            
                       
                        <button id="addhis" class="btn hb xs yo co" >Export Transactions</button><!-----------------------------boton------------------------------------------->
                  

               <!-- Transaction Panel -->
               <div class="tp tm kz ny fe bx ws wf wc" id="hist_arch" style='display:none'>
                  <div class="tv np hq ct ce ta ap cq border-slate-200 oq _k ox">
                     <button onclick="Closex()" class="tp tk tw ir ik kp vc">
                        <svg class="ue on dx kd" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                           <path d="m7.95 6.536 4.242-4.243a1 1 0 1 1 1.415 1.414L9.364 7.95l4.243 4.242a1 1 0 1 1-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 0 1-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 0 1 1.414-1.414L7.95 6.536Z"></path>
                        </svg>
                     </button>
                    
                     <div class="vv vd tto">
                        <div class="as ri teb">
                           <div class="text-slate-800 g_ gp rx">Foto</div><br>
                           <div class="it gp"> <img class="inline-flex up od rounded-full sy" src="images/transactions-image-04.svg" alt="Transaction 04" width="48" height="48"> </div>
                           <div class="text-sm gp gz">22/01/2022, 8:56 PM</div>

                           <div class="ir">
                            <div class="text-sm g_ text-slate-800 in">Archivos compartidos</div>
                            <section>
                                <table class="av oq">
                                  <!-- Table header -->
                                  <thead class="gb gq yu">
                                     <tr class="flex flex-wrap qm md:flex-no-wrap">
                             
                                     </tr>
                                  </thead>
                                  <!-- Table body -->
                                  <tbody class="text-sm">
                                     <!-- Row -->
                                     <tr class="flex flex-wrap qm md:flex-no-wrap cx border-slate-200 vg zy">
                                        <td class="oq block qb qv vy zb">
                                           <div class="gh">Basic Plan - Annualy</div>
                                        </td>
                                        <td class="oq block qb qv vy zb">
                                           <div class="gd flex items-center zs">
                                              <a class="gk text-indigo-500 xd" href="#0">HTML</a>
                                              <span class="block ut on hw rs" aria-hidden="true"></span>
                                              <a class="gk text-indigo-500 xd" href="#0">PDF</a>
                                           </div>
                                        </td>
                                     </tr>
                            
                                  </tbody>
                                </table>
                            </section>

                           </div>
                           
                           <div class="ir">
                              <div class="text-sm g_ text-slate-800 in">Fotos compartidas</div>
                             
                           </div>

                        </div>
                     </div>
                  </div>
               </div>

         </main>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
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
