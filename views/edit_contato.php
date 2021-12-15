<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
</head>
<body>
   <form action="#" method="POST">
       <input type="hidden" name="id" value="<?php echo $ret[0]->id; ?>">
        <label>Nome:</label>
        <input type="text" name="name" value="<?php echo $ret[0]->name; ?>">
        <br><br>
        <label>Telefone:</label>
        <input type="text" name="phone" value="<?php echo $ret[0]->phone; ?>">
        <br><br>
        <label>Observações:</label>
        <input type="text" name="observations" value="<?php echo $ret[0]->observations; ?>">
        <br><br>
        <input type="submit" value="Alterar">
   </form>
</body>
</html>