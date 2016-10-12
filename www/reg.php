<?
//session_start();
include("dom/base.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
echo "Login: ".$_POST['login']."<br /> Password: ".$_POST['password']."<br /> Name: ".$_POST['name'];
    if(empty($_POST['login']) || empty($_POST['password']) || empty($_POST['name'])){
    $disp = "block";
    }
    else{
        $username=$_POST['login'];
        $password=$_POST['password'];
        $name=$_POST['name'];
        $password=md5($password); // Encrypted Password with md5
        $result=$pdo->prepare("Insert into users(login,password,name) values(:login,:password,:name)");
        $result->bindParam('login', $username);
        $result->bindParam('password', $password);
        $result->bindParam('name', $name);
        $result->execute($sql);
        $msg="Registration Successfully";
        echo '<script type="text/javascript">',
        'cl();',
        '</script>'
        ;
        $disp = "none";
    }
}
else{$disp = "none";}

?>
<div><a title="Закрыть" onclick="cl()" id="cl" style="float: right">X</a>
    <form class="sky-form">
        <header><a onclick="reg('butt')">Вход</a> / Регистрация</header>
        <fieldset>
            <section>
                <label class="label">Выберите логин</label>
                <label class="error" style="display: <?=$disp; ?>; color: RED">Не пустое!</label>
                <label class="input state-success">
                    <input type="text" name="login" >
                </label>
                <div class="note note-success">Уникальный логин для входа в систему</div>
            </section>
            <section>
                <label class="label">Выберите пароль</label>
                <label class="error" style="display: <?=$disp; ?>; color: RED">Не пустое!</label>
                <label class="input state-success">
                    <input type="text" name="password" >
                </label>
                <div class="note note-success">Пароль для входа. Минимум 6 символов</div>
            </section>
            <section>
                <label class="label">Введите ваше имя</label>
                <label class="error" style="display: <?=$disp; ?>; color: RED">Не пустое!</label>
                <label class="input state-success">
                    <input type="text" name="name" >
                </label>
                <div class="note note-success">Имя пользователя</div>
            </section>
        </fieldset>
        <footer>
            <input type="button" class="button" value="Регистрация" onclick="reg('register')"</input>
        </footer>
    </form>
</div>