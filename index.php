<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	<?php
	
        require_once("app/Form.php");
        $form = new Form();

        $status = $form->saveDataFromForm();
	
	?>
	<div class="container">
		<span> Создать заказ | </span><a href="reports.php" class="text-primary"> Отчеты о заказах </a>
		<hr>
		<h1> Создать заказ </h1>
        <p><?php if (isset($status)) echo $status;?> </p>
        <form action="" method="POST" role="form"  enctype="multipart/form-data" id="form" class="form-horizontal">
            <?php foreach ($form->showForm as $key => $value): ?>
            <div class="form-group has-success">
                <label class="control-label col-md-2" for="inputSuccess1"><?php echo $value['title']?></label>
                <div class="col-md-4">
                    <input type="<?php echo $value['type_input']?>" pattern="<?php echo $value['pegExpr']?>" class="form-control input-sm" id="inputSuccess1" aria-describedby="helpBlock2" name="<?php echo $value['name']?>" placeholder="<?php echo $value['placeholder']?>">
                </div>
            </div>
            <?php endforeach; ?>
            <div>
                <input type="submit" class="btn btn-primary" name="sent" value="Создать">
                <input type="submit" class="btn btn-default" id="clear" value="Очистить">
            </div>
        </form>
	</div>
	<script type="text/javascript" src="js/clear.js">
	</script>
</body>
</html>