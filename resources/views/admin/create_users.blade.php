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
              <h5>Add Users</h5>
            </div>
            <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" action="{{url('/admin/add/user')}}" name="create_user" id="create_user">
              	  {{csrf_field()}}
                  <div class="col-md-6">
                    <div class="control-group">
                      <label class="control-label">User Name</label>
                      <div class="controls">
                        <input id ="name" value="{{ old('name') }}" name="name" type="text" placeholder="user name" required>
                      </div>
                    </div>
                                           
                    <div class="control-group">
                      <label class="control-label">Email</label>
                      <div class="controls">
                        <input id="email" value="{{ old('email') }}" name="email" type="text" placeholder="email ..."required>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">Password</label>
                      <div class="controls">
                        <input id="password" value="{{ old('password') }}" name="password" type="password" placeholder="password ..."required>
                      </div>
                    </div>
                  </div>
                  
                <div class="form-actions" align="center">
                  <input type="submit" value="Create" class="btn btn-success">
                </div>
            </form>
            
            {{-- Import excel file for user---}}
            <form action="{{ url('/admin/import/users') }}" method="POST" name="importform"
               enctype="multipart/form-data">
               {{csrf_field()}}
                <input type="file" name="file" class="form-control" required/>
                <br>
                <div>
                  <button class="btn btn-primary">Import Users</button>
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