@extends('layout.app')
@section('content')
   <body class="adminbody"> 
    <div class="container-fluid">
    <div class="row">
        <div class="col-xs-2 col-lg-2 sidebar" id="sidebar">


<div class="row">
<div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center"><img src="{{URL::asset('Auth::user()->profile')}}" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0">{{Auth::user()->name}}</h4>
        <p class="font-weight-light text-muted mb-0">Admin</p>
      </div>
    </div>
  </div>
</div>
<div class="row sidebarrow">
    <div id="sidenav1" class="col-lg-12">
    <div class="collapse navbar-collapse" id="sideNavbar">
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a href=""><span class="glyphicon glyphicon-home"></span>Home</a> </h4>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-book"> </span>Products<span class="caret"></span></a> </h4>
          </div>
          <!-- Note: By adding "in" after "collapse", it starts with that particular panel open by default; remove if you want them all collapsed by default --> 
          <div id="collapseOne" class="panel-collapse collapse in">
            <ul class="list-group">
              <li><a href="{{route('register')}}" class="navlink">Add new</a></li>
              <li><a href="{{route('edit')}}" class="navlink">Edit</a></li>
              <li><a href="" class="navlink">View</a></li>
              <li><a href="" class="navlink">More</a></li>
            </ul>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-cog"> </span>Offers<span class="caret"></span></a> </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse">
            <ul class="list-group">
              <li><a href="" class="navlink">Initiate new</a></li>
              <li><a href="" class="navlink">View existing</a></li>
              <li><a href="" class="navlink">Edit</a></li>
            </ul>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-calendar"> </span>Orders<span class="caret"></span></a> </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse">
            <ul class="list-group">
              <li><a href="" class="navlink">New orders</a></li>
              <li><a href="" class="navlink">In progress</a></li>
              <li><a href="" class="navlink">Pending</a></li>
              <li><a href="" class="navlink">More</a></li>
            </ul>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-user"></span> Customers<span class="caret"></span></a></h4>
          </div>
          <div id="collapseFour" class="panel-collapse collapse">
            <ul class="list-group">
            <li><a href="{{route('signup')}}" class="navlink">Register new customer</a></li>
              <li><a href="{{route('edit')}}" class="navlink">Edit</a></li>
              <li><a href="" class="navlink">View customer details</a></li>
              <li><a href="" class="navlink">Search Customer details</a></li>
              
              <li><a href="" class="navlink">More</a></li>
            </ul>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-user"></span> Statistics<span class="caret"></span></a></h4>
          </div>
          <div id="collapseFive" class="panel-collapse collapse">
            <ul class="list-group">
              <li><a href="" class="navlink">Stock</a></li>
              <li><a href="" class="navlink">Customers</a></li>
              <li><a href="" class="navlink">Orders</a></li>
              <li><a href="" class="navlink">Monthly</a></li>
              <li><a href="" class="navlink">More</a></li>
            </ul>
          </div>
        </div>


        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-user"></span> Users<span class="caret"></span></a></h4>
          </div>
          <div id="collapseSix" class="panel-collapse collapse">
            <ul class="list-group">
              <li><a href="" class="navlink">View users</a></li>
              <li><a href="" class="navlink">Enrol new users</a></li>
              
            </ul>
          </div>
        </div>
        <!-- This is in case you want to add additional links that will only show once the Nav button is engaged; delete if you don't need -->
        <div class="menu-hide">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a href=""><span class="glyphicon glyphicon-new-window"></span>External Link</a> </h4>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a href=""><span class="glyphicon glyphicon-new-window"></span>External Link</a> </h4>
            </div>
          </div>
        </div>
        <!-- end hidden Menu items --> 
      </div>
    </div>
  </div> 


    </div>
    </div>


        <div class="col-xs-10 col-lg-10">
               
        <nav class="navbar navbar-expand-md navbar-light bg-light topbar">
                
                <div class="container">
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link active">------SUPER ADMIN DASHBOARD------</a>  
                    </div>
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Profile</button>
                    <div class="navbar-nav">
                    <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} loggen in</a>
                            <div class="dropdown-menu">
                                <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                                <a href="{{route('signup')}}" class="dropdown-item">Settings</a>
                                <a data-toggle="modal" data-target="#myModal">Profile</a>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
        </div>  
            </nav>
          <div class="success">
            @if(session()->has('success'))
              <div class="alert alert-success">
                  {{ session()->get('success') }}
              </div>
            @endif
           </div>
           
              

        </div>

   <!--THE VIEW PROFILE MODAL-->    
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <div class="media d-flex align-items-center">
                  <img src="{{URL::asset('images/profile.jpg')}}" alt="..." class="profile">
          </div>
          </div>
          <div class="modal-body">
              <table>
                        <tr>
                            <td>Name:</td>
                            <td>{{Auth::user()->name}}</td>
                        </tr>
                        <tr>
                              <td>Admin type:</td>
                              <td style="padding:15px">  {{Auth::user()->flag}}</td>
                        </tr>
                </table>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEdit">Edit</button>
          </div>
        </div>
      </div>
  
    </div>

   <!--THE EDIT PROFILE MODAL-->
    <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <form method="POST" action="{{route('update', Auth::user()->id)}}" enctype="multipart/form-data"> 
          <div class="media d-flex align-items-center">
                    <label for="fileField">
                         <img src="{{URL::asset('images/profile.jpg')}}" alt="..." class="profile">
                    </label>
          </div>
         
               {{ csrf_field() }}
            <input type="file" id="fileField" name="photo" />
          </div>
          <div class="modal-body">
              
              
                     NAME: <input type="text" name="name" value="{{Auth::user()->name}}"/>
              
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Save</button>
          </div>
        </form>
        </div>
      </div>
  
    </div>
  </div>
 <body>
 @endsection