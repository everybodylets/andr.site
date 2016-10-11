<head xmlns="http://www.w3.org/1999/html">
    <meta charset="utf-8">
</head>

<body style="background-color: rgb(240, 255, 240)">
<p>Термины:</p>

<p>Оператор &ndash; поставщик услуги Mobile ID, оператор сотовой связи.</p>

<p>Клиент &ndash; пользователь услуги Mobile ID.</p>

<p>Агент &ndash; лицо, идентифицирующее Клиента с помощью услуги Mobile ID.</p>

<p>&nbsp;</p>


    <p>Инфраструктура Mobile ID состоит из:</p>
<ul>
    <li>Центра Сертификации (аккредитованный или свой),</li>
    <li>Авторизационного Центра (в структуре Оператора),</li>
    <li>закрытого ключа пользователя (javasim в телефоне),</li>
    <li>открытого ключа в АЦ и</li>
    <li>API для взаимодействия с Агентами.</li>
</ul>

<p><br />
    Mobile ID предоставляет только идентификацию пользователя, по тем документам, что он ранее предоставил Оператору.<br />
    Неизвестно, будут ли Операторы использовать Аккредитованные Центры Сертификации, либо только свои.</p>

<p>Согласно законопроекту &laquo;Про електронні довірчі послуги&raquo; № 4685 поставщики Mobile ID будут аккредитованными центрами. Но он еще не принят.</p>

<p>&nbsp;</p>

<p>Инфраструктура Bank ID состоит из:</p>

<ul>
    <li>Авторизационного Центра,</li>
    <li>API (в структуре Банка),</li>
    <li>API для взаимодействия с Агентами.</li>
</ul>

<p>&nbsp;</p>

<p>Система Bank ID является агрегатором и посредником передачи запросов Агентов в Банк.</p>

<p>Клиент вводит логин и пароль доступа в веб-банкинг, Агент получает идентификационную информацию о Клиенте.</p>

<p>На данный момент система Bank ID не предоставляет финансовой информации о клиенте.</p>

<p>&nbsp;</p>

<p>На сегодняшний день, использование этих инструментов, как унифицированных платежных средств невозможно, так как требует предварительных договоренностей между всеми участниками &ndash; Банками, Операторами, Агентами и огромную доработку существующего ПО.</p>

<p>&nbsp;</p>

<p>Для решения задачи выдачи наличности со счетов Банка &laquo;своим&raquo; клиентами через свои банкоматы можно использовать опыт Приватбанка с услугой &laquo;Снятие денег без карты&raquo;.</p>

<ul>
    <li>В банковском ПО клиенту выделяется виртуальная платежная карта,</li>
    <li>по запросу от банкомата Клиент верифицируется (приложением в его смартфоне, СМС, MobileID). Технология верификации выбирается исходя из стоимости её реализации и безопасности. MobileID использует собственные Центры Сертификации и Авторизации, что потенциально является дырой в безопасности.</li>
    <li>В ПО банкомата подставляются данные виртуальной карты, Клиент вводит PIN, далее идет стандартная карточна транзакция через процессинг.</li>
</ul>

<p>&nbsp;Такой способ требует минимальной (сравнительно) доработки Банковского ПО и ПО Банкоматов.&nbsp;</p>
<br />
<br />
<br />
</body>