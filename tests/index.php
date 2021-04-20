<?
require_once($_SERVER["DOCUMENT_ROOT"].'/services/templates/main/header.php');
?>


          <div id="left_col" class="f_col">Left col</div>
          <div id="center_col" class="f_col">
              <header>
              H1
              </header>
              <div id="main_content">

              </div>          
          </div>
          <div id="right_col" class="f_col">Right_col</div>

<script>
let c1 = 10;
var c2 = 20;
let c3 = 30;
var c4 = 40;

start = function Start() {
    return c1+" "+c2+" "+c3+" "+c4;
}

finish = function Finish(s) {
    
    let c1 = 100;
    var c2 = 200;
    if(true) {
        let c3 = 300;
    }
    if(true) {
        var c4 = 400;
    }
    
    fn = function FinTest() {
        return c1+" "+c2+" "+c3+" "+c4;
    }
    
    console.log("Start = "+s());    
    console.log("FinTest = "+fn());
}

finish(start);


let sum = function(a, b) {
    let Result = a+b;
    console.log(this); console.log(Result);
    return Result;
}
sum(1, 2); //window 3

sum = (a,b) => console.log(a+b); 
sum(1, 2); //3

sum = (a,b) => {
    let Result = a+b;
    console.log(this); console.log(Result);
    return Result;
}
sum(1, 2); //window 3

let test = {
  Result: 'Result',

  ArrowFun: function() {
    return () => {
      console.log(this.Result); console.log(arguments);
    };
  }

  AnonFun: function() {
    return function() {
      console.log(this.Result); console.log(arguments);
    };
  },
};

let anon = test.AnonFun('hello', 'Spintex'); //undefined \n Arguments [callee: ƒ, Symbol(Symbol.iterator): ƒ]
let arrow = test.ArrowFun('hello', 'Spintex'); //Result \n Arguments(2) ["hello", "Spintex", callee: ƒ, Symbol(Symbol.iterator): ƒ]

anon();
arrow();
</script>

<?
require_once($_SERVER["DOCUMENT_ROOT"].'/services/templates/main/footer.php');
?>
