@extends('layouts.admin_layout.admin_design')
@section('content')

<div id="content">
{{--<div id="content-header">
  <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">View categories</a> </div>
  <h1>Category list</h1>
</div>--}}
@include('layouts.admin_layout.page_title')

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

       <div class="widget-box">
         @include('includes.msg')
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>id</th>
                  <th>name</th>
                  <th>description</th>
                  <th>url</th>
                  <th>Deleted</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($bins as $bin)
                <tr class="gradeX">
                  <td>{{$loop->index + 1}}</td>
                  <td>{{$bin->name}}</td>
                  <td>{{$bin->description}}</td>
                  <td>{{$bin->url}}</td>
                  <td>{{$bin->deleted_at}}</td>
                  <td class="center">
                    <div class="fl">
                      <a href="{{url('/admin/restore-category/'.$bin->id)}}" title="restore" class=" icon icon-reply btn btn-primary"></a>
                      <a id ="delCat" href="{{url('/admin/deletePermanently-category/'.$bin->id)}}" title="Permanently delete" class=" icon icon-trash btn btn-danger"></a>


                   </div>


                  </td>

                </tr>
              @endforeach


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
