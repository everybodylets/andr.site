/*
 * Canvas curves example
 *
 * By Craig Buckler,		http://twitter.com/craigbuckler
 * of OptimalWorks.net		http://optimalworks.net/
 * for SitePoint.com		http://sitepoint.com/
 *
 * Refer to:
 * http://blogs.sitepoint.com/html5-canvas-draw-quadratic-curves/
 * http://blogs.sitepoint.com/html5-canvas-draw-bezier-curves/
 *
 * This code can be used without restriction.
 */

(function() {

    var canvas_min, ctx_min, code, point1, style, drag = null, dPoint;

    // define initial points
    function Init1(quadratic) {

        point1 = {
            p1: { x:100, y:50 },
            p2: { x:200, y:90 },
//            p3: { x:130, y:350 },
//            p4: { x:600, y:350}
        };

        if (quadratic) {
            point1.cp1 = { x: 300, y: 110 };
//            point.cp3 = { x: 110, y: 300 };
//            point.cp4 = { x: 150, y: 450 };

        }


        // default styles
        style = {
            curve:	{ width: 2, color: "#333" },
            cpline:	{ width: 0.1, color: "#C00" },
            cpline1:	{ width: 0.1, color: "blue" },
            point: { radius: 5, width: 2, color: "#900", color2: "black", fill: "rgba(200,200,200,0.5)", arc1: 0, arc2: 2 * Math.PI }
        }

        // line style defaults
        ctx_min.lineCap = "round";
        ctx_min.lineJoin = "round";

        // event handlers
        //	canvas.onclick = Al;
        canvas_min.onmousedown = DragStart_min;
        canvas_min.onmousemove = Dragging_min;
        canvas_min.onmouseup = canvas_min.onmouseout = DragEnd_min;

        DrawCanvas_min();
    }


    // draw canvas
    function DrawCanvas_min() {
        ctx_min.clearRect(0, 0, canvas_min.width, canvas_min.height);

        // control lines
        ctx_min.lineWidth = style.cpline.width;
        ctx_min.strokeStyle = style.cpline.color;
        ctx_min.beginPath();
        ctx_min.moveTo(point1.p1.x, point.p1.y);
        ctx_min.lineTo(point1.cp1.x, point.cp1.y);

        ctx_min.lineTo(point1.p2.x, point.p2.y); // first red line
        ctx_min.stroke();
        //
        //ctx_min.beginPath();
        //ctx_min.strokeStyle = style.cpline1.color;
        //ctx_min.moveTo(point.p2.x, point.p2.y);
        //ctx_min.lineTo(point.cp3.x, point.cp3.y);
        //
        //ctx_min.lineTo(point.p3.x, point.p3.y); // second red line
        //
        //ctx_min.stroke();
        //
        //ctx_min.beginPath();
        //ctx_min.strokeStyle = style.cpline.color;
        //ctx_min.moveTo(point.p3.x, point.p3.y);
        //ctx_min.lineTo(point.cp4.x, point.cp4.y);
        //
        //ctx_min.lineTo(point.p4.x, point.p4.y); // third red line
        //
        //ctx_min.stroke();

        // curve
        ctx_min.lineWidth = style.curve.width;
        ctx_min.strokeStyle = style.curve.color;
        ctx_min.beginPath();
        ctx_min.moveTo(point1.p1.x, point1.p1.y);

        ctx_min.quadraticCurveTo(point1.cp1.x, point1.cp1.y, point1.p2.x, point1.p2.y);
//        ctx_min.quadraticCurveTo(point.cp3.x, point.cp3.y, point.p3.x, point.p3.y);
//        ctx_min.quadraticCurveTo(point.cp4.x, point.cp4.y, point.p4.x, point.p4.y);
        ctx_min.stroke();

        // control points
        for (var p in point) {
            ctx_min.lineWidth = style.point.width;
            ctx_min.strokeStyle = style.point.color;
            ctx_min.fillStyle = style.point.fill;
            ctx_min.beginPath();
            ctx_min.arc(point1[p].x, point1[p].y, style.point.radius, style.point.arc1, style.point.arc2, true);
            ctx_min.fill();
            ctx_min.stroke();
        }

        //	ShowCode();
    }



    // show canvas code
    function ShowCode() {
        if (code) {
            code.firstChild.nodeValue =
                "canvas = document.getElementById(\"canvas\");\n"+
                "ctx_min = canvas.getContext(\"2d\")\n"+
                "ctx_min.lineWidth = " + style.curve.width +
                ";\nctx_min.strokeStyle = \"" + style.curve.color +
                "\";\nctx_min.beginPath();\n" +
                "ctx_min.moveTo(" + point.p1.x + ", " + point.p1.y +");\n" +
                (point.cp2 ?
                    "ctx_min.bezierCurveTo("+point.cp1.x+", "+point.cp1.y+", "+point.cp2.x+", "+point.cp2.y+", "+point.p2.x+", "+point.p2.y+");" :
                    "ctx_min.quadraticCurveTo("+point.cp1.x+", "+point.cp1.y+", "+point.p2.x+", "+point.p2.y+");"
                ) +
                "\nctx_min.stroke();"
            ;
        }
    }


    // start dragging
    function DragStart_min(e) {
        e = MousePos(e);
        var dx, dy;
        for (var p in point) {
            dx = point1[p].x - e.x;
            dy = point1[p].y - e.y;
            if ((dx * dx) + (dy * dy) < style.point.radius * style.point.radius) {
                drag = p;
                dPoint = e;
                canvas_min.style.cursor = "move";
                style.point.color = "black";

                return;
            }
        }
    }


    // dragging
    function Dragging_min(e) {
        if (drag) {
            e = MousePos(e);
            point1[drag].x += e.x - dPoint.x;
            point1[drag].y += e.y - dPoint.y;
            dPoint = e;
            DrawCanvas_min();
        }
    }


    // end dragging
    function DragEnd_min(e) {
        drag = null;
        canvas_min.style.cursor = "default";
        style.point.color = "red";
        DrawCanvas();
    }


    // event parser
    function MousePos_min(event) {
        event = (event ? event : window.event);
        return {
            x: event.pageX - canvas.offsetLeft,
            y: event.pageY - canvas.offsetTop
        }
    }


    // start
    canvas_min = document.getElementById("canvas_min");
    //code = document.getElementById("code");
    if (canvas_min.getContext) {
        ctx_min = canvas_min.getContext("2d");
        Init1(canvas_min.className == "quadratic");
    }

})();





