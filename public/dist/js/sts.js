function toggleInhib() {
    if ($("#inhibitoryes").is(":checked")) {
        $("#inhibitor-yes").slideDown();
    } else {
        $("#inhibitor-yes").slideUp();
    }
}
toggleInhib();

$("input[name='inhibitor']").change(function () {
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

$("input[name='anticoagulant']").change(function () {
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

$("input[name='glycoprotein']").change(function () {
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

$("input[name='lipid']").change(function () {
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

$("input[name='diabetes']").change(function () {
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

$("input[name='endocarditis']").change(function () {
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

$("input[name='pulomnary_test']").change(function () {
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

$("input[name='dlco_test']").change(function () {
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

$("input[name='roomair_abg']").change(function () {
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

$("input[name='cerebrovascular']").change(function () {
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

$("input[name='priorcva']").change(function () {
    toggleprior();
});
function togglewalkdoneyes() {
    if ($("#walkdoneyes").is(":checked")) {
        $("#walkdone-yes").slideDown();
    } else {
        $("#walkdone-yes").slideUp();
    }
}
togglewalkdoneyes();

$("input[name='walkdone']").change(function () {
    togglewalkdoneyes();
});

/* -------------------------- patient cardic status ------------------------- */
function togglemyocardial() {
    if ($("#myocardialyes").is(":checked")) {
        $("#myocardial-yes").slideDown();
    } else {
        $("#myocardial-yes").slideUp();
    }
}
togglemyocardial();

$("input[name='myocardial']").change(function () {
    togglemyocardial();
});

function toggleheartfail2w() {
    if ($("#heartfail2wyes").is(":checked")) {
        $("#heartfail2w-yes").slideDown();
    } else {
        $("#heartfail2w-yes").slideUp();
    }
}
toggleheartfail2w();

$("input[name='heartfail2w']").change(function () {
    toggleheartfail2w();
});

function togglearrhythmia() {
    if ($("#arrhythmiayes").is(":checked")) {
        $("#arrhythmia-yes").slideDown();
    } else {
        $("#arrhythmia-yes").slideUp();
    }
}
togglearrhythmia();

$("input[name='arrhythmia']").change(function () {
    togglearrhythmia();
});

function toggleatrialfib() {
    if ($("#atrialfibyes").is(":checked")) {
        $("#atrialfib-yes").slideDown();
    } else {
        $("#atrialfib-yes").slideUp();
    }
}
toggleatrialfib();

$("input[name='atrialfib']").change(function () {
    toggleatrialfib();
});

/* -------------------------- hemodynamics function ------------------------- */

function togglecardiaccatheter() {
    if ($("#cardiac_catheteryes").is(":checked")) {
        $("#cardiac_catheter-yes").slideDown();
    } else {
        $("#cardiac_catheter-yes").slideUp();
    }
}
togglecardiaccatheter();

$("input[name='cardiac_catheter']").change(function () {
    togglecardiaccatheter();
});

function togglecoronaryKnwn() {
    if ($("#coronaryKnwnyes").is(":checked")) {
        $("#coronaryKnwn-yes").slideDown();
    } else {
        $("#coronaryKnwn-yes").slideUp();
    }
}
togglecoronaryKnwn();

$("input[name='coronaryKnwn']").change(function () {
    togglecoronaryKnwn();
});

function togglesyntax() {
    if ($("#syntax_scoreyes").is(":checked")) {
        $("#syntax_score-yes").slideDown();
    } else {
        $("#syntax_score-yes").slideUp();
    }
}
togglesyntax();

$("input[name='syntax_score']").change(function () {
    togglesyntax();
});

function togglestress() {
    if ($("#stress_scoreyes").is(":checked")) {
        $("#stress_score-yes").slideDown();
    } else {
        $("#stress_score-yes").slideUp();
    }
}
togglestress();

$("input[name='stress_score']").change(function () {
    togglestress();
});

$("#diseaseVessel").change(function () {
    var selectedValue = $(this).val();
    if (
        selectedValue === "One" ||
        selectedValue === "Two" ||
        selectedValue === "Three"
    ) {
        if (selectedValue === "One") {
            $("#diseaseVessel-yes, #oneorgreater").slideDown();
        } else if (selectedValue === "Two") {
            $("#twoorgreater").slideDown();
        } else if (selectedValue === "Three") {
            $(
                "#diseaseVessel-yes, #oneorgreater, #twoorgreater, #three"
            ).slideDown();
        } else {
            $("#diseaseVessel-yes").slideUp();
            $("#oneorgreater").slideUp();
            $("#twoorgreater").slideUp();
            $("#three").slideDown();
        }
    }
});

$("#cvd_stenosis").change(function () {
    var selectedValue = $(this).val();
    if (selectedValue === "Both") {
        $("#hiddenDiv").slideDown();
        $("#hiddenleftDiv").slideDown();
    } else if (selectedValue === "Right") {
        $("#hiddenDiv").slideDown();
        $("#hiddenleftDiv").slideUp();
    } else if (selectedValue === "Left") {
        $("#hiddenleftDiv").slideDown();
        $("#hiddenDiv").slideUp();
    } else {
        $("#hiddenDiv").slideUp();
        $("#hiddenleftDiv").slideUp();
    }
});

function toggleLungDiseaseDetails() {
    let selectedValue = $("#lung_disease").val();
    if (
        selectedValue === "Mild" ||
        selectedValue === "Moderate" ||
        selectedValue === "Severe"
    ) {
        $("#lungdisease-yes").slideDown();
    } else {
        $("#lungdisease-yes").slideUp();
    }
}
toggleLungDiseaseDetails();
$("#lung_disease").change(function () {
    toggleLungDiseaseDetails();
});
