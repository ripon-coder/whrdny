<header class="header-area">
	<div class="top-header" >
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-8">
					<div class="text-center text-sm-start header_info">
						<ul class="list-inline">
							<li><a href="mailto:globaloffice2006@gmail.com"><i class="fa fa-envelope-o"></i>{{@$g_settings->email}}</a>
							</li>
						</ul>
					</div>
				</div> 
				<div class="col-md-6 col-sm-4">
					@include('include.social-menu')
				</div>
			</div> 
		</div> 
	</div>
	<div class="main-menu">
		<div class="sticky-header">
			<div class="container">
				<div class="row">
					<div class="col-5 col-sm-4 col-md-3 d-flex align-items-center">
						<a class="nav-brand" href="{{url('/')}}">
							<img class="img-fluid" src="{{ asset('dynamic-assets/logo/'.$g_settings->logo) }}" alt="logo" />
						</a>
					</div>
					<div class="col-7 col-sm-8 col-md-9 ps-0">
						<div class="float-end">
							<div class="menu-collapser d-inline-block d-lg-none">
								<div class="collapse-button">
									<!-- menu_visible -->
									<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
								</div>
							</div>
							<div class="mobile-menu">
								@include('include.main-menu')
							</div>
							<div class="grop-hadr_search d-inline-block">
								<a href="javascript:void(0)"><i class="fa fa-search"></i></a>
								<div class="grop-hadrsrch_form_warp">
									<div class="grop-hadrsrch_form">
										<form method="get" id="searchform" action="">
											<input type="search" name="s" id="s" placeholder="Type and hit enter">
											<button type="submit">
												<span class="grop-srchicon"></span>
											</button>
										</form>
									</div>
								</div>
							</div>
							<a class="btn btn-yellow btn_overly" href="{{url('/causes-list')}}"><span>Donate</span></a>
						</div>
						<div class="float-end header-nav d-none d-lg-block">
							@include('include.main-menu')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>