<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('images/favicon.ico')}}">

    <title>Disease Control - Dashboard</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('css/vendors_css.css')}}">

	<!-- Style-->

	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/skin_color.css')}}">
	<link rel="stylesheet" href="{{asset('css/halah.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}"> --}}
	<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

  </head>

<body class="hold-transition light-skin sidebar-mini theme-success fixed">

<div class="wrapper">
	<div id="loader"></div>

  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">
		<!-- Logo -->
		<a href="index.html" class="logo ha-logo">
		  <!-- logo-->
		  <div class="logo-mini w-50">
			  <span class="light-logo"><img src="{{asset('../images/logo-letter.png')}}" alt="logo"></span>
			  <span class="dark-logo"><img src="{{asset('../images/logo-letter.png')}}" alt="logo"></span>
		  </div>
		</a>
	</div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light" data-toggle="push-menu" role="button">
					<i data-feather="align-left"></i>
			    </a>
			</li>
			<li class="btn-group d-lg-inline-flex d-none">
				<div class="app-menu">
					<div class="search-bx mx-5">
						<form action="{{ route('search')}}" method="POST">
                            @csrf
							<div class="input-group">
							  <input type="search" class="form-control" placeholder="Search" aria-label="Search" name="key" aria-describedby="button-addon2">
							  <div class="input-group-append">
								<button class="btn" type="submit" id="button-addon3"><i data-feather="search"></i></button>
							  </div>
							</div>
						</form>
					</div>
				</div>
			</li>
		</ul>
	  </div>

      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
			<li class="btn-group nav-item d-lg-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen btn-warning-light" title="Full Screen">
					<i data-feather="maximize"></i>
			    </a>
			</li>

	      <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="waves-effect waves-light dropdown-toggle w-auto l-h-12 bg-transparent py-0 no-shadow" data-bs-toggle="dropdown" title="User">
				<div class="d-flex pt-5">
					<div class="text-end me-10">
						<p class="pt-5 fs-14 mb-0 fw-700 text-primary">{{$user->name ?? 'Kutranji'}}</p>
						{{-- <small class="fs-10 mb-0 text-uppercase text-mute">Lab</small> --}}
					</div>
					<img src="https://fastly.picsum.photos/id/406/150/150.jpg?hmac=ESH49B26M_OA3pAI0g2OOX0p8mHxu-keaSExc4Ebxyg" class="avatar rounded-10 bg-primary-light h-40 w-40" alt="" />
				</div>
            </a>
            <ul class="dropdown-menu animated flipInX">
              <li class="user-body">
				 <a class="dropdown-item" href="#"><i class="ti-user text-muted me-2"></i> Profile</a>
				 <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="#"><i class="ti-lock text-muted me-2"></i> Logout</a>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
		<div class="help-bt">
			<a href="tel:108" class="d-flex align-items-center">
				<div class="bg-danger rounded10 h-50 w-50 l-h-50 text-center me-15">
					<i data-feather="mic"></i>
				</div>
				<h4 class="mb-0">Emergency<br>help</h4>
			</a>
		</div>
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">
				<li >
				  <a href="{{url('admin')}}">
					<i data-feather="monitor"></i>
					<span>Dashboard</span>

				  </a>
				</li>
                <li class="treeview" >
				  <a href="#">
					<i data-feather="package"></i>
					<span>Admin Control</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">

                    <li class="treeview">
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Medical tests
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
                                <a href="{{route('tests.index')}}">
                                    <i class="icon-Commit">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>All
                                </a>
                            </li>
                            @foreach ($categories as $cat)
							    <li>
                                    <a href="{{route('tests.cat', $cat->id)}}">
                                    <i class="icon-Commit">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>{{$cat->name}}</a>
                                </li>
                            @endforeach
						</ul>
					</li>
                    <li >
						<a href="{{route('institutions.index')}}" >
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Labs
						</a>
					</li>

                    <li >
						<a href="{{url('admin/locations')}}" >
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Locations
						</a>
					</li>
                    <li >
						<a href="{{route('predefined_tests.index')}}" >
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Predefined Tests
						</a>
					</li>

					<li>
						<a href="{{route('join.index')}}" >
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Join Requests
						</a>

					</li>
                    <li>
						<a href="{{route('test_categories.index')}}" >
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Tests Categories
						</a>

					</li>
                    {{-- <li>
						<a href="{{route('tests.index')}}" >
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Medical Tests
						</a>
					</li> --}}
					{{-- <li>
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Admins
						</a>

					</li>
					<li>
						<a href="#">
							<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Roles
						</a>

					</li> --}}
				  </ul>
				</li>
		</div>
    </section>
  </aside>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
        <div class="container-full">
            @yield('main_content')
        </div>
    </div>
    <!-- /.content-wrapper -->


  <footer class="main-footer">

	  &copy; <script>document.write(new Date().getFullYear())</script> <a href="index.html"> Ministry of health</a>. All Rights Reserved.
  </footer>

</div>
<!-- ./wrapper -->

@yield('script')
<script src="{{asset('js/jquery-3.2.1.slim.min.j')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}

</body>

</html>

