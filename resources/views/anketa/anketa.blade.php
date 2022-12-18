@extends('main')
@section('index')
    @verbatim
        <div id="app" class="col-6 offset-4">
            <h3>Анкетирование</h3>
            <hr>
            <div v-show="showOk">
                <div class='alert alert-info'><b>Все сохранено! Спасибо!</b></div>
            </div>
            <div v-for="(index,id) in indexInfo">
                <!--Радио-->
                <div v-if="index.type=='radio'"
                    v-show="index.hide == null || indexInfo[index.hide.quest].now == index.hide.value">
                    <div class="">
                        <div class="">
                            <div class="well">
                                <div class="mdl-card__title" v-bind:class="{'rederror':index.hasError}">
                                    <h4>{{ index . text }}</h4>
                                </div>
                                <div class="mdl-card__supporting-text" v-for="answer,answerid in index.answers">
                                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" v-bind:for="'option-'+answerid">
                                        <input type="radio" v-bind:id="'option-'+answerid" class="mdl-radio__button"
                                            v-bind:name="'options-'+id" v-model="indexInfo[id].now" v-bind:value="answerid">
                                        <span class="mdl-radio__label">{{ answer . answer }}
                                        </span>
                                    </label>
                                </div>
                                <div v-if="index.withAnswer">
                                    <div class="mdl-card__supporting-text">
                                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" v-bind:for="'option-swoy'">
                                            <input type="radio" v-bind:id="'option-swoy'" class="mdl-radio__button"
                                                v-bind:name="'options-'+id" value="9999" v-model="indexInfo[id].now">
                                            <span class="mdl-radio__label">Свой ответ</span>
                                        </label>
                                        <div v-show="indexInfo[id].now == 9999">
                                            <input v-model="indexInfo[id].sw" class="mdl-textfield__input" type="text"
                                                id="sample1">
                                            <label class="mdl-textfield__label" for="sample1"
                                                v-html="'Введите свой ответ'"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Чексы-->
                <div v-if="index.type=='checkbox'"
                    v-show="index.hide == null || indexInfo[index.hide.quest].now == index.hide.value">
                    <div class="">
                        <div class="well">
                            <div class="row">
                                <div class="bold" v-bind:class="{'rederror':index.hasError}">
                                    <h4>{{ index . text }}</h4>
                                </div>
                                <div class="col-md-4" v-for="answer,answerid in index.answers">
                                    <label class="" v-bind:for="'checkbox-'+answerid">
                                        <input type="checkbox" v-bind:id="'checkbox-'+answerid" v-bind:value="answerid"
                                            class="mdl-checkbox__input" v-model="indexInfo[id]['answers'][answerid].now">
                                        <span class="mdl-checkbox__label">{{ answer . answer }}</span>
                                    </label>
                                </div>
                                <div v-if="index.withAnswer" class="col-md-4">
                                    <div class="mdl-card__supporting-text">
                                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" v-bind:for="'option-swoy'">
                                            <input type="checkbox" v-bind:id="'option-swoy'" class="mdl-radio__button"
                                                v-bind:name="'options-'+id" v-model="indexInfo[id].now">
                                            <span class="mdl-radio__label">Свой ответ</span>
                                        </label>
                                        <div v-show="indexInfo[id].now">
                                            <input v-model="indexInfo[id].sw" class="form-control" type="text"
                                                id="sample1">
                                            <label class="mdl-textfield__label" for="sample1"
                                                v-html="'Введите свой ответ'"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Таблицы-->
                <div v-if="index.type=='table'">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ index . text }}</th>
                                <th v-for="answer in index.answers">{{ answer . text }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="quest,questid in index.question" v-bind:class="{'rederror':quest.hasError}">
                                <td class=''>{{ quest . text }}</td>
                                <td v-for="answer,answerid in index.answers">
                                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect"
                                        v-bind:for="'label-'+questid+'-'+answerid">
                                        <input type="radio" v-bind:id="'label-'+questid+'-'+answerid"
                                            class="mdl-radio__button" v-bind:name="'options-'+questid" v-bind:value="answer.id"
                                            v-model="quest.now">
                                        <span class="mdl-radio__label">{{ answer . answer }}
                                        </span>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--Инпуты-->
                <div v-if="index.type=='input'"
                    v-show="index.hide == null || indexInfo[index.hide.quest].now == index.hide.value">
                    <div class="">
                        <div class="well">
                            <div class="row">
                                <div class="" v-bind:class="{'rederror':index.hasError}">
                                    <h4>{{ index . text }}</h4>
                                </div>
                                <div class="">
                                    <div class="">
                                        <input v-model="index.now" class="form-control" type="text" id="sample1"
                                            v-bind:placeholder="'...'">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Инпуты для цифр-->
                <div v-if="index.type=='inputnumber'"
                    v-show="index.hide == null || indexInfo[index.hide.quest].now == index.hide.value">
                    <div class="mdl-grid">
                        <div class="well">
                            <div class="row">
                                <div class="mdl-card__title" v-bind:class="{'rederror':index.hasError}">
                                    <h4>{{ index . text }}</h4>
                                </div>
                                <div class="">
                                    <div class="">
                                        <input class="form-control" type="text" pattern="-?[0-9]*(\.[0-9]+)?"
                                            id="sample2" v-model="index.now" v-bind:placeholder="'Заполните...'">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Списки-->
                <div v-if="index.type=='guide' && index.union == null">
                    <div class="">
                        <div class="well">
                            <div class="row">
                                <div class="mdl-card__title" v-bind:class="{'rederror':index.hasError}">
                                    <h4>{{ index . text }}</h4>
                                </div>
                                <div class="">
                                    <select class='form-control' data-live-search="true" v-model="indexInfo[id].now">
                                        <option v-for="answer,answerid in index.answers" v-bind:value="answer.id"
                                            v-html="answer.answer"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="index.type=='guide' && index.union != null">
                    <div class="">
                        <div class="well">
                            <div class="row">
                                <div class="" v-bind:class="{'rederror':index.hasError}">
                                    <h4>{{ index . text }}</h4>
                                </div>
                                <div class="">
                                    <select class='form-control' v-model="indexInfo[id].now">
                                        <option v-for="answer in letGuide(index)" v-bind:value="answer.id"
                                            v-html="answer.answer"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-show="showOk">
                <div class='alert alert-info'><b>Все сохранено! Спасибо!</b></div>
            </div>
            <label>
                Нажимая кнопку "Ответить", вы соглашаетесь на обработку персональных данных
            </label><br>
            <button class="btn btn-primary" @click='save();'>Ответить</button>
        </div>


    @endverbatim

    <script>
        indexInfo = {
            "1": {
                "text": "При посещении организации обращались ли Вы к информации о ее деятельности, размещенной на информационных стендах в помещениях организации?",
                "type": "radio",
                "now": 0,
                "need": false,
                "hasError": false,
                "withAnswer": false,
                "needAnswer": false,
                "sw": null,
                "hide": null,
                "new": 1,
                "answers": {
                    "1": {
                        "id": 1,
                        "answer": "Да"
                    },
                    "2": {
                        "id": 2,
                        "answer": "Нет"
                    }
                },
                "id": 1
            },
            "2": {
                "text": "Удовлетворены ли Вы открытостью, полнотой и доступностью информации о деятельности организации, размещенной на информационных стендах в помещении организации?",
                "type": "radio",
                "now": 0,
                "need": false,
                "hasError": false,
                "withAnswer": false,
                "needAnswer": false,
                "sw": null,
                "hide": {
                    "quest": "1",
                    "value": "1"
                },
                "new": 1,
                "answers": {
                    "3": {
                        "id": 3,
                        "answer": "Да"
                    },
                    "4": {
                        "id": 4,
                        "answer": "Нет"
                    }
                },
                "id": 2
            }
        };
        var app = new Vue({
            el: '#app',
            methods: {
                setTest: function(event) {
                    event.selectpicker();
                },
                save: function() {
                    this.checkNeeded();
                    for (const [key, value] of Object.entries(this.indexInfo)) {
                        if (value.type == 'checkbox')
                            continue;
                        if (value.type != 'table') {
                            if (value.need == true && value.now == null) {
                                return;
                            }
                        } else {
                            if (value.need == true) {
                                for ([tablekey, tablevalue] of Object.entries(value.question)) {
                                    if (tablevalue.now == null) {
                                        return;
                                    }
                                }
                            }
                        }
                    }

                    grecaptcha.ready(function() {
                        grecaptcha.execute('6LdlAyojAAAAAEXaA1q6lZr-4hlg0rfJ-XgKVWQM', {
                            action: 'submit'
                        }).then(function(token) {
                            axios({
                                method: "POST",
                                withCredentials: true,
                                url: "/inc/saveAnket.php?id=1",
                                data: {
                                    data: this.indexInfo,
                                    token: token
                                },

                            }).then(Response => {
                                if (Response.data.result == 1) {
                                    Vue.set(app.$data, 'showOk', true);
                                    for (const [key, value] of Object.entries(this
                                            .indexInfo)) {
                                        this.indexInfo[key].now = null;
                                    }
                                }
                                if (Response.data.result == 0) {
                                    alert('Ошибка сохранения!');
                                }
                            });
                        });
                    });
                },
                checkNeeded: function() {
                    for (const [key, value] of Object.entries(this.indexInfo)) {
                        if (value.type == 'checkbox')
                            continue;
                        if (value.type != 'table') {
                            if (value.need == true && value.now == null) {
                                Vue.set(this.indexInfo[key], 'hasError', true);
                            }
                            if (value.need == true && value.now != null) {
                                Vue.set(this.indexInfo[key], 'hasError', false);
                            }
                        } else {
                            if (value.need == true) {
                                for ([tablekey, tablevalue] of Object.entries(value.question)) {
                                    if (tablevalue.now == null) {
                                        this.indexInfo[key].question[tablekey].hasError = true;
                                    } else {
                                        this.indexInfo[key].question[tablekey].hasError = false;
                                    }
                                }
                            }

                        }
                    }
                },
                letGuide: function(guide) {
                    buffer = [];
                    id = guide.union;
                    if (this.indexInfo[id].now == null) {
                        return null;
                    };
                    let unionId = this.indexInfo[id].answers[this.indexInfo[id].now].pole;
                    for (const [key, value] of Object.entries(guide.answers)) {
                        if (value[guide.poleunion] == unionId) {
                            buffer.push(value);
                        }
                    }
                    return buffer;
                }
            },
            data: {
                showOk: false,
                indexInfo: indexInfo,
            }
        })
    </script>
@endsection
