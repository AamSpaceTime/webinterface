<?
require_once ('model.php');



class PowerBatteryController extends PowerBattery {

    
    private function init() {
        parent::init();
        $Result = $this->Err["CodeList"];
        $Result[1001] = 'Неверный домен';
        $Result[1002] = 'Не AJAX запрос';
    }


    //Метод проверяет входные данные
    public function checkRequest() {
        $Result = false;
        
        try {
            //Проверяем домен отправки
            if( $_SERVER["SERVER_NAME"] != "webinterface.ru") {
                throw new Exception($this->Err["CodeList"][1001], 1001);
            }
            
            //Проверяем тип отправки
            if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && !strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                throw new Exception($this->Err["CodeList"][1002], 1002);
            }
            
            $Result = true;
        } catch (Exception $e) {
            $Result["err"]["code"] = $e->getCode();
            $Result["err"]["msg"] = $e->getMessage();
        }
        
        return $Result;
    }
    
    //Метод получает данные из БД
    public function getData($filter="") {
        //Пока ставим заглушку
        $Result = Array(
            'data' => Array(
                'title' => "",
                'th' => Array("Заголовок 1", "Заголовок 2"),
                'td' => Array(
                    Array("строка 1 колонка 1", "строка 1 колонка 2"),
                    Array("строка 2 колонка 1", "строка 2 колонка 2"),
                )
            ),
            'err' => Array(
                'code' => '',
                'msg' => ''
            )
        );
        $this->setProp($Result);
    }
    
}

$C = new PowerBatteryController($Result);
//Обрабатываем входной запрос и возвращаем результат
echo $C->make();


?> 

