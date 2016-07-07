@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">年级
        <span class="hed_te_span"><a class="cursa"  href="{{ url('/admin/grade') }}">管理</a><a href="{{ url('/admin/grade/add') }}">新增</a></span></h3>
    <!--当前位置 end-->
    <table class="table table-striped ccad_table" id="dataTable_a">
        <thead>
        <tr>
            <th>年级 ID</th>
            <th>年级名称</th>
            <th>负责人</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($grades as $grade)
            <tr>
                <td>{{ $grade->id }}</td>
                <td>{{ $grade->name }}</td>
                <td>{{ $grade->principal->name }}</td>
                <td>{{ $grade->created_at }}</td>
                <td class="nscs-table-handle">
                    <span><a href="{{ url('/admin/grade/edit',['id' => $grade->id]) }}" class="btn-blue"><i class="fa fa-edit"></i><p>编辑</p></a></span>
                    <span><a href="{{ url('/admin/grade/detail',['id' => $grade->id]) }}" class="btn-blue"><i class="fa fa-search"></i><p>查看</p></a></span>
                    <span><a href="{{ url('/admin/grade/delete',['id' => $grade->id]) }}" nctype="btn_del_account" data-seller-id="1" class="btn-red"><i class="fa fa-trash-o"></i><p>删除</p></a></span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection