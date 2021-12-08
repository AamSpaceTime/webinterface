import {BaseObj} from '/services/resources/js/base.js';
/* 
Класс, который:
1. Встраивает в страницу html-vue-шаблона 
2. Получает из контроллера js с моделью, заполненной данными
3. Создает объект Vue на основе модели и html-vue-шаблона, осуществляя привязку данных
 */

export class DataView_Table_Default extends BaseObj {

    //Путь к конкретному шаблону модуля
    static m_path = "/services/modules/dataview/table/default/";
    
    constructor(prop, methods) {
        
        //Импортируем свойства
        if( prop !== undefined && prop !== null ) {
            prop.path = DataView_Table_Default.m_path;
            super(prop, methods);
            this.Prop = prop;
            this._Prop.path = DataView_Table_Default.m_path;
        }
        
    };
    
}
