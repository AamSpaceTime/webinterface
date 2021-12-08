import {BaseObj} from '/services/resources/js/base.js';
import {DataView_Table_Default} from '/services/modules/dataview/table/default/viewmodel.js';
import {DataView_Table_Sortable} from '/services/modules/dataview/table/sortable/viewmodel.js';
if( App.DataView_Table_Default === null || App.DataView_Table_Default === undefined ) {
    App["DataView_Table_Default"] = DataView_Table_Default;
}
if( App.DataView_Table_Sortable === null || App.DataView_Table_Sortable === undefined ) {
    App["DataView_Table_Sortable"] = DataView_Table_Sortable;
}

 
export class Battery extends BaseObj {
    
    //Путь к конкретному шаблону модуля
    static m_path = "/services/modules/power/battery/default/";
    
    TableView = ""; //Объект построения таблицы, который будет инициализирован в конструкторе
    
    
    constructor(prop, methods) {
        
        prop.path = Battery.m_path;
        super(prop, methods);
        this.Prop = prop;
        
        if( this._Prop.view === "Sortable" ) {
            this.TableView = new App["DataView_Table_Sortable"]({
                "selector":this._Prop.selector+" div.fc_body"
            });
        } else {
            this.TableView = new App["DataView_Table_Default"]({
                "selector":this._Prop.selector+" div.fc_body"
            });
        }
        
        //Размещаем HTML шаблоны
        this.get_HTMLTemplate();
        //Получаем модель данных
        this.get_Model();
        //Дополняем модель методами, которые потребуются Vue для обработки
        this._Prop.Model.methods = {
            "Refresh":function(event) {
                App[this.AppName].Refresh(event); //Во время запуска this будет соотвествовать объекту (контексту) Vue
            },
            "Reload":function(event) {
                App[this.AppName].Reload(event); //Во время запуска this будет соотвествовать объекту (контексту) Vue
            },
        }
        //Связываем модель данных и Vue
        this._Prop.Model.data.AppName = this._Prop.AppName;
        this.bind_Vue({
            //el:this._Prop.front.selector+" div.fc_body [data-id='dataview-table-default']",
            el:this._Prop.selector,
            data:this._Prop.Model.data,
            methods:this._Prop.Model.methods
        });
    };
    
    //Получаем шаблон HTML и размещаем по заданному селектору
    get_HTMLTemplate(Params) {
        
        if( Params === undefined || Params === null || Params === "" ) {
            Params = {
                url:Battery.m_path+"view.html",
                data:[],
                async:false,
                selector:this._Prop.selector,
                replace:true
            };
        }
        
        //Сначала размещает HTML шаблон Battery
        super.get_HTMLTemplate(Params);
        
        //Потом в HTML шаблон Battery размещаем HTML шаблон таблицы       
        this.TableView.get_HTMLTemplate();
    }
    
    
    get_Model(Params, simple=false) {
        
        let _Params = {
            url:this._Prop.path,
            data:{ "view":this._Prop.view },
            async:false
        };
        
        if( this._Prop.view == "Sortable" ) {
            let data = this.TableView._Prop.data;
            super.get_Model(_Params);
            data.model = this._Prop.Model.data;
            this._Prop.Model.data = data;
            return data.model;
        } else {
            return super.get_Model(_Params);
        }
        
    }
    
    
}

