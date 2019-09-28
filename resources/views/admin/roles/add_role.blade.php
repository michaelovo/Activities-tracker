@extends('layouts.admin_layout.admin_design')
@section('content')



<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">Add category</a> </div>
    <h1>Categories</h1>
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
              <form method="post" action="{{url('/admin.add-role')}}" name="add_role" id="add_role">
                {{csrf_field()}}
              <!-- left col -->
              <div class="col-md-3">
                <div class="form-group">
                    <label>Role Name</label>
                    <input id="name" name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Role name ..."style="width: 90%;" required>
                </div>

              </div>
              <!-- //left col -->

              <!-- mid col -->
              <div class="col-md-3">
                <div class="form-group">
                    <label>Approval term</label>
                    <input id="approval" name="approval_term" value="{{ old('approval_term') }}" type="text" class="form-control" placeholder="Approval term..."style="width: 90%;">
                </div>

                </div>
              <!-- //mid col -->

              <!-- mid col 2-->
              <div class="col-md-3">
                <div class="form-group">
                    <label>Turn around time</label>
                    <input type="number" min="1" max="99" value="20" id="approval" name="tat" class="form-control" placeholder="Role name ..."style="width: 90%;">
                </div>

                </div>
              <!-- //mid col2 -->

              <!-- right col -->
              <div class="col-md-3">

                <div class="form-group">
                  <label>Departments</label>
                  <select id="department_id" name="department_id" class="form-control select2" style="width: 50%;" required>
                    <option value="">Select department</option>
                    @foreach($departments as $department)
                       <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                  </select>
                </div>
                </div>
              <!-- //right col -->
              <div class="row">
                <ul style="-moz-column-count: 4;-moz-column-gap: 20px;-webkit-column-count: 4; -webkit-column-gap: 20px;   column-count: 4;column-gap: 20px;">
                  <input style="width:16px;height:16px;" type="checkbox" name="select-all" id="select-all"/><strong>All permissions</strong></br>
                  @foreach ($permissions as $permission)
                      {{ Form::checkbox('permissions[]',  $permission->id ) }}
                      {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
                  @endforeach
                </ul>
              </div>
            </div>
          <div class="box-footer"><!--footer -->
            <button type="submit" class="btn btn-primary">Create</button>
          </div><!--//footer -->
        </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection