<div id="UserBlock" style="float: right;">
    <div id="UserAuth"><span class="click" onclick="USER.getAuthForm();">Авторизация</span></div>
    <div id="UserProp" class="dn"><span id="UserFIO"></span><span class="click" onclick="$.when( $.Deferred(function() { Exit() }) ).then(USER.Exit2());">Выйти</span></div>
    <div id="UserAuthForm" class="dn"></div>
</div>

<script>

function Exit() {
    
    $.getScript("/services/modules/main/admin/users/auth/test.js", function( data, textStatus, jqxhr ) {
        console.log( data ); // Данные с сервера
        console.log( textStatus ); // Success
        console.log( jqxhr.status ); // 200
        console.log( "Загрузка была выполнена." );
        if( textStatus == "success" ) {
            USER["Exit2"] = Exit2;
            return true;
        } else {
            USER["Exit2"] = undefined;
            return false;
        }
    });
}

//def1 = $.Deferred(function() { Exit() });

</script>