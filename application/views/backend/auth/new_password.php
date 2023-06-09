 <link href="<?php echo base_url();?>public/assets/css/style.a49749f4fb5cff923e10.css" rel="stylesheet">
  <title>Acceso | pago de agua</title>
<main class="bg-white">
   <div class="td flex">
      <!-- Content -->
      <div class="oq qw">
         <div class="oj or flex fh wd">
            <!-- Header -->
            <div class="ac">
               <div class="flex items-center fg op vd jd tto">
                  <!-- Logo -->
                  <a class="block" href="<?echo base_url();?>">
                     <svg width="32" height="32" viewBox="0 0 32 32">
                        <defs>
                           <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                              <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%"></stop>
                              <stop stop-color="#A5B4FC" offset="100%"></stop>
                           </linearGradient>
                           <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                              <stop stop-color="#38BDF8" stop-opacity="0" offset="0%"></stop>
                              <stop stop-color="#38BDF8" offset="100%"></stop>
                           </linearGradient>
                        </defs>
                        <rect fill="#6366F1" width="32" height="32" rx="16"></rect>
                        <path d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z" fill="#4F46E5"></path>
                        <path d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z" fill="url(#logo-a)"></path>
                        <path d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z" fill="url(#logo-b)"></path>
                     </svg>
                  </a>
               </div>
            </div>

            <div class="as ri vd vv">
               <h1 class="text-3xl text-slate-800 font-bold rb">Recuperar contraseña ✨</h1>
               <!-- Form --><?php if (isset($_SESSION['message1'])): ?>
               <div x-show="open" x-data="{ open: true }">
                                        <div class="inline-flex u_ vd vg rounded-sm text-sm hz border hr yf" id="alerta1">
                                            <div class="flex oq fg fd">
                                                <div class="flex">
                                                    <svg class="ue on ap db bp if rk" viewBox="0 0 16 16">
                                                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z"></path>
                                                    </svg>
                                                    <div><?= $_SESSION['message1']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      <?php endif;?>
               <?php if (isset($_SESSION['message'])): ?>
                            <div x-show="open" x-data="{ open: true }">
                                        <div class="vd vg rounded-sm text-sm pt border hi yp" id="alerta1">
                                            <div class="flex oq fg fd">
                                                <div class="flex">
                                                    <svg class="ue on ap db bp if rk" viewBox="0 0 16 16">
                                                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm3.5 10.1l-1.4 1.4L8 9.4l-2.1 2.1-1.4-1.4L6.6 8 4.5 5.9l1.4-1.4L8 6.6l2.1-2.1 1.4 1.4L9.4 8l2.1 2.1z"></path>
                                                    </svg>
                                                    <div><?= $_SESSION['message']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <?php endif;?>
                                     
               <form action = "<?php echo base_url();?>login/forgot_password" method ="POST">
                  <div class="ln">
                     <div>
                        <label class="block text-sm gk rx" for="email">Ingrese su correo electronico <span class="yl">*</span></label>
                        <input id="email" name="email" class="tn oq" type="email" required>
                     </div>
                  </div>
                  <div class="flex justify-end ir">
                     <button class="btn hb xs yo co">Enviar enlace de restauración</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- Image -->
      <div class="hidden qh tp tk ty tw qw" aria-hidden="true">
         <img class="vr vi oq or" src="<?php echo base_url();?>public/uploads/images/auth-image.jpg" alt="Authentication image" width="760" height="1024">
         <img class="tp ns tb fe ag st hidden tea" src="<?php echo base_url();?>public/uploads/images/auth-decoration.png" alt="Authentication decoration" width="218" height="224">
      </div>
   </div>
</main>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
   setTimeout(function() {
   $('#alerta1').fadeOut(1500);
   }, 1900);
</script>  

