<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Web Interface Test</title>
	<meta name="description" content="Разрабатываем интерфейс для мониторинга и управления удаленными устройствами" />
	<meta name="robots" content="noindex, nofollow" />
	<link rel="canonical" href="http://webinterface.ru/" />
        
        <!-- load all styles //-->
        
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
        
        
        <link href="/services/resources/css/main.css" rel="stylesheet">
        <link href="/services/resources/fonts/fontawesome-free-5.15.2-web/css/all.min.css" rel="stylesheet">
        
        

        
        
        <!-- load all js //-->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
        <script src="/services/resources/js/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
        <script src="/services/resources/js/split.js@1.6.2/split.min.js"></script>
        <script defer src="/services/resources/js/simple_modal/sm.js"></script>
        <script defer src="/services/resources/js/main.js"></script>

        <script type="module">            
            import {User} from '/services/modules/main/admin/users/index.js';        
        </script>
        
    </head>
    
    <body>
    <div id="err_alert" class="popup_block"></div>
        
    <div class="flex_main_container">
<?
require_once ($_SERVER["DOCUMENT_ROOT"]."/includes/topmenu.php");
?>
      <main>