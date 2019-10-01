@extends('layouts.admin_layout.admin_design')
@section('content')



<div id="content">
  <div id="content-header">
      @include('layouts.admin_layout.page_title')

  </div>
  <div class="container-fluid"><hr>
        @include('includes.msg')
        <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                  <h5></h5>
                </div>
                <div class="widget-content nopadding">
                  <form method="post" class="form-horizontal"  action="{{url('/admin/create-role')}}" name="create_role" id="create_role">
                      {{csrf_field()}}
                      <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input id="name" name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Role name ..."style="width: 90%;" required>
                          </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label">Description</label>
                          <div class="controls">
                            <textarea name="description" value="{{ old('description') }}" id="description" placeholder="permission description..."></textarea> 
                          </div>
                        </div>
                      </div>

                      <div class="control-group">
                          <div class="controls">
                              <input style="width:1px;height:1px;" type="checkbox" name="select-all" id="select-all"/><strong>All permissions</strong></br>
                              <ul>
                                @foreach ($permissions as $permission)
                                  {{ Form::checkbox('permissions[]',  $permission->id ) }}
                                  {{ Form::label($permission->name, ucfirst($permission->name)) }}
                                @endforeach
                              </ul>
                          </div>
                      </div>
                      <div class="form-actions">
                        <input type="submit" value="Validate" class="btn btn-success">
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
@section('script')
  <script>
    $('#select-all').click(function(event) {
        if(this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });
  </script>
@endsection