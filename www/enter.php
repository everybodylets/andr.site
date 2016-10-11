<div>
    <a title="Закрыть" onclick="cl()" id="cl" style="float: right">X</a>
    <form class="sky-form">
        <header>Вход / <a onclick="reg('reg')">Регистрация</a></header>
        <fieldset>
            <section>
                <label class="label">Логин</label>
                <label class="input state-success">
                    <input type="text" name="login" >
                </label>
                <div class="note note-success">Уникальный логин для входа в систему</div>
            </section>
            <section>
                <label class="label">Пароль</label>
                <label class="input state-success">
                    <input type="text" name="password" >
                </label>
                <div class="note note-success">Пароль для входа</div>
            </section>
        </fieldset>
        <footer>
            <input type="button" class="button" value="Вход" onclick="reg()"</input>
        </footer>
    </form>
</div>