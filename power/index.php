<?
require_once($_SERVER["DOCUMENT_ROOT"].'/services/templates/main/header.php');
?>

          <div id="left_col" class="f_col">
          <nav>
            <ul class="tree_menu">
                <li id="n1_l" class="node"><span data-href="#"><i id="n1_i" class="fas fa-caret-right"></i><i class="fas fa-box"></i>Node 1</span>
		<ul class="dn">
                    <li><div data-href="#"><i class="fas fa-clone"></i>Первый подраздел</div></li>
                    <li id="n1_1_l" class="node"><span data-href="#"><i id="n1_1_i" class="fas fa-caret-right"></i><i class="fas fa-box"></i>Второй подраздел</span>
                    <ul class="dn">
                        <li><div data-href="#"><i class="fas fa-clone"></i>Первый подраздел</div></li>
                        <li><div data-href="#"><i class="fas fa-clone"></i>Второй подраздел</div></li>
                        <li><div data-href="#"><i class="fas fa-clone"></i>Третий подраздел</div></li>    
                    </ul>
                    </li>
                    <li><div data-href="#"><i class="fas fa-clone"></i><span class="click" onclick="USER.auth();">Третий подраздел</span></div></li>
		</ul>
                </li>
                <li id="n2_l" class="node"><span data-href="#"><i id="n2_i" class="fas fa-caret-right"></i><i class="fas fa-box"></i>Node 2</span>
                <ul class="dn">
                    <li><div data-href="#"><i class="fab fa-buffer"></i>Первый подраздел</div></li>
                    <li><div data-href="#"><i class="fab fa-buffer"></i>Второй подраздел</div></li>
                    <li><div data-href="#"><i class="fab fa-buffer"></i>Третий подраздел</div></li>
		</ul>
                </li>
                <li id="n3_l" class="node"><span data-href="#"><i id="n3_i" class="fas fa-caret-right"></i><i class="fas fa-box"></i>Ресурсы</span>
                    <ul class="dn">
                    <li><div data-href="/resources/fonts/icommon/demo.html"><i class="fas fa-book"></i>Icommon fonts icons demo</div></li>
                    <li><div data-href="#"><i class="fas fa-book"></i>Второй подраздел</div></li>
                    <li><div data-href="#"><i class="fas fa-book"></i>Третий подраздел</div></li>
		</ul>
                </li>    
            </ul>
          </nav>
          </div>
          <div id="center_col" class="f_col">
              <header>
              H1
              </header>
              <div id="main_content">
                  <div id="f1" data-app="Battery" class="flow_container">
                  </div>
                  <script type="module">            
                        import {Battery} from '/services/modules/power/battery/default/viewmodel.js';
                        $(document).ready(function() {
                            App["Battery"] = new Battery({
                                selector:"#f1",
                                AppName:"Battery"
                            })
                        });
                  </script>
                  <div id="f2" class="flow_container"><div id="f2_cont">F2</div></div>
                    <script type="module">
                        
                        import {Battery} from '/services/modules/power/battery/default/viewmodel.js';
                        $(document).ready(function() {
                            App["BatterySort"] = new Battery({
                                selector:"#f2_cont",
                                AppName:"BatterySort",
                                view:"Sortable"
                            })
                        });
                         
                    </script>
                  <div id="f3" data-app="BatterySort" class="flow_container">
                      <span class="click" onclick="appInit()">AppInit</span>
                      <span class="ico ra click invert" onClick="ContentToModal('#app_cont');"><i class="fas fa-expand-arrows-alt"></i></span>
                      <div id="app_cont">
                      <div id="app" :key="componentKey">
                        {{ message }}
                      </div>
                      </div>
                      <script>
                          //let timerId = setTimeout(appInit, 2000);
                          var app;
                          function appInit() {
                            app = new Vue({
                            el: '#app',
                            data: {
                                message: 'Привет, Vue!',
                                componentKey: 0
                            },
                            beforeUpdate: function () {
                                // `this` указывает на экземпляр vm
                                console.log('Значение message =  ' + this.message)
                            },
                            updated: function () {
                                // `this` указывает на экземпляр vm
                                console.log('Значение message =  ' + this.message)
                            },
                            methods: {
                                forceRerender() {
                                  this.componentKey += 1;  
                                }
                            }
                      })
                  }
                        </script>
                  </div>
 

                <div id="f4" class="flow_container">
                    
                    <table-sort v-bind:model="model" v-bind:status="status" v-bind:settings="settings">
                    <table-sort/>
                </div>
                    <script>
                    //Переменная, хранящая модель данных.
                    let TableSortModel = {
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
                    };
                    //Данные для модели присваиваем отдельно что-бы использовать настройки 
                    TableSortModel.model = {
                        title: "Таблица",
                        cols: [
                            { name:"First", ico:TableSortModel.settings.sort.ico.default }, 
                            { name:"Second", ico:TableSortModel.settings.sort.ico.default }
                        ],                            
                        rows: [
                            { id: 1, td: ["3", "4"] },
                            { id: 2, td: ["5", "6"] },
                            { id: 3, td: ["1", "2"] }
                    ]};
                    //регистрируем компонент table-sort
                    Vue.component('table-sort', {                        
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
                                    for(td in rows) {
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
                                        for(td in rows) {
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
                                    for(td in rows) {
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
                                        for(td in rows) {
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
                    })
                    let tb = new Vue({ 
                        el: '#f4',
                        data: TableSortModel,
                    });
                  </script>                 
                
                
                <div id="f5" class="flow_container">
                    <blog-post
                        v-for="post in posts"
                        v-bind:key="post.id"
                        v-bind:post="post"
                    ></blog-post>   
                </div>
                    <script>
                    //регистрируем компонент blog-post
                    Vue.component('blog-post', {                        
                        props: ['post'],
                        template: '<div><h3>{{ post.title }}</h3><div v-html="post.content"></div></div>'
                    })
                    let nm = new Vue({ 
                        el: '#f5',
                        data: { 
                               posts: [
                              { id: 1, title: 'My journey with Vue', content: "1" },
                              { id: 2, title: 'Blogging with Vue', content: "2" },
                              { id: 3, title: 'Why Vue is so fun', content: "3" }
                            ]
                        },
                    });
                  </script>                 
              </div>
              
<div id="f6" class="flow_container">

                        <v-app id="inspire">
                          <v-data-table
                            v-model="selected"
                            :headers="headers"
                            :items="desserts"
                            :single-select="singleSelect"
                            item-key="name"
                            show-select
                            class="elevation-1"
                          >
                            <template v-slot:top>
                              <v-switch v-model="singleSelect" label="Single select" class="pa-3"></v-switch>
                            </template>
                          </v-data-table>
                        </v-app>
  
                  </div>
                    <script>
                    
                    new Vue({
  el: '#f6',
  vuetify: new Vuetify(),
  data () {
    return {
      singleSelect: false,
      selected: [],
      headers: [
        {
          text: 'Dessert (100g serving)',
          align: 'start',
          sortable: false,
          value: 'name',
        },
        { text: 'Calories', value: 'calories' },
        { text: 'Fat (g)', value: 'fat' },
        { text: 'Carbs (g)', value: 'carbs' },
        { text: 'Protein (g)', value: 'protein' },
        { text: 'Iron (%)', value: 'iron' },
      ],
      desserts: [
        {
          name: 'Frozen Yogurt',
          calories: 159,
          fat: 6.0,
          carbs: 24,
          protein: 4.0,
          iron: '1%',
        },
        {
          name: 'Ice cream sandwich',
          calories: 237,
          fat: 9.0,
          carbs: 37,
          protein: 4.3,
          iron: '1%',
        },
        {
          name: 'Eclair',
          calories: 262,
          fat: 16.0,
          carbs: 23,
          protein: 6.0,
          iron: '7%',
        },
        {
          name: 'Cupcake',
          calories: 305,
          fat: 3.7,
          carbs: 67,
          protein: 4.3,
          iron: '8%',
        },
        {
          name: 'Gingerbread',
          calories: 356,
          fat: 16.0,
          carbs: 49,
          protein: 3.9,
          iron: '16%',
        },
        {
          name: 'Jelly bean',
          calories: 375,
          fat: 0.0,
          carbs: 94,
          protein: 0.0,
          iron: '0%',
        },
        {
          name: 'Lollipop',
          calories: 392,
          fat: 0.2,
          carbs: 98,
          protein: 0,
          iron: '2%',
        },
        {
          name: 'Honeycomb',
          calories: 408,
          fat: 3.2,
          carbs: 87,
          protein: 6.5,
          iron: '45%',
        },
        {
          name: 'Donut',
          calories: 452,
          fat: 25.0,
          carbs: 51,
          protein: 4.9,
          iron: '22%',
        },
        {
          name: 'KitKat',
          calories: 518,
          fat: 26.0,
          carbs: 65,
          protein: 7,
          iron: '6%',
        },
      ],
    }
  },
})
                    
                    </script>
              
              
          </div>
          <div id="right_col" class="f_col">Right_col</div>
<?
require_once($_SERVER["DOCUMENT_ROOT"].'/services/templates/main/footer.php');
?>