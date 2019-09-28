@extends('layouts.admin_layout.admin_design')
@section('content')

<div id="content">
  @include('layouts.admin_layout.page_title')
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        {{--@if(isset($page_title)) {{ $page_title }} @else Untitled Page @endif--}}
       <div class="widget-box">
         @include('includes.msg')
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            {{--<h5>@if(isset($page_title)) {{ $page_title }} @else Untitled Page @endif</h5>--}}
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>id</th>
                  <th>name</th>
                  <th>display name</th>
                  <th>description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($permissions as $permission)
                <tr class="gradeX">
                  <td>{{$loop->index + 1}}</td>
                  <td>{{$permission->name}}</td>
                  <td>{{$permission->display_name}}</td>
                  <td>{{$permission->description}}</td>
                  <td class="center">
                    <div class="fl">
                      <a href="{{url('/admin/edit-permission/'.$permission->id)}}" class=" icon icon-edit btn btn-primary"></a> 
                      <a id ="delCat" href="{{url('/admin/delete-permission/'.$permission->id)}}" class=" icon icon-trash btn btn-danger"></a>                     
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


