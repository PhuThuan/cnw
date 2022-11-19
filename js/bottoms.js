$(document).on("change", ".cb", function () {
    ShowAvailableProducts();
    ShowAvailableFilters();
});

function ShowAvailableProducts() {
    var selectedOptions = GetSelectedCBValues();
    console.log(selectedOptions);
    $('.produkt_gruppe_div').each(function (k, div) {
        var divBrand2 = $(div).data("brand_name2");
        var divBrand = $(div).data("brand_name");
        var divBrand1 = $(div).data("brand_name1");
        var divScreen = $(div).data("money");
        //4
        if (selectedOptions.Screen.length >= 1  && selectedOptions.Brand2.length >= 1 && selectedOptions.Brand.length >= 1&& selectedOptions.Brand1.length >= 1) {
            console.log("going Insde");
            if (selectedOptions.Screen == divScreen  && selectedOptions.Brand2 == divBrand2 && selectedOptions.Brand == divBrand
                && selectedOptions.Brand1 == divBrand1) {
                console.log("Found");
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
//1
        }  
        //3
        else if (selectedOptions.Screen.length >= 1 && selectedOptions.Brand1.length >= 1  && selectedOptions.Brand2.length >= 1) {
            if (selectedOptions.Screen == divScreen && selectedOptions.Brand1 == divBrand1 && selectedOptions.Brand2 == divBrand2) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        }
        else if (selectedOptions.Screen.length >= 1 && selectedOptions.Brand.length >= 1  && selectedOptions.Brand2.length >= 1) {
            if (selectedOptions.Screen == divScreen && selectedOptions.Brand == divBrand && selectedOptions.Brand2 == divBrand2) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        }
        else if (selectedOptions.Screen.length >= 1 && selectedOptions.Brand.length >= 1  && selectedOptions.Brand1.length >= 1) {
            if (selectedOptions.Screen == divScreen && selectedOptions.Brand == divBrand && selectedOptions.Brand1 == divBrand1) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        }
        else if (selectedOptions.Brand.length >= 1 && selectedOptions.Brand1.length >= 1  && selectedOptions.Brand2.length >= 1) {
            if (selectedOptions.Brand == divBrand && selectedOptions.Brand1 == divBrand1 && selectedOptions.Brand2 == divBrand2) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        }
        //2
        else if (selectedOptions.Screen.length >= 1 && selectedOptions.Brand1.length >= 1  ) {
            if (selectedOptions.Screen == divScreen && selectedOptions.Brand1 == divBrand1 ) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        }
        else if (selectedOptions.Screen.length >= 1 && selectedOptions.Brand.length >= 1  ) {
            if (selectedOptions.Screen == divScreen && selectedOptions.Brand == divBrand ) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        }
        else if (selectedOptions.Screen.length >= 1 && selectedOptions.Brand2.length >= 1  ) {
            if (selectedOptions.Screen == divScreen && selectedOptions.Brand2 == divBrand2 ) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        }
        else if (selectedOptions.Brand.length >= 1 && selectedOptions.Brand2.length >= 1  ) {
            if (selectedOptions.Brand == divBrand && selectedOptions.Brand2 == divBrand2 ) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        }
        else if (selectedOptions.Brand.length >= 1 && selectedOptions.Brand1.length >= 1  ) {
            if (selectedOptions.Brand == divBrand && selectedOptions.Brand1 == divBrand1 ) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        }
        else if (selectedOptions.Brand2.length >= 1 && selectedOptions.Brand1.length >= 1  ) {
            if (selectedOptions.Brand2 == divBrand2 && selectedOptions.Brand1 == divBrand1 ) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        }
        else if (selectedOptions.Screen.length >= 1) {
            if (selectedOptions.Screen == divScreen) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }

        } else if (selectedOptions.Brand2.length >= 1) {
            if (selectedOptions.Brand2 == divBrand2) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        } 
        else if (selectedOptions.Brand.length >= 1) {
            if (selectedOptions.Brand == divBrand) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        } 
        else if (selectedOptions.Brand1.length >= 1) {
            if (selectedOptions.Brand1 == divBrand1) {
                ShowHideProductDiv(div, true, false);
            } else {
                ShowHideProductDiv(div, false, true);
            }
        }





        else {
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
    selectedOptions.Brand2 = $('input[name="brand_group2[]"]:checked').map(function () {
        return this.value;
    }).get();
    selectedOptions.Brand = $('input[name="brand_group[]"]:checked').map(function () {
        return this.value;
    }).get();
    selectedOptions.Brand1 = $('input[name="brand_group1[]"]:checked').map(function () {
        return this.value;
    }).get();

    return selectedOptions;
}

function ShowAvailableFilters() {
    var availableScreens = new Array();
    var availableBrands2 = new Array();
    var availableBrands = new Array();
    var availableBrands1 = new Array();
    $('.produkt_gruppe_div:visible').each(function (k, div) {
        var divBrand=$(div).data("brand_name");
        var divBrand1=$(div).data("brand_name1");
        var divBrand2 = $(div).data("brand_name2");
        var divScreen = $(div).data("money");
        if ($.inArray(divScreen, availableScreens) == -1) {
            availableScreens.push(divScreen);
        }
        if ($.inArray(divBrand2, availableBrands2) == -1) {
            availableBrands2.push(divBrand2);
        }
        if ($.inArray(divBrand, availableBrands) == -1) {
            availableBrands.push(divBrand);
        }
        if ($.inArray(divBrand1, availableBrands1) == -1) {
            availableBrands1.push(divBrand1);
        }
    });
//giam gia
    if (availableBrands1.length >= 1) {
        $('input[name="brand_group1[]"]').each(function () {
            if ($.inArray($(this).val(), availableBrands1) == -1) {
                $(this).attr("disabled", true);
            } else {
                $(this).removeAttr("disabled");
            }
        });
    }

    //loai
    if (availableBrands.length >= 1) {
        $('input[name="brand_group[]"]').each(function () {
            if ($.inArray($(this).val(), availableBrands) == -1) {
                $(this).attr("disabled", true);
            } else {
                $(this).removeAttr("disabled");
            }
        });
    }
    //noi bat
    if (availableBrands2.length >= 1) {
        $('input[name="brand_group2[]"]').each(function () {
            if ($.inArray($(this).val(), availableBrands2) == -1) {
                $(this).attr("disabled", true);
            } else {
                $(this).removeAttr("disabled");
            }
        });
    }
}