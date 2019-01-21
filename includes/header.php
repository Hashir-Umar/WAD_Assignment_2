<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php print $PAGE_TITLE;?></title>

    <?php if ($CURRENT_PAGE == "Index") { ?>
        <?php include("meta-keywords.php");?>
    <?php } ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo $src_folder."/images/icon.ico"; ?>" />
    <link rel="stylesheet" href="<?php echo $src_folder."/css/bootstrap.css"; ?>">
    <link rel="stylesheet" href="<?php echo $src_folder."/css/styles.css"; ?>">
</head>
