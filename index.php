<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Document</title>
    <style>
        body{
            padding-left:5%;
            padding-right:5%;
        }
    </style>
</head>
<body>
    <h1>Регистрация</h1>
    <table>
    <?php
    $data=array(
        'id'=>array(),
        'name'=>array(),
        'email'=>array()
    );
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwd_p'])){
 
        if(strpos($_POST['email'],'@') !== false && $_POST['password']==$_POST['passwd_p']){
            $id=count($data['id'])+1;
            array_push($data['name'],$_POST['name']);
            array_push($data['email'],$_POST['email']);
            array_push($data['id'],$id);
            if(file_exists('data.txt')==false){
                file_put_contents('data.txt','');
            }
            foreach($data['id'] as $v){
                file_put_contents('data.txt',PHP_EOL.$v,FILE_APPEND);
            }
            foreach($data['name'] as $v){
                file_put_contents('data.txt',PHP_EOL.$v,FILE_APPEND);
            }
            foreach($data['email'] as $v){
                file_put_contents('data.txt',PHP_EOL.$v,FILE_APPEND);
                file_put_contents('data.txt',PHP_EOL."Email заполнен пользователем",FILE_APPEND);

            }
            header('Location: success.php');
            /*foreach($data['id'] as $v){
                ?>
                    <tr>
                        <td><?php echo($v);?></td>
                    
                <?php
            }
            foreach($data['name'] as $v){
                ?>
                        <td><?php echo($v);?></td>
                <?php
            }
            foreach($data['email'] as $v){
                ?>
                        <td><?php echo($v);?></td>
                    </tr>
                <?php
            }
            */
        }
        else{
            echo('Пароли не совпадают, либо email введён неверно');
        }
    }
    ?>
    </table>
    <form id="regform" method="post">
        <div class="form-group">
            <label for="name">Имя: </label>
            <input name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="surname">Фамилия: </label>
            <input name="surname" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">E-mail: </label>
            <input name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Пароль: </label>
            <input name="password" type="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="passwd_p">Повторение пароля: </label>
            <input name="passwd_p" type="password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Зарегистрироваться">
        </div>
    </form>
</body>
    
</html>