<template>
    <table class="table table-bordered" v-bind:data-toggle="dataToggle" 
            :data-url="dataUrl" 
            :data-pagination="dataPagination" 
            :data-side-pagination="dataSidePagination" 
            :data-page-list="dataPageList" 
            :data-search="dataSearch" 
            :data-height="dataHeight" 
            :data-locale="dataLocale">
        <thead>
        <tr>
            <th data-field="state" data-checkbox="true"></th>
            <th data-field="id" data-align="right" data-sortable="true">Item ID</th>
            <th data-field="name" data-align="center" data-sortable="true">Item Name</th>
            <th data-field="price" data-sortable="true">Item Price</th>
        </tr>
        </thead>
    </table>
</template>
<script>
    export default {
        props: {
            colums: {
                
            }
            dataToggle: {
                type: String,
                default: 'table',
            },
            dataUrl: {
                type: String,
                default: "http://issues.wenzhixin.net.cn/examples/bootstrap_table/data",
            },
            dataPagination: {
                type: String,
                default: 'true'
            },
            dataSidePagination: {
                type: String,
                default: 'server'
            },
            dataPageList: {
                type: String,
                default: '[5, 10, 20, 50, 100, 200, 1000, 10000]',
            },
            dataSearch: {
                type: String,
            },
            dataHeight: {
                type : [Number,String],
                default: 'auto',
            },
            dataLocale: {
                type: String,
                default: 'id-ID'
            },
            default: function () {
                return { message: 'hello' }
            }
        },
        data(){
            return{
                colums : [],
                rows : [],
            }
        },
        mounted(){
            axios.get('/apis/users').then(response => {
                    // this.colums = response.data.colums;
                    // this.rows = response.data.rows;
                    console.log(response.data);
                }).catch(e => {
                    this.errors.push(e)
                })
            
            $(this.$el).bootstrapTable();
        }
    }
</script>