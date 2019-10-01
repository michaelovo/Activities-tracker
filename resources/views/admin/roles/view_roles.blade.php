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
                    <th>description</th>
                    <th>permissions</th>

                    <th>Created</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($role as $role)
                      <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->description ?? 0}}</td>
                        <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
  
                        <td>{{$role->created_at ? $role->created_at->format('F d, Y h:ia') : '--'}}</td>
                        
                      <td class="center">
                          <div class="fl">
                              <a href="{{url('/admin/edit-role/'.$role->id)}}" class=" icon icon-edit btn btn-primary" title="Edit role"></a>
                              <a id ="delCat" href="{{url('/admin/delete-role/'.$role->id)}}" class=" icon icon-trash btn btn-danger"></a>                     

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


