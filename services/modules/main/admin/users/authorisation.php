<?
require_once ($_SERVER["DOCUMENT_ROOT"]."/services/modules/main/autoload.php");
spl_autoload_register('AutoLoad');
//require_once ($_SERVER["DOCUMENT_ROOT"]."/services/modules/tools/PrepareData.php");

//Получаем данные из входных массивов, очищая от не желательных символов 
$Result = "";

try {
    
    $PD = new PrepareData();
    
    //Проверяем домен отправки
    if( $_SERVER["SERVER_NAME"] != "webinterface.ru") {
        throw new Exception('Неверный домен', 1001);
    }

    //Проверяем тип отправки
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && !strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        throw new Exception('Не AJAX запрос', 1005);
    }

    $login = $PD->clearData("login");
    $pass = $PD->clearData("pass");
    
    if(!preg_match("/^[a-zA-Z0-9_]+$/", $login)) {
        throw new Exception('Поле логина содержит запрещенные символы', 1002);
    }
    
    if(!preg_match("/^[a-zA-Z0-9_~!@#$%^&*-+?]+$/", $pass)) {
        throw new Exception('Поле пароля содержит запрещенные символы', 1002);
    }
    
    
        
    if( $login == "Iam" && $pass == 12345 ) { 
        echo "Успешная авторизация"; //Возвращаем сообщение простым выводом в файл 
    } else { 
        echo "Ошибка авторизации"; 
    } 
    
    
} catch (Exception $e) {
    if( $e->getCode() != 1005 ) {
    	echo 'Ошибка: ['.$e->getCode().']. '.$e->getMessage()."\n";
    } else {
    	echo 'Мы, возможно, рассмотрим ваше сообщение';
    }   
}

 

?> 
