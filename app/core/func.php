<?php

defined("ROOTPATH") OR exit('Access denied');

function show($arr)
{
    //echo "<br>";
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function pagination(): array
{
    $vars = [];
    $vars['page'] = $_GET['page'] ?? 1;
    $vars['page'] = (int)$vars['page'];
    $vars['pr_page'] = $vars['page'] <=1 ? 1 : $vars['page'] - 1;
    $vars['next_page'] = $vars['page'] + 1;

    return $vars;
}

function  redirect($link)
{
    header("Location: ".ROOT."/".$link);
    die;
}

function esc($data)
{
    return nl2br(htmlspecialchars($data));
}

//Returns url valiables//
function URL($key)
{
  
  
    $url = $_GET['url'] ?? 'home';
    $url = explode("/",trim($url,"//"));
     
    switch ($key) {
        case 'page':
        case 0:
            return $url[0] ?? null;
            break;
        case 'section':
        case 'slug':
        case 1:
            return $url[1] ?? null;
            break;
        case 'action':
        case 2:
            return $url[2] ?? null;
            break;
        case 'id':
        case 3:
            return $url[3] ?? null;
            break;
        default:
            return  null;
            break;
    }
   
}
function ads_edit_view_path($path)
{
   
   return "../app/views/".$path.".view.php";
}

function convert_date($dateString)
{
    $dateTime = DateTime::createFromFormat("YmdHis", $dateString);
    return $dateTime->format("Y-m-d H:i:s"); // Output: 2023-03-19 19:33:52
}
function  check($key, $fromdb='')
{
    if(!empty($_POST[$key]))
    {
        return $_POST[$key];
    }
    elseif(!empty($fromdb))
    {
        return $fromdb;
    }
}
function set_active($data='')
{
    if(!$data)
    {show($data);
        if($data== 1)
        {
             return "Active";
        }
        else{
            return "no";
        }
       
    } 
}
function set_select($key,$value, $def='')
{
    if(!empty($_POST[$key]))
   {
      if($value == $_POST[$key])
      {
         return ' selected ';
      }
      
   }
   else if(!empty($def))
   {
      if($value == $def)
      {
         return ' selected ';
      }
   }
   return '';

}
function selected($data ,$active='')
{
    if(!empty($data))
    {
        if($data == $active )
        {
            return "selected";
        }
        else{
            return "";
        }
    }
}
 //normally ni ya slug so ina..convert category and replaces characters that is SLUg
 function str_to_url($url)
{
    $url = str_replace("'", "", $url);
    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
    $url = trim($url, "-");
    $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9_]+~', '', $url);

    return $url;
}

function message(string $message='', bool $delete = false)
{
    if(!empty($message))
    {
         $_SESSION['message'] = $message;
    }
    else 
        {
            if(!empty($_SESSION['message']))
                {
                    $$message = $_SESSION['message'];
                    if($delete)
                    {
                        unset($_SESSION['message']);
                    }
                
                    return $message;
                }
                return false;
        }
    // return "kk";
}

