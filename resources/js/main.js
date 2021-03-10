//Обработка раскрытия/скрытия уровня меню
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

//Привязываем события к кликам на пунктах меню

//n1_i.addEventListener("click", m_n);
//n1_1_i.addEventListener("click", m_n);
//n2_i.addEventListener("click", m_n);
//n3_i.addEventListener("click", m_n);

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



     
             