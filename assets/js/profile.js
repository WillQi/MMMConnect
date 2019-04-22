$(document).ready(function () {
    $("#friendRequestForm").submit(function () {
        
        const element = $("#friendRequestButton");

        const friendValue = element.val();
        
        $.ajax({
            url: `${document.location.href}/friend`,
            type: "POST",
            cache: false,
            data: {
                friend: friendValue
            }
        });

        switch (friendValue) {
            case "Cancel Friend Request":
                element.val("Add As Friend");
                element.removeClass("is-danger");
                element.addClass("is-success");
            break;
            case "Add As Friend":
                element.val("Cancel Friend Request");
                element.removeClass("is-success");
                element.addClass("is-danger");
            break;
            case "Remove Friend":
                element.val("Add As Friend");
            break;
        }

        return false;
    });


    $("#postMessage").click(function () {
        $("#postModal").addClass("is-active");
    });

    $("#postModal .modal-background, .is-pulled-right").click(function (e) {
        if (e.target === this) {
            $("#postModal").removeClass("is-active");
        }
    });

    $("li[data-tab]").click(function () {
        const tab = $(this).attr("data-tab");
        
        const currentActiveTabLi = $(document).find("li[class~=\"is-active\"]")
        const currentActiveTab = currentActiveTabLi.attr("data-tab");

        currentActiveTabLi.removeClass("is-active");
        $(this).addClass("is-active");

        $(`div[data-tab="${currentActiveTab}"]`).hide();
        $(`div[data-tab="${tab}"]`).show();
    });

});