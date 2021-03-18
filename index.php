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
                    <li><div data-href="#"><i class="fas fa-clone"></i>Третий подраздел</div></li>
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
                  <div id="f1" class="flow_container">
                      <div class="fc_header"><i class="fas fa-clone"></i>View 1<span class="ico ra click invert" onClick="ContentToModal('#f1 div.fc_body')"><i class="fas fa-expand-arrows-alt"></i></span></div>
                      <div class="fc_body">
                          <table class="simple_table" >
                              <tr>
                                  <th> Первая </th>
                                  <th> Вторая </th>
                              </tr>
                              
                              <tr>
                                  <td>123455</td>
                                  <td>5465</td>
                              </tr>
                              <tr>
                                  <td>14355</td>
                                  <td>543465</td>
                              </tr>
                              <tr>
                                  <td>6785</td>
                                  <td>5675</td>
                              </tr>
                          </table>                          
                      </div>
                  </div>
                  <div id="f2" class="flow_container">
                      <div class="fc_header"><i class="fas fa-clone"></i>Form 1<span class="ico ra click invert" onClick="ContentToModal('#f2 div.fc_body')"><i class="fas fa-expand-arrows-alt"></i></span></div>
                      <div class="fc_body">
                          <form id="TestForm" name="TestForm" method="GET" action="#" onsubmit="Authorisation(this); return false;" data-url="/services/modules/main/admin/users/authorisation.php" data-result-selector="#TestForm_Result" data-source-selector="TestForm" data-params="drs:hide;">
                            <fieldset form="TestForm">
                                <legend>Авторизация</legend>
                                <p><label for="login">Логин<em>*</em></label><input type="text" name="login" autocomplete maxlength="20" pattern="^[a-zA-Z0-9_]+$" required title="Разрешены: любые английские буквы, цифры и знак подчеркивания"></p>
                                <p><label for="pass">Пароль<em>*</em></label><input type="password" name="pass" required maxlength="20" pattern="^[a-zA-Z0-9_~!@#$%^&*-+?]+$"  title="Разрешены: любые английские буквы, цифры и символы: _~!@#$%^&*-+?"></p>
                                <p><input type="submit" value="Отправить" onclick=""></p>
                            </fieldset>
                            <div id="TestForm_Result"></div>
                          </form>
                          <script>
                            
                          </script>
                      </div>
                  </div>
                  <div id="f3" class="flow_container">
                      <div class="fc_header"><i class="fas fa-clone"></i>View 2<span class="ico ra click invert" onClick="ContentToModal('#f3 div.fc_body')"><i class="fas fa-expand-arrows-alt"></i></span></div>
                      <div class="fc_body">
                          <table class="simple_table only_bottom_border" >
                              <tr>
                                  <th> Первая </th>
                                  <th> Вторая </th>
                              </tr>
                              
                              <tr>
                                  <td>123455</td>
                                  <td>5465</td>
                              </tr>
                              <tr>
                                  <td>14355</td>
                                  <td>543465</td>
                              </tr>
                              <tr>
                                  <td>6785</td>
                                  <td>5675</td>
                              </tr>
                          </table>                          
                      </div>
                  </div>
                  <div id="f4" class="flow_container">F4</div>
                  <div id="f5" class="flow_container">F5</div>
              </div>          
          </div>
          <div id="right_col" class="f_col">Right_col</div>
<?
require_once($_SERVER["DOCUMENT_ROOT"].'/services/templates/main/footer.php');
?>