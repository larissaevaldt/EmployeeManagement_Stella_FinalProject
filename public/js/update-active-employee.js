$(document).ready(function () {
    $("#dateSearch").click(function () {
        if ($("#gnib").val() == "" || $("#manual").val() == "") {
            alert("Please Fill The both field");
            console.log($(".search_record").val());
        } else {
            $.ajax({
                url: "/employee/searchActive",
                method: "GET",
                data: { gnib: $("#gnib").val(), manual: $("#manual").val() },
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    $("#employeeDataId").empty();

                    if (data.employee.length == 0) {
                        console.log(data["fail"]);
                        $(".set-alert").removeClass("d-none");
                        $(".invalidData").html(data["fail"]);
                    } else {
                        console.log(data.employee.length);
                        $("#totalCount").val(data.employee.length);
                        for (var i = 0; i < data.employee.length; i++) {
                            // data.employee[i]
                            $("#employeeDataId").append(
                                '<div class="form-group row row-area mb-0 py-2 border-bottom-0"><div class="col-sm-2"><div class="form-check ml-2"><input class="form-check-input ml-3 checkbox-width-height" type="checkbox" id="gridCheck1" name="employeeId"></div></div><div class="col-sm-10 font"><label class="h2 ml-5 employeeName">Claudina Blodg</label></div></div>'
                            );

                            $('input[name="employeeId"]').attr(
                                "name",
                                "employee" + (i + 1)
                            );
                            $('input[name="employee' + (i + 1) + '"]').val(
                                data.employee[i]["id"]
                            );
                            $(".employeeName").attr("id", "employeeName" + i);
                            $("#employeeName" + i).removeClass("employeeName");
                            $("#employeeName" + i).html(
                                data.employee[i]["first_name"] +
                                    "  " +
                                    data.employee[i]["last_name"]
                            );
                        }
                    }
                },
            });
        }
    });
    $(".searchList").on("click", function () {
        if ($("#gnib").val() == "" || $("#manual").val() == "") {
            alert("Please Generate List From Above First!");
            console.log($(".search_record").val());
        } else if ($("#searchFinal").val() == "") {
            alert("Please Enter the Name First");
        } else {
            $.ajax({
                url: "/employee/search/active",
                method: "GET",
                data: {
                    gnib: $("#gnib").val(),
                    manual: $("#manual").val(),
                    finalName: $("#searchFinal").val(),
                },
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    $("#employeeDataId").empty();

                    if (data.employee.length == 0) {
                        console.log(data["fail"]);
                        $(".set-alert").removeClass("d-none");
                        $(".invalidData").html(data["fail"]);
                    } else {
                        console.log(data.employee[0]["id"]);
                        $("#totalCount").val(data.employee.length);
                        for (var i = 0; i < data.employee.length; i++) {
                            // data.employee[i]
                            $("#employeeDataId").append(
                                '<div class="form-group row row-area mb-0 py-2 border-bottom-0"><div class="col-sm-2"><div class="form-check ml-2"><input class="form-check-input ml-3 checkbox-width-height" type="checkbox" id="gridCheck1" custom-class  name="employeeId"></div></div><div class="col-sm-10 font"><label class="h2 ml-5 employeeName">Claudina Blodg</label></div></div>'
                            );

                            $('input[name="employeeId"]').attr(
                                "name",
                                "employee" + (i + 1)
                            );
                            $('input[name="employee' + i + '"]').val(
                                data.employee[i]["id"]
                            );
                            $(".employeeName").attr("id", "employeeName" + i);
                            $("#employeeName" + i).removeClass("employeeName");
                            $("#employeeName" + i).html(
                                data.employee[i]["first_name"] +
                                    "  " +
                                    data.employee[i]["last_name"]
                            );
                        }
                    }
                },
            });
        }
    });
});
