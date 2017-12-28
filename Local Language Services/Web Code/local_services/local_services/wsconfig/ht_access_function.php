<?php 

//$geturl=trim(htmlentities(array_shift($_GET),ENT_QUOTES),"/");    
function get_url_params() {
    
    //Get the query string made of slashes
    $slashes=explode("/",trim(htmlentities(array_shift($_GET),ENT_QUOTES),"/"));
    
    //print_r ($slashes);
    
    //Extract the asked page from those parameters
    switch(count($slashes)) {
        case 0:
            $params['page'] = "home";
            break;
        case 1:
            $params['page'] = array_shift($slashes);
            break;
        case ((count($slashes) % 2)==1):
            //odd
            $params['page'] = array_shift($slashes);
            break;
        default:
            //even
            $params['page'] = array_shift($slashes);
            //$params['myparam'] = array_shift($slashes);
            break;
    }
 
    //Process the parameters by pairs
    $cpt = 1;
    $param = "";
    if( !empty( $slashes ) ) {
        foreach($slashes as $get){
           $params[] = htmlentities($get,ENT_QUOTES);
        }
    }
 
    //Process the $_GET parameters if any
    if( !empty( $_GET ) ) { 
        foreach($_GET as $name=>$get){
            $params[] = htmlentities( $get, ENT_QUOTES );
        }
    }
    return $params;
}

$pages = get_url_params();


$key=array_keys($fun);

$key1  = $key[0];
$key2 = $key[1];
$key3 = $key[2];
$key4 = $key[3];
$key5 = $key[4];

?>