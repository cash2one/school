@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">
        会员管理
    </h3>
    <!--当前位置 end-->
    <!--提示信息-->
    <div class="sp_prompt">
        <h3><i class="fa fa-warning"></i>&nbsp;&nbsp;操作提示</h3>
        <div class="sp_pro_lst">
            <p><i class="fa fa-angle-double-right"></i>如果当前时间超过店铺有效期或店铺处于关闭状态，前台将不能继续浏览该店铺，但是店主仍然可以编辑该店铺</p>
        </div>
    </div>
    <!--提示信息 end-->
    <!--搜索-->
    <div class="breadcrumb ccsearch">会员名：
        <input type="text" class="form-control ccdates">
        <input type="submit" class="btn btn-success btn-sm" value="搜索">
    </div>
    <!--搜索 end-->

    <table class="table table-striped ccad_table">
        <thead>
        <tr class="bg-dark-blue">
            <th>会员名</th>
            <th>会员账户</th>
            <th>性别</th>
            <th>用户角色</th>
            <th>注册时间</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td><a class="text-success" href="#">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>无</td>
            <td>
                @foreach($roles as $role)
                <p class="btn btn-sm @if($user->hasRole($role->name)) btn-success @else btn-black @endif">{{ $role->display_name }}</p>
                @endforeach
            </td>
            <td>{{ $user->created_at }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <!--分页 begin-->
    <div class="row">
        <div class="col-xs-6">
            <div class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination">
                    {!! $users->render() !!}
                </ul>
            </div>
        </div>
    </div>
    <!--分页 end-->
@endsection