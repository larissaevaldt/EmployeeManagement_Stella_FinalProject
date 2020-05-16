var urlPicker = "";
    $(document).ready(function(){
        $('.search_employee').click(function(){

            if($('.search_record').val() == ""){
                alert('Please Enter The Employee ID first')
                // console.log($('.search_record').val());
            }else{

                $.ajax({
                    url: "/employee/delete",
                    method: 'GET',
                    data: {query: $('.search_record').val()},
                    dataType: 'json',
                    success:function(data){
                    // console.log(data)

                        if(data.employee==null){
                            // console.log(data['fail']);
                            $('.set-alert').removeClass('d-none');
                            $('.invalidData').html(data['fail']);
                            $(':input','#set-empty')
                              .not(':button, :submit, :reset, :hidden')
                              .val('')
                              .prop('checked', false)
                              .prop('selected', false);

                        }else{
                            
                            $(':input','#set-empty')
                              .not(':button, :submit, :reset, :hidden')
                              .val('')
                              .prop('checked', false)
                              .prop('selected', false);
     urlPicker = data.employee['id'];

    $('input[name="first_name"]').val(data.employee['first_name']);
    $('input[name="last_name"]').val(data.employee['last_name']);
    $('input[name="phone_number"]').val(data.employee['phone_number']);
    $('input[name="email_address"]').val(data.employee['email_address']);
    $('input[name="date_of_birth"]').val(data.employee['date_of_birth']);
    $('input[name="nationality"]').val(data.employee['nationality']);
    $('input[name="pps_number"]').val(data.employee['pps_number']);
    $('input[name="passport_number"]').val(data.employee['passport_number']);
    $('input[name="visa_status"]').val(data.employee['visa_status']);
    $('input[name="work_hour"]').val(data.employee['work_hour']);
    $('input[name="visa_expire"]').val(data.employee['visa_expire']);
    $('input[name="job_role"]').val(data.employee['job_role']);
    if(data.employee['manual_hand']=='yes' ){

        $('input[name="manual_hand"][value="yes"]').prop('checked', true)
    }else{
        $('input[name="manual_hand"][value="no"]').prop('checked', true)
    }
    if(data.employee['banned']=='yes' ){

        $('input[name="banned"][value="yes"]').prop('checked', true)
    }else{
        $('input[name="banned"][value="no"]').prop('checked', true)
    }

    
    $('input[name="manual_exp"]').val(data.employee['manual_exp']);
    if(data.employee['full_available']=='yes' ){
        
        $('input[name="full_available"][value="yes"]').prop('checked', true)
    }else{
        $('#weekly_timing').removeClass('d-none');

        $('input[name="full_available"][value="no"]').prop('checked', true)

        $('input[name="mondayStart"]').val(data.timing[0]['mondayStart'].substr(0,5));    
        $('input[name="mondayLast"]').val(data.timing[0]['mondayLast'].substr(0,5));
        $('input[name="tuesdayStart"]').val(data.timing[0]['tuesdayStart'].substr(0,5));   
        $('input[name="tuesdayLast"]').val(data.timing[0]['tuesdayLast'].substr(0,5)); 
        $('input[name="wednesdayStart"]').val(data.timing[0]['wednesdayStart'].substr(0,5));  
        $('input[name="wednesdayLast"]').val(data.timing[0]['wednesdayLast'].substr(0,5));
        $('input[name="thursdayStart"]').val(data.timing[0]['thursdayStart'].substr(0,5));   
        $('input[name="thursdayLast"]').val(data.timing[0]['thursdayLast'].substr(0,5));
        $('input[name="FridayStart"]').val(data.timing[0]['fridayStart'].substr(0,5));  
        $('input[name="FridayLast"]').val(data.timing[0]['fridayLast'].substr(0,5));;
        $('input[name="saturdayStart"]').val(data.timing[0]['saturdayStart'].substr(0,5));  
        $('input[name="saturdayLast"]').val(data.timing[0]['saturdayLast'].substr(0,5));
        $('input[name="sundayStart"]').val(data.timing[0]['sundayStart'].substr(0,5));   
        $('input[name="sundayLast"]').val(data.timing[0]['sundayLast'].substr(0,5));
    }


        $('select[name="job_role"]').val(data.employee['job_role']);
        $('input[name="min_pay"]').val(data.employee['min_pay']); 

        //address

        $('input[name="address_line1"]').val(data.address[0]['address_line1']);
        $('input[name="address_line2"]').val(data.address[0]['address_line2']);
        $('input[name="town_city"]').val(data.address[0]['town_city']);
        $('input[name="country"]').val(data.address[0]['country']);




       
        // bank detail

        $('input[name="account_name"]').val(data.bankRecord[0]['account_name']);
        $('input[name="account_number"]').val(data.bankRecord[0]['account_number']);
        $('input[name="iban"]').val(data.bankRecord[0]['iban']);
        $('input[name="bic"]').val(data.bankRecord[0]['bic']);


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
    dltbtn.setAttribute('action','employee/'+urlPicker);        
});