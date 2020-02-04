@extends('layouts.admin_layout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <h1>  @include('layouts.admin_layout.page_title')
      </h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        
        
       
       <div class="widget-box">
         @include('includes.msg')
         @include('includes.numFormatter')

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              
                <tr>
                  <th>id</th>
                  <th>customers_name</th>
                  <th>loan_type</th>
                  <th>loan_application_type</th>
                  <th>LD</th>
                  <th>booked_amount</th>
                  <th>disbursed_amount</th>
                  {{--<th>Actions</th>--}}
                </tr>
              </thead>
              
              <tbody>
                @foreach($customers as $user)
                <tr class="gradeX">
                  <td>{{$loop->index + 1}}</td>
                  <td>{{$user->customers_name}}</td>
                  <td>{{$user->loan_type}}</td>
                  <td>{{$user->loan_application_type}}</td>
                  <td>{{$user->LD}}</td>
                  <td>{{formatWithSuffix($user->booked_amount)}}</td>
                  <td>{{$user->disbursed_amount}}</td>
                  {{--<td class="center">
                    <div class="fl">
                      <a href="{{url('/admin/edit-user/'.$user->id)}}" class=" icon icon-edit btn btn-primary"></a> 
                      <a id ="delCat" href="{{url('/admin/delete-user/'.$user->id)}}" class=" icon icon-trash btn btn-danger"></a>
                        
                      
                   </div>
                    
                    
                  </td>--}}
                 
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
