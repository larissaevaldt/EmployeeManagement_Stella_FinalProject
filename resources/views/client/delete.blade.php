@extends('main')

@section('title', 'Update Client')
@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/employee.css')}}">

@endsection
@section('body') 
@include('partials._nav')
@include('partials._messages')   
    <div class="container focusSet">
        <div class="area px-1 py-5 w-100">
            <h2 class="mx-3 pb-2 text-center">Delete Client</h2>
            <div class=" mb-5 mt-4 align-items-center">
                <form class="search-form w-50">
                    <input class="search-form-input readonly input-back-color set-search-class search_record" type="text" placeholder="Search" name="search" autocomplete="off" autofocus="" value="">
                    <div class="search-form-icon">
                        <img class="search_employee" src="{{ asset('/images/search_30px.png') }}">
                    </div>
                    
                </form>
                <div class="row d-none set-alert">
                    <div class="mt-4 col-md-4 offset-md-4 invalidData alert alert-danger" role="alert">
                        
                    </div>
                </div>
                
            </div>
            <div class="form-aera border ml-3">
                <form class="px-4 py-4 " data-parsley-validate id="company" method="post" action="{{ route('client.store') }}">

                @csrf


                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Client First Name</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="fname" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" data-parsley-min="5">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Client Last Name</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="lname" type="tel" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" data-parsley-min="5">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Company Name</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="name" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-pattern="^[a-zA-Z\s]*$" data-parsley-trigger="keyup" data-parsley-min="5">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Phone Number</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="phonNo" type="tel" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Email Address</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="email" type="email" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-type="email" data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Country</label>
                        <div class="col-sm-8 pl-0">
                            <select disabled="disabled" class="custom-select form-control input-back-color form-control-lg custom-select-lg mb-3" name="country" required data-parsley-trigger="keyup">
                                <option selected>Please Choose Country</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Address 1</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="addressOne" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Address 2</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="addressTwo" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg text-center pl-4">Town/City</label>
                        <div class="col-sm-8 pl-0">
                            <input readonly name="city" type="text" class="form-control input-back-color form-control-lg" id="colFormLabelLg" placeholder="" required data-parsley-trigger="keyup">
                        </div>
                    </div>
                </form>
                <div class="form-group row  ml-3">
                        <label for="colFormLabelLg" class="col-sm-4 font col-form-label col-form-label-lg"></label>
                        <div class="col-sm-4 pl-0">
                            <form method="post" id="deleteForm">
                                @csrf
                                <input readonly type="hidden" name="_method" value="DELETE">
                                <input readonly readonly type="submit" class=" submit font ml-3 input-back-color form-control form-control-lg" id="colFormLabelLg1" value="Delete">
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</div>
    

@endsection



@section('scriptAdd')
<script type="text/javascript">
    var urlPicker = "";
    $(document).ready(function(){
        $('.search_employee').click(function(){

            if($('.search_record').val() == ""){
                alert('Please Enter The Employee ID first')
                console.log($('.search_record').val());
            }else{

                $.ajax({
                    url: "{{ route('client.search') }}",
                    method: 'GET',
                    data: {query: $('.search_record').val()},
                    dataType: 'json',
                    success:function(data){
                    console.log(data)

                        if(data.client==null){
                            $('.set-alert').removeClass('d-none');
                            $('.invalidData').html(data['fail']);

                        }else{
         urlPicker = data.client['id'];

         $('input[name="fname"]').val(data.client['contact_fname']);
         $('input[name="lname"]').val(data.client['contact_lname']);
         $('input[name="phonNo"]').val(data.client['phone_number']);
         $('input[name="email"]').val(data.client['email_address']);
         $('input[name="name"]').val(data.client['name']);
         $('input[name="addressOne"]').val(data.address['address_line1']);
         $('input[name="addressTwo"]').val( data.address['address_line2']);
         $('input[name="city"]').val(data.address['town_city']);
         $('select[name="country"]').val(data.address['country']);

                        }                      
                    }
                });
            }
        });

        $('.set-search-class').click(function(){
            $('.set-alert').addClass('d-none');
        });

    });
 var dltbtn = document.getElementById('deleteForm');
    dltbtn.addEventListener('click',function(e){
        dltbtn.setAttribute('action','client/'+urlPicker);        

    })


</script>

@endsection