<?php

// Leave the code below alone
if(isset($_SESSION['application'])){
    $parsed = $_SESSION;
    $setsession = false;
} else {

    $yaml = "";
    // READ ALL FILES IN ASSETS/DATA AND CONCATENATE

        //Open directory
        $path = "assets/data/";
        $dir = dir($path);

        //List files in directory
        while (($file = $dir->read()) !== false){

            //Make sure it's a .txt file
            if(strlen($file) <  5 or $file == ".DS_Store")
                continue;
            $yaml .= file_get_contents($path.$file);
            $yaml .= "\n";
        }

        $dir->close();

    $parsed = Spyc::YAMLLoad($yaml);
    $_SESSION = $parsed;
}

// Handle datachanges
$sessiondata = "";
if (!empty($_POST['session'])){

    foreach($_POST['session'] as $key => $postSession) {
        setSessionVar($key, $postSession);
        $sessiondata .= print_r($postSession, true);
    }
    $parsed = $_SESSION;

}

if (!empty($_GET['session']) && isset($_GET[$_GET['session']])){

    setSessionVar($_GET['session'], $_GET[$_GET['session']]);

    $parsed = $_SESSION;

}


// Expose each session key as variable and handle livesearch entry
$livesearch = "";
$livesearchKeys = array("name", "title");
$mykeys = array();
foreach ($parsed as $key => $item){
    $$key = $item;

    if (is_array($$key)) {
        $url="";
        foreach($$key as $subkey => $var){

            if(!empty($var[0])){

                //die();
                if($var[0] == 'parse'){
                    if(!empty($var[2])){
                       $tempvar = $var[1]($var[2]);
                    } else {
                       $tempvar =  $var[1]();
                    }
                    ${$key}[$subkey] = $tempvar;
                }
            }

            if($subkey === "livesearch") {
                $url = ${$key}[$subkey]['url'];
                unset(${$key}[$subkey]);
            } else {
                if(is_array($var)){

                    // Add an id if it is an associative array
                    if(array_values($var) != $var){
                        ${$key}[$subkey]['id'] = $subkey;
                        };

                    foreach ($livesearchKeys as $lsKey){
                        if(!empty(${$key}[$subkey][$lsKey])){
                            $livesearch .= "{value: '". addslashes(${$key}[$subkey][$lsKey]) . "', url: '" . $url ."?id=" . $subkey . "'},";
                        }
                    }

                    foreach ($var as $vkey => $v){

                        if(!empty($v[0])){

                            if($v[0] == 'parse'){
                                $mykeys[]= $vkey;
                                if(!empty($v[2])){
                                   $tempvar = $v[1]($v[2]);
                                } else {
                                   $tempvar =  $v[1]();
                                }
                                ${$key}[$subkey][$vkey] = $tempvar;
                            }
                        }


                    }




                }
            }

        }
    }
}
$livesearch = substr($livesearch, 0, -1);


function setSessionVar($key, $item){
    $el = explode('.', $key);
    $type = "default";
    if(preg_match('/arrayPush/', $item)){
        $type = "push";
        $item = substr($item, 10);
    }
    if(preg_match('/arrayUnserialize/', $item)){
        $item = unserialize(substr($item, 17));
    }
    switch($type){
        case 'push':
            switch(count($el)){
                case 1:
                    array_push($_SESSION[$el[0]], $item);
                    break;
                case 2:
                    array_push($_SESSION[$el[0]] [$el[1]], $item);
                    break;
                case 3:
                    array_push($_SESSION[$el[0]][$el[1]][$el[2]], $item);
                    break;
                case 4:
                    array_push($_SESSION[$el[0]][$el[1]][$el[2]][$el[3]], $item);
                    break;
                case 5:
                    array_push($_SESSION[$el[0]][$el[1]][$el[2]][$el[3]][$el[4]], $item);
                    break;
                case 6:
                    array_push($_SESSION[$el[0]][$el[1]][$el[2]][$el[3]][$el[4]][$el[5]], $item);
                    break;
            }
            break;
        default:
            switch(count($el)){
                case 1:
                    $_SESSION[$el[0]] = $item;
                    break;
                case 2:
                    $_SESSION[$el[0]] [$el[1]]= $item;
                    break;
                case 3:
                    $_SESSION[$el[0]][$el[1]][$el[2]] = $item;
                    break;
                case 4:
                    $_SESSION[$el[0]][$el[1]][$el[2]][$el[3]] = $item;
                    break;
                case 5:
                    $_SESSION[$el[0]][$el[1]][$el[2]][$el[3]][$el[4]] = $item;
                    break;
                case 6:
                    $_SESSION[$el[0]][$el[1]][$el[2]][$el[3]][$el[4]][$el[5]] = $item;
                    break;
            }
            break;
    }
}