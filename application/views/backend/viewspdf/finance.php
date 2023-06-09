<!DOCTYPE html>
<html>
    <head>
        <meta charset="gb18030" />
    </head>

    <body>
        <div style="width: 100%; font-size: 16px; line-height: 24px; font-family: 'nunito'; color: #555;">
            <table cellpadding="0" cellspacing="0" style="width: 100%; line-height: inherit; text-align: left;">
                <tr>
                    <td colspan="2">
                        <table style="width: 100%; line-height: inherit; text-align: left;">
                            <tr>
                                <td style="padding-bottom: 20px; vertical-align: top;"></td>
                                <td style="padding-bottom: 20px; vertical-align: top; text-align: center; padding-top: 5px;">
                                    <p></p>
                                    <p>Reporte de finanza</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr></tr>
                <tr>
                    <td colspan="2">
                        <table style="width: 100%; line-height: inherit; text-align: left;">
                            <tr style="">
                                <td style="padding-top: 15px; padding-bottom: 15px;">
                                    <b style="font-size: 12px;">
                                        Generado por: <span><?php echo $this->crud->get_name('admin', $this->session->userdata('login_user_id'));?></span>
                                    </b>
                                    <p style="font-size: 12px;">
                                        Fecha:
                                        <b>
                                            <small style="font-weight: bold; text-transform: uppercase;"><?php echo date('d/m/Y H:i a');?></small>
                                        </b>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            </br>
            <table cellpadding="0" cellspacing="0"
            style="border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;width: 100%;line-height: inherit;text-align: left;">
                <tr>
                <td style="border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;background: #eee;font-style:italic; font-weight:bold;padding:5px;"
                    colspan="3">
                    #
                </td>
                <td style="border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;background: #eee;font-style:italic; font-weight:bold;padding:5px;"
                    colspan="4">
                    Mes
                </td>
                <td style="border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;background: #eee;font-style:italic; font-weight:bold;padding:5px;"
                    colspan="4">
                    Consumo
                </td>
                <td style="border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;background: #eee;font-style:italic; font-weight:bold;padding:5px;"
                    colspan="4">
                    IGV
                </td>
                <td style="border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;background: #eee;font-style:italic; font-weight:bold;padding:5px;"
                    colspan="4">
                   Total
                </td>
                <td style="border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;background: #eee;font-style:italic; font-weight:bold;padding:5px;"
                    colspan="4">
                    Fecha de creación
                </td>
                <td style="border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;background: #eee;font-style:italic; font-weight:bold;padding:5px;"
                    colspan="4">
                    Estado de pago
                </td>
                <td style="border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;background: #eee;font-style:italic; font-weight:bold;padding:5px;"
                    colspan="4">
                    Fecha de cancelación
                </td>
                </tr>
                <?php 
                $finance = $this->crud->get_finance(); 
                $i = 1;
                foreach($finance as $row):
                ?>
                <tr>
                   <td colspan="3"
                    style="padding:15px; border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;padding-top:15px;font-size: 12px;">
                    <?php echo $i++;?>
                </td> 
                <td colspan="4"
                    style="padding:15px; border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;padding-top:15px;font-size: 12px;">
                    <?= $row['month'];?>
                </td>
                <?php 
                if(isset($row['consumption'])):?>
                aaa
                <?php else: ?>
                <?php endif;?>
                <td colspan="4"
                    style="padding:15px; border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;padding-top:15px;font-size: 12px;">
                    <?=$row['consumption'].''.$row['unit'];?>
                </td>
                <td colspan="4"
                    style="padding:15px; border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;padding-top:15px;font-size: 12px;">
                    <?= $row['igv'];?>
                </td>
                <td colspan="4"
                    style="padding:15px; border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;padding-top:15px;font-size: 12px;">
                    <?= $row['total'];?>
                </td>
                <td colspan="4"
                    style="padding:15px; border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;padding-top:15px;font-size: 12px;">
                    <?= $row['creation_date'];?>
                </td>
                <td colspan="4"
                    style="padding:15px; border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;padding-top:15px;font-size: 12px;">
                    <?= $row['payment_status'];?>
                </td>
                <td colspan="4"
                    style="padding:15px; border-right: 1px solid black;border-bottom: 1px solid black; border-left: 1px solid black; border-top: 1px solid black;padding-top:15px;font-size: 12px;">
                    <?= $row['cancellation_date'];?>
                </td>
                </tr>
                <?php endforeach;?>
            </table>
        </div>
    </body>
</html>
