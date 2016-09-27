<html>
<head>
    <? require'../dom/base.php'; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Expand row in DataGrid to show subgrid - jQuery EasyUI Demo</title>
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/demo/demo.css">
    <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="jquery.easyui.min.js"></script>
    <script src="datagrid-detailview.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <script src="jquery.sumoselect.js"></script>
    <link href="sumoselect.css" rel="stylesheet" />
    <link href="../find.css" rel="stylesheet" />

</head>

<body class="bd">

<header>
    <div class="head" align="center">
        <ul class="m">
            <li class="m"><a href="/stat1" title="Графики распределения кредитных портфелей ФГВФО"><i class="fa fa-pie-chart" aria-hidden="true"> Графики </i></a></li>
            <li class="m"><a class="activetab" href="/stat" title="Кредитные портфели банков ФГВФО"><i class="fa fa-list-ol" aria-hidden="true"> Кредиты </i></a></li>
            <li class="m"><a href=".." title="Сводный реестр продаж ФГВФО"><i class="fa fa-paperclip"> Торги </i></a></li>
        </ul>
    </div>
    <div class="sub-head" align="center">
        <i class="fa fa-list-ol" aria-hidden="true"></i> Кредитные портфели банков ФГВФО
    </div>
</header>


<div id="content" style="position: relative;">


<div id="tb">
    <span class="SumoSelect"><input id="inp" type="text" style="padding: 7px 5px 2px 9px; font-style: italic;font-size: 12px;" placeholder="Поиск по номеру"/></span>
    <select id="select" multiple="multiple">
<?php foreach($pdo->query('SELECT id, name FROM torgi_mb') as $rowcat) {
echo '<option value="'.$rowcat['id'].'"';
echo '>'.$rowcat['name'];
echo '</option>';}?>
</select>
<select id="urfiz" multiple="multiple">
    <option value="1">Физ лицо</option>
    <option value="2">Юр лицо</option>
    <option value="3">ФОП</option>
</select>
    <br />
    <button onclick="doSearch()">Поиск</button>
</div>

<table id="dg"
       class="easyui-datagrid"
       url='getdata.php'
       title="#" toolbar="#tb"
       rownumbers="true" pagination="true"
       showFooter="true" pageList="[5,20,100]">
    <thead>
    <tr>
        <th field="id" hidden="true">ID</th>
        <th field="name" width="20%">Банк</th>
        <th field="num" width="20%">Номер договора</th>
        <th field="YrFiz" formatter="formatYr" width="20%">Тип</th>
        <th field="allDeb" formatter="formatPrice" width="40%">Общая задолженность</th>
    </tr>
    </thead>
</table>


<script type="text/javascript">
    $(function(){
        $('#select').SumoSelect({placeholder: 'Выберите банк', search: true, searchText: 'введите текст'});
        $('#urfiz').SumoSelect({placeholder: 'Вид кредитора'});
        $('#dg').datagrid({
            view: detailview,
            detailFormatter:function(index,row){
                return '<div style="padding:2px"><table id="ddv-' + index + '"></table></div>';
            },
            onExpandRow: function(index,row){
                $('#ddv-'+index).datagrid({
                    url:'getdata2.php?itemid='+row.id,
                    fitColumns:true,
                    singleSelect:true,
                    rownumbers:true,
                    loadMsg:'',
                    height:'auto',
                    columns:[[
                        {field:'cid',title:'№',width:20},
                        {field:'codval',title:'Валюта',width:100,align:'right'},
                        {field:'tip',title:'Тип',formatter:valuta,width:100,align:'right'},
                        {field:'opis',title:'Описание', formatter:valuta,width:100,align:'right'},
                        {field:'addr',title:'Адрес',width:100,align:'right'},
                        {field:'srocDeb',title:'Сроковая',formatter:formatPrice,width:100,align:'right'},
                        {field:'prosrocDeb',title:'Просроченная',formatter:formatPrice,width:100,align:'right'},
                        {field:'allDeb',title:'Общая',formatter:formatPrice, width:100,align:'right'}
                    ]],
                    onResize:function(){
                        $('#dg').datagrid('fixDetailRowHeight',index);
                    },
                    onLoadSuccess:function(){
                        setTimeout(function(){
                            $('#dg').datagrid('fixDetailRowHeight',index);
                        },0);
                        $(this).datagrid('getPanel').find('.easyui-tooltip').tooltip({
                            showDelay: 50
                        });
                    }
                });
                $('#dg').datagrid('fixDetailRowHeight',index);
            }
        });
    });

    function doSearch(){
        var objB = [];
        var objU = [];
        $('#select option:selected').each(function(){
            objB.push($(this).val());
        });
        $('#urfiz option:selected').each(function(){
            objU.push($(this).val());
        });

        $('#dg').datagrid('load',{
            bank: objB,
            ur: objU,
            nom: $('#inp').val()
        });
    }
    function formatPrice(val,row){
        return val.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');
    }
    function formatYr(val, row){
        var tip = "";
        switch (val){
            case "1" : tip = "Физ.лицо";
                break;
            case "2" : tip = "Юр.лицо";
                break;
            case "3" : tip = "ФОП";
                break;
        }
        return tip;
    }
    function valuta(val, row){
        return '<a class="easyui-tooltip" title="'+val+'" href="#">'+val+'</a>';
    }

</script>
</div>
</body>
</html>