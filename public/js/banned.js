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

$(document).ready(function () {
    $(".js-example-basic-multiple").select2({
        placeholder: "Choose Banned Sites",
        allowClear: true,
    });
});

var bannedYes = document.querySelector("#banned-yes");
var bannedNo = document.querySelector("#banned-no");
var fullAvailable = document.querySelector("#full-available");
var noAvailable = document.querySelector("#no-available");
var weeklyTiming = document.querySelector("#weekly_timing");
var bannedSiteDiv = document.querySelector("#banned-site-div");
var bannedSiteButton = document.querySelector("#banned-site-button");
// var bannedSiteDivHTML = document.getElementById("banned-site-div").innerHTML;
var bannedSiteCount = document.querySelector("#banned-site-count");

// var cloneDiv = "";
// var count = 1;
bannedYes.addEventListener("change", function () {
    console.log("bannedYes");
    bannedSiteDiv.removeAttribute("disabled");
    // bannedSiteDiv.classList.add("d-inline");
    // bannedSiteDiv.classList.remove("d-none");
    // bannedSiteButton.classList.add("d-flex");
    // bannedSiteCount.value = count;
});
bannedNo.addEventListener("change", function () {
    console.log("bannedNo");
    bannedSiteDiv.setAttribute("disabled", "true");
    // bannedSiteDiv.classList.remove("d-inline");
    // bannedSiteDiv.classList.add("d-none");
    // bannedSiteButton.classList.remove("d-flex");
    // bannedSiteButton.classList.add("d-none");
});
// bannedSiteButton.addEventListener("click", function() {
//     cloneDiv = bannedSiteDiv.children[0].cloneNode(true);
//     console.log(cloneDiv);
//     bannedSiteDiv.appendChild(cloneDiv);
//     count++;
//     bannedSiteCount.value = count;
//     var input = cloneDiv.children[1].children[0];
//     input.value = "";
//     input.setAttribute("name", "banned_site_"+ count);
//     input.setAttribute("id", "banned_site_"+ count);
// });

fullAvailable.addEventListener("click", function () {
    weeklyTiming.classList.add("d-none");
    weeklyTiming.classList.remove("d-inline");
});
noAvailable.addEventListener("click", function () {
    weeklyTiming.classList.add("d-inline");
    weeklyTiming.classList.remove("d-none");
});
