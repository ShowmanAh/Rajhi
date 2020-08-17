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
                                    <form class="form" action="{{ route('admin.clinics.store')}}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> @lang('site.add')</h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.name') </label>
                                                        <input type="text" value="{{ old('name')}}" id="name"
                                                               class="form-control"
                                                               placeholder="@lang('site.name')  "
                                                               name="name">
                                                        @error('name')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.type') </label>
                                                       {!! Form::select('type', [0 => 'عيادة حرة' , 1 => 'تابعة لمركز'],old('type'), ['class'=>'form-control']) !!}
                                                        @error('type')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.center') </label>
                                                        <select name="center_id" id="center_id" class="form-control">
                                                         @foreach ($centers as $center)
                                                            <option value="center_id" {{ old('center_id') == $center->id ? 'selected' : ''}}>{{$center->name}}</option>
                                                         @endforeach
                                                        </select>
                                                        @error('center_id')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.doctor') </label>
                                                        <select name="doctor_id" id="doctor_id" class="form-control">
                                                            @foreach ($doctors as $doctor)
                                                               <option value="doctor_id" {{ old('doctor_id') == $doctor->id ? 'selected' : ''}}>{{$doctor->name}}</option>
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
                                                        <label for="projectinput1">@lang('site.city') </label>
                                                        <select name="cities[]" id="cities" class="form-control">
                                                         @foreach ($cities as $city)
                                                            <option value="city_id" {{ old('city_id') == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                                                         @endforeach
                                                        </select>
                                                        @error('city_id')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.area') </label>
                                                        <select name="area_id[]" id="area_id" class="form-control">

                                                           </select>
                                                            @error('area_id')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.phone') </label>
                                                       <input type="text" name="phone" class="form-control">
                                                        @error('phone')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.waiting_time') </label>
                                                        <input type="number" name="waiting_time" class="form-control">
                                                            @error('waiting_time')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.latitude') </label>
                                                       <input type="number" name="latitude" class="form-control" old('latitude')>
                                                        @error('latitude')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.waiting_time') </label>
                                                        <input type="number" name="longitude" class="form-control" old('longitude')>
                                                            @error('longitude')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.address') </label>
                                                        <textarea name="address" id="address" cols="120" rows="3"></textarea>
                                                            @error('address')
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

@push('script')
<script  type="text/javascript">
    $(document).ready(function(){
      alert('sdf');
    });
@endpush
