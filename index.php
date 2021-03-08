<html>
<head>
    <style>
        #main_cont {
            display:flex;
            flex-direction: row;
            background-color: #ededed;
            padding: 20px;
            height: auto;
            min-width: 700px;
        }
        
        #main_cont div {
            margin:10px;
            background-color: #ed0000;
            border-radius: 10px;
            padding: 10px;
            flex:  1 1 100px;
        }
        
        div#f1 {
    flex: 0 0 180px;
        }
        div#f3 {
    flex: 0 0 180px;
        }
         div#f2 {
    min-width: 200px;
        }
        
        
        
        
.grid, .grid__item {
    border: 1px solid #e7e7e7;
}
.flexy-nav, .flexy-nav__items, .grid__row, .holy-grail, .holy-grail__body {
}
.banner, .user {
    align-items: center;
}
.component__section {
    margin: 0 24px 48px;
}
.component__section:last-child {
    margin-bottom: 0;
}
.component__sub-title {
    color: #818181;
    font-size: 22px;
    font-weight: 300;
    margin-bottom: 12px;
    text-align: center;
}
.grid__row {
    display: flex;
    flex-direction: column;
}
.grid__item {
    flex: 1 1 0;
    padding: 12px;
}
@media all and (min-width: 480px) {
.grid__row--sm {
    flex-direction: row;
}
}
@media all and (min-width: 720px) {
.grid__row--md {
    flex-direction: row;
}
}
@media all and (min-width: 960px) {
.grid__row--lg {
    flex-direction: row;
}
}
.holy-grail {
    display: flex;
    flex-direction: column;
}
.holy-grail__footer, .holy-grail__header {
    background-color: #f07850;
    flex: 0 0 100%;
    padding: 12px;
    text-align: center;
}
.holy-grail__footer small, .holy-grail__header h1 {
    color: #fff;
}
.holy-grail__body {
    display: flex;
    flex-direction: column;
}
.holy-grail__sidebar {
    background-color: #e7e7e7;
    padding: 12px;
}
.holy-grail__sidebar--first {
    order: 1;
}
.holy-grail__sidebar--second {
    order: 3;
}
.holy-grail__content {
    order: 2;
    padding: 12px;
}
@media all and (min-width: 720px) {
.holy-grail__body {
    flex-direction: row;
}
.holy-grail__sidebar {
    flex: 0 0 180px;
}
.holy-grail__content {
    flex: 1 1 0;
}
}
@media all and (min-width: 960px) {
.holy-grail__sidebar {
    flex: 0 0 240px;
}
}
button, input {
    -moz-appearance: none;
    box-shadow: none;
    font: inherit;
}
button {
    cursor: pointer;
}
.flexy-nav {
    display: flex;
    flex-direction: column;
}
.flexy-nav__items {
    display: none;
    flex: 1 1 0;
    flex-direction: column;
    list-style: outside none none;
    margin: 0 0 4px;
    padding: 4px;
    text-align: center;
}
.flexy-nav__items--visible {
    display: flex;
}
.flexy-nav__item {
    background-color: #f1f1f1;
    border-bottom: 1px solid #e7e7e7;
}
.flexy-nav__item:last-child {
    border-bottom: 0 none;
}
.flexy-nav__link {
    display: block;
    padding: 8px;
}
.flexy-nav__toggle {
    background-color: #f07850;
    border: medium none;
    color: #fff;
    margin: 0 0 4px;
    padding: 4px;
}
.flexy-nav__toggle:focus, .flexy-nav__toggle:hover {
    background-color: #c93f11;
    outline: 0 none;
}
.flexy-nav__form {
    height: 48px;
}
.flexy-nav__search {
    background-color: #fff;
    border: 2px solid #e7e7e7;
    color: #6d6d6d;
    display: block;
    height: 48px;
    margin: 0;
    padding: 0 4px;
    width: 100%;
}
.banner, .user__avatar {
    background-color: #e7e7e7;
}
.flexy-nav__search:focus {
    border: 2px solid #6d6d6d;
    outline: 0 none;
}
@media all and (min-width: 768px) {
.flexy-nav, .flexy-nav__items {
    flex-direction: row;
}
.flexy-nav__items {
    display: flex;
    height: 48px;
    margin: 0;
    padding: 0;
}
.flexy-nav__item {
    border-bottom: medium none;
    flex: 1 1 0;
    margin-right: 4px;
}
.flexy-nav__link {
    line-height: 48px;
    padding: 0;
}
.flexy-nav__toggle {
    display: none;
}
.flexy-nav__form {
    flex: 0 0 auto;
}
.flexy-nav__search {
    transition: width 0.3s ease 0s;
    width: 240px;
}
.flexy-nav__search:focus {
    width: 360px;
}
}
.user {
    display: flex;
    margin: 0 auto 24px;
    max-width: 960px;
}
.banner, .user {
}
.user:last-child {
    margin-bottom: 0;
}
.user__avatar {
    flex: 0 0 96px;
    height: 96px;
    width: 96px;
}
.user__description {
    border: 1px solid #e7e7e7;
    flex: 1 1 0;
    margin-left: 24px;
    padding: 12px;
}
.user__username {
    margin: 0 0 12px;
    padding: 0;
}
.user__excerpt {
    margin: 0;
}
.banner {
    display: flex;
    height: 180px;
    justify-content: space-around;
}
.banner__content {
    text-align: center;
}
.banner__sub, .banner__title {
    line-height: 1.5;
    margin: 0;
    padding: 0;
}
@media all and (min-width: 480px) {
.banner {
    height: 240px;
}
}
@media all and (min-width: 768px) {
.banner {
    height: 360px;
}
}
@media all and (min-width: 960px) {
.banner {
    height: 480px;
}
}
        
        
    </style>
</head>
<body>
FlexBox
<hr>
<div id="main_cont">
    <div id="f1">Flex 1</div>
    <div id="f2">Flex 2<br>a<br>a<br>a<br></div>
    <div id="f3">Flex 3</div>
</div>

<div class="holy-grail">
      <header class="holy-grail__header">
        <h1>This is the header</h1>
      </header>
      <div class="holy-grail__body">
        <div class="holy-grail__content">
          <h2>This is the main content</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum sequi nisi aliquam, ipsum tempore illo recusandae. Odit consectetur totam hic eius, commodi molestiae voluptates porro vel laboriosam, tempore, nostrum quis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos mollitia vero facilis, deserunt omnis, fugit quod nam, neque iusto reprehenderit tempora. Atque fuga inventore perferendis harum et culpa repudiandae, laudantium. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda dolorum ea at nobis dolores doloremque incidunt voluptate, dignissimos, veniam soluta temporibus sint error odit nesciunt ducimus excepturi quam, itaque eos! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, molestiae, delectus nemo quibusdam odit fugiat velit facilis soluta odio ipsam ullam alias repellat. Ipsam porro voluptate adipisci nihil assumenda, ab.</p>
        </div>
        <div class="holy-grail__sidebar holy-grail__sidebar--first">
          <h4>Sidebar 1</h4>
        </div>
        <div class="holy-grail__sidebar holy-grail__sidebar--second">
          <h4>Sidebar 2</h4>
        </div>
      </div>
      <footer class="holy-grail__footer">
        <small>This is the footer</small>
      </footer>
    </div>

</body>
</html>