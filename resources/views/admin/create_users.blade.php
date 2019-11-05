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
              <h5>Add Permission</h5>
            </div>
            <div class="widget-content nopadding">

              <form class="form-horizontal" method="post" action="{{url('/admin/create-permission')}}" name="create_permission" id="create_permission">
              	  {{csrf_field()}}
                  <div class="col-md-6">
                    <div class="control-group">
                      <label class="control-label">Permission Name</label>
                      <div class="controls">
                        <input id ="name" value="{{ old('name') }}" name="name" type="text" placeholder="Permission name ..." required>
                      </div>
                    </div>

                                           
                    <div class="control-group">
                      <label class="control-label">Display name</label>
                      <div class="controls">
                        <input id="display_name" value="{{ old('display_name') }}" name="display_name" type="text" placeholder="Permission display name ..."required>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">Description</label>
                      <div class="controls">
                        <textarea name="description" value="{{ old('description') }}" id="description" placeholder="permission description..."></textarea> 
                      </div>
                    </div>
                  </div>
                  
                <div class="form-actions">
                  <input type="submit" value="Create Permission" class="btn btn-success">
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