<div id="content"></div>
<button onclick="allBank()">Все банки</button>
<button onclick="bList()">Список</button>
<button onclick="Birga()">Биржа</button>

<script type="text/javascript">
    function allBank(){
        document.getElementById("content").innerHTML='<object type="text/html" data="allbank.php" width="100%" height="80%" ></object>';
    }
    function bList(){
        document.getElementById("content").innerHTML='<object type="text/html" data="banklist.php" width="100%" height="80%" ></object>';

    }

    function Birga(){
        document.getElementById("content").innerHTML='<object type="text/html" data="birga.php" width="100%" height="80%" ></object>';

    }
</script>

