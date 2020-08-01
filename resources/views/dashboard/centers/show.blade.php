@extends('layouts.dashboard.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="box-header with-border">
                <h3 class="box-title" style="margin-bottom: 20px"> <small>مركز {{ $center->name}}</small></h3>
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
                                <li class="breadcrumb-item active"> المركز الطبيى
                                </li>
                                <li class="breadcrumb-item  "><a href="{{route('admin.centers')}}">المراكز الطبيه  </a>
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
                                    <h4 class="card-title"> {{$center->name}}    </h4>
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
                                   <img src="{{$center->logo}}" alt="" style="border-radius: 50px;border: solid 4px #201919;box-shadow: 0 0 15px 5px #b39d9d">
                               </div>
                               <h2 class="text-center" ><span style="color: black; font-weight: bold; margin-top:10px;">{{ $center->name}} </span></h2>
                               <h2 class="text-center" ><span style="color: black; font-weight: bold; margin-top:10px;">{{ $center->city ? $center->city->name : ''}} </span></h2>
                               <h2 class="text-center" ><span style="color: black; font-weight: bold; margin-top:10px;">{{ $center->areas ? $center->areas->name : ''}} </span></h2>
                              

                                 <h3 class="text-center" style = "color: black;border: solid 5px green; padding: 10px;display:inline-block;box-shadow: 0 0 15px 5px black;margin-top:10px;">عن المركز :

                                </h3>
                                <p style="color: black; font-weight: bold;margin-right:5px;">{{ $center->about}}</p>

                                <h2 class="text-center" ><span style="color: black; font-weight: bold; margin-top:10px;">{{ $center->address}} </span></h2



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
