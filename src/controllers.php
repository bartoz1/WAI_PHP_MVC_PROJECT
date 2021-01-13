<?php
require_once 'business.php';


function home(&$model)
{
    return 'home_view';
}
function contact(&$model)
{
    return 'contact_view';
}
function register(&$model)
{
    if(isset($_SESSION['username'])){
        return 'redirect:home';
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(czy_istnieje($_POST['login']) == 0){
            if($_POST['password'] == $_POST['rep_password'] ){
                if(register_user($_POST['login'], $_POST['email'], $_POST['name'], $_POST['surname'], $_POST['password']) == 1){
                    
                    return 'redirect:success';

                } else{
                    $error = [
                        'message' => 'Wystąpił problem podczas rejestracji!',
                        'location' => '/register'
                    ];
                    $model['error'] = $error;
                    $model['files'] = $_FILES;
                    return 'error_view';
                };
            } else
            {
                $error = [
                    'message' => 'Nie podałeś takich samych haseł!',
                    'location' => '/register'
                ];
                $model['error'] = $error;
                $model['files'] = $_FILES;
                return 'error_view';
            }
        } else {
            $error = [
                'message' => 'Ten login jest juz zajęty!',
                'location' => '/register'
            ];
            $model['error'] = $error;
            $model['files'] = $_FILES;
            return 'error_view';
        }
        
    };
    return 'register_view';
}
function login(&$model)
{
    if(isset($_SESSION['username'])){
        return 'redirect:home';
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(log_in($_POST['login'], $_POST['password'])){
            return 'redirect:success';
            
        } else {
            $wrong = [
                'message' => 'Login lub haslo jest nieprawidlowe!',
                'location' => '/login'
            ];
            $model['wrong'] = $wrong;
            
            //return 'redirect:error';
            render("login_view", $model);
        }
    }
    return 'login_view';
}
function logout(){
    log_out();
    return 'redirect:home';
}
function success(&$model)
{
    return 'success_view';
}
function search(&$model)
{
    
    return 'search_view';
}
function search_res(&$model){
    //if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(isset($_GET['q'])){
            $model['images'] = get_images_by_title($_GET['q']);

        }
        return 'search_res_view';
        //render('search_res_view', $model);
    //}
}
function gallery(&$model)
{
    $images = get_images();

    $model['total_pages'] = get_number_of_pages();
    $model['images'] = $images;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(!isset($_SESSION['wybrane'])){
            $_SESSION['wybrane'] = [];
        }

        foreach( $_POST as $element=>$value){
            if($element){
                if(!in_array($element, $_SESSION['wybrane'])){
                    array_push($_SESSION['wybrane'], $element);
                }
            }
        }
        return 'redirect:gallery';
    }

    return 'gallery_view';
}
function zapamietane(&$model)
{
    $images = get_all_images();

    $model['images'] = $images;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        usun_z_wybranych();
        return 'redirect:zapamietane';
    }

    return 'zapamietane_view';
}
function error(&$model)
{
    return 'error_view';
}
function upload(&$model)
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['author']) &&
            !empty($_POST['watermark']) &&
            !empty($_POST['title'])
        ) {
            $file = $_FILES['file_img'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $mimeType = getimagesize( $file['tmp_name'] )['mime'];
            $fileElements = explode('/', $mimeType);
            $fileExt = strtolower(end($fileElements));
            $user_id = 0;
            $photo_status = 'public';

            if(isset($_POST['user_id'])){
                $user_id = $_POST['user_id'];
                $photo_status = $_POST['state'];
            }

            $allowedExt = array('jpg', 'png', 'jpeg');
            $allowedMaxSize = 1048576;

            if($fileError === 0){
                if($fileSize < $allowedMaxSize){
                    if(in_array($fileExt, $allowedExt)){
                        
                        handle_image($_FILES['file_img'], $_POST['author'], $_POST['watermark'], $_POST['description'], $_POST['title'], $user_id, $photo_status);

                    } else {
                        $error = [
                            'message' => 'Plik ma niedopuszczalne rozszerzenie - '.$fileExt,
                            'location' => '/upload'
                        ];
                        $model['error'] = $error;
                        $model['files'] = $_FILES;
                        return 'error_view';
                    }


                    return 'redirect:gallery';
                }
                else {
                    $error = [
                        'message' => 'Plik jest za duzy!',
                        'location' => '/upload'
                    ];
                    $model['error'] = $error;
                    $model['files'] = $_FILES;
                    return 'error_view';
                }
            }
            else {
                $error = [
                    'message' => 'Błąd wysyłania pliku',
                    'location' => '/upload'
                ];
                $model['error'] = $error;
                $model['files'] = $_FILES;
                return 'error_view';
            }
        }
    }

    return 'upload_view';
}


// function add_to_cart(&$model)
// {
//     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
//         $id = $_POST['id'];
//         $product = get_product($id);

//         $cart = &get_cart();
//         $amount = isset($cart[$id]) ? $cart[$id]['amount'] + 1 : 1;

//         $cart[$id] = ['name' => $product['name'], 'amount' => $amount];

//         return is_ajax() ? cart($model) : 'redirect:' . $_SERVER['HTTP_REFERER'];
//     }
// }

// function clear_cart(&$model)
// {
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $_SESSION['cart'] = [];

//         return is_ajax() ? cart($model) : 'redirect:' . $_SERVER['HTTP_REFERER'];
//     }
// }
