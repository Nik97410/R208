<?php
    function conversion()  {

        $sortie = popen("/home/aime/public_html/R208/ppgn_v2_0 -i uploads/in_3.pgn -o uploads/document.tex", "r");
        pclose($sortie);
    }

    echo conversion();
