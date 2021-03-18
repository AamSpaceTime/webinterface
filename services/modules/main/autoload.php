<?
//Автозагрузчик классов
function AutoLoad(string $className) {
    //var_dump($className);
    //require_once __DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
    require_once $_SERVER["DOCUMENT_ROOT"]."/services/modules/tools/".str_replace('\\', '/', $className).'.php';
}
?>