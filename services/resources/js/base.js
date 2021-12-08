export class BaseObj {
    
    static m_path = "";
    
    _Prop = {
        selector:"",
        path:""
    };
    
    constructor(prop, methods) {
        //Импортируем свойства
        if( prop !== undefined && prop !== null ) {
            this.Prop = prop; //Вместо ожидаемого this.Prop(prop);
        }
        //Импортируем методы
        this.met(methods);       
    };
    
    //Импорт методов
    met(methods) {
        if( methods !== undefined && methods !== null ) {
            for (let key in methods) {
                //alert(key+" "+this.key);
                if (typeof(methods[key]) === "function") {
                    //if( this[key] !== undefined ) { 
                    //Можно использовать эту проверку, если мы хотим добавлять в конструкторе только методы, объявленные в классе 
                    this[key] = methods[key];
                    //}
                }
            }
        }        
    }
    
    //Геттер для свойства _prop
    get Prop() {
        return this._Prop;
    }
    
    //Сеттер для свойства Prop
    set Prop(prop) {
        //Заменяем только те свойства, которые есть в prop
        this.set_Prop(prop, this._Prop);
    }
    
    //рекурсивный обход входного объекта свойств
    set_Prop(in_prop, out_prop) {
        for (var key in in_prop) {
            if (typeof in_prop[key] !== "object") {
                out_prop[key] = in_prop[key];
            } else {
                //Если значение свойства - объект, проверяем, может это список
                var counter = 0;
                for (var subkey in in_prop[key], out_prop[key]) {
                    counter++;
                }               
                if( counter > 0 ) {
                    //Если список - рекурсивно идем внутрь
                    this.set_Prop(in_prop[key], out_prop[key]);
                } else {
                    out_prop[key] = in_prop[key];    
                }
            }
        }        
    }

    //Получаем шаблон HTML и размещаем по заданному селектору
    get_HTMLTemplate(Params) {
        console.log(this._Prop);
                
        let Result = {
            msg: "",
            success: false
        };
        
        let _Params = {
            url:this._Prop.path+"view.html",
            data:{},
            async:false,
            selector:this._Prop.selector,
            replace:true
        };
        
        if( Params !== undefined || Params !== null || Params !== "" ) {
            this.set_Prop(Params, _Params);
        }

        //Отправка ajax запроса с помощью метода ajax библиотеки jQuery 
        $.ajax({ 
            type: "GET", //тип запроса — Get. Параметры будут переданы в URL 
            url: _Params.url, 
            data: _Params.data, 
            async: _Params.async, 

            success: function(msg) { 
                Result.msg = msg; 
                if( _Params.selector != "" && _Params.selector != undefined ) { 
                    if( _Params.replace ) {
                        $(_Params.selector).html(Result.msg);    
                    } else {
                        $(_Params.selector).html($(_Params.selector).html()+Result.msg);
                    }
                }
                Result.success = true;
            }, 
            error: function(jqXHR, textStatus, errorThrown) { 
                Result.msg = jqXHR.getAllResponseHeaders()+"<hr>"+textStatus+"<hr>"+errorThrown; 
                if( _Params.selector != "" && _Params.selector != undefined ) 
                { $(_Params.selector).html(Result.msg); }         
            }
        }); 

        return Result; 

    }
    
    //Получаем модель с данными из контроллера
    get_Model(Params, simple=false) {
        
        let Result = {
            msg: "",
            success: false
        };
        
        let _Params = {
            url:this._Prop.path,
            data:{},
            async:false
        };
        
        if( Params !== undefined || Params !== null || Params !== "" ) {
            this.set_Prop(Params, _Params);
        }
        
        
        //Отправка ajax запроса с помощью метода ajax библиотеки jQuery 
        $.ajax({ 
            type: "GET",
            url: _Params.url, 
            data: _Params.data, 
            async: _Params.async, 

            success: function(msg) { 
                Result.msg = msg;
                Result.success = true;
            }, 
            error: function(jqXHR, textStatus, errorThrown) { 
                Result.msg = jqXHR.getAllResponseHeaders()+"<hr>"+textStatus+"<hr>"+errorThrown;        
            }
        });
        
        if( Result.success ) {
            
            if(!simple) {
                this._Prop["Model"] = JSON.parse(Result.msg);
                //Сохраняем исходный вид модели на случай, если потребуется сбросить все сртировки и изменения к исходному виду
                this._Prop["RefreshModel"] = JSON.parse(Result.msg);  
                if( this._Prop.Model.err.code !== "" ) {
                    open_modal('err_alert', '#?w=200px&h=100px', this._Prop.Model.err.msg, 'popup_block_err');
                } else {
                    //Успешная загрузка
                    console.log(this._Prop["Model"]);
                }
            } else {
                Result.msg = JSON.parse(Result.msg)
            }
        } else {
            open_modal('err_alert', '#?w=200px&h=100px', Result.msg);       
        }

        return Result;
   
    }
    
    //Связывание модели с Vue
    bind_Vue(Params) {
        
        let _Params = {
            selector:"",
            data:{},
        };
        
        if( Params !== undefined || Params !== null || Params !== "" ) {
            this.set_Prop(Params, _Params);
        }
        
        //App[_Params.AppName+"Vue"] = new Vue(_Params);
        //this._Prop["Vue"] = App[_Params.AppName+"Vue"];
        this._Prop["Vue"] = new Vue(_Params);
    }
    

    //Возвращаем сортироку по умолчанию (т.е. образ исходных данных)
    Refresh(event) {
        alert("Возвращаем первоначальный вид данных");
        this._Prop.Model.data.model = JSON.parse(JSON.stringify(this._Prop.RefreshModel.data));
        this._Prop["Vue"].$forceUpdate();        
    }

    //Занового загружаем данные из контроллера
    Reload(event) {
        alert("Заново загрузили данные модели из контроллера");
        this.get_Model("", true);
    }
    
    //Получаем обновленные данные из контроллера
    update_Model() {
        
    }
    
    //Отправляем обновленные данные в контроллер
    put_Model() {
        
    }
    
}