@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">学校
        <span class="hed_te_span"><a  class="cursa"  href="account.html">管理</a><a href="account_add.html">新增</a></span></h3>
    <!--当前位置 end-->
    <table class="table table-striped ccad_table" id="dataTable_a">
        <thead>
        <tr>
            <th>序号</th>
            <th>名称</th>
            <th>属性</th>
            <th>总人数</th>
            <th>负责人</th>
            <th>联系方式</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>01</td>
            <td><a href="#">郑州市第四十二中学</a></td>
            <td>中学</td>
            <td>1200</td>
            <td>李主任</td>
            <td>13584569541</td>
            <td class="nscs-table-handle">
                <span><a href="school_add.html" class="btn-blue"><i class="fa fa-edit"></i><p>编辑</p></a></span>
                <span><a href="grade_list.html" class="btn-blue"><i class="fa fa-search"></i><p>查看</p></a></span>
                <span><a href="#" nctype="btn_del_account" data-seller-id="1" class="btn-red"><i class="fa fa-trash-o"></i><p>删除</p></a></span>
            </td>
        </tr>
        <tr>
            <td>02</td>
            <td><a href="#">郑州市第四十九中学</a></td>
            <td>中学</td>
            <td>1856</td>
            <td>王主任</td>
            <td>13584569541</td>
            <td class="nscs-table-handle">
                <span><a href="school_add.html" class="btn-blue"><i class="fa fa-edit"></i><p>编辑</p></a></span>
                <span><a href="grade_list.html" class="btn-blue"><i class="fa fa-search"></i><p>查看</p></a></span>
                <span><a href="#" nctype="btn_del_account" data-seller-id="1" class="btn-red"><i class="fa fa-trash-o"></i><p>删除</p></a></span>
            </td>
        </tr>
        </tbody>
    </table>
    <!--分页 begin-->
    <div class="row">
        <div class="col-xs-6">
            <div class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination">
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--分页 end-->
@endsection