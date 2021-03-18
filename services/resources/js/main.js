//Обработка раскрытия/скрытия уровня меню m_n = menu _ node
function m_n(event) {

    arrow_click = true; //Устанавливаем блокировку для функции обработки собития клика на псевдоссылке data-href

    //alert(event.currentTarget);
    //получаем id элемента на котором произошло событие
    let id = event.currentTarget.id;
    //Извлекаем "корень" ноды        
    let n = id.match(/^(.+)_[^_]+$/i);
    //Получаем 
    let e = document.getElementById(id);
    //alert(e.getAttribute('class'));
    let ul = document.querySelector('#'+n[1]+'_l > ul');

    if( e.getAttribute('class') == "fas fa-caret-down") {
        e.setAttribute('class', "fas fa-caret-right");
        ul.setAttribute('class', 'dn');
    } else {
        e.setAttribute('class', "fas fa-caret-down");
        ul.setAttribute('class', '');
    }


}

// Обработка клика на псевдоссылке data-href c_h = click on href
function c_h(event) {
    if( !arrow_click ) {
        //Снимаем атрибут selected у выделенного элемента
        $('.tree_menu div.selected, .tree_menu span.selected').removeAttr('class');
        event.currentTarget.setAttribute('class', 'selected');
        //alert(event.currentTarget);
    }
    arrow_click = false;
}

let arrow_click = false;
//Создаем объект, который будет хранить состояние приложения
let App = {
    "Modal": {
        from_s:"",
        to_s:""
    }
};

//Открываем модальное окно с содержимым из элемента с некоторым ID
function ContentToModal(from_s) {
    open_modal('err_alert', '#?w=85%&h=85%', $(from_s).html());
    $(from_s).html("");
    App.Modal.from_s = from_s;
    App.Modal.to_s = '#err_alert';
}

function ModalToContent(to_s) {
    if( to_s === undefined ) {
        to_s = App.Modal.to_s;
    }
    if(to_s !== undefined ) {
        $(App.Modal.from_s).html($(to_s).html());
        $(App.Modal.to_s).html(""); 
        App.Modal.from_s = "";
        App.Modal.to_s = '';
    }
}

//Общая функция отправки запроса по Ajax и получения результата в заданный div контейнер
function getContent_putNode(Params) { 

    //Получаем контент и размещаем его в заданном контейнере 
    let Result = {
        msg: "",
        success: false
    }; 

    //Отправка ajax запроса с помощью метода ajax библиотеки jQuery 
    $.ajax({ 
        type: "GET", //тип запроса — Get. Параметры будут переданы в URL 
        url: Params.url, 
        data: Params.data, 
        async: Params.async, 

        success: function(msg) { 
            Result.msg = msg; 
            if( Params.selector != "" && Params.selector != undefined ) 
            { $(Params.selector).html($(Params.selector).html()+Result.msg); }
            Result.success = true;
        }, 
        error: function(jqXHR, textStatus, errorThrown) { 
            Result.msg = jqXHR.getAllResponseHeaders()+"<hr>"+textStatus+"<hr>"+errorThrown; 
            if( Params.selector != "" && Params.selector != undefined ) 
            { $(Params.selector).html(Result.msg); }         
        }
    }); 

    return Result; 
}

//Ставим условие на выполнение кода после загрузки страницы
$(document).ready(function() {

    $('.tree_menu li span > i').click(m_n);

    /*$('.tree_menu a').click(c_a);*/

    $('.tree_menu div[data-href]').click(c_h);
    $('.tree_menu span[data-href]').click(c_h);
    
    //Запускаем сплитер
    Split(['#left_col', '#center_col', '#right_col'], {
        sizes: [15, 70, 15],    
        gutter: function (index, direction) {
            var gutter = document.createElement('div')
            gutter.className = 'gutter gutter-' + direction
            //gutter.style.height = '185px'
            return gutter
        },
        gutterSize: 2
    });

}); 



     
             