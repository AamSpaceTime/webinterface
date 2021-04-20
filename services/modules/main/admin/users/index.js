import {Authorisation, getAuthForm} from './auth/index.js';

export class User {
//Управление пользователями

    //Скрытые свойства класса по соглашению о именовании таких перименных префиксом _
    _Prop = {
        login: "",
        name: "",
        family: ""
    }; 
    
    //Методы класса
    Authorisation = ""; //Этот метод будет добавлен позднее, копированием функции Authorisation из ./auth/index.js

    addMethod(code) {
        
    }

    constructor(prop, methods) {
        //Импортируем свойства
        if( prop !== undefined && prop !== null ) {
            this.Prop = prop; //Вместо ожидаемого this.Prop(prop);
        }
        //Импортируем методы
        if( methods !== undefined && methods !== null ) {
            for (let key in methods) {
                //alert(key+" "+this.key);
                if (typeof(methods[key]) === "function") {
                    //if( this[key] !== undefined ) { 
                    //Можно использовать эту проверку, если мы хотим добавлять в конструкторе только методы, объявленные в классе 
                    this[key] = methods[key];
                    //}
                }
            }
        }
    };
    
    //Геттер для свойства _prop
    get Prop() {
        return this._Prop;
    }
    
    //Сеттер для свойства Prop
    set Prop(prop) {
        this._Prop = prop;
        alert("prop?");
    }
 
}

$(document).ready(function() {
    let met = {
        Test: function Test() { alert('Test!'); },
        'Authorisation': Authorisation, //Метод авторизации
        'getAuthForm': getAuthForm //метод публикации формы ввода логина и пароля
    };  
    USER = new User(null, met);
    //USER.Prop = prop;
    //USER.Authorisation = Authorisation;
    //USER.Test();
    USER["NewMet"] = function N() { alert('NewMet'); }; //Можно просто напрямую добавить метод!
});

