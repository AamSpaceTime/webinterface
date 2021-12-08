import {BaseObj} from '/services/resources/js/base.js';
/* 
Класс, который:
1. Встраивает в страницу html-vue-шаблона 
2. Получает из контроллера js с моделью, заполненной данными
3. Создает объект Vue на основе модели и html-vue-шаблона, осуществляя привязку данных
4. Осуществляет манипуляцию данными во front: сортировки в колонках без обращения к контроллеру
 */

export class DataView_Table_Sortable extends BaseObj {

    //Путь к конкретному шаблону модуля
    static m_path = "/services/modules/dataview/table/sortable/";
    
    constructor(prop, methods) {
        
        //Импортируем свойства
        if( prop !== undefined && prop !== null ) {
            prop.path = DataView_Table_Sortable.m_path;
            DataView_Table_Sortable.init();
            super(prop, methods);
            this.Prop = prop;
            this._Prop.path = DataView_Table_Sortable.m_path;
            this._Prop.data = { 
                settings: {
                    sort: {
                        ico: {
                            "default":"fas fa-sort-alpha-down a00", 
                            "az":"fas fa-sort-alpha-down selectedchose", 
                            "za":"fas fa-sort-alpha-down-alt selectedchose"
                        },    
                    }
                },
                status: { //хранение состояния данных
                    sort: { //сортировка
                        col_id:"",
                        direct:"default",                                   
                        default:[]
                    }
                },
                model:{}
            } 
        } 
    };
    
    static init() {
               
                
        //регистрируем компонент sortable
        Vue.component('sortable', {                        
            props: [ 'model', 'status', 'settings' ],
            /*
            data: function(param) { //data function не является обязательным. Если его нет, то data из new Vue передается неявно
                //param - содержит data. Можно как обновить значения свойств, так и добавить новые
                //При добавлении новых параметров или обновлении Vue выдает предупреждение без останова программы
                param["title"] = "Table №1"; 
                return param;
            },
             */
            //Более удобно располагать шаблон в внутри тега компонента внутри тега <template>
            template: '<div><h3>{{model.title}}</h3><table class="simple_table only_bottom_border">\n\
                            <tr><th v-for="(th, th_id) in model.cols" v-on:click="make_sort(th_id, $event)" v-bind:id="th_id" class="click">\n\
                            <span class="th"><i v-bind:class="th.ico"></i>{{ th.name }}</span>\n\
                            </th></tr>\n\
                            <tr v-for="(row, row_id) in model.rows"><td v-for="(td, td_id) in row.td">{{ td }}</td></tr>\n\
                        </table></div>',
            methods:{
                make_sort:function(id, event){
                    //Сортируем таблицу данных по трем кликам на названии клонки: az, za default (по умолчанию)
                    let set = this.settings.sort;
                    let sort = this.status.sort;
                    let rows = this.model.rows;
                    let th = this.model.cols;

                    //Сохраняем порядок id записей для обеспечения default сортировки
                    if(sort.default.length == 0) {
                        for(let td in rows) {
                            sort.default.push(rows[td].id);
                        }    
                    }

                    //сбрасываем признак сортировки, если номер колонки отличен от сохраненного в состоянии                        
                    if( sort.col_id != id ) {
                        if( sort.col_id !== "" ) {
                            th[sort.col_id].ico = set.ico.default; //устанавливаем иконку по умолчанию 
                        }
                        sort.direct = "";                                   
                    }
                    sort.col_id = id;

                    if ( sort.direct == "za" ) {

                        //Возвращаем сортировку по умолчанию
                        for(let i=0; i<=sort.default.length-1; i++) {
                            for(let td in rows) {
                                if( sort.default[i] == rows[td].id ) {
                                    let tv = rows[i];
                                    rows[i] = rows[td];
                                    rows[td] = tv;
                                }
                            }
                        }
                        sort.direct = "default";
                        th[id].ico = set.ico.default; //устанавливаем иконку по умолчанию

                    } else {

                        //Получаем колонку для сортировки
                        let temp = [];
                        for(let td in rows) {
                            temp.push(rows[td].td[id]);
                        }    

                        if( sort.direct == "default" || sort.direct == "" ) {
                            temp.sort(); //прямая острирока строк
                            sort.direct = "az";
                            th[id].ico = set.ico.az; //устанавливаем иконку az
                        } else if ( sort.direct == "az" ) {
                            temp.reverse(); //обратная сортировка строк
                            sort.direct = "za";
                            th[id].ico = set.ico.za; //устанавливаем иконку za
                        }

                        //Перемещаем строки в соответствии с отсортированной колонкой
                        for(let i=0; i<temp.length; i++) {
                            for(let td in rows) {
                                if( temp[i] === rows[td].td[id] ) {
                                    let tv = rows[i];
                                    rows[i] = rows[td];
                                    rows[td] = tv;
                                }
                            }
                        }                           
                    }                              

                    //Заставляем Vue обновиться
                    this.$forceUpdate(); 
                }
            }
        });
        
    }
    
}