<?
require_once ($_SERVER["DOCUMENT_ROOT"]."/services/modules/main/autoload.php");
spl_autoload_register('AutoLoad');

class PowerBattery extends RootObject {
    
    //Переопределяем Prop из RootObject
    private $Prop = Array(
        'data' => Array(
            'title' => "",
            'th' => Array(), //Список заголовков колонок: "Заголовок 1", "Заголовок 2" и т.д.
            'td' => Array( 
                /*
                 * массив строк вида:
                Array("строка 1 колонка 1", "строка 1 колонка 2"),
                Array("строка 2 колонка 1", "строка 2 колонка 2"),
                 */
            )
        ),
        'err' => Array( //Информация об ощибке, возникшей на back для отправки во front
            'code' => '', 
            'msg' => ''
        )
    );
    private $Settings = Array(
        'filter' => '' //код или объект с параметрами для фильтрации данных из БД в методе getData
    );
    
    private function init() {
        $Result = $this->Err["CodeList"];
        $Result[1003] = 'Ошибка проверки входных данных';
    }

    //Метод получает данные из БД
    public function getData($filter="") {
        //Здесь и/или в контроллере для этого метода должна быть реализация запроса к БД с фильтром $filter
    }
    
    //Метод выполняет работу по запросу
    public function make() {
        $Result = $this->getProp();
        
        try {
            //Проверяем входные данные
            if ($this->checkRequest()) {
                //Выполняем операции в зависимости от входных данных
                $this->getData(); 
            } else {
                throw new Exception($this->Err["CodeList"][1003], 1003);
            }
            
        } catch (Exception $e) {
            $Result["err"]["code"] = $e->getCode();
            $Result["err"]["msg"] = $e->getMessage();
        }
        
        $Result = $this->getProp();        
        
        //Возвращаем результат
        return json_encode($Result);
    }
}
?>
