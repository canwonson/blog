@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Tags <small>» 标签列表</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/tag/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> 新建标签
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors')
                @include('admin.partials.success')

                <table id="tags-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>标签</th>
                            <th>标题</th>
                            <th class="hidden-sm">副标题</th>
                            <th class="hidden-md">页面图片</th>
                            <th class="hidden-md">描述</th>
                            <th class="hidden-md">模板</th>
                            <th class="hidden-sm">方向</th>
                            <th data-sortable="false">操作</th>
                        </tr>
                     </thead>
                    <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->tag }}</td>
                            <td>{{ $tag->title }}</td>
                            <td class="hidden-sm">{{ $tag->subtitle }}</td>
                            <td class="hidden-md">{{ $tag->page_image }}</td>
                            <td class="hidden-md">{{ $tag->meta_description }}</td>
                            <td class="hidden-md">{{ $tag->layout }}</td>
                            <td class="hidden-sm">
                                @if ($tag->reverse_direction)
                                    旋转
                                @else
                                    普通
                                @endif
                            </td>
                            <td>
                                <a href="/admin/tag/{{ $tag->id }}/edit" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> 编辑
                                </a>
                            </td>
                        </tr>
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