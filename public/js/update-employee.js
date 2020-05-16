var employeeid = "";
$(document).ready(function () {
    //selects the search icon inside the input and executes a code when the user clicks the icon
    $(".search_employee").click(function () {
        //pops an alert if the user press the icon without entering anything by checking if the value of the input box is empty
        if ($(".search_record").val() == "") {
            alert("Please Enter The Employee ID first");
        } else {
            //this will happen if there is something typed in the input box
            $.ajax({
                url: "/employee/getbyid",
                method: "GET",
                data: {
                    //pass in query the id that the user entered, used in the search method in EmployeeController
                    query: $(".search_record").val(),
                },
                dataType: "json",

                success: function (data) {
                    console.log(data);

                    if (data.employee == null) {
                        // console.log(data['fail']);
                        //selects the outer div and remove the display none so it will appear
                        $(".set-alert").removeClass("d-none");
                        //select the inner div and add the fail message set in the EmployeeControler@search to the innerHTML of the div
                        $(".invalidData").html(data["fail"]);
                        //selects all input elements and the whole form, except what is specified in .not() and sets the value to be empty
                        $(":input", "#add-employee-form")
                            .not(":button, :submit, :reset, :hidden")
                            .val("");
                    } else {
                        //if data.employee is not null, it means there is an employee with the id the user entered
                        $(":input", "#add-employee-form")
                            .not(":button, :submit, :reset, :hidden")
                            .val("");

                        employeeid = data.employee["id"];

                        $('input[name="first_name"]').val(
                            data.employee["first_name"]
                        );
                        $('input[name="last_name"]').val(
                            data.employee["last_name"]
                        );
                        $('input[name="phone_number"]').val(
                            data.employee["phone_number"]
                        );
                        $('input[name="email_address"]').val(
                            data.employee["email_address"]
                        );
                        $('input[name="date_of_birth"]').val(
                            data.employee["date_of_birth"]
                        );
                        $('select[name="nationality"]').val(
                            data.employee["nationality"]
                        );
                        $('input[name="pps_number"]').val(
                            data.employee["pps_number"]
                        );
                        $('input[name="passport_number"]').val(
                            data.employee["passport_number"]
                        );
                        $('select[name="visa_status"]').val(
                            data.employee["visa_status"]
                        );
                        $('select[name="status"]').val(data.employee["status"]);
                        $('input[name="work_hour"]').val(
                            data.employee["work_hour"]
                        );
                        $('input[name="visa_expire"]').val(
                            data.employee["visa_expire"]
                        );
                        $('input[name="job_role"]').val(
                            data.employee["job_role"]
                        );

                        if (data.employee["manual_hand"] == "yes") {
                            $("#manual-hand").prop("checked", true);
                        } else {
                            $("gridCheck1").prop("checked", true);
                        }

                        if (data.employee["banned"] == "yes") {
                            $("#banned-yes").prop("checked", true);
                        } else {
                            $("#banned-no").prop("checked", true);
                        }

                        $('input[name="manual_exp"]').val(
                            data.employee["manual_exp"]
                        );

                        if (data.employee["full_available"] == "yes") {
                            $("#full-available").prop("checked", true);
                        } else {
                            $("#weekly_timing").removeClass("d-none");

                            $("#no-available").prop("checked", true);

                            $('input[name="mondayStart"]').val(
                                data.timing[0]["mondayStart"].substr(0, 5)
                            );
                            $('input[name="mondayLast"]').val(
                                data.timing[0]["mondayLast"].substr(0, 5)
                            );
                            $('input[name="tuesdayStart"]').val(
                                data.timing[0]["tuesdayStart"].substr(0, 5)
                            );
                            $('input[name="tuesdayLast"]').val(
                                data.timing[0]["tuesdayLast"].substr(0, 5)
                            );
                            $('input[name="wednesdayStart"]').val(
                                data.timing[0]["wednesdayStart"].substr(0, 5)
                            );
                            $('input[name="wednesdayLast"]').val(
                                data.timing[0]["wednesdayLast"].substr(0, 5)
                            );
                            $('input[name="thursdayStart"]').val(
                                data.timing[0]["thursdayStart"].substr(0, 5)
                            );
                            $('input[name="thursdayLast"]').val(
                                data.timing[0]["thursdayLast"].substr(0, 5)
                            );
                            $('input[name="FridayStart"]').val(
                                data.timing[0]["fridayStart"].substr(0, 5)
                            );
                            $('input[name="FridayLast"]').val(
                                data.timing[0]["fridayLast"].substr(0, 5)
                            );
                            $('input[name="saturdayStart"]').val(
                                data.timing[0]["saturdayStart"].substr(0, 5)
                            );
                            $('input[name="saturdayLast"]').val(
                                data.timing[0]["saturdayLast"].substr(0, 5)
                            );
                            $('input[name="sundayStart"]').val(
                                data.timing[0]["sundayStart"].substr(0, 5)
                            );
                            $('input[name="sundayLast"]').val(
                                data.timing[0]["sundayLast"].substr(0, 5)
                            );
                        }

                        $('select[name="job_role"]').val(
                            data.employee["job_role"]
                        );
                        $('input[name="min_pay"]').val(
                            data.employee["min_pay"]
                        );

                        //address

                        $('input[name="address_line1"]').val(
                            data.address[0]["address_line1"]
                        );
                        $('input[name="address_line2"]').val(
                            data.address[0]["address_line2"]
                        );
                        $('input[name="town_city"]').val(
                            data.address[0]["town_city"]
                        );
                        $('select[name="country"]').val(
                            data.address[0]["country"]
                        );
                    }
                },
            });
        }
    });

    //selects the search input and adds an event, when the user clicks in the input it adds display none to the alert making it disappear
    $(".set-search-class").click(function () {
        $(".set-alert").addClass("d-none");
    });
});

//trying to run the click method when enter key is pressed, it gets the employee but disappears
$(".search_record").keypress(function (event) {
    if (event.which == 13) {
        //Enter key pressed
        $(".search_employee").click(); //Trigger search button click event
    }
});

// selects the form and adds once the user clicks in the form it adds an action with the id entered in the url
// var form = document.getElementById("add-employee-form");
// form.addEventListener("click", function (e) {
//     form.setAttribute(
//         "action",
//         "{{route(employee.update," + employeeid + ")}}"
//     );
// });

var dltbtn = document.getElementById("add-employee-form");
dltbtn.addEventListener("click", function (e) {
    dltbtn.setAttribute("action", "employee/" + employeeid);
});

// var urlPicker = "";
// $(document).ready(function() {
//     // $("#add-employee-form").parsley();
//     $('.search_employee').click(function() {

//         if ($('.search_record').val() == "") {
//             alert('Please Enter The Employee ID first')
//             // console.log($('.search_record').val());
//         } else {

//             $.ajax({
//                 url: "/employee/delete",
//                 method: 'GET',
//                 data: {
//                     query: $('.search_record').val()
//                 },
//                 dataType: 'json',
//                 success: function(data) {
//                     // console.log(data)

//                     if (data.employee == null) {
//                         // console.log(data['fail']);
//                         $('.set-alert').removeClass('d-none');
//                         $('.invalidData').html(data['fail']);
//                         $(':input', '#add-employee-form')
//                             .not(':button, :submit, :reset, :hidden')
//                             .val('')
//                             .prop('checked', false)
//                             .prop('selected', false);

//                     } else {
//                         $(':input', '#add-employee-form')
//                             .not(':button, :submit, :reset, :hidden')
//                             .val('')
//                             .prop('checked', false)
//                             .prop('selected', false);
//                         urlPicker = data.employee['id'];

