<?
class PrepareData {
    
    function __construct() {
    }
    
    public function clearData($name, $ge=true) {
	//Функция проверки входящих данных
	$Result = "";

	if( $_REQUEST[$name] != "" ) {
		$Result = trim(htmlspecialchars(strip_tags($_REQUEST[$name])));
	}

	if( $ge && $Result == "" ) { //Если требуется проверка $ge=true
		throw new Exception('Значение '.$name.' не может быть пустым.', 1000);
	}

	return $Result;
    }
}
?>
