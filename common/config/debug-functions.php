<?php

/**
 * Debug function
 * pre($var);
 */
function pr($var = null)
{
    echo '<pre>';
    yii\helpers\VarDumper::dump($var, 10, true);
    echo '</pre>';
}

/**
 * Debug function
 * pre($var);
 */
function pre($var = null)
{
    echo '<pre>';
    yii\helpers\VarDumper::dump($var, 10, true);
    echo '</pre>';
    die;
}