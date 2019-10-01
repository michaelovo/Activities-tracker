@extends('layouts.admin_layout.admin_design')
@section('content')



<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">Edit category</a> </div>
    <h1>Update category</h1>
  </div>
  <div class="container-fluid"><hr>

        @include('includes.msg')

      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add category</h5>
            </div>
            <div class="widget-content nopadding">

             <!--/form-->                            
              {{ Form::model($role, array('route' => array('role.update', $role->id), 'method' => 'Post','class'=>"form-horizontal")) }}
                {{csrf_field()}}
  
                <div class="control-group">
                  <label class="control-label">Name</label>
                  <div class="controls">
                      <input id="name" name="name" type="text" class="form-control" value="{{$role->name}}">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Description</label>
                  <div class="controls">
                    <textarea name="description" id="description">{{$role->description}}</textarea> 
                  </div>
                </div>

                         
                <div class="control-group">
                  <label class="control-label"></label>
                  <div class="controls">
                      <ul style="-moz-column-count: 4;-moz-column-gap: 20px;-webkit-column-count: 4; -webkit-column-gap: 20px;   column-count: 4;column-gap: 20px ;">
                          <input style="width:16px;height:16px;" type="checkbox" id="select-all"/><strong>All permissions</strong></br>
                          @foreach ($permissions as $permission)
                            {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                            {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
          
                          @endforeach
                        </ul>               
                    </div>
                </div>

                
                <div class="form-actions"><!--footer -->
                  {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                  <!--button type="submit" class="btn btn-primary">Update</button-->
                </div><!--//footer -->
              {{ Form::close() }}
              <!--/form-->

            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection