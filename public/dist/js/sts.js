function toggleInhib() {
    if ($("#inhibitoryes").is(":checked")) {

        $("#inhibitor-yes").slideDown();
    } else {
        $("#inhibitor-yes").slideUp();
    }
}
toggleInhib();

$("input[name='inhibitor']").change(function() {
    toggleInhib();
});

function toggleAntico() {
    if ($("#anticoyes").is(":checked")) {

        $("#antico-yes").slideDown();
    } else {
        $("#antico-yes").slideUp();
    }
}
toggleAntico();

$("input[name='anticoagulant']").change(function() {
    toggleAntico();
});

function toggleGlyco() {
    if ($("#glycoyes").is(":checked")) {

        $("#glyco-yes").slideDown();
    } else {
        $("#glyco-yes").slideUp();
    }
}
toggleGlyco();

$("input[name='glycoprotein']").change(function() {
    toggleGlyco();
});

function togglelipid() {
    if ($("#lipidyes").is(":checked")) {

        $("#lipid-yes").slideDown();
    } else {
        $("#lipid-yes").slideUp();
    }
}
togglelipid();

$("input[name='lipid']").change(function() {
    togglelipid();
});

