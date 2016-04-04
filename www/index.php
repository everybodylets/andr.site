<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Rapha?l � Graffle</title>
    <link rel="stylesheet" href="demo.css" type="text/css" media="screen">
    <link rel="stylesheet" href="demo-print.css" type="text/css" media="print">
    <script src="raphael.js" type="text/javascript" charset="utf-8"></script>
    <script src="gr.js" type="text/javascript" charset="utf-8"></script>
    <style type="text/css" media="screen">
        #holder {
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border: solid 1px #f2f2f2;
        }
        p {
            text-align: center;
        }
    </style>
</head>
<body>
<p>Drag shapes around.</p>
<div id="holder"></div>
<script type="text/javascript">
   function reqListener () {
       console.log(this.responseText);
    }

    var oReq = new XMLHttpRequest(); //New request object
    oReq.onload = function() {
        //This is where you handle what to do with the response.
        //The actual data is found on this.responseText
        alert(this.responseText); //Will alert: 42
    };
  var oReq = new XMLHttpRequest(); //New request object
    oReq.open("get", "get_data.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to
    //                                 continue.
    oReq.send();
</script>
<script type="text/javascript">function add(){
        st();
        var color, i, ii, tempS, tempT,
        r = Raphael("holder", 640, 480),
            connections = [],
            shapes = [  r.ellipse(190, 100, 30, 20),
                r.rect(290, 80, 60, 40, 10),
                r.rect(290, 180, 60, 40, 2),
                r.ellipse(450, 100, 20, 20),
                r.rect(500, 220, 100, 40, 10)
            ],
            texts = [   r.text(190, 100, "One"),
                r.text(320, 100, "two"),
                r.text(320, 200, "Three"),
                r.text(450, 100, "Four"),
                //r.text(530, 240, "new"),
                r.image("logo.png", 500,220, 100, 40)

            ];
        for (i = 0, ii = shapes.length; i < ii; i++) {
            color = Raphael.getColor();
            tempS = shapes[i].attr({fill: color, stroke: color, "fill-opacity": 0, "stroke-width": 2, cursor: "move"});
            tempT = texts[i].attr({fill: color, stroke: "none", "font-size": 15, cursor: "move"});
            shapes[i].drag(move, dragger, up);
            texts[i].drag(move, dragger, up);

            // Associate the elements
            tempS.pair = tempT;
            tempT.pair = tempS;
        }
//    connections.push(r.connection(shapes[0], shapes[1], "#fff"));
        connections.push(r.connection(shapes[1], shapes[2], "#fff", "#fff|5"));
//    connections.push(r.connection(shapes[1], shapes[3], "#000", "#fff"));
//    connections.push(r.connection(shapes[2], shapes[4], "#000", "#fff"));
      alert(connections.length);


       };



</script>
<!script type="text/javascript">window.onload = st();<!/script>
<button onclick="add()">add</button>

</body>
</html>