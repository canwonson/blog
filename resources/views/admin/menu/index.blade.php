@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Menus <small>» 菜单列表</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/menu/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> 新建菜单
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors')
                @include('admin.partials.success')

                <table id="tags-table" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>菜单</th>
                            <th>标题</th>
                            <th class="hidden-sm">状态</th>
                            <th class="hidden-md">排序</th>
                            <th class="hidden-md">图标</th>
                            <th data-sortable="false">操作</th>
                        </tr>
                     </thead>
                    <tbody>
                    @foreach ($menus as $menu)
                        <tr @if($menu->parent_id == 0) class="danger" @endif>
                            <td>{{ $menu->id }}</td>
                            <td>{{ $menu->menu }}</td>
                            <td>{{ $menu->title }}</td>
                            <td class="hidden-md">@if($menu->status)显示@else隐藏@endif</td>
                            <td class="hidden-md">{{ $menu->order }}</td>
                            <td class="hidden-md">{{ $menu->icon }}</td>
                            <td>
                                <a href="/admin/menu/{{ $menu->id }}/edit" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> 编辑
                                </a>
                            </td>
                        </tr>
                        @if($menu->child_list)
                            <tr>
                                @foreach ($menu->child_list as $child)
                                    <tr>
                                        <td>{{ $child->id }}</td>
                                        <td>{{ $child->menu }}</td>
                                        <td>{{ $child->title }}</td>
                                        <td class="hidden-md">@if($child->status)显示@else隐藏@endif</td>
                                        <td class="hidden-md">{{ $child->order }}</td>
                                        <td class="hidden-md">{{ $child->icon }}</td>
                                        <td>
                                            <a href="/admin/menu/{{ $child->id }}/edit" class="btn btn-xs btn-info">
                                                <i class="fa fa-edit"></i> 编辑
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function() {
            $("#tags-table").DataTable({
            });
        });
    </script>
@stop