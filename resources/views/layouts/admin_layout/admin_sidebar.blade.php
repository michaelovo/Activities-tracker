<!--sidebar-menu-->
<div id="sidebar"><a href="/admin/dashboard" class="visible-phone"><i class="icon icon-home icon-5x"></i> Dashboard</a>
  <ul>
    <li class=""><a href="index.html"><i class="icon icon-dashboard icon-2x"></i> <span>Dashboard</span></a> </li>

      <!-- Users -->
      <li class="submenu"> <a href="#"><i class="icon icon-group icon-2x"></i> <span>Users</span>
        <span class="label label-important">2</span></a>
        <ul>
          <li><a href="{{url('/admin.add-user')}}"><i class="icon icon-plus-sign icon-2x"></i>Add User</a></li>
          <li><a href="{{url('/admin.view-users')}}"><i class="icon icon-eye-open icon-2x"></i>View Users</a></li>
        </ul>
      </li>
   
      <!-- Categories -->
    <li class="submenu"> <a href="#"><i class="icon icon-th-list icon-2x"></i>
      <span>Categories</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{url('/admin/add-category')}}"><i class="icon icon-plus-sign icon-2x"></i>Add Category</a></li>
        <li><a href="{{url('/admin/view-category')}}"><i class="icon icon-eye-open icon-2x"></i>View categories</a></li>
        
      </ul>
    </li>
    
        <!-- permissions -->
    <li class="submenu"> <a href="#"><i class="icon icon-key icon-2x"></i> <span>Permissions</span>
      <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{url('/admin/permission')}}"><i class="icon icon-plus-sign icon-2x"></i>Add Permission</a></li>
        <li><a href="{{url('/admin/view-permissions')}}"><i class="icon icon-eye-open icon-2x"></i>View Permissions</a></li>
      </ul>
    </li>

      <!-- Roles -->
    <li class="submenu"> <a href="#"><i class="icon icon-random icon-2x"></i> <span>Roles</span>
      <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{url('/admin/role')}}"><i class="icon icon-plus-sign icon-2x"></i>Add Role</a></li>
        <li><a href="{{url('/admin/view-roles')}}"><i class="icon icon-eye-open icon-2x"></i>View Roles</a></li>
      </ul>
    </li>

      <!-- settings -->
      <li class="submenu"> <a href="#"><i class="icon icon-cog icon-2x"></i> <span>Settings</span> <span class="label label-important">1</span></a>
        <ul>
          <li><a href="{{url('/admin/settings')}}"><i class="icon icon-edit icon-2x"></i>Update password</a></li>       
        </ul>
      </li>

    <li><a href="{{url('/logout')}}"><i class="icon icon-off icon-2x"></i> <span>Logout</span></a></li>
  </ul>
</div>
<!--sidebar-menu-->
