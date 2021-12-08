/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * Справочники
 */
let pps_dict = { //dict = dictionaries
    device_type:{
        headers:{
            title:"Тип устройства",
            short_title:"Тип",
            internal_description:"Список типов устройств. Каждому устройству обязательно соответствует одно значение из этого списка."
        },
        body:{
            fields:[
                {value:"gate", title:"ГШ"},
                {value:"terminal", title:"ОУ"},
                {value:"sensor", title:"ОУ"}
            ]
        }
    },
    device_subtype:{ 
        headers:{
            title:"Подтип устройства",
            short_title:"Подтип",
            internal_description:"Пополняемый пользовательский список без первого значения по умолчанию. Применяется для группировки устройств по одинаковому набору свойств"
        },
        body:{
            fields:[
                {value:"example", title:"Пример"}
            ]
        }
    },
    work_status:{ 
        headers:{
            title:"Состояние устройства",
            short_title:"Состояние",
            internal_description:"Применяется для индикации рабочих/не рабочих состояний устройства"
        },
        body:{
            fields:{
                norm:{value:"normal", title:"Работает"},
                cras:{value:"crashed", title:"Не работает по неизвесной причине"},
                dis:{value:"disabled", title:"Отключен"},
                rep:{value:"repair", title:"Не работает по извесной причине"}
            }
        }
    },
    users_groups:{ 
        headers:{
            title:"Группы пользователей",
            short_title:"Группа",
            internal_description:"Применяется для назначения пользователей в группы с определенными правами"
        },
        body:{
            fields:{
                adm:{value:"admin", title:"Администратор"},
                mod:{value:"moderator", title:"Модератор"},
                opr:{value:"operator", title:"Оператор"},
                obs:{value:"observer", title:"Наблюдатель"}
            }
        }
    },
    access_type:{ 
        headers:{
            title:"Права доступа",
            short_title:"Доступ",
            internal_description:"Применяется для назначения прав групп пользователей для устройства"
        },
        body:{
            fields:{
                all:{value:"all", title:"Все действия", i_descr:"При установке отключает forbidden, если он был выбран"},
                full:{value:"full", title:"Все, кроме установки прав", i_descr:"При установке отключает forbidden, если он был выбран"},
                add:{value:"add", title:"Добавление"},
                edit:{value:"edit", title:"Изменение"},
                view:{value:"view", title:"Просмотр"},
                del:{value:"delete", title:"Удаление"},
                hide:{value:"hidden", title:"Скрыто", i_descr:"данные могут присутствовать на странице в невном виде hidden-поле"},
                bind:{value:"binding", title:"Привязка"},
                forb:{value:"forbidden", title:"Запрещено", i_descr:"При установке снимает все, в том числе: all и full"}
            }
        }
    }  
};

/*
 * Объекты
 */
let pps_device = {
    headers:{
        title:"Устройство",
        short_title:"Устр.",
        internal_description:"Общие поля устройств"
    },
    body:{
        fields: {
            id:"",
            name:"",
            type:"",
            subtype:"",
            active:true,
            access:true,
            description:"",
            work_status:pps_dict.work_status.body.fields.norm.value,
            parent:"",
            geopoint:undefined                    
        },
        fields_descr: {
            id:{title:"Идентификатор", value:"", datetype:"string"},
            name:{title:"Название", value:"", datetype:"string"},
            type:{title:"Тип", value:"", datetype:"relation", rel:pps_dict.device_type},
            subtype:{title:"Подтип", value:"", datetype:"relation", rel:pps_dict.device_subtype},
            active:{title:"Активность", value:true, datetype:"boolean", i_descr:"если true - устройство и все его подчиненные устройства видны только админам и модераторам"},
            access:{title:"Доступность", value:true, datetype:"boolean", i_descr:"если true - устройство видно всем, но недоступно для манипуляций: операторам и наблюдателям"},
            description:{title:"Описание", value:"", datetype:"string"},
            work_status:{title:"Рабочий статус", value:undefined, datetype:"relation", rel:pps_dict.work_status},
            parent:{title:"Родитель", datetype:"string", value:undefined, rel:"id", i_descr:"Содержит ссылку на id родительского устройства. Позволяет организовать иерархию устройств"},
            geopoint:{title:"Геопривязка", value:{x:"", y:"", z:""}, datetype:"object"}                    
        },
        users_access:{
            value:{
                common_default:{"adm":"all", "mod":"view", "opr":["view", "bind"], "obs":"view"},
                work_status:{"adm":"all", "mod":"edit", "opr":"view"},
                description:{"opr":["view", "edit"], "obs":"view"}
            }
        },
        users_access_descr:{
            title:"Права доступа", 
            value:{
                common_default:{"adm":"all", "mod":"view", "opr":["view", "bind"], "obs":"view"},
                "код поля или свойства":{"первая группа пользователей":"право доступа", "вторая группа пользователей":"[право доступа, право доступа]"}
            }, 
            datetype:"object | undefined", 
            rel:[pps_dict.users_groups, pps_dict.access_type],
            i_descr:"При undefined - наследуются права родителя из fields.parent."
        }
    }
};


