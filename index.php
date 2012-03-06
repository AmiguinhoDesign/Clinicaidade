<?php session_start();

include_once('_include/mysql.php');
require_once("ActionServer.php");
$action_server = new ActionServer();


if (isset($_REQUEST['rwr'])) {
    if (substr($_REQUEST['rwr'], -1) == "/") {
        $modrewrite = substr($_REQUEST['rwr'], 0, -1);
    } else {
        $modrewrite = $_REQUEST['rwr'];
    }
    $modrewrite = explode("/", $modrewrite);
}
//echo "<pre>";
//print_r($modrewrite);
//echo "</pre>";

if (isset($modrewrite) && $modrewrite[0] != "") {
    $category = $modrewrite[0];
} else {
    $category = null;
}

if (isset($modrewrite[1])) {
    $service = $modrewrite[1];
} else {
    $service = null;
}

if (isset($modrewrite[2])) {
    $identification = $modrewrite[2];
} else {
    $identification = null;
}

//if (!$_SESSION['id_admin'] && $category != 'login') {
//    echo '<script type="text/javascript">' . "\n";
//    echo "window.location='".ROOT."login'";
//    echo '</script>';
//}
//$category = $_GET['category'];
////$service = $_GET['service'];
////$identification = $_GET['identification'];
//echo $category . $service . $identification."<br/>";
if (isset($category)) {
    if (isset($service)) {
        if (is_numeric($service)) {
            $main_content = '_content/' . $category . '/' . $category . '_main.php';
        } else {
                $main_content = '_content/' . $category . '/' . $category . '_' . $service . '.php';
        }
    } else {
        if ($category != "login") {
            $main_content = '_content/' . $category . '/' . $category . '_main.php';
        } else {
            $main_content = 'views/' . $category . '.phtml';
        }
    }
} 
else{
    $main_content = 'views/entry.phtml';
    
}
require_once("views/header.phtml");
require_once("views/container.phtml");

////$action_server = new ActionServer();
//$admin = $action_server->getsubbycat(2);
//echo $category;
//print_r($admin);
//echo "</pre>";
//echo "Service:$service<br/>";
//echo "Category:$category";
//
//
//if ($service!= 'descontos'){
//                     
//                   
//      
//require_once("views/lateral.phtml");
//
//}



//if ($category != 'footer'){
//                     
//                   
//      
//require_once("views/lateral_2.phtml");
//
//}

require_once("views/footer.phtml");
?>
