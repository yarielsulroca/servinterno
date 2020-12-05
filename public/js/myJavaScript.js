/* affix the navbar after scroll below header */
$('nav').affix({
    offset: {
        top: $('#services').offset().top
    }
});

var $inputs = $('#SignupForm').find('table').children().find(':input[type="text"]') //INPUTS
var $selects = $('#SignupForm').find('table').children().find('select') //SELECTS

$inputs.each(function(index, element) {
    if ($(element).val().length <= 0) {
        $(element).css("border", "solid 2px #FA5858");
    }
});

$selects.each(function(index, element) {
    if ( $(element).val() ==0) {
        $(element).css("border", "solid 2px #FA5858");
    }
});