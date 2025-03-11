function toggleIfYesDiv() {
    if ($("#robot_yes").is(":checked")) {
        $("#robot-use").slideDown();
    } else {
        $("#robot-use").slideUp();
    }
}
toggleIfYesDiv();
$("input[name='robot_use']").change(function () {
    toggleIfYesDiv();
});
function toggleArrest() {
    if ($("#arrest_yes").is(":checked")) {
        $("#arrest").slideDown(500);
    } else {
        $("#arrest").slideUp(500);
    }
}
toggleArrest();
$("input[name='circular_arrest']").change(function () {
    toggleArrest();
});
function togglePerfus() {
    if ($("#withyes").is(":checked")) {
        $("#cerebral-perfus").slideDown(500);
    } else {
        $("#cerebral-perfus").slideUp(500);
    }
}
togglePerfus();
$("input[name='arrest_with_cerebral']").change(function () {
    togglePerfus();
});
function toggleAscend() {
    if ($("#ascesnding_yes").is(":checked")) {
        $("#ascending-yes").slideDown(500);
    } else {
        $("#ascending-yes").slideUp(500);
    }
}
toggleAscend();
$("input[name='ascesnding']").change(function () {
    toggleAscend();
});
function toggleCombine() {
    if ($("#com_unplan").is(":checked")) {
        $("#com-unplan").slideDown(500);
    } else {
        $("#com-unplan").slideUp(500);
    }
}
toggleCombine();
$("input[name='com_plan']").change(function () {
    toggleCombine();
});
function toggletee() {
    if ($("#intraoptee_yes").is(":checked")) {
        $("#tee-yes").slideDown(500);
    } else {
        $("#tee-yes").slideUp(500);
    }
}
toggletee();
$("input[name='intraop_tee']").change(function () {
    toggletee();
});
function toggleIntra() {
    if ($("#intraop_no").is(":checked")) {
        $("#intrapo-no").slideDown(500);
    } else {
        $("#intrapo-no").slideUp(500);
    }
}
toggleIntra();
$("input[name='intraop']").change(function () {
    toggleIntra();
});
function toggleIntraBlood() {
    if ($("#intraoppro_yes").is(":checked")) {
        $("#intrapo-blood").slideDown(500);
    } else {
        $("#intrapo-blood").slideUp(500);
    }
}
toggleIntraBlood();
$("input[name='intraoppro']").change(function () {
    toggleIntraBlood();
});
function togglecardiacpci() {
    if ($("#cardiacpci_yes").is(":checked")) {
        $("#cardiac-pci").slideDown(500);
    } else {
        $("#cardiac-pci").slideUp(500);
    }
}
togglecardiacpci();
$("input[name='cardiac_pci']").change(function () {
    togglecardiacpci();
});

const selectElement = document.getElementById("cpb_utilize_select");
const combinationDetails = document.getElementById("if-combine");
const combinationMulti = document.getElementById("if-combine-full");
const selectElmt = document.getElementById('aortic_occl_select');
const additionalDetails = document.getElementById('not-none');
const selectcardio = document.getElementById('select-cardio');
const cardioDetails = document.getElementById('cardio-not-none');

selectElement.addEventListener("change", function () {
    if (this.value === "Combination") {
        $(combinationDetails).slideDown(500);
        $(combinationMulti).slideDown(500);
    }else if(this.value === "Full") {
        $(combinationDetails).slideUp(500);
        $(combinationMulti).slideDown(500);
    }
     else {
        $(combinationDetails).slideUp(500);
        $(combinationMulti).slideUp(500);

    }
});

selectElmt.addEventListener('change', function() {
    if (this.value === ("None")) {
        $(additionalDetails).slideUp(500);
    } else {
        $(additionalDetails).slideDown(500);
    }
});

selectcardio.addEventListener('change', function() {
    if (this.value.startsWith("None")) {
        $(cardioDetails).slideUp(500);
    } else {
        $(cardioDetails).slideDown(500);
    }
});
