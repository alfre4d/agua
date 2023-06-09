
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PDF</title>
</head>
<body>
   <?php
    //print_r($query);
    ?> 
    <?php foreach($query as $row):?>
        <?php 
            $filename = base_url('public/uploads/archive/'.$row['message']);
            
            header('Content-type: application/pdf');
  
            header('Content-Disposition: inline; filename="' . $filename . '"');
              
           
              
            // Read the file
           readfile($filename);
            
        ?>
    <?php endforeach; ?>
</body>
</html>