/*
 * Граничный шлюз
 * Описываем только то, что отличается от pps_device
 */
let gate = {
    headers:{
        title:"Граничный шлюз",
        short_title:"ГШ",
        internal_description:"Общие поля ГШ"
    },
    body:{
        fields: {
            type:{value:"gate"},
            parent:null  //У граничного шлюза нет родителя                 
        }
    }
};

/*
 * Оконечное устройство
 * Описываем только то, что отличается от pps_device
 */
let terminal = {
    headers:{
        title:"Оконечное устройство",
        short_title:"ОУ",
        internal_description:"Общие поля ОУ"
    },
    body:{
        fields: {
            type:{value:"terminal"},
            subtype:null //У ОУ нет субтипа              
        }, 
        users_access:{
            value:undefined //Права на ОУ совпадают с правми ГШ
        }
    }
};


/*
 * Оконечное устройство
 * Описываем только то, что отличается от pps_device
 */
let sensor = {
    headers:{
        title:"Сенсор",
        short_title:"Сенсор",
        internal_description:"Общие поля Сенсор"
    },
    body:{
        fields: {
            type:{value:"sensor"},
            subtype:null,
            geopoint:undefined //Геолокация сенсора совпадает с геолокацией ОУ
        },
        users_access:{
            value:undefined //Права на сенсор совпадают с правми ГШ
        },
        properties: {
            edizm:""
        },
        properties_descr: {
            edizm:{
                title:"Единица измерения",
                sort:100,
                multy:false,
                type:"string",
                value:""
            }
        }
    }
};


//Модель данных шлюза
let gate_model = JSON.parse(JSON.stringify(pps_device));
//Object.assign(gate_model, pps_device);
set_Prop(gate, gate_model);

//Модель данных ОУ
let terminal_model = JSON.parse(JSON.stringify(pps_device)); 
//Object.assign(terminal_model, pps_device);
set_Prop(terminal, terminal_model);


//Модель данных Сенсора
let sensor_model = JSON.parse(JSON.stringify(pps_device)); 
//Object.assign(sensor_model, pps_device);
set_Prop(sensor, sensor_model);


//Модель данных показаний для сенсоров
let sensor_data_model = {
    headers:{
        title:"Данные измерений сенсоров",
        short_title:"Данные сенсоров",
        internal_description:"Данные, получаемые в БД от сенсоров"
    },
    body:{
        fields: {
            id:"",
            value:[],
            date:[]
        },
        fields_descr: {
            id:{title:"Идентификатор", value:[["",""]], datetype:"array", i_descr:"значение двухмерный массив, в каждой сроке которого на 0 находится значение измерения, а на 1 - дата и время"}               
        },
        users_access:{
            value:undefined //Права на данные совпадают с правами на ГШ
        }
    }
};


/*
 * 
 * Подготавливаем объекты для генерации
 */
let g_obj = JSON.parse(JSON.stringify(gate_model.body));
delete g_obj["fields_descr"];
delete g_obj["users_access_descr"];

let t_obj = JSON.parse(JSON.stringify(terminal_model.body));
delete t_obj["fields_descr"];
delete t_obj["users_access_descr"];

