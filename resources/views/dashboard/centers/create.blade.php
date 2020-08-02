@extends('layouts.dashboard.app')

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admin.centers')}}">  المراكز </a>
                            </li>
                            <li class="breadcrumb-item active">إضافة  مركز
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
                                    <form class="form" action="{{ route('admin.centers.store')}}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> اضافه  مركز</h4>

                                           <div class="row">
                                               <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> صوره  المركز </label>
                                                    <input type="file"  id="logo"
                                                           class="form-control"

                                                           name="logo">
                                                    @error('logo')
                                                    <span class="text-danger">{{ $message}} </span>
                                                    @enderror

                                                </div>
                                               </div>
                                               </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اسم  المركز </label>
                                                        <input type="text" value="{{ old('name')}}" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل اسم  المركز  "
                                                               name="name">
                                                        @error('name')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> الايميل   </label>
                                                        <input type="email" value="{{ old('email')}}" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل ايميل  المركز  "
                                                               name="email">
                                                        @error('email')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">   كلمه المرور </label>
                                                        <input type="password" value="{{ old('password')}}" id="password"
                                                               class="form-control"
                                                               placeholder="ادخل كلمه المرور    "
                                                               name="password">
                                                        @error('password')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label for="projectinput1">المدن</label>
                                                      <select name="city_id" id="city_id" class="form-control">
                                                          <option value="">المدن</option>
                                                          @foreach ($cities as $city)
                                                             <option class="form-control" value="{{ $city->id}}" {{ old('city_id') == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                                                          @endforeach

                                                      </select>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label for="projectinput1">المناطق</label>
                                                      <select name="area_id" id="area_id" class="form-control">
                                                          <option value="old('area_id')">المناطق</option>
                                                          @foreach ($areas as $area)
                                                          <option value="{{ $area->id}}" {{ old('area_id') == $area->id ? 'selected' : ''}}>{{$area->name}}</option>
                                                          @endforeach



                                                      </select>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> عنوان  المركز </label>
                                                        <input type="text" value="{{ old('address')}}" id="address"
                                                               class="form-control"
                                                               placeholder="ادخل  العنوان    "
                                                               name="address">
                                                        @error('address')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>


                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">   الاحداثى السينى </label>
                                                        <input type="number" value="{{ old('latitude')}}" id="latitude"
                                                               class="form-control"

                                                               name="latitude" step="0.00000001">
                                                        @error('latitude')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">   الاحداثى الصادى </label>
                                                        <input type="number" value="{{ old('longitude')}}" id="longitude"
                                                               class="form-control"

                                                               name="longitude" step="0.00000001">
                                                        @error('longitude')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>


                                            </div>

                                  <div class="row">
                                      <div class="col-md-8">
                                      <div class="form-group">
                                          <label for=""> عن المركز</label>
                                          <textarea name="about" id="" cols="80" rows="10" class="form-control"></textarea>
                                          @error('about')
                                          <span class="text-danger">{{ $message}} </span>
                                          @enderror
                                      </div>
                                      </div>
                                  </div>

                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> حفظ
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
