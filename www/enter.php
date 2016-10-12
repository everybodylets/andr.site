<?
session_start();
require"dom/base.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "Login: ".$_POST['login']."<br /> Password: ".$_POST['password'];
    if(empty($_POST['login']) || empty($_POST['password'])){
        $disp = "block";
    }
    else{
        $disp = "none";
        $username=trim($_POST['login']);
        $password=trim($_POST['password']);
        $password=md5($password);//convert into md5 encrypted password
        $result=$pdo->query("SELECT SQL_CALC_FOUND_ROWS id, name FROM users WHERE login='$username' and password='$password'");
        $count=$pdo->query('SELECT FOUND_ROWS();')->fetch(PDO::FETCH_COLUMN);
        $r=$result->fetch();
        if($count==1)
        {
            $_SESSION['login_user']=$username;
            $_SESSION['name_user']=$r['name'];
            echo '<script type="text/javascript">',
            'cl();',
            '</script>'
            ;
        }
        else
        {
            $res="Неверные логин или пароль!";
        }

    }
}
else{$disp = "none";}
?>
<div>
    <a title="Закрыть" onclick="cl()" id="cl" style="float: right">X</a>
    <form class="sky-form">
        <header>Вход / <a onclick="reg('change')">Регистрация</a></header>
        <label class="error" style="color: RED"><?=$res?></label>
        <fieldset>
            <section>
                <label class="label">Логин</label>
                <label class="error" style="display: <?=$disp; ?>; color: RED">Не пустое!</label>
                <label class="input state-success">
                    <input type="text" name="login" >
                </label>
                <div class="note note-success">Уникальный логин для входа в систему</div>
            </section>
            <section>
                <label class="label">Пароль</label>
                <label class="error" style="display: <?=$disp; ?>; color: RED">Не пустое!</label>
                <label class="input state-success">
                    <input type="text" name="password">
                </label>
                <div class="note note-success">Пароль для входа</div>
            </section>
        </fieldset>
        <footer>
            <input type="button" class="button" value="Вход" onclick="reg('enter')"</input>
        </footer>
    </form>
</div>
