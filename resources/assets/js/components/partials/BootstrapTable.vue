<template>
    <div class="row">
        <div v-if="show.loader">
            <fade-transition mode="out-in">
                <center>
                    <div class="cp-spinner cp-meter"></div>
                </center>
            </fade-transition>
        </div>
        <div v-else>
            <fade-transition mode="out-in">
            <!-- <div class="col-md-12">
                
            </div> -->

            <!-- </fade-transition> -->
            <!-- <fade-transition mode="out-in"> -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group input-sm">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input type="text" class="form-control input-sm" @keyup.enter="search" v-model.lazy="search_value">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <fade-transition mode="out-in">
                            <span class="text-row" v-if="search_result.show">Hasil Pencarian untuk "{{ search_result.value }}" : </span>
                        </fade-transition>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <table data-toggle="table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th v-for="column in this.columns" :name="column" :id="column">{{ column }}</th>
                            </tr>
                        </thead>
                        <fade-transition mode="out-in">
                        <tbody v-if="this.res.meta.total === 0">
                            <tr>
                                <td class="text-center">Data Tidak Ditemukan</td>
                            </tr>
                        </tbody>
                        </fade-transition>
                        <tbody is="transition-group" 
                            v-bind:css="false" 
                            v-on:before-enter="beforeEnter" 
                            v-on:enter="enter">
                            <!-- <tr v-if="transition" v-for="(item, key) in datas" v-bind:key="key"> -->
                            <tr v-if="transition" v-for="(item, key) in res.data" v-bind:key="key">
                            <td>{{ item.name }}</td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="col-md-12">
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a v-on:click="getPageByLink('first')"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><a v-on:click="getPageByLink('prev')"><i class="fa fa-angle-left"></i></a></li>
                            <li v-for="n in res.pages" v-bind:class="[(n === res.meta.current_page) ? 'active' : '']"><a v-on:click="getPageByLink('number')">{{ n }}</a></li>
                            <li><a v-on:click="getPageByLink('next')"><i class="fa fa-angle-right"></i></a></li>
                            <li><a v-on:click="getPageByLink('last')"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
            </fade-transition>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['url'],
        data(){
            return{
                res:{
                    data:[
                    {
                        'id' : '',
                        'name' : '',
                        'email' : '',
                        'created_at' : '',
                        'updated_at' : '',
                        'deleted_at' : '',
                    }],
                    links : {
                        'first' : '',
                        'last' : '',
                        'prev' : '',
                        'next' : '',
                    },
                    meta : {
                        'current_page ' : '',
                        'from ' : '',
                        'last_page ' : '',
                        'path ' : '',
                        'per_page ' : '',
                        'to ' : '',
                        'total ' : '',
                    },
                    pages: [],
                    url: ''
                },
                search_result : {
                    show : false,
                    value : ''
                },
                search_value : '',
                no_result : false,
                transition:true,
                
                columns: [],
                rows: [],
                link : {},
                show: {
                    loader: true
                }
            }
        },
        mounted(){
            var self = this;
            axios.get(this.url).then(response => {
                this.setData(response);
            }).catch(e => {
                this.errors.push(e)
            });
            setTimeout(function(){
                self.show.loader = false;
            }, 1000);
        },
        methods:{
            search(){
                var url = this.res.url + '/s';
                axios.post(url, {'value': this.search_value}).then(response => {
                    this.transition = false;
                    this.$nextTick(function () {
                        this.transition = true;
                        this.setData(response);
                        this.search_result.show = true;
                        this.search_result.value = this.search_value;
                        this.search_value = '';
                    })
                }).catch(e => {
                    this.errors.push(e)
                });
            },
            getPageByLink(link){
                axios.get(this.res.links[link]).then(response => {
                    this.transition = false;
                    this.$nextTick(function () {
                        this.transition = true;
                        this.setData(response);
                    })
                }).catch(e => {
                    this.errors.push(e)
                });
            },
            beforeEnter: function (el) {
                el.style.opacity = 0
                el.style.height = 0
            },
            enter: function (el, done) {
                var delay = el.dataset.index * 1500
                setTimeout(function () {
                    Velocity(el,
                        { opacity: 1, height: '1.6em' },
                        { complete: done }
                    )
                }, delay)
            },
            setData(response){
                this.res = response.data;
            },
            animationHandler(){

            }
        }
    }
</script>
<style>
    .pagination>li>button:focus, .pagination>li>button:hover, .pagination>li>span:focus, .pagination>li>span:hover {
        z-index: 2;
        color: #23527c;
        background-color: #eee;
        border-color: #ddd;
    }
    .pagination>li>button {
        background: #fafafa;
        color: #666;
    }
    .pagination-sm>li>button, .pagination-sm>li>span {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
    }
    .pagination>li>button, .pagination>li>span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    .text-row {
        line-height: 3em;
    }

    [v-cloak] {
    display: none;
    }
</style>
