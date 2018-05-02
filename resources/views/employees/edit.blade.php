@extends('layouts.app')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 

<script>
    
    $(document).ready(function() {

        var  intereststr = 
         <?php 

                        $str = "{{$employee->interests}}" ; 
                        $str = str_replace("{", "",  $str);
                        $str = str_replace("}", "",  $str);

                        $selectedinterests = explode(",",$str);

                        echo json_encode($selectedinterests);

         ?>;


         var  languagestr = 
         <?php 

                        $strlang = "{{$employee->language}}" ; 
                        $strlang = str_replace("{", "",  $strlang);
                        $strlang = str_replace("}", "",  $strlang);

                        $selectedlanguage = explode(",",$strlang);

                        echo json_encode($selectedlanguage);

         ?>;



         $.each(intereststr, function(index, item) {
          
             if(item == $("#programming").val()){
                    $("#programming").prop('checked', true);
             }else if(item == $("#management").val()){
                     $("#management").prop('checked', true);
             }else if(item == $("#support").val()){
                 $("#support").prop('checked', true);
             }else if(item == $("#sales").val()){
                     $("#sales").prop('checked', true);
             }else if(item == $("#cleaning").val()){
                     $("#cleaning").prop('checked', true);
             }else if(item == $("#education").val()){
                     $("#education").prop('checked', true);
             }

        });

          $.each(languagestr, function(index, item) {
             if(item == $("#language").val()){
                    $("#language").prop('selected', "selected");
             }

             $('[name=language] option').filter(function() { 
                 return ($(this).text() == item); 
                }).prop('selected', true);

        });


    });


</script>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="margin-left:5%;">
                <h2>Edit Employee</h2>
            </div>
            <div class="pull-right" style="margin-right:5%;">
                <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
                

    <form action="{{ route('employees.update',$employee->id) }}" method="POST" style="width:90%;margin-left:8%">
        

         <input type="hidden" name="_token" value="{{ Session::token() }}">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <input name="_method" value="PUT" type="hidden">
         <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $employee->name }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <strong>Surname:</strong>
                    <input type="text" name="surname" id="surname" class="form-control" placeholder="Surname" value=" {{ $employee->surname }}"> 
                </div>
            </div>
           <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <strong>Id No:</strong>
                    <input type="text" name="idno" id="idno" class="form-control" placeholder="Id number" value="{{ $employee->idno }}">
                </div>
            </div>
           <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="mobileno" id="mobileno" class="form-control" placeholder="Phone no" value=" {{ $employee->mobileno }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" value=" {{ $employee->email }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <strong>Date Of Birth:</strong>
                    <input type="text" name="dateOfBirth" id="dateOfBirth" class="date form-control" value=" {{ $employee->dateOfBirth }}">
                </div>
            </div>
           <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <strong>Language:</strong>
                    <select id="language" name="language" class="form-control">
                            <option  value="English" >English</option>
                            <option  value="Afrikaans" >Afrikaans</option>
                            <option  value="Sepedi" >Sepedi</option>
                            <option  value="Sesotho" >Sesotho</option>
                            <option  value="Setswana" >Setswana</option>
                            <option  value="Zulu" >Zulu</option>
                            <option  value="Xhosa" >Xhosa</option>     
                            <option  value="Swati" >Swati</option>
                            <option  value="Ndebele" >Ndebele</option>
                            <option  value="Tsonga" >Tsonga</option>
                            <option  value="Venda" >Venda</option>
                            
                    </select>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Interets:</strong><br/>
                    <input type="checkbox"  class="interests" id="programming" name="interests[]" value="programming"> Programming
                    <input type="checkbox"  class="interests" id="management" name="interests[]" value="management"> Management
                    <input type="checkbox"  class="interests" id="support" name="interests[]" value="support">Support<br/> 
                    <input type="checkbox"  class="interests" id="sales" name="interests[]" value="sales"> Sales
                    <input type="checkbox"  class="interests" id="cleaning" name="interests[]" value="cleaning"> Cleaning
                    <input type="checkbox"  class="interests" id="education" name="interests[]" value="education"> Education
                </div>
            </div>


            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                    <button type="reset" class="btn btn-info" style="width:30%">Reset</button>
                    <button type="submit" class="btn btn-primary" style="width:30%">Submit</button>
            </div>
        </div>


    </form>

@endsection

