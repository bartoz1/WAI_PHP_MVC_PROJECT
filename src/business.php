<?php

use MongoDB\BSON\ObjectID;

function get_db()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);

    $db = $mongo->wai;

    return $db;
}

function get_images()
{
    if(isset($_SESSION['user_id'])){
        $query = [
            '$or' => [[
                'status'=> 'public'
            ], [
                'author_id'=> $_SESSION['user_id']
            ]]
        ];
    } else {
        $query = [
            'status' => 'public',
        ];
    }
       
    $pg_nmbr = isset($_GET['pagenumber'])? $_GET['pagenumber'] : 1;
    $db = get_db();
    
    $filter = [
        'skip' => ($pg_nmbr-1)*4,
        'limit' => 4
    ];

    

    return $db->images->find($query, $filter );
    
}
function get_images_by_title($title)
{
    
    $query = [
        // 'title' => '%'.$title.'%',
        'title' => [
            '$regex' => ".*".$title.".*", 
            '$options' => "-i"
        ],
    ];

    $db = get_db();

    $filter = [];

    return $db->images->find($query, $filter );
    
}

function get_all_images()
{
    $db = get_db();

    if(isset($_SESSION['user_id'])){
        $query = [
            '$or' => [[
                'status'=> 'public'
            ], [
                'author_id'=> $_SESSION['user_id']
            ]]
        ];
    } else {
        $query = [
            'status' => 'public',
        ];
    }
    
    $filter = [];

    return $db->images->find($query, $filter );
    
}
// sprawdza czy użytkownik istnieje w bazie danych
// jezeli tak to zwraca 1, nie - 0
function czy_istnieje($login)
{
    $db = get_db();

    $query = [
        'login' => $login,
    ];

    $wyniki = $db->users->find($query)->toArray();

    if(count($wyniki)==0){
        return 0;
    } else{
        return 1;
    }

}
function register_user($login, $email, $name, $surname, $password){
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $db = get_db();

    $user = [
        'login' => $login,
        'email' => $email,
        'password' => $hash,
        'name' => $name,
        'surname' => $surname,
    ];

    $db->users->insertOne($user);

    return 1;
}
function log_in($login, $password){
    $db = get_db();

    $compare = [
        'login' => $login,
    ];

    $user = $db->users->findOne($compare);

    if($user!==null && password_verify($password, $user['password'])){
        session_regenerate_id();
        $_SESSION['user_id'] = $user['_id'].'';    
        $_SESSION['username'] = $user['login'];
        return 1;
    } else {
        return 0;
    }

}
function log_out(){
    session_destroy();
}
function get_number_of_pages()
{
    $db = get_db();
    $query = [
        'status' => 'public',
    ];
    $imgs = $db->images->find($query)->toArray();
    $nmbr = ceil(count($imgs)/4);

    return $nmbr;
}

function handle_image($file, $author, $watermark, $descr, $title, $user_id, $photo_status)
{
    $uploadPath = 'images/';
    $fileName = $file['name'];
    $fileExploded = explode('.', $fileName);
    $fileJustName = uniqid();
    $fileExt = '.'.strtolower(end($fileExploded));
    $fileTmpName = $file['tmp_name'];
    $destination = $uploadPath.$fileJustName.$fileExt;

    if($user_id == 0){
        $user_id = 'anonymus';
    }

    move_uploaded_file($fileTmpName, $destination);

    create_watermark($file, $fileJustName, $watermark, $fileExt);
    create_thumb($file, $fileJustName, $fileExt);

    $image = [
        'author' => $author,
        'title' => $title,
        'description' => $descr,
        'originalFile' => $fileJustName.$fileExt,
        'thumbnail' => $fileJustName.'_thumbnail'.$fileExt,
        'watermarkedFile' => $fileJustName.'_watermarked'.$fileExt,
        'author_id' => $user_id,
        'status' => $photo_status
    ];

    save_image($image);

}

function create_watermark($file, $fileJustName, $watermark, $fileExt)
{
    if($fileExt === '.png')
    {
        $source = imagecreatefrompng('images/'.$fileJustName.$fileExt);
    }
    else {
        $source = imagecreatefromjpeg('images/'.$fileJustName.$fileExt);
    }

    $w_height = 20;
    $w_width = imagesx($source);
    
    $wat_im = imagecreate($w_width, $w_height);
    imagesavealpha($wat_im, true);
    // imagealphablending($wat_im, false);
    $bg_color = imagecolorallocate($wat_im, 254,254,254);

    $color = imagecolorallocate($wat_im, 255, 0,0);
    imagecolortransparent($wat_im, $bg_color);
    imagestring($wat_im, 30, 1, 1, $watermark, $color);

    imagecopymerge($source, $wat_im, 0,0,0,0, $w_width, $w_height, 50);

    if($fileExt === '.png'){
        imagepng($source, 'images/'.$fileJustName.'_watermarked'.$fileExt);
    } else {
        imagejpeg($source, 'images/'.$fileJustName.'_watermarked'.$fileExt);
    }   

    imagedestroy($wat_im);
    imagedestroy($source);

}

function create_thumb($file, $fileJustName, $fileExt){
    if($fileExt === '.png')
    {
        $source = imagecreatefrompng('images/'.$fileJustName.$fileExt);
    }
    else {
        $source = imagecreatefromjpeg('images/'.$fileJustName.$fileExt);
    }

    $thumb_w = 200;
    $thumb_h = 125;

    $thumb = imagecreatetruecolor($thumb_w, $thumb_h);

    imagecopyresampled($thumb, $source, 0,0,0,0, $thumb_w, $thumb_h, imagesx($source), imagesy($source));
    if($fileExt === '.png'){
        imagepng($thumb, 'images/'.$fileJustName.'_thumbnail'.$fileExt);
    } else {
        imagejpeg($thumb, 'images/'.$fileJustName.'_thumbnail'.$fileExt);
    }

    imagedestroy($thumb);
    imagedestroy($source);
};

function save_image($image)
{
    $db = get_db();

    $db->images->insertOne($image);
}
function usun_z_wybranych(){
    $wybrane = $_SESSION['wybrane'];
    
    foreach( $_POST as $element=>$value){
        if($element){
            $key = array_search($element, $wybrane);
            unset($wybrane[$key]);
        } 
    }   

    $_SESSION['wybrane'] = $wybrane;
    
}
