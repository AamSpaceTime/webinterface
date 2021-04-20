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
                        import {Battery} from '/services/modules/power/battery/default/front/viewmodel.js';
                        $(document).ready(function() {
                            App["Battery"] = new Battery({
                                front: {
                                    selector:"#f1",
                                    AppName:"Battery"
                                }
                            })
                        });
                  </script>
                  <div id="f2" class="flow_container">F2</div>
                  <div id="f3" class="flow_container">F3</div>
                  <div id="f4" class="flow_container">F4</div>
                  <div id="f5" class="flow_container">F5</div>
              </div>          
          </div>
          <div id="right_col" class="f_col">Right_col</div>
<?
require_once($_SERVER["DOCUMENT_ROOT"].'/services/templates/main/footer.php');
?>