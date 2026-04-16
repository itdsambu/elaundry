<?php

function resizeImageCk($path)
{
    $CI = &get_instance();
    $configer['image_library'] = 'gd2';
    $configer['source_image'] = $path;
    $configer['maintain_ratio'] = TRUE;
    $configer['width'] = 1024;
    $configer['height'] = 768;
    $CI->load->library('image_lib', $configer);
    $CI->image_lib->clear();
    $CI->image_lib->initialize($configer);
    $CI->image_lib->resize();
}
