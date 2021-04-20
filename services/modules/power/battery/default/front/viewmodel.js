import {BaseObj} from '/services/resources/js/base.js';
import {DataView_Table_Default} from '/services/modules/dataview/table/default/front/viewmodel.js';
if( App.DataView_Table_Default === null || App.DataView_Table_Default === undefined ) {
    App["DataView_Table_Default"] = DataView_Table_Default;
}

 
export class Battery extends BaseObj {
    
    //Путь к конкретному шаблону модуля
    static m_path = "/services/modules/power/battery/default/";
    
    _Prop = {
        front: {
            path:Battery.m_path+"front/",
            selector:""
        },
        back: {
            path:Battery.m_path+"back/"
        }
    }
    
    TableView = ""; //Объект построения таблицы, который будет инициализирован в конструкторе
    
    
    constructor(prop, methods) {
        super(prop, methods);
        this.Prop = prop;
        
        this.TableView = new App["DataView_Table_Default"]({
            "front":{
                "selector":this._Prop.front.selector+" div.fc_body"
            },
            "back":{
                "path":this._Prop.back.path
            }
        });
        
        //Размещаем HTML шаблоны
        this.get_HTMLTemplate();
        //Получаем модель данных
        this.get_Model();
        //Дополняем модель методами, которые потребуются Vue для обработки
        this._Prop.Model.methods = {
            "Refresh":function(event) {
                App[this.AppName].Refresh(event); //Во время запуска this будет соотвествовать объекту (контексту) Vue
                alert(event);
            }
        }
        //Связываем модель данных и Vue
        this._Prop.Model.data.AppName = this._Prop.front.AppName;
        super.bind_Vue({
            //el:this._Prop.front.selector+" div.fc_body [data-id='dataview-table-default']",
            el:this._Prop.front.selector,
            data:this._Prop.Model.data,
            methods:this._Prop.Model.methods
        });
    };
    
    Refresh(event) {
        alert("Возвращаем сортировку по умолчанию");
    }
    
    //Получаем шаблон HTML и размещаем по заданному селектору
    get_HTMLTemplate(Params) {
        
        if( Params === undefined || Params === null || Params === "" ) {
            Params = {
                url:this._Prop.front.path+"view.html",
                data:[],
                async:false,
                selector:this._Prop.front.selector,
                replace:true
            };
        }
        
        //Сначала размещает HTML шаблон Battery
        super.get_HTMLTemplate(Params);
        
        //Потом в HTML шаблон Battery размещаем HTML шаблон таблицы       
        this.TableView.get_HTMLTemplate();
    }
    
}

