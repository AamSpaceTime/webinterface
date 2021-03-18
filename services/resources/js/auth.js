function Authorisation(s) {
    
    let form;
    let Result;

    if(s.nodeType == 1) { //Определение типа HTML элемента. https://learn.javascript.ru/basic-dom-node-properties#svoystvo-nodetype
        //Проверка на случай, если передан объект формы
        if( $(s).get(0).tagName.toUpperCase() == "FORM" ) { //метод tagName возвращает имя тега. https://learn.javascript.ru/basic-dom-node-properties#teg-nodename-i-tagname 
            form = $(s);
        } else {
            //Передан внутренний объект формы. Рекурсивно ищем родительский объект формы
            form = $(s).parent(); //метод parent возвращает родителя. https://jquery-docs.ru/parent/
            while(true) {
                if( form.get(0).tagName.toUpperCase() == "FORM" ) {
                    break;
                } else {
                    form = $(form).parent();
                }
            }
        }
    } else if ( typeof(s) == "String" ) { //Определение JavaScript типа переменной s. https://learn.javascript.ru/types#type-typeof
        //Передан селектор. Находим форму по селектору
        form = $(s);
    }

    //Формируем объект Params для Ajax запроса                                
    let Params = {
        url: form.attr("data-url"), //Адрес файла, которому будет отправлен запрос
        async: false, //Включение асинхронной передачи
        data: { }, //Параметры, которые будут отправлены в запросе
        selector: form.attr("data-result-selector") //id контейнера в который будет выведен результат
    };

    //Обходим текстовые (input, hidden, password) поля формы и заполняем data
    $("#"+form.attr("id")+" input").each(function( index ) {
        //console.log( index + ": " + $( this ).text() );
        Params.data[this.name] = this.value; //f - порядковый номер, найденного элемента; this - сам этот элемент
    });       

    console.log(Params);

    //Отправляем наши данные

    Result = getContent_putNode(Params);
    console.log(Result);

    if( Result.sucess ) {
        open_modal('err_alert', '#?w=200px&h=100px', Result.msg);
    } else {
        open_modal('err_alert', '#?w=200px&h=100px', Result.msg);                                    
    }

    return Result.sucess;

}