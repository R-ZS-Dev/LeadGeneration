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

function togglediabetes() {
    if ($("#diabetesyes").is(":checked")) {

        $("#diabetes-yes").slideDown();
    } else {
        $("#diabetes-yes").slideUp();
    }
}
togglediabetes();

$("input[name='diabetes']").change(function() {
    togglediabetes();
});

function toggleendocarditis() {
    if ($("#endocarditisyes").is(":checked")) {

        $("#endocarditis-yes").slideDown();
    } else {
        $("#endocarditis-yes").slideUp();
    }
}
toggleendocarditis();

$("input[name='endocarditis']").change(function() {
    toggleendocarditis();
});


function toggleendopulomonary() {
    if ($("#pulomnarytestyes").is(":checked")) {

        $("#pulomonarytest-yes").slideDown();
    } else {
        $("#pulomonarytest-yes").slideUp();
    }
}
toggleendopulomonary();

$("input[name='pulomnary_test']").change(function() {
    toggleendopulomonary();
});

function toggledlco() {
    if ($("#dlcoyes").is(":checked")) {

        $("#dlco-yes").slideDown();
    } else {
        $("#dlco-yes").slideUp();
    }
}
toggledlco();

$("input[name='dlco_test']").change(function() {
    toggledlco();
});


function toggleabg() {
    if ($("#abgyes").is(":checked")) {

        $("#abg-yes").slideDown();
    } else {
        $("#abg-yes").slideUp();
    }
}
toggleabg();

$("input[name='roomair_abg']").change(function() {
    toggleabg();
});

function togglecere() {
    if ($("#cerebrovascularyes").is(":checked")) {

        $("#cerebrovascular-yes").slideDown();
    } else {
        $("#cerebrovascular-yes").slideUp();
    }
}
togglecere();

$("input[name='cerebrovascular']").change(function() {
    togglecere();
});

function toggleprior() {
    if ($("#priorcvayes").is(":checked")) {

        $("#priorcva-yes").slideDown();
    } else {
        $("#priorcva-yes").slideUp();
    }
}
toggleprior();

$("input[name='priorcva']").change(function() {
    toggleprior();
});


function toggleLungDiseaseDetails() {
    let selectedValue = $("#lung_disease").val();
    if (selectedValue === "Mild" || selectedValue === "Moderate" || selectedValue === "Severe") {
        $("#lungdisease-yes").slideDown();
    } else {
        $("#lungdisease-yes").slideUp();
    }
}
toggleLungDiseaseDetails();
$("#lung_disease").change(function () {
    toggleLungDiseaseDetails();
});
