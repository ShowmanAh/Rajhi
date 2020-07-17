@extends('layouts.dashboard.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="box-header with-border">
                <h3 class="box-title" style="margin-bottom: 20px"> <small> {{ $doctor->name}}</small></h3>
                <!-- search data -->



            </div><!-- end of box header -->
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">  </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> الطبيب
                                </li>
                                <li class="breadcrumb-item  "><a href="{{route('admin.doctors')}}">الاطباء  </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> الطبيب    </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>



                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                               <div class="text-center" style="margin:20px auto; width:200px;">
                                   <img src="{{$doctor->image}}" alt="" style="border-radius: 50px;border: solid 4px #201919;box-shadow: 0 0 15px 5px #b39d9d">
                               </div>
                               <h2 class="text-center" ><span style="color: black; font-weight: bold; margin-top:10px;">{{ $doctor->name}} ({{ $doctor->title}})</span></h2>
                                <h3 class="text-center"> <span style="color: black; font-weight: bold;"><small>طبيب  </small>{{ $doctor->specialization ? $doctor->specialization->name:''}}</span></h3>
                               <h3 class="text-center" style = "color: black;border: solid 5px green; padding: 10px;display:inline-block;box-shadow: 0 0 15px 5px black;margin-top:10px;">عن الطبيب :

                                </h3>
                                <p style="color: black; font-weight: bold;margin-right:5px;">{{ $doctor->about}}</p>
                                <h3 class="text-center" style = "color: black;border: solid 5px green; padding: 10px;box-shadow: 0 0 8px 3px black; display:inline-block"> التخصصات الفرعيه</h3>
                                @if(count($doctor->subspecializations) > 0)
                                    <div class = "row " style = "margin: 10px 40px;">
                                        @foreach($doctor->subspecializations as $sub)
                                        <div class = "col-lg-3 col-md-4" style = "margin: 4px;">
                                            <p class = "text-center" style = "padding: 10px;border-radius: 5px;border: solid 1px green  ;color: black;margin-top:10px; ">{{$sub->name}}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p style = "margin: 10px 40px;">لا يوجد تخصصات فرعيه</p>
                                @endif

                  <h3 class="text-center" style = "color: black;border: solid 5px green; padding: 10px;box-shadow: 0 0 8px 3px black; display:inline-block">خدمات الطبيب</h3>
                            @if(count($doctor->services) > 0)
                                <div class = "row " style = "margin: 10px 40px;">
                                    @foreach($doctor->services as $service)
                                    <div class = "col-lg-3 col-md-4" style = "margin: 4px;">
                                        <p class = "text-center" style = "padding: 10px;border-radius: 5px;border: solid 1px #6c5e5e  ;color: #6c5e5e; ">{{$service->name}}</p>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <p style = "margin: 10px 40px;">لا يوجد خدمات</p>
                            @endif

                <h3 class="text-center" style = "color: black;border: solid 5px green; padding: 10px;box-shadow: 0 0 8px 3px black; display:inline-block"> شركات التأمين</h3>
                        @if(count($doctor->insurance_companies) > 0)
                            <div class = "row " style = "margin: 10px 40px;">
                                @foreach($doctor->insurance_companies as $insurance)
                                <div class = "col-lg-3 col-md-4" style = "margin: 4px;">
                                    <p class = "text-center" style = "padding: 10px;border-radius: 5px;border: solid 1px #6c5e5e  ;color: #6c5e5e; ">{{$insurance->name}}</p>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <p style = "margin: 10px 40px;">لا يوجد شركات تأمين</p>
                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
