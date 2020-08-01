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
                                    'route' => 'admin.doctors.store',
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
                                       {!!Form::text('name' , old('name') , ['class'  => 'form-control' , 'placeholder'  => 'إسم الطبيب'])!!}
                                       @error('name')
                                       <span class="text-danger">{{$message}}</span>

                                       @enderror
                                   </div>

                                   <div class="form-group col-6">
                                    {!! Form::label('gender', 'النوع') !!}
                                    {!! Form::select('gender',['male'=>'ذكر', 'female'=>'انثى'], old('gender'), ['class'  => 'form-control' , 'placeholder'  => 'نوع الطبيب']) !!}
                                    @error('gender')
                                    <span class="text-danger">{{$message}}</span>

                                    @enderror
                                   </div>
                                   </div>

                                   <div class="row">
                                    <div class="form-group col-6">
                                        {!! Form::label('name', 'اللقب') !!}

                                        {!! Form::select('title',['professor'=>'استاذ دكتور', 'lecturer'=>'مدرس','specialist'=>'اخصائى'], old('gender'), ['class'  => 'form-control' , 'placeholder'  => ' اللقب']) !!}
                                        @error('title')
                                        <span class="text-danger">{{$message}}</span>

                                        @enderror
                                       </div>
                                       <div class="form-group col-6">
                                        {!! Form::label('image', 'الصوره الشخصيه') !!}
                                      {!! Form::file('image', ['class'  => 'form-control' , 'placeholder'  => 'نوع الطبيب']) !!}
                                      @error('image')
                                      <span class="text-danger">{{$message}}</span>

                                      @enderror
                                    </div>
                                   </div>

                                </div>
                           <div class="row">
                               <div class="form-group col-6">
                                {!! Form::label('name', 'البريد الالكترونى') !!}
                                {!! Form::email('email', old('email'), ['class'  => 'form-control' , 'placeholder'  => ' البريد الالكترونى']) !!}
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

                {!!Form::select('specialization_id' , $specialization->all()->pluck('name' , 'id')->toArray() , null , ['class' => ' form-control ' ,    'placeholder' => "اختر تخصص رئيسى ", 'id' => 'testest' ] )!!}
                @error('specialization_id')
                <span class="text-danger">{{$message}}</span>

                @enderror
                                </div>
                                <div class="form-group col-6">
                                    {!!Form::label('subspecializations' , 'التخصصات الفرعية' )!!}
                                    <div class="select2-purple col-10" style = "padding:10;">
                                        {!!Form::select('subspecializations[]' , []  , old('specializations') ,
                                         ['class' => 'select2 form-control ' ,  'id' => 'subspecializations-list', 'multiple' => 'multiple' , 'data-placeholder' => "اختر تخصص فرعي" , 'data-dropdown-css-class' => "select2-purple" , 'style' => 'width: 100%;' ])!!}
                                    </div>


                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12">
                                    {!! Form::label('about', '  معلومات عن الطبيب  ') !!}
                                    {!! Form::textarea('about', old('about'), ['class'  => 'form-control' ,'placeholder'  => ' ادخل معلومات عن الطبيب  ']) !!}
                                    @error('about')
                                    <span class="text-danger">{{$message}}</span>

                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-6">
                                    {!! Form::label('services', '  الخدمات  ') !!}
                                    {!! Form::text('services', old('services') ?? '', ['class'  => 'form-control' , 'placeholder'  => 'اضف خدمه او اكثر مثال خدمه1,خدمه2,خدمه3  ']) !!}
                                    @error('services')
                                    <span class="text-danger">{{$message}}</span>

                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    {!!Form::label('insurance_companies' , 'شركات التأمين')!!}
                                    @inject('insurance_companies' , 'App\Models\InsuranceCompany')

                           {!!Form::select('insurance_companies[]' , $insurance_companies->all()->pluck('name' , 'id')->toArray() , null ,  ['class' => 'select2 form-control ' ,   'multiple' => 'multiple' , 'data-placeholder' => "اختر شركة تأمين" , 'data-dropdown-css-class' => "select2-purple" , 'style' => 'width: 100%;'])!!}
                                  @error('insurance_companies')
                               <span class="text-danger">{{$message}}</span>

                @enderror

                                </div>
                            </div>

                             </div>
                             {!!Form::submit('حفظ' , ['class'  => 'btn btn-primary'])!!}


                        </div>
                        {!!Form::close()!!}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script  type="text/javascript">
    $(document).ready(function(){
        console.log("SDF");
    });

    $('#testest').change(function(){

        var specialization = $(this).val();
        alert(specialization);
        if(specialization)
        {
            $.ajax({

                method : 'get' ,
                url : "{{url(route('getSubspecializations'))}}" ,
                data : {specialization : specialization} ,
                success : function(data)
                {
                    if(data.status == 1)
                    {
                        $("#subspecializations-list").empty();
                        $.each(data.data , function(index , subspecialization)
                        {
                            $("#subspecializations-list").append("<option value = '" + subspecialization.id + "'>"
                            + subspecialization.name  + "</option>")
                        });
                    }
                    else
                    {
                        $("#subspecializations-list").empty();
                    }
                }

            })
        }

    });


</script>
@stop
