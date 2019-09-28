@extends('layouts.admin_layout.admin_design')
@section('content')



<div id="content">
    @include('layouts.admin_layout.page_title')
  <div class="container-fluid"><hr>

        @include('includes.msg')

      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <!--h5>Add category</h5-->
            </div>
            <div class="widget-content nopadding">

              <form class="form-horizontal" method="post" action="{{url('/admin/update-permission/'.$permission->id)}}" name="edit_permission" id="edit_permission">
              	  {{csrf_field()}}
              <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name" value="{{$permission->name}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Display name</label>
                <div class="controls">
                  <input type="text" name="display_name" id="url" value="{{$permission->display_name}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description">{{$permission->description}}</textarea> 
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Update" class="btn btn-success">
              </div>

            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection