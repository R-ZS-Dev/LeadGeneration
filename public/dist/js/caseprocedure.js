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
/* -------------------------- --------------------- ------------------------- */

function togglevalvepro() {
    if ($("#valve_pro_yes").is(":checked")) {
        $("#valve-pro-yes").slideDown(500);
    } else {
        $("#valve-pro-yes").slideUp(500);
    }
}
togglevalvepro();
$("input[name='valve_pro']").change(function () {
    togglevalvepro();
});

/* ---------------------- ---------------------------- ---------------------- */

function toggleExpdev() {
    if ($("#explant_device_yes").is(":checked")) {
        $("#explant-device-yes").slideDown(500);
    } else {
        $("#explant-device-yes").slideUp(500);
    }
}
toggleExpdev();
$("input[name='explant_device']").change(function () {
    toggleExpdev();
});
/* --------- ------------------------------------------------------ --------- */
function toggleSecExpdev() {
    if ($("#second_valve_yes").is(":checked")) {
        $("#second-valve-yes").slideDown(500);
    } else {
        $("#second-valve-yes").slideUp(500);
    }
}
toggleSecExpdev();
$("input[name='second_valve']").change(function () {
    toggleSecExpdev();
});

/* ---------- ----------------------------------------------------- --------- */
function toggleSecExpdevknow() {
    if ($("#secexplant_devic_yes").is(":checked")) {
        $("#secexplant-devic-yes").slideDown(500);
    } else {
        $("#secexplant-devic-yes").slideUp(500);
    }
}
toggleSecExpdevknow();
$("input[name='secexplant_devic']").change(function () {
    toggleSecExpdevknow();
});

/* ---- ---------------------------------------------------------------- ---- */

function togglePerform() {
    if ($("#perform_yes").is(":checked")) {
        $("#perform-yes").slideDown(500);
    } else {
        $("#perform-yes").slideUp(500);
    }
}
togglePerform();
$("input[name='perform']").change(function () {
    togglePerform();
});

/* ------- ---------------------------------------------------------- ------- */

function toggletranscat() {
    if ($("#transcat_yes").is(":checked")) {
        $("#transcat-yes").slideDown(500);
    } else {
        $("#transcat-yes").slideUp(500);
    }
}
toggletranscat();
$("input[name='transcat']").change(function () {
    toggletranscat();
});


/* ------------- ---------------------------------------------- ------------- */
function toggletransAnnlr() {
    if ($("#annular_yes").is(":checked")) {
        $("#annular-yes").slideDown(500);
    } else {
        $("#annular-yes").slideUp(500);
    }
}
toggletransAnnlr();
$("input[name='annular']").change(function () {
    toggletransAnnlr();
});

/* -------------------- --------------------------------- ------------------- */
function togglePerformed() {
    if ($("#performed_yes").is(":checked")) {
        $("#mitral-performed").slideDown(500);
    } else {
        $("#mitral-performed").slideUp(500);
    }
}
togglePerformed();
$("input[name='mitral_performed']").change(function () {
    togglePerformed();
});
/* ------------------------------- ----------- ------------------------------ */
function toggleresect() {
    if ($("#resection_yes").is(":checked")) {
        $("#resection-yes").slideDown(500);
    } else {
        $("#resection-yes").slideUp(500);
    }
}
toggleresect();
$("input[name='resection']").change(function () {
    toggleresect();
});
/* ----------------------------------- --- ---------------------------------- */

function toggleneochords() {
    if ($("#neochords_yes").is(":checked")) {
        $("#neochords-yes").slideDown(500);
    } else {
        $("#neochords-yes").slideUp(500);
    }
}
toggleneochords();
$("input[name='neochords']").change(function () {
    toggleneochords();
});

/* ----------------------------------- --- ---------------------------------- */

function togglemitralImplnt() {
    if ($("#mitral_implnt_yes").is(":checked")) {
        $("#mitral-implnt-yes").slideDown(500);
    } else {
        $("#mitral-implnt-yes").slideUp(500);
    }
}
togglemitralImplnt();
$("input[name='mitral_implnt']").change(function () {
    togglemitralImplnt();
});

/* ----------------------------------- --- ---------------------------------- */

function togglemTriscud() {
    if ($("#tricuspidper_yes").is(":checked")) {
        $("#tricuspidper-yes").slideDown(500);
    } else {
        $("#tricuspidper-yes").slideUp(500);
    }
}
togglemTriscud();
$("input[name='tricuspidper']").change(function () {
    togglemTriscud();
});

/* ----------------------------------- --- ---------------------------------- */

function togglemTriscudimp() {
    if ($("#tricuspidimplnt_yes").is(":checked")) {
        $("#tricuspidimplnt-yes").slideDown(500);
    } else {
        $("#tricuspidimplnt-yes").slideUp(500);
    }
}
togglemTriscudimp();
$("input[name='tricuspidimplnt']").change(function () {
    togglemTriscudimp();
});

/* ----------------------------------- --- ---------------------------------- */

function togglepulmonicper() {
    if ($("#pulmonicper_yes").is(":checked")) {
        $("#pulmonicper-yes").slideDown(500);
    } else {
        $("#pulmonicper-yes").slideUp(500);
    }
}
togglepulmonicper();
$("input[name='pulmonicper']").change(function () {
    togglepulmonicper();
});

/* ----------------------------------- --- ---------------------------------- */

function togglepulmonicperimp() {
    if ($("#pulomnicimplnt_yes").is(":checked")) {
        $("#pulomnicimplnt-yes").slideDown(500);
    } else {
        $("#pulomnicimplnt-yes").slideUp(500);
    }
}
togglepulmonicperimp();
$("input[name='pulomnicimplnt']").change(function () {
    togglepulmonicperimp();
});

const selectElement = document.getElementById("cpb_utilize_select");
const combinationDetails = document.getElementById("if-combine");
const combinationMulti = document.getElementById("if-combine-full");
const selectElmt = document.getElementById('aortic_occl_select');
const additionalDetails = document.getElementById('not-none');
const selectcardio = document.getElementById('select-cardio');
const cardioDetails = document.getElementById('cardio-not-none');

const aorticProElement = document.getElementById("aortic-procedure");
const aorticProDetail = document.getElementById("aortic_replace");
const aorticProrecons = document.getElementById("aortic_reconst");

const mitralProElement = document.getElementById("mitral-procs");
const mitralProDetail = document.getElementById("mitral-replace");
const mitralProrecons = document.getElementById("mitral-repair");

const tricuspidProElement = document.getElementById("tricuspid-procs");
const tricuspidProDetail = document.getElementById("tricuspid-replace");
const tricuspidProrecons = document.getElementById("tricuspid-repair");


const pulmonicProElement = document.getElementById("pulmonic-procs");
const pulmonicProDetail = document.getElementById("pulmonic-replace");


pulmonicProElement.addEventListener("change", function () {
    if (this.value === "Replacement") {
        $(pulmonicProDetail).slideDown(500);
    }else {
        $(pulmonicProDetail).slideUp(500);
    }
});

tricuspidProElement.addEventListener("change", function () {
    if (this.value === "Replacement") {
        $(tricuspidProDetail).slideUp(500);
        $(tricuspidProrecons).slideDown(500);
    } else if (this.value === "Reconstruction with Annuloplasty" || this.value === "Annuloplasty Only") {
        $(tricuspidProDetail).slideDown(500);
        $(tricuspidProrecons).slideUp(500);
    }else {
        $(tricuspidProDetail).slideUp(500);
        $(tricuspidProrecons).slideUp(500);

    }
});

mitralProElement.addEventListener("change", function () {
    if (this.value === "Replacement") {
        $(mitralProDetail).slideDown(500);
        $(mitralProrecons).slideUp(500);
    }else if(this.value === "Repair") {
        $(mitralProDetail).slideUp(500);
        $(mitralProrecons).slideDown(500);
    }else {
        $(mitralProDetail).slideUp(500);
        $(mitralProrecons).slideUp(500);

    }
});

aorticProElement.addEventListener("change", function () {
    if (this.value === "Replacement") {
        $(aorticProDetail).slideDown(500);
        $(aorticProrecons).slideUp(500);
    }else if(this.value === "Repair / Reconstruction") {
        $(aorticProDetail).slideUp(500);
        $(aorticProrecons).slideDown(500);
    }else {
        $(aorticProDetail).slideUp(500);
        $(aorticProrecons).slideUp(500);

    }
});

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

