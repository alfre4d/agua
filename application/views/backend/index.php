<!DOCTYPE html>
<html lang="en">
<?php 
    $system_name        =	$this->crud->getInfo('system_name');
	$system_title       =	$this->crud->getInfo('system_title');
    $account_type       =   $this->session->userdata('login_type'); 
    $this->crud->setLoginStatus();
?>
<head>
    <meta charset="utf-8">
    <title><?php echo $page_title;?> | <?php echo $system_title;?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta content="<?php echo $system_name ." ".$system_title;?>" name="description">
    <link href="<?php echo base_url();?>public/assets/css/style.a49749f4fb5cff923e10.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css"> 
    <link rel="shortcut icon" href="#"/>
   
</head>

<body class="gm bf hy ys sidebar-expanded" :class="{ 'sidebar-expanded': sidebarExpanded }" x-data="{ page: 'community-profile', sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true', profileSidebarOpen: false }" x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">
      
    <script>
        if (localStorage.getItem('sidebar-expanded') == 'true') {
             document.querySelector('body').classList.add('sidebar-expanded');
         } else {
             document.querySelector('body').classList.remove('sidebar-expanded');
         }
    </script>
    

    <!-- Page wrapper -->
    <div class="flex ot lq">
           
        <?php include $account_type.'/navigation.php';?>
        
        <!-- Content area -->
        <div class="td flex fh ac ce ct" x-ref="contentarea">

            <?php include $account_type.'/top.php';?>
            
            <?php include $account_type.'/'.$page_name.'.php';?>
            
        </div>

    </div>
   
    
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
   setTimeout(function() {
   $('#alerta').fadeOut(1000);
   }, 1700);
  


</script>

<script type="text/javascript">
    function onLoadImage_s(files) {
        if (files && files[0]) {
            document.getElementById('imgName_s').innerHTML = files[0].name;
           
        } else {
            document.getElementById('imgName_s').innerHTML = 'Ninguno';
        }

    }

    setTimeout(function() { 
        $('#alert').fadeOut(1000); 
    }, 1700);    

    function myOcult() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    
    function myOcult() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript">
    var blank_entry = '';
    $(document).ready(function() {
      $('#respuesta').attr('disabled',true);
      var query;
      $("#password_actual").keyup(function(e) {
         query = $("#password_actual").val();
         $("#password_actual").queue(function(n) {
            $.ajax({
               type: "POST",
               url: "<?php echo base_url('accountant/validation_passw');?>",
               data: "value="+query,
               error: function(){
               alert("Error");
               },
               success: function(data) {
               var in_pass = $('#password_actual').val();
               if(data != '[]' || in_pass == '')
               {
                  $('#submit').prop('disabled', false);
                  var json = JSON.parse(data);
                  var html = '';
                  $("#contenedor").hide(500);
                  $('#respuesta').html(html);
               }
               else
               {
                  $('#submit').prop('disabled', true);
                  $("#contenedor").show(500);
                  $('#respuesta').html(html);
                  $('#respuesta').html("<li >No coincide la contraseña</li>");       
               } 
               //console.log(data);
               n();
               }
            })
         })
      })
    })
    </script>
    
    <script src="<?php echo base_url();?>public/assets/main.f640b348fcfd37dfcd91.js">
        
    </script>
    
    <script async src='https://www.googletagmanager.com/gtag/js?id=UA-125021779-1'>
        
    </script>
    
    
    <script>
    window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-125021779-1', { 'anonymize_ip': true });
    
    </script>

<!---alert--->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
<script>
    function eliminarAdmon(id){
        Swal.fire({
            title: "¿Estás seguro?",
            text: "Se desactivará toda la información del administrador",
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
                location.href ="<?php echo base_url('/admin/delete_admins')?>/"+id;
            }
        })
    }
                       


    function eliminarAccount(id){
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Se desactivará toda la información del contador",
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
                        location.href = "<?php echo base_url('/admin/delete_account')?>/"+id;
                    }
                })
    }

    function deleteSpecialyst(id){
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Se desactivará toda la información del especialista",
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
                                }, 100)
                            },
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                        })
                        location.href = "<?php echo base_url('/admin/delete_specialyst')?>/"+id;
                    }
                })
    }
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript">
    var blank_entry = '';
    $(document).ready(function() {
    $('#respuesta').attr('disabled',true);
    var query;
        $("#doc_dni").keyup(function(e) {
        query = $("#doc_dni").val();
            $("#doc_dni").queue(function(n) {
                $.ajax({
                type: "GET",
                url: "<?php echo base_url('/admin/validate_dni');?>",
                data: "value="+query,
                error: function(){
                alert("Error");
                },
                    success: function(data) {
                        if(data != '0' && data != '[]')
                        {
                            var json = JSON.parse(data);
                            var html = '';
                            
                            for(var i = 0; i < json.length; i++)
                            {
                                html += '<a class="filter" style="color:black;padding:1px;font-weight:bold;" href="<?php echo base_url('/admin/create_admin/id/');?>'+json[i].id+'"><li>'+json[i].doc_dni+'</li></a>';                            
                            }
                            
                            $("#contenedor").show(500);
                            $('#respuesta').html(html); 
                            $('#respuesta').html("<li>DNI ya existente</li>");
                        }
                        else
                        {
                            $("#contenedor").hide(500);
                        }
                    //console.log(data);
                    n();
                    }
                })
            })
        })
    })
    function logout1(){
    Swal.fire({
        title: "¿Cerrar sesión?",
        text: "Deberá iniciar sesión nuevamente para poder acceder al sistema.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#6FD535',
        confirmButtonText: "Si, cerrar",
        cancelButtonColor:'#FF0000',
        cancelButtonText: "Cancelar",
    })
    .then(resultado => {
        if (resultado.value) {
            location.href = "<?php echo base_url('/login/logout/');?>";
        } else {
            console.log("*No se pudo cerrar sesión*");
        }
    });
    }
    
    function mostrarContrasena()
    {
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
    }
    
    function mostrar()
    {
        var tipo = document.getElementById("password2");
        if(tipo.type == "password2"){
          tipo.type = "text";
        }
        else
        {
          tipo.type = "password2";
        }
    }
    </script>

<script>
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	password: /^.{6,8}$/, // 6 a 8 digitos.
}

const campos = {
	password: false,
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "password":
			validarCampo(expresiones.password, e.target, 'password');
			validarPassword2();
		break;
		case "password2":
			validarPassword2();
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;
	}
}

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

    </script>
<!-- Validation to hide password -->
<script type="text/javascript" >
                     function Ocultar()
                     {
                         if (document.getElementById('switch-2').checked) 
                          {
                            document.getElementById('caja').style.display = "";
                            document.getElementById('password_actual').required = "true";
                            document.getElementById('password').required = "true";
                          } 
                          else 
                          {
                            document.getElementById('caja').style.display = "none";
                            document.getElementById('password_actual').required = "false";
                            document.getElementById('password').required = "false";
                          }
                        
                     }
                  </script>
                  
</body>

</html>