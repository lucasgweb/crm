<?php
    //DUMP AND DIE


    function dd($params = [], $die = true)
    {
        echo '<pre
        style="
        background-color: Black;
        color: Lime;
        ">';
            print_r($params);
        echo '</pre>';

        if ($die) die();
    }
