<div>
    <a title="Закрыть" onclick="cl()" id="cl" style="float: right">X</a>

    <form class="sky-form">
        <header><a onclick="reg()">Вход</a> / Регистрация</header>
        <fieldset>
            <section>
                <label class="label">Выберите логин</label>
                <label class="input state-success">
                    <input type="text" name="login" >
                </label>
                <div class="note note-success">Уникальный логин для входа в систему</div>
            </section>
            <section>
                <label class="label">Выберите пароль</label>
                <label class="input state-success">
                    <input type="text" name="password" >
                </label>
                <div class="note note-success">Пароль для входа. Минимум 6 символов</div>
            </section>
            <section>
                <label class="label">Введите ваше имя</label>
                <label class="input state-success">
                    <input type="text" name="name" >
                </label>
                <div class="note note-success">Имя пользователя</div>
            </section>
        </fieldset>
        <footer>
            <input type="button" class="button" value="Регистрация" onclick="reg()"</input>
        </footer>
    </form>
</div>