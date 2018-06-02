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
                            <bootstrap-table :url="'{{ route('users') }}'"></bootstrap-table>
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
@endpush()