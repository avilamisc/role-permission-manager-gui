@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Users</a></li>
                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="true">Roles</a></li>
                        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Permissions</a></li>
                        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <table id="table" data-toggle="table"
                                data-url="http://issues.wenzhixin.net.cn/examples/bootstrap_table/data"
                                data-pagination="true"
                                data-side-pagination="server"
                                data-page-list="[5, 10, 20, 50, 100, 200]"
                                data-search="true"
                                data-height="auto" 
                                data-locale="id-ID">
                                <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true"></th>
                                    <th data-field="id" data-align="right" data-sortable="true">Item ID</th>
                                    <th data-field="name" data-align="center" data-sortable="true">Item Name</th>
                                    <th data-field="price" data-sortable="true">Item Price</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab_2">
                        </div>
                        <div class="tab-pane" id="tab_3">
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
@endsection
@push('script')
<script type="text/javascript">
	$(function () {
		$('#table').bootstrapTable({
			locale: 'id-ID',
			data: data,
			formatLoadingMessage: function () {
				return '<img src="http://www.arabianbusiness.com/skins/ab.main/gfx/loading_spinner.gif" />';
			}
		});
		
		$("#table").bootstrapTable("showLoading");
	});
</script>
@endpush()