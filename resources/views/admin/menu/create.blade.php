@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3><a href="/admin/menu">Menus</a> <small>» 新增菜单</small></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">New Menu Form</h3>
                </div>
                <div class="panel-body">

                    @include('admin.partials.errors')

                    <form class="form-horizontal" role="form" method="POST" action="/admin/menu">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label for="menu" class="col-md-3 control-label">菜单</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="menu" id="menu" value="{{ $menu }}" autofocus>
                                </div>
                            </div>

                            @include('admin.menu._form')

                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-plus-circle"></i>
                                        新增菜单
                                    </button>
                                </div>
                            </div>

                        </form>

                 </div>
             </div>
        </div>
    </div>
</div>

@stop