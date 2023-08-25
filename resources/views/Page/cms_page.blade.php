@extends('Layouts.main')
@section('title','eStore Template')
@section('style')
@endsection

    @section('content')

    @include('Main.navigation')
   
   <!--====== BANNER PART START ======-->
	<section class="banner-area bg_cover">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="banner-content">
						<h1 class="text-white">About Us</h1>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">

								<li class="breadcrumb-item active" aria-current="page">{{ $cmsPageDetalis['title'] }}</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== BANNER PART END ======-->

	<!--====== WELCOME PART START ======-->
	<section class="welcome-area pt-60 pb-110">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="welcome-img">
						<img src="{{asset('assets/images/images/about/about-img.png')}}" alt="" class="image">
						<img src="{{asset('assets/images/images/about/dot-shape.svg')}}" alt="" class="dot-shape">
					</div>
				</div>

				<div class="col-lg-6">
					<div class="welcome-content">
						<h1 class="mb-30">{{ $cmsPageDetalis['meta_title'] }}</h1>
						<p>{{ $cmsPageDetalis['description'] }}</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====== WELCOME PART END ======-->
   
    @include('Sections.Index.footer-style-3')

    @endsection

    @section('script')


  @endsection