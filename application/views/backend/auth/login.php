<!DOCTYPE html>

<html lang="en">
<?php $system_title       =	$this->crud->getInfo('system_title');?>
<head>
    <meta charset="utf-8">
    <title>Acceso | <?php echo $system_title;?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="<?php echo base_url();?>public/assets/css/style.a49749f4fb5cff923e10.css" rel="stylesheet">
    <link rel="shortcut icon" href="#"/>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>

</head>

<body class="gm bf hy ys">

    <script>
        if (localStorage.getItem('sidebar-expanded') == 'true') {
            document.querySelector('body').classList.add('sidebar-expanded');
        } else {
            document.querySelector('body').classList.remove('sidebar-expanded');
        }
    </script>    

    <main class="bg-white">

        <div class="td flex">
     
            <div class="oq qw">

                <div class="oj or flex fh wd">

                    <div class="ac">
                        <div class="flex items-center fg op vd jd tto">
                            <?php if($this->session->flashdata('error')) echo 'fjdslkfjslkflsfj';?>
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
                        <h1 class="text-3xl text-slate-800 font-bold rb">¡Bienvenido! ✨</h1>
                        <?php if (isset($_SESSION['item'])): ?>
                            <div x-show="open" x-data="{ open: true }">
                                        <div class="vd vg rounded-sm text-sm pt border hi yp" id="alerta">
                                            <div class="flex oq fg fd">
                                                <div class="flex">
                                                    <svg class="ue on ap db bp if rk" viewBox="0 0 16 16">
                                                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm3.5 10.1l-1.4 1.4L8 9.4l-2.1 2.1-1.4-1.4L6.6 8 4.5 5.9l1.4-1.4L8 6.6l2.1-2.1 1.4 1.4L9.4 8l2.1 2.1z"></path>
                                                    </svg>
                                                    <div><?= $_SESSION['item']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <?php endif;?>

                        <form action="<?php echo base_url();?>login/auth" method="POST"  onsubmit="return submitUserForm();">
                            <div class="ln">
                                
                                <div>
                                    <label class="block text-sm gk rx" for="dni">DNI</label>
                                    <input id="dni" class="tn oq" type="text" name="dni" required="true">
                                </div>
                                
                                <div>
                                    <label class="block text-sm gk rx" for="email">Correo Electrónico</label>
                                    <input id="email" class="tn oq" type="email" name="email" required="true">
                                </div>
                                <div>
                                    <label class="block text-sm gk rx" for="password">Contraseña</label>
                                    <input id="password" class="tn oq" type="password" autocomplete="off" name="password" required="true">
                                </div>
                          

                                <div class="g-recaptcha" data-sitekey="6Ldg6tgfAAAAABSqrWK1gOh-E0iZ167TDm8Xd9qm" data-callback="verifyCaptcha">
                                </div>
                                <div id="g-recaptcha-error"></div>

                            </div>
                            <div class="flex items-center fg ir">
                                <div class="mr-1">
                                    <a class="text-sm bu xz" href="<?php echo base_url();?>login/new_request" target="_blank">¿Olvidaste tu contraseña?</a>
                                </div>
                                <button class="btn hb xs yo ml-3" type="submit" name="button">Ingresar</button>
                            </div>
                        </form>
            
                        <script>
                        function submitUserForm() {
                            var response = grecaptcha.getResponse();
                            if(response.length == 0) {
                                document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">Por favor verifica el captcha</span>';
                                return false;
                            }
                            return true;
                        }
                        
                        function verifyCaptcha() {
                            document.getElementById('g-recaptcha-error').innerHTML = '';
                        }
                        </script>

                        <div class="gn ir ck border-slate-200">      
                            
                        </div>
        
                    </div>

                </div>

            </div>

        
            <div class="hidden qh tp tk ty tw qw" aria-hidden="true">
                <img class="vr vi oq or" src="<?php echo base_url();?>public/uploads/images/auth-image.jpg" width="760" height="1024" alt="Authentication image">
                <img class="tp ns tb fe ag st hidden tea" src="<?php echo base_url();?>public/uploads/images/auth-decoration.png" width="218" height="224" alt="Authentication decoration">
            </div>

        </div>

    </main>

    <script src="<?php echo base_url();?>public/assets/main.f640b348fcfd37dfcd91.js"></script>

    <script async src='https://www.googletagmanager.com/gtag/js?id=UA-125021779-1'>
        
    </script>

    <script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-125021779-1', { 'anonymize_ip': true });
    </script>

    <script>console.log("%cImportant!", "color: blue; font-size: x-large");console.log("%cThe page you are viewing is for demo purposes only. CSS and HTML have been minified and class names have been shortened to improve the page load time. Download our templates from https://cruip.com/ 😉", "font-size: large");</script><script>const pagesList = [{"name":"Dashboard","url":"https://preview.cruip.com/mosaic/index.html","active":false},{"name":"Analytics","url":"https://preview.cruip.com/mosaic/analytics.html","active":false},{"name":"Fintech","url":"https://preview.cruip.com/mosaic/fintech.html","active":false},{"name":"Customers","url":"https://preview.cruip.com/mosaic/customers.html","active":false},{"name":"Orders","url":"https://preview.cruip.com/mosaic/orders.html","active":false},{"name":"Invoices","url":"https://preview.cruip.com/mosaic/invoices.html","active":false},{"name":"Shop","url":"https://preview.cruip.com/mosaic/shop.html","active":false},{"name":"Shop 2","url":"https://preview.cruip.com/mosaic/shop-2.html","active":false},{"name":"Single Product","url":"https://preview.cruip.com/mosaic/product.html","active":false},{"name":"Cart","url":"https://preview.cruip.com/mosaic/cart.html","active":false},{"name":"Cart 2","url":"https://preview.cruip.com/mosaic/cart-2.html","active":false},{"name":"Cart 3","url":"https://preview.cruip.com/mosaic/cart-3.html","active":false},{"name":"Pay","url":"https://preview.cruip.com/mosaic/pay.html","active":false},{"name":"Campaigns","url":"https://preview.cruip.com/mosaic/campaigns.html","active":false},{"name":"Users Tabs","url":"https://preview.cruip.com/mosaic/users-tabs.html","active":false},{"name":"Users Tiles","url":"https://preview.cruip.com/mosaic/users-tiles.html","active":false},{"name":"Profile","url":"https://preview.cruip.com/mosaic/profile.html","active":false},{"name":"Feed","url":"https://preview.cruip.com/mosaic/feed.html","active":false},{"name":"Forum","url":"https://preview.cruip.com/mosaic/forum.html","active":false},{"name":"Forum Post","url":"https://preview.cruip.com/mosaic/forum-post.html","active":false},{"name":"Meetups","url":"https://preview.cruip.com/mosaic/meetups.html","active":false},{"name":"Meetups Post","url":"https://preview.cruip.com/mosaic/meetups-post.html","active":false},{"name":"Cards","url":"https://preview.cruip.com/mosaic/credit-cards.html","active":false},{"name":"Transactions","url":"https://preview.cruip.com/mosaic/transactions.html","active":false},{"name":"Transaction Details","url":"https://preview.cruip.com/mosaic/transaction-details.html","active":false},{"name":"Jobs Listing","url":"https://preview.cruip.com/mosaic/job-listing.html","active":false},{"name":"Jobs Post","url":"https://preview.cruip.com/mosaic/job-post.html","active":false},{"name":"Company Profile","url":"https://preview.cruip.com/mosaic/company-profile.html","active":false},{"name":"Kanban","url":"https://preview.cruip.com/mosaic/tasks-kanban.html","active":false},{"name":"Tasks List","url":"https://preview.cruip.com/mosaic/tasks-list.html","active":false},{"name":"Messages","url":"https://preview.cruip.com/mosaic/messages.html","active":false},{"name":"Inbox","url":"https://preview.cruip.com/mosaic/inbox.html","active":false},{"name":"Calendar","url":"https://preview.cruip.com/mosaic/calendar.html","active":false},{"name":"Applications","url":"https://preview.cruip.com/mosaic/applications.html","active":false},{"name":"My Account","url":"https://preview.cruip.com/mosaic/settings.html","active":false},{"name":"My Notifications","url":"https://preview.cruip.com/mosaic/notifications.html","active":false},{"name":"Connected Apps","url":"https://preview.cruip.com/mosaic/connected-apps.html","active":false},{"name":"Plans","url":"https://preview.cruip.com/mosaic/plans.html","active":false},{"name":"Billing & Invoices","url":"https://preview.cruip.com/mosaic/billing.html","active":false},{"name":"Give Feedback","url":"https://preview.cruip.com/mosaic/feedback.html","active":false},{"name":"Changelog","url":"https://preview.cruip.com/mosaic/changelog.html","active":false},{"name":"Roadmap","url":"https://preview.cruip.com/mosaic/roadmap.html","active":false},{"name":"FAQs","url":"https://preview.cruip.com/mosaic/faqs.html","active":false},{"name":"Empty State","url":"https://preview.cruip.com/mosaic/empty-state.html","active":false},{"name":"Page Not Found","url":"https://preview.cruip.com/mosaic/404.html","active":false},{"name":"Knowledge Base","url":"https://preview.cruip.com/mosaic/knowledge-base.html","active":false},{"name":"Sign in","url":"https://preview.cruip.com/mosaic/signin.html","active":true},{"name":"Sign up","url":"https://preview.cruip.com/mosaic/signup.html","active":false},{"name":"Reset password","url":"https://preview.cruip.com/mosaic/reset-password.html","active":false},{"name":"Onboarding 1","url":"https://preview.cruip.com/mosaic/onboarding-01.html","active":false},{"name":"Onboarding 2","url":"https://preview.cruip.com/mosaic/onboarding-02.html","active":false},{"name":"Onboarding 3","url":"https://preview.cruip.com/mosaic/onboarding-03.html","active":false},{"name":"Onboarding 4","url":"https://preview.cruip.com/mosaic/onboarding-04.html","active":false},{"name":"Button","url":"https://preview.cruip.com/mosaic/component-button.html","active":false},{"name":"Input Form","url":"https://preview.cruip.com/mosaic/component-form.html","active":false},{"name":"Dropdown","url":"https://preview.cruip.com/mosaic/component-dropdown.html","active":false},{"name":"Alert & Banner","url":"https://preview.cruip.com/mosaic/component-alert.html","active":false},{"name":"Modal","url":"https://preview.cruip.com/mosaic/component-modal.html","active":false},{"name":"Pagination","url":"https://preview.cruip.com/mosaic/component-pagination.html","active":false},{"name":"Tabs","url":"https://preview.cruip.com/mosaic/component-tabs.html","active":false},{"name":"Breadcrumb","url":"https://preview.cruip.com/mosaic/component-breadcrumb.html","active":false},{"name":"Badge","url":"https://preview.cruip.com/mosaic/component-badge.html","active":false},{"name":"Avatar","url":"https://preview.cruip.com/mosaic/component-avatar.html","active":false},{"name":"Tooltip","url":"https://preview.cruip.com/mosaic/component-tooltip.html","active":false},{"name":"Accordion","url":"https://preview.cruip.com/mosaic/component-accordion.html","active":false},{"name":"Icons","url":"https://preview.cruip.com/mosaic/component-icons.html","active":false}];if(window != top){window.parent.postMessage(pagesList, "https://cruip.com/")};
    </script>
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
   setTimeout(function() {
   $('#alerta').fadeOut(1000);
   }, 1900);
</script>    
</body>

</html>