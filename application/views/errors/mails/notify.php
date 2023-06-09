<!DOCTYPE html>
<html>
    <body style="background-color: #222533; padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">
        <div style="max-width: 600px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
            <table style="width: 100%;">
                <tr>
                    <td style="background-color: #fff;"> 
                        <img alt="" src="<?php echo base_url();?>public/uploads/img/weeff1.jpg" style="width: 30%; padding: 20px">
                    </td>
                    <td style="padding-left: 50px; text-align: right; padding-right: 20px;">
                        <a href="#" style="color: #261D1D; text-decoration: underline; font-size: 14px; letter-spacing: 1px;">Nueva contraseña</a>
                    </td>
                </tr>
            </table>
            <?php 
                $system_name    = $this->crud->getInfo('system_name');
                $system_email   = $this->crud->getInfo('system_email');
            ?>
            <div style="padding: 60px 70px; border-top: 1px solid rgba(0,0,0,0.05);">
                <h1 style="margin-top: 0px;">Nueva solicitud de contraseña</h1>
                <div style="color: #636363; font-size: 14px;">
                    <p><?php echo $email_msg;?></p>
                </div>
            </div>
            
            <div style="background-color: #F5F5F5; padding: 40px; text-align: center;">
                <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05);">
                    <div style="color: #A5A5A5; font-size: 10px; margin-bottom: 5px;">
                       <?php echo $system_name;?> Org.
                    </div>
                    <div style="color: #A5A5A5; font-size: 10px;"> © Copyright <?php echo date('Y');?>. All rights reserved.
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>