//                         $('input[name="first_name"]').val(data.employee['first_name']);
//                         $('input[name="last_name"]').val(data.employee['last_name']);
//                         $('input[name="phone_number"]').val(data.employee['phone_number']);
//                         $('input[name="email_address"]').val(data.employee['email_address']);
//                         $('input[name="date_of_birth"]').val(data.employee['date_of_birth']);
//                         $('select[name="nationality"]').val(data.employee['nationality']);
//                         $('input[name="pps_number"]').val(data.employee['pps_number']);
//                         $('input[name="passport_number"]').val(data.employee['passport_number']);
//                         $('select[name="visa_status"]').val(data.employee['visa_status']);
//                         $('select[name="status"]').val(data.employee['status']);
//                         $('input[name="work_hour"]').val(data.employee['work_hour']);
//                         $('input[name="visa_expire"]').val(data.employee['visa_expire']);
//                         $('input[name="job_role"]').val(data.employee['job_role']);
//                         if (data.employee['manual_hand'] == 'yes') {

//                             $('input[name="manual_hand"][value="yes"]').prop('checked', true)
//                         } else {
//                             $('input[name="manual_hand"][value="no"]').prop('checked', true)
//                         }
//                         if (data.employee['banned'] == 'yes') {

//                             $('input[name="banned"][value="yes"]').prop('checked', true)
//                         } else {
//                             $('input[name="banned"][value="no"]').prop('checked', true)
//                         }

//                         $('input[name="manual_exp"]').val(data.employee['manual_exp']);
//                         if (data.employee['full_available'] == 'yes') {

//                             $('input[name="full_available"][value="yes"]').prop('checked', true)
//                         } else {
//                             $('#weekly_timing').removeClass('d-none');

//                             $('input[name="full_available"][value="no"]').prop('checked', true)

//                             $('input[name="mondayStart"]').val(data.timing[0]['mondayStart'].substr(0, 5));
//                             $('input[name="mondayLast"]').val(data.timing[0]['mondayLast'].substr(0, 5));
//                             $('input[name="tuesdayStart"]').val(data.timing[0]['tuesdayStart'].substr(0, 5));
//                             $('input[name="tuesdayLast"]').val(data.timing[0]['tuesdayLast'].substr(0, 5));
//                             $('input[name="wednesdayStart"]').val(data.timing[0]['wednesdayStart'].substr(0, 5));
//                             $('input[name="wednesdayLast"]').val(data.timing[0]['wednesdayLast'].substr(0, 5));
//                             $('input[name="thursdayStart"]').val(data.timing[0]['thursdayStart'].substr(0, 5));
//                             $('input[name="thursdayLast"]').val(data.timing[0]['thursdayLast'].substr(0, 5));
//                             $('input[name="FridayStart"]').val(data.timing[0]['fridayStart'].substr(0, 5));
//                             $('input[name="FridayLast"]').val(data.timing[0]['fridayLast'].substr(0, 5));;
//                             $('input[name="saturdayStart"]').val(data.timing[0]['saturdayStart'].substr(0, 5));
//                             $('input[name="saturdayLast"]').val(data.timing[0]['saturdayLast'].substr(0, 5));
//                             $('input[name="sundayStart"]').val(data.timing[0]['sundayStart'].substr(0, 5));
//                             $('input[name="sundayLast"]').val(data.timing[0]['sundayLast'].substr(0, 5));
//                         }

//                         $('select[name="job_role"]').val(data.employee['job_role']);
//                         $('input[name="min_pay"]').val(data.employee['min_pay']);

//                         //address

//                         $('input[name="address_line1"]').val(data.address[0]['address_line1']);
//                         $('input[name="address_line2"]').val(data.address[0]['address_line2']);
//                         $('input[name="town_city"]').val(data.address[0]['town_city']);
//                         $('select[name="country"]').val(data.address[0]['country']);

//                         // bank detail

//                         $('input[name="account_name"]').val(data.bankRecord[0]['account_name']);
//                         $('input[name="account_number"]').val(data.bankRecord[0]['account_number']);
//                         $('input[name="iban"]').val(data.bankRecord[0]['iban']);
//                         $('input[name="bic"]').val(data.bankRecord[0]['bic']);

//                     }
//                 }
//             });
//         }
//     });

//     $('.set-search-class').click(function() {
//         $('.set-alert').addClass('d-none');
//     });

// });
// var dltbtn = document.getElementById('add-employee-form');
// dltbtn.addEventListener('click', function(e) {
//     dltbtn.setAttribute('action', 'employee/' + urlPicker);

// });
