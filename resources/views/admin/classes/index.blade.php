@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">班级
        <span class="hed_te_span"><a class="cursa"  href="#">管理</a><a href="{{ url('/admin/classes/add') }}">新增</a></span></h3>
    <!--当前位置 end-->
    <!--搜索-->
    <div class="breadcrumb ccsearch">
        <input type="text" class="form-control ccdates" >
        <input type="submit" class="btn btn-success btn-sm" value="搜索">
    </div>
    <!--搜索 end-->
    <table class="table table-striped ccad_table" id="dataTable_a">
        <thead>
        <tr>
            <th>ID</th>
            <th>班级</th>
            <th>年级</th>
            <th>人数</th>
            <th>班主任</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($classes as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->grade->name }}</td>
            <td>{{ count($item->student) }}</td>
            <td>{{ $item->principal->name }}</td>
            <td class="nscs-table-handle">
                <span><a href="{{ url('/admin/classes/edit',['id' => $item->id]) }}" class="btn-blue"><i class="fa fa-edit"></i><p>编辑</p></a></span>
                <span><a href="{{ url('/admin/classes/detail',['id' => $item->id]) }}" class="btn-blue"><i class="fa fa-search"></i><p>查看</p></a></span>
                <span><a href="{{ url('/admin/classes/delete',['id' => $item->id]) }}" nctype="btn_del_account" data-seller-id="1" class="btn-red"><i class="fa fa-trash-o"></i><p>删除</p></a></span>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <!--分页 begin-->
    <div class="row">
        <div class="col-xs-6">
            <div class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination">
                    {!! $classes->render() !!}
                </ul>
            </div>
        </div>
    </div>
    <!--分页 end-->
@endsection