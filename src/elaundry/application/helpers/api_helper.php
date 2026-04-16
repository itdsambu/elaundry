<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('setAPI')) {
    function setAPI($set = 'private')
    {
        // if ($set === "public") {
        // return 'http://apip2.myrsup.co.id:81/Memo_API/';
        return 'http://192.168.3.8/Memo_API/';
        // }
        // if ($set === "private") {
        // 	// return 'http://192.168.12.168:81/Memo_API/';
        // 	return 'http://192.168.12.68/Memo_API/';
        // }
    }

    function setAPI2()
    {
        return 'http://192.168.3.8/MasterDataP1Api/';
    }

    function setAPI3()
    {
        return 'http://192.168.3.8/UserDataP1Api/';
    }

    function setAPI4()
    {
        return 'http://192.168.3.8/EformP1Api/';
    }

    function setAPI5()
    {
        return 'http://192.168.0.4/OneLogin/';
    }
}

// if ( ! function_exists('setAPI')){
//     function setAPI() {
//         return 'http://192.168.3.8/MasterDataP1Api/';
//     }

//     function setAPI2() {
//         return 'http://192.168.3.8/UserDataP1Api/';
//     }

//     function setAPI3() {
//         return 'http://192.168.3.8/EformP1Api/';
//     }

//     function setAPI4(){
//         return 'http://192.168.0.4/OneLogin/';
//     }
// }
