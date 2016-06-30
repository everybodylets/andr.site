<script src="svidget.min.js"></script>
<link href="jquery-ui.css" rel="stylesheet" type="text/css" />

<script src="jquery-2.1.1.min.js"></script>
<script src="jquery-ui.min.js"></script>


<div class="widgetblock">
    <div class="widgetblockcontrols">
        <div class="controlbox">
            <span class="controllabel">data (0-1)</span>
            <span><input id="inputData" name="data" value="0.55"></span>
        </div>
        <div class="controlbox">
            <span class="controllabel">color</span>
            <span><input id="inputColor" name="color" value="#da3333"></span>
        </div>
        <div class="controlbox">
            <span class="controllabel">backColor</span>
            <span><input id="inputBackColor" name="backColor" value="#ffac33"></span>
        </div>
        <div class="controlbox">
            <span class="controllabel">textColor</span>
            <span><input id="inputTextColor" name="textColor" value="#da3333"></span>
        </div>
        <div class="controlbox">
            <span class="controllabel">showText</span>
            <span><input type="checkbox" id="inputShowText" name="showText" checked="checked"></span>
        </div>
        <div class="controlbox">
            <span class="controllabel">width (1-98)</span>
            <span><input id="inputWidth" name="width" value="40"></span>
        </div>
    </div>
    <div class="widgetblockinstance">
        <object id="myDonutGauge" role="svidget" data="donut.svg" type="image/svg+xml" width="200" height="200">
            <param name="data" value="0.22" />
            <param name="color" value="#da3333" />
            <param name="backColor" value="#ffac33" />
            <param name="textColor" value="#da3333" />
            <param name="showText" value="true" />
            <param name="width" value="50" />
        </object>
    </div>
</div>
<script type="text/javascript">

    var _widget;

    $(document).ready(function (e) {
    //    hljs.initHighlightingOnLoad();
    //    $('.scrolly').scrolly(500, -10);
        initWidgetControls();
    });

    function initWidgetControls() {
        _widget = svidget.widget("myDonutGauge");
        $("#inputData").change(onFormDataChange);
        $("#inputColor").change(onFormColorChange);
        $("#inputBackColor").change(onFormBackColorChange);
        $("#inputTextColor").change(onFormTextColorChange);
        $("#inputShowText").change(onFormShowTextChange);
        $("#inputWidth").change(onFormWidthChange);
    }

    function onFormDataChange(e) {
        var val = $("#inputData").val();
        _widget.param("data").value(val);
    }

    function onFormColorChange(e) {
        var val = $("#inputColor").val();
        _widget.param("color").value(val);
    }

    function onFormBackColorChange(e) {
        var val = $("#inputBackColor").val();
        _widget.param("backColor").value(val);
    }

    function onFormTextColorChange(e) {
        var val = $("#inputTextColor").val();
        _widget.param("textColor").value(val);
    }

    function onFormShowTextChange(e) {
        var val = document.getElementById("inputShowText").checked;
        var p = _widget.param("showText");
        p.value(val);
    }

    function onFormWidthChange(e) {
        var val = $("#inputWidth").val();
        _widget.param("width").value(val);
    }

    function openCode(eleID) {
        var sel = "#" + eleID;
        $(sel).dialog({
            modal: true,
            width: '100%',
            height: $(window).height()
        });
    }

</script>

