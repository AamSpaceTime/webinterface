<?

class RootObject {
    
    //Свойства (поля) модели
    //Данные (информация) для принятия решения
    private $Prop = Array(
        
    );
    //События
    private $Events = Array(
        "Log" => Array(), //Список экземпляров Item,
        "Item" => Array(
            "type" => "",
            "msg" => ""
        ),
        "TypeList" => Array(
            "_01" => "datetime code method" //Описание формата записи лога
        ),
        "CodeList" => Array(
            "200" => "Успешно"
        ) 
    );
    //Ошибки
    private $Err = Array(
        "Log" => Array(), //Список экземпляров Item
        "Item" => Array(
            "code" => "", //кастомный код из CodeList, либо код из err
            "msg" => "", //кастомный сообщение из CodeList, либо сообщение из err по code
            "datetime" => "",
            "path" => "", //кастомный аналог trace-пути к строке с ошибкой
            "err" => "" //объект стандартной ошибки PHP, если кастомная ошибка создана на ее основе
        ),
        "CodeList" => Array(
            "_001" => "Ошибка записи данных Prop"
        )
    );
    //Настройки объекта класса
    private $Settings = Array();
    //Настройки класса
    static $GlobalSettings = Array();


    //конструктор
    function __construct($params="", $settings="") {
        $this->init();
        if($params != "" ) {
            $this->setProp($params);
        }
        if($settings != "" ) {
            $this->setSettings($settings);
        }
    }    
    
    //Методы
    private function init() {
        
    }
    
    public function setProp($params) {
        $this->Prop = $params;
    }
    
    public function getProp() {
        return $this->Prop;
    }

    public function addEvent($e) {
        //Потом надо будет написать проверку $e
        array_push($this->Events["Log"], $e);
    }
    
    public function getEvents() {
        return $this->Events;
    } 

    public function addErrr($e) {
        //Потом надо будет написать проверку $e
        array_push($this->Err["Log"], $e);
    }
    
    public function getErr() {
        return $this->Err;
    } 
    
    public function setSettings($s) {
        //Потом надо будет написать проверку $s
        $this->Settings = $s;
    }
    
    public function getSettings() {
        return $this->Settings;
    } 
}

?>