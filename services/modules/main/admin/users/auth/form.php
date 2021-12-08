<?
require_once ($_SERVER["DOCUMENT_ROOT"]."/services/modules/main/autoload.php");
spl_autoload_register('AutoLoad');
?> 


<form id="TestForm" name="TestForm" method="GET" action="#" onsubmit="USER.Authorisation(this); return false;" data-url="/services/modules/main/admin/users/auth/" data-result-selector="#TestForm_Result" data-source-selector="TestForm" data-params="drs:hide;">
    <fieldset form="TestForm" class="main">
      <legend><span class="click" onclick="ATest();">Авторизация</span></legend>
      <p><label for="login">Логин<em>*</em></label><input type="text" name="login" autocomplete maxlength="20" pattern="^[a-zA-Z0-9_]+$" required title="Разрешены: любые английские буквы, цифры и знак подчеркивания"></p>
      <p><label for="pass">Пароль<em>*</em></label><input type="password" name="pass" required maxlength="20" pattern="^[a-zA-Z0-9_~!@#$%^&*-+?]+$"  title="Разрешены: любые английские буквы, цифры и символы: _~!@#$%^&*-+?"></p>
      <p><input type="submit" value="Отправить"></p>
  </fieldset>
  <div id="TestForm_Result"></div>
</form>
<script>
function ATest() {
    alert('ATest');
}
</script>