$(document).on("change", ".cb", function () {
    ShowAvailableProducts();
    ShowAvailableFilters();
});

function ShowAvailableProducts() {
    var selectedOptions = GetSelectedCBValues();
    console.log(selectedOptions);
    $('.produkt_gruppe_div').each(function (k, div) {
        var divBrand = $(div).data("brand_name");
        var divScreen = $(div).data("money");
        if (selectedOptions.Screen.length >= 1 && selectedOptions.Brand.length >= 1) {
            console.log("going Insde");
            if (selectedOptions.Screen == divScreen && selectedOptions.Brand == divBrand) {
                console.log("Found");
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }

        } else if (selectedOptions.Screen.length >= 1) {
            if (selectedOptions.Screen == divScreen) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        } else if (selectedOptions.Brand.length >= 1) {
            if (selectedOptions.Brand == divBrand) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        } else {
            ShowAllProducts();
        }
    });
}

function ShowHideProductDiv(div, show, hide) {
    if (show) $(div).show();
    if (hide) $(div).hide();

}

function ShowAllProducts() {
    $('.produkt_gruppe_div').show();
}

function GetSelectedCBValues() {
    var selectedOptions = {};
    selectedOptions.Screen = $('input[name="screen_group[]"]:checked').map(function () {
        return this.value;
    }).get();
    selectedOptions.Brand = $('input[name="brand_group[]"]:checked').map(function () {
        return this.value;
    }).get();

    return selectedOptions;
}

function ShowAvailableFilters() {
    var availableScreens = new Array();
    var availableBrands = new Array();
    $('.produkt_gruppe_div:visible').each(function (k, div) {
        var divBrand = $(div).data("brand_name");
        var divScreen = $(div).data("money");
        if ($.inArray(divBrand, availableBrands) == -1) {
            availableBrands.push(divBrand);
        }
        if ($.inArray(divScreen, availableScreens) == -1) {
            availableScreens.push(divScreen);
        }
    });
    if (availableBrands.length >= 1) {
        $('input[name="brand_group[]"]').each(function () {
            if ($.inArray($(this).val(), availableBrands) == -1) {
                $(this).attr("disabled", true);
            } else {
                $(this).removeAttr("disabled");
            }
        });
    }
}