let s_obj = JSON.parse(JSON.stringify(sensor_model.body));
delete s_obj["fields_descr"];
delete s_obj["users_access_descr"];
delete s_obj["properties_descr"];

let s_data_obj = JSON.parse(JSON.stringify(sensor_data_model.body));
delete s_data_obj["fields_descr"];
delete s_data_obj["users_access"];


/*
 * Генерация
 */

let device_list = []; //Хранит структуру сгенеренных объектов
let data_list = []; //Хранит сгенеренные данные сенсоров

//Настройки генерации
let conf = {
  gN:4,
  tN:4,
  sN:4,
  sD:15,
  startDate:new Date(2021, 5, 1),
  date:"",
  gX:0.2,
  gY:0.2,
  tX:0.01,
  tY:0.01,
  startX:37.2028,
  startY:55.9828
};

/*
 * 
 * Генерим gN сенсоров, в каждом по tN ОУ, в каждом по sN сенсоров, для каждого по sD = 100 измерений
 * Шаблон имен ГШ = ГШ_n, id ГШ - G_n где n - порядковый номер от 1 до N
 * 
 * Шаблон имен ОУ = ОУ_n, id ОУ = id ГШ + "_T" + n где n - порядковый номер ОУ от 1 до N
 * 
 * Шаблон имен Сенсоров = Сенсор_n, id Сенсора = id ОУ + "_S" + n, где n - порядковый номер Сенсора от 1 до N
 */


/*
 * Генерация структуры
 */
genSruct();


/*
 * Генерация данных для сенсоров
 */
genData();


function genSruct() {
    //Генерация структуры

    for(let i=1; i<=conf.gN; i++) { //ГШ
    
        let g = JSON.parse(JSON.stringify(g_obj));
        g.fields.id = "G"+i;
        g.fields.name = "ГШ_"+i;
        device_list.push(g);

        for(let j=1; j<=conf.tN; j++) { //ОУ
            let t = JSON.parse(JSON.stringify(t_obj));
            t.fields.id = g.fields.id+"_T"+j;
            t.fields.name = "ОУ_"+j;
            t.fields.parent = g.fields.id;
            device_list.push(t);

            for(let k=1; k<=conf.sN; k++) { //Сенсоры
                let s = JSON.parse(JSON.stringify(s_obj));
                s.fields.id = t.fields.id+"_S"+k;
                s.fields.name = "Сенсор_"+k;
                s.fields.parent = t.fields.id;
                device_list.push(s);

                let s_data = JSON.parse(JSON.stringify(s_data_obj));
                s_data.fields.id = s.fields.id;
                data_list.push(s_data);
            }        
        }
    }
    
}


function genData() {
    //Генерация данных для сенсоров
    
    conf.date = conf.startDate;
    
    for(let s in data_list) {

        for(let i=1; i<=conf.sD; i++) {
            data_list[s].fields.value.push(Math.random().toFixed(3)); 
            data_list[s].fields.date.push(formatDate(conf.date));
            conf.date.setDate(conf.date.getDate() + 1);
        }

    }    
}


function formatDate(date) {
    //Возвращаем дату по формату: dd.mm.yy

    var dd = date.getDate();
    if (dd < 10) dd = '0' + dd;

    var mm = date.getMonth() + 1;
    if (mm < 10) mm = '0' + mm;

    var yy = date.getFullYear() % 100;
    if (yy < 10) yy = '0' + yy;

    return dd + '.' + mm + '.' + yy;
}


function set_Prop(in_prop, out_prop) {
    /*
     * При вызове вида: set_Prop(obj_from, obj_to); 
     * в obj_to заменяются только те свойства, которые есть в obj_from
     * 
     */
    for (var key in in_prop) {
        if (typeof in_prop[key] !== "object") {
            out_prop[key] = in_prop[key];
        } else {
            //Если значение свойства - объект, проверяем, может это список
            var counter = 0;
            for (var subkey in in_prop[key], out_prop[key]) {
                counter++;
            }               
            if( counter > 0 ) {
                //Если список - рекурсивно идем внутрь
                this.set_Prop(in_prop[key], out_prop[key]);
            } else {
                out_prop[key] = in_prop[key];    
            }
        }
    }        
}