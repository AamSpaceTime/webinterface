<?
require_once($_SERVER["DOCUMENT_ROOT"].'/services/templates/main/header.php');
?>

<div id="left_col" class="f_col">
</div>

<div id="center_col" class="f_col">
    <div id="main_content">
        
 <div id="app">
    <counter></counter>
</div>

<script>
Vue.component('counter', {
    data: function(){
        return {
            header: 'Counter Program',
            count:0
        }
    },
    template:`<div><h2>{{header}}</h2>
                <button v-on:click="increase">+</button>
                <span>{{count}}</span>
            </div>`,
    methods:{
        increase:function(){
            this.count++;
        }
    }
});
new Vue({
    el: "#app"
});
</script>
        
        
    </div>
</div>


<div id="right_col" class="f_col">Right_col</div>




<?
require_once($_SERVER["DOCUMENT_ROOT"].'/services/templates/main/footer.php');
?>
