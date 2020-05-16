$(document).ready(function () {
    $("#add-employee-form").parsley();
});
$(document).ready(function () {
    var parsleyConfig = {
        errorsContainer: function (parsleyField) {
            var fieldSet = parsleyField.$element.closest("fieldset");

            if (fieldSet.length > 0) {
                return fieldSet.find("#weekly-hour-error");
            }
            return parsleyField;
        },
    };
    $("form").parsley(parsleyConfig);
});
var noOfShifts = document.querySelector("#no-of-shifts");
var addWorkingHour = document.querySelector("#add-working-hour");
var workingHourDiv = document.querySelector("#working-hour-div");
var workingHourDivHTML = document.getElementById("working-hour-div").innerHTML;
var count = 1;
var cloneDiv = "";

addWorkingHour.addEventListener("click", function () {
    console.log(workingHourDivHTML);
    if (noOfShifts != "" && count < noOfShifts.value) {
        count++;
        cloneDiv = workingHourDiv.children[0].cloneNode(true);
        cloneDiv.children[1].setAttribute(
            "data-parsley-errors-container",
            "#weekly-hour-error"
        );
        workingHourDiv.appendChild(cloneDiv);

        var input1 = cloneDiv.children[1].children[0];
        var input2 = cloneDiv.children[1].children[2];
        input1.setAttribute("name", "workingHourTo" + count);
        input1.setAttribute("id", "working_hour_to" + count);
        input2.setAttribute("name", "workingHourFrom" + count);
        input2.setAttribute("id", "working_hour_from" + count);
        // cloneDiv = workingHourDiv.cloneNode(true);
        // workingHourDiv.parentNode.insertBefore(cloneDiv, workingHourDiv.nextSibling);
    }
});
