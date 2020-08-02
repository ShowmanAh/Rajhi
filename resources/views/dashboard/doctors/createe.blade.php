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
                            <li class="breadcrumb-item"><a href="{{route('admin.doctors')}}"> الاطباء </a>
                            </li>
                            <li class="breadcrumb-item active">اضافه طبيب
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
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{ route('admin.doctors.store')}}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> اضافه  طبيب</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> صوره  الطبيب </label>
                                                       <input type="file" name="image" class="form-control">
                                                        @error('image')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اسم  الطبيب </label>
                                                        <input type="text" value="{{ old('name')}}" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل اسم  الطبيب  "
                                                               name="name">
                                                        @error('name')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                        {!! Form::label('gender', 'النوع: *') !!}
                                                        <br>
                                                        <label class="radio-inline">
                                                            {!! Form::radio('gender', "Male", null,['class'=> 'form-control']) !!} ذكر
                                                        </label>
                                                          <br>
                                                        <label class="radio-inline">
                                                            {!! Form::radio('gender', "Female", null, ['class'=> 'form-control']) !!} انثى
                                                        </label>
                                                        </label>  @error('gender')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                            </div>
                                          <div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">   اللقب </label>
                                                    <select class="form-control" name="title">
                                                        <option >اللقب</option>
                                                        <option value="professor">professor</option>
                                                        <option value="lecturer">lecturer</option>
                                                        <option  value="specialist">specialist</option>
                                                      </select>
                                                    @error('title')
                                                    <span class="text-danger">{{ $message}} </span>
                                                    @enderror

                                                </div>
                                            </div>
                                            </div>


                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">   البريد الالكترونى </label>
                                                       <input type="email" name="email" placeholder="ادخل البريد الالكترونى" value="{{old('email')}}" class="form-control">
                                                        @error('specialization_id')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  كلمه المرور  </label>
                                                        <input type="password" value="{{ old('name')}}" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل   كلمه المرور  "
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
                                                        <label for="projectinput1"> اسم التخصص الرئيسى </label>
                                                        <select name="specialization_id" id="specialization-list" class="form-control">
                                                            <option value="">
                                                                التخصصات الرئيسية
                                                            </option>
                                                            @foreach ($specializations as $special)
                                                            <option value="{{ $special->id}}" {{ old('specialization_id') == $special->id ? 'selected' : ''}}>{{$special->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('specialization_id')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">    التخصص الفرعى </label>
                                                        <input type="text"  id="subspecialization-list"
                                                               class="form-control"
                                                               placeholder="ادخل اسم التخصص الفرعى  "
                                                               name="subspecialization[]" multiple>
                                                        @error('subspecialization')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="projectinput1">    عن الطبيب </label>
                                                       <textarea name="about" id="" cols="150" rows="10" placeholder="معلومات عن الطبيب"></textarea>
                                                        @error('about')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">


                                                <div class="col-md-6">
                                                    <div class="form-group" style=" display: inline-block;
                                                    vertical-align: top;
                                                    overflow: hidden;
                                                    border: solid grey 1px;">
                                                        <label for="projectinput1"> شركات التأمين  </label>
                                                        <select name="insurance_companies[]" id="insurance_companies" class="form-control" multiple style="width: 100%; padding: 10px;
                                                        overflow-y: auto;">
                                                            <option value="">
                                                                 شركات التأمين
                                                            </option>
                                                            @foreach ($insurance_companies as $insurance)
                                                            <option value="{{ $insurance->id}}" {{ old('insurance_companies') == $insurance->id ? 'selected' : ''}} >{{$insurance->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('insurance_companies')
                                                        <span class="text-danger">{{ $message}} </span>
                                                        @enderror

                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">     الخدمات </label>
                                                        <input type="text"  id="services"
                                                               class="form-control"
                                                               placeholder="ادخل   الخدمات مثال خدمه1,خدمه 2,خدمه3  "
                                                               name="services" multiple>
                                                        @error('services')
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

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      // alert('sdf');
       $('#specialization-list').on('change', function(){
          console.log('listening');
          specialization_id = $(this).val();
          if(specialization_id){
           // console.log(specialization_id);
            $.ajax({
                url:'getSub/'+specialization_id,
                typ: 'GET',
                dataType: 'json',
                success: function(data){
                    if(data.status == 1){
                       // alert('not empty');
                        console.log(data);
                        $('#subspecialization-list').empty();
                        $.each(data.data , function(key, value)
                        {
                            $('#subspecialization-list').append("<option value = '" + key + "'>"
                            + value  + "</option>")
                        });
                }
                else
                {
                    $('#subspecialization-list').empty();
                }
            }
            });
          }
       });
    });


</script>
@stop
