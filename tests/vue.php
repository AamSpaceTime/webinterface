<html>
    <head>
        <title>Vue test</title>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    </head>
    <body>
   



<table id="default" v-bind:title="title" class="simple_table only_bottom_border" >
  <thead>
    <tr>
        <th v-for="(item, item_i) in th" :key="item_i">{{ item }}</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(row, row_i) in td" :key="row_i">
      <td v-for="(item, item_i) in row" :key="item_i">{{ item }}</td>
    </tr>
  </tbody>
</table>

        <script>
        let dataview_table_default = {
            el: '#default',
            data: {
                title: 'Привет, Vue!',
                th: ['Группы', 'Блюдо', 'Цена', 'Порция'],
                td: [
                    //['Группы', 'Блюдо', 'Цена', 'Порция'],
                    ['Паста','Корбанара','400р','330гр'],
                    ['Бургер','БигБро','300р','250гр']
                ]
            }
          }
    
            
            
        var app = new Vue(dataview_table_default);
        
        
        function Ast() {
            
            this.name = "MIET";
            
            this.subAst = function() {
                
                this.dubleAst = function() {
                    console.log(this.name);
                    return "true";
                }
                
                console.log(this.name);
                return this;
            }
            
            console.log(this.name);
            return this;
        }
        </script>
        
        
    </body>
</html>