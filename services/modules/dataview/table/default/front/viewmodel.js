import {BaseObj} from '/services/resources/js/base.js';
/* 
Класс, который:
1. Встраивает в страницу html-vue-шаблона 
2. Получает из контроллера js с моделью, заполненной данными
3. Создает объект Vue на основе модели и html-vue-шаблона, осуществляя привязку данных
4. Осуществляет манипуляцию данными во front без обращения к контроллеру
5. Осуществляет взаимодействие с контроллером
 */

export class DataView_Table_Default extends BaseObj {
    
    _Prop = {
        "front":{
            "path":"/services/modules/dataview/table/default/front/",
            "selector":""
        },
        "back":{
            "path":""
        }
        
    };
    
    constructor(prop, methods) {
        //Импортируем свойства
        if( prop !== undefined && prop !== null ) {
            super(prop, methods);
            this.Prop = prop;
        }        
    };
    
}
