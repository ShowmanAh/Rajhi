@extends('layouts.dashboard.app')

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">

                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">@lang('site.dashboard')</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="{{route('admin.clinics')}}">@lang('site.clinics')</a>
                            </li>
                              </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">

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
                            @include('layouts.dashboard.asside.success')
                            @include('layouts.dashboard.asside.errors')
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{ route('admin.dates.update', $date->id)}}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> @lang('site.add')</h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.doctor') </label>
                                                        <select name="doctor_id" id="doctor_id" class="form-control">
                                                        <option value="">@lang('site.doctors')</option>
                                                        @foreach ($doctors as $doctor)
                                                           <option value="{{ $doctor->id}} " {{ $date->doctor_id == $doctor->id ? 'selected' : ''}}> {{$doctor->name}}</option>
                                                        @endforeach
                                                    </select>
                                                        @error('doctor_id')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>



                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.clinic') </label>
                                                        <select name="clinic_id" id="clinic_id" class="form-control">
                                                        <option value=""> @lang('site.clinics')</option>
                                                        @foreach ($clinics as $clinic)
                                                           <option value="{{ $clinic->id}} " {{ $date->clinic_id == $clinic->id ? 'selected' : ''}}> {{$clinic->name}}</option>
                                                        @endforeach
                                                    </select>
                                                        @error('clinic_id')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>



                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.days') </label>
                                                        {!!Form::select('days[]' , ['Saturday' => 'السبت' , 'Sunday' => 'الأحد' , 'Monday' => 'الأثنين' , 'Tuesday' => 'الثلاثاء' , 'Wednesday' => 'الأربعاء' , 'Thursday' => 'الخميس' , 'Friday' => 'الجمعة'] , $date->days , ['class' => 'select2 form-control ' ,   'multiple' => 'multiple' , 'data-placeholder' => "اختر الايام المتاحه" , 'data-dropdown-css-class' => "select2-purple" , 'style' => 'width: 100%;'] )!!}
                                                        @error('days')
                                                        <span class="text-danger">{{ $message}} </spanntrol>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.from') </label>
                                                        <select name = "from[]" class = "form-control"     style = "width: 100%;">
                                                            @for ($i = 0; $i <= 23; $i++)
                                                                {{$res = $i < 10 ? '0' . $i : $i  }}
                                                                <option value = "{{ $res . ':00' }}"  {{ $date->times()->first() && $date->times()->first()->from ==  date("h:i a" , strtotime($res . ':00'))  ? 'selected' : ''}} >{{ date("h:i a" , strtotime($res . ':00'))}}</option>
                                                            @endfor
                                                        </select>
                                                        @error('from')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>



                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.to') </label>
                                                        <select name = "to[]" class = " form-control"   style = "width: 100%;">
                                                            @for ($i = 0; $i <= 23; $i++)
                                                                {{$res = $i < 10 ? '0' . $i : $i  }}
                                                                <option value = "{{ $res . ':00' }}"  {{ $date->times()->first() && $date->times()->first()->to ==  date("h:i a" , strtotime($res . ':00'))  ? 'selected' : ''}}   ? 'selected' : ''}} >{{ date("h:i a" , strtotime($res . ':00'))}}</option>
                                                            @endfor
                                                        </select>
                                                        @error('to')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>



                                            </div>

                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> @lang('site.save')
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>


@endsection
