<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/tabs.css" />
    <link rel="stylesheet" type="text/css" href="css/tabstyles.css" />
    <script src="js/modernizr.custom.js"></script>
</head>
<body>
<svg class="hidden">
    <defs>
        <path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z"/>
    </defs>
</svg>

<section>
    <div class="tabs tabs-style-circlefill">
        <nav>
            <ul>
                <li><a href="#" class="icon icon-plug"><span>Connect</span></a></li>
                <li><a href="#" class="icon icon-gift"><span>Gifts</span></a></li>
                <li><a href="#" class="icon icon-box"><span>Boxes</span></a></li>
                <li><a href="#" class="icon icon-date"><span>Prints</span></a></li>
                <li><a href="#" class="icon icon-plane"><span>Fun</span></a></li>
            </ul>
        </nav>
        <div class="content-wrap">
            <section id="section-circlefill-1"><p>1</p></section>
            <section id="section-circlefill-2"><p>2</p></section>

        </div><!-- /content -->
    </div><!-- /tabs -->
</section>
<script src="js/cbpFWTabs.js"></script>
<script>
    (function() {

        [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
            new CBPFWTabs( el );
        });

    })();
</script>
</body>