$(document).ready(function () {
    //when the icon in the navbar is clicked, the menu is shown
    //we get an animation sliding the menu right
    $("#icon").click(function () {
        $(".menu").show("slide", { direction: "right" }, 400);
    });
    //.focusSet is the navbar, so if the user clicks the navbar the menu closes
    $(".focusSet").click(function () {
        $(".first-menu").removeClass("d-none");
        $(".employeeList").addClass("d-none");
        $(".clientList").addClass("d-none");
        $(".employeeList").attr("style", "display: none");
        $(".clientList").attr("style", "display: none");

        $(".menu").hide("slide", { direction: "right" }, 400);
    });

    //when user clicks in the li manage list of clients
    $(".client").click(function () {
        $(".first-menu").addClass("d-none");
        $(".clientList").removeClass("d-none");
        $(".clientList").show(
            "slide",
            {
                direction: "right",
            },
            400
        );
    });

    //when the user clicks the li manage list of employeed
    $(".employee").click(function () {
        $(".first-menu").addClass("d-none");
        $(".employeeList").removeClass("d-none");
        $(".employeeList").show(
            "slide",
            {
                direction: "right",
            },
            400
        );
    });
});
