@inject('model', 'App\Models\Doctor')
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
                                {!! Form::model($model, [
                                    'method'=> 'post',
                                    'route' => ['admin.doctors.update', $doctor->id],
                                    'role' => 'form',
                                    'class' => 'form',
                                    'files' => 'true',
                                     ]) !!}


                                     <div class="card-body">
                                        @include('layouts.dashboard.asside.success')
                                        @include('layouts.dashboard.asside.errors')
                                       <div class="row">
                                       <div class="form-group col-6">
                                           {!! Form::label('name', 'الاسم') !!}
                                           {!!Form::text('name' , $doctor->name , ['class'  => 'form-control' , 'placeholder'  => 'إسم الطبيب'])!!}
                                           @error('name')
                                           <span class="text-danger">{{$message}}</span>

                                           @enderror
                                       </div>

                                       <div class="form-group col-6">
                                        {!! Form::label('gender', 'النوع') !!}
                                        {!! Form::select('gender',['male'=>'ذكر', 'female'=>'انثى'], $doctor->gender, ['class'  => 'form-control' , 'placeholder'  => 'نوع الطبيب']) !!}
                                        @error('gender')
                                        <span class="text-danger">{{$message}}</span>

                                        @enderror
                                       </div>
                                       </div>

                                       <div class="row">
                                        <div class="form-group col-6">
                                            {!! Form::label('name', 'اللقب') !!}

                                            {!! Form::select('title',['professor'=>'استاذ دكتور', 'lecturer'=>'مدرس','specialist'=>'اخصائى'], $doctor->title, ['class'  => 'form-control' , 'placeholder'  => ' اللقب']) !!}
                                            @error('title')
                                            <span class="text-danger">{{$message}}</span>

                                            @enderror
                                           </div>
                                           <div class="form-group col-6">
                                            {!! Form::label('image', 'الصوره الشخصيه') !!}
                                          {!! Form::file('image', ['class'  => 'form-control' , 'placeholder'  => 'نوع الطبيب']) !!}
                                          @if ($doctor->image)
                                             <div>
                                                <img src="{{$doctor->image}}" alt="" style="width: 50px; height:50px;">
                                             </div>
                                          @endif
                                          @error('image')
                                          <span class="text-danger">{{$message}}</span>

                                          @enderror
                                        </div>
                                       </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                         {!! Form::label('email', 'البريد الالكترونى') !!}
                                         {!! Form::email('email', $doctor->email, ['class'  => 'form-control' , 'placeholder'  => ' البريد الالكترونى']) !!}
                                         @error('email')
                                         <span class="text-danger">{{$message}}</span>

                                         @enderror

                                        </div>
                                        <div class="form-group col-6">
                                         {!! Form::label('name', 'كلمه المرور') !!}
                                       {!! Form::password('password', ['class'  => 'form-control' , 'placeholder'  => 'كلمه المرور ']) !!}
                                       @error('password')
                                       <span class="text-danger">{{$message}}</span>

                                       @enderror
                                        </div>
                                    </div>

                                     </div>

                                     <div class="row">
                                        <div class="form-group col-6">
                                            {!!Form::label('specialization_id' , 'التخصص الرئيسى ')!!}
                                            @inject('specialization' , 'App\Models\Specialization')

                                          {!!Form::select('specialization_id' , $specialization->all()->pluck('name' , 'id')->toArray() , $doctor->specialization_id , ['class' => ' form-control ' ,    'placeholder' => "اختر تخصص رئيسى " ] )!!}
                                         @error('specialization_id')
                                          <span class="text-danger">{{$message}}</span>

                                         @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            {!!Form::label('subspecializations' , 'التخصصات الفرعية' )!!}

                                                {!!Form::select('subspecializations[]' ,  $doctor->specialization->subspecializations->pluck('name', 'id')  , $doctor->subspecializations->pluck('id')->toArray() , ['class' => 'select2 form-control ' ,   'multiple' => 'multiple' , 'data-placeholder' => "اختر تخصص فرعي" , 'data-dropdown-css-class' => "select2-purple" , 'style' => 'width: 100%;' , 'id' => 'subspecializations-list'])!!}
                                                @error('subspecialization')
                                               <span class="text-danger">{{$message}}</span>

                                                    @enderror
                                                </div>
                                                 </div>

                                                 <div class="row">
                                                    <div class="form-group col-12">
                                                        {!! Form::label('about', '  معلومات عن الطبيب  ') !!}
                                                        {!! Form::textarea('about', $doctor->about, ['class'  => 'form-control' ,'placeholder'  => ' ادخل معلومات عن الطبيب  ']) !!}
                                                        @error('about')
                                                        <span class="text-danger">{{$message}}</span>

                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        {!!Form::label('services' , 'الخدمات "مفصولة بـ ,"' )!!}
                                                        {!!Form::text('services' , $doctor->services ? join(',' , $doctor->services->pluck('name')->toArray()) : '' , ['class'  => 'form-control ' , 'placeholder'  => 'مثال: خدمة1 , خدمة2 , خدمة3'])!!}
                                                        @error('services')
                                                        <span class="text-danger">{{$message}}</span>

                                                        @enderror
                                                    </div>

                                                    <div class="form-group col-6">
                                                        {!!Form::label('insurance_companies' , 'شركات التأمين')!!}
                                                        @inject('insurance_companies' , 'App\Models\InsuranceCompany')
                                                        {!!Form::select('insurance_companies[]' , $insurance_companies->all()->pluck('name' , 'id')->toArray() , $doctor->insurance_companies->pluck('id')->toArray() ,  ['class' => 'select2 form-control ' ,   'multiple' => 'multiple' , 'data-placeholder' => "اختر شركة تأمين" , 'data-dropdown-css-class' => "select2-purple" , 'style' => 'width: 100%;'])!!}

                                                        @error('services')
                                                        <span class="text-danger">{{$message}}</span>

                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    {!!Form::submit('تعديل' , ['class'  => 'btn btn-primary form-control '])!!}

                                                </div>

                                    </div>
                                    {!!Form::close()!!}
                                    </div>                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
@endsection

