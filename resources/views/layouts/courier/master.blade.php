<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Dropshipper</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Dropshipper">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}"> 
    
    
    <!-- FontAwesome JS-->
    <script defer src="{{ asset('admin/assets/plugins/fontawesome/js/all.min.js') }}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ asset('admin/assets/css/portal.css') }}" 
    type="text/css">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

</head> 

<body class="app">   	
    <header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" 
                            viewBox="0 0 30 30" role="img"><title>Menu</title>
                                <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" 
                                stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                            </svg>
					    </a>
				    </div>
		            
		            <div class="app-utilities col-auto">
			            
			            <div class="app-utility-item app-user-dropdown dropdown">
				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" 
                                role="button" aria-expanded="false">
                                <img src="{{ asset('admin/assets/images/profilepicture.png') }}"> &nbsp;
                                <b>{{ Auth::user()->name }}</b>
                            </a>
				            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
								<li><a class="dropdown-item" href="{{ route('courier.account') }}">Informasi Akun</a></li>
								<li><hr class="dropdown-divider"></li>
								<li>
									<a class="dropdown-item" href="{{ route('logout') }}"  data-toggle="modal" data-target="#logoutModal"
                                    	onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    	Keluar
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
							</ul>
			            </div>
		            </div>
		        </div>
	            </div>
	        </div>
        </div>
        <div id="app-sidepanel" class="app-sidepanel"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo" href="{{ route('dashboardkurir.index') }}">
                        <img class="logo-icon me-2" src="{{ asset('admin/assets/images/app-logo.svg') }}" alt="logo">
                        <span class="logo-text">DROPSHIPPER</span>
                    </a>
		        </div> 
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
					    <li class="nav-item">
					        <a class="nav-link active" href="{{ route('dashboardkurir.index') }}">
						        <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" 
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
                                        <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                    </svg>
						        </span>
		                        <span class="nav-link-text">Halaman Utama</span>
					        </a>
					    </li>
					    <li class="nav-item">
					        <a class="nav-link" href="{{ route('courier.order') }}">
						        <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" 
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                        <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
                                        <circle cx="3.5" cy="5.5" r=".5"/>
                                        <circle cx="3.5" cy="8" r=".5"/>
                                        <circle cx="3.5" cy="10.5" r=".5"/>
                                    </svg>
						         </span>
		                         <span class="nav-link-text">Pesanan</span>
					        </a>
					    </li>
					    <li class="nav-item has-submenu">
					        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
						        <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" 
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
                                    </svg>
						         </span>
		                         <span class="nav-link-text">External</span>
		                         <span class="submenu-arrow">
		                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" 
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
	                             </span>
					        </a>
					        <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
									<li class="submenu-item"><a class="submenu-link" href="{{ route('courier.message') }}">Halaman Lapor</a></li>
						        </ul>
					        </div>
					    </li>	    				    
				    </ul>
			    </nav>
	        </div>
	    </div>
    </header>
    
    <div class="app-wrapper">
		<div class="row g-0 app-auth-wrapper">
	    
	    	@yield('content')

		</div>
    </div>  					

 
    <!-- Javascript -->          
    <script src="{{ asset('admin/assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('admin/assets/plugins/chart.js/chart.min.js') }}"></script> 
    <script src="{{ asset('admin/assets/js/index-charts.js') }}"></script>
    <!-- Page Specific JS -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

</body>
</html> 

