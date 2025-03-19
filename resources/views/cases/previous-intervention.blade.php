@extends('sitemaster.master-layout')
@section('title', 'Case general event')
@section('content')
<div class="container-fluid">
    <div class="row">
        <form id="atrial-fibrillationForm" action="{{ route('add-previous-intervention') }}" method="post">
            @csrf
            <div class="col-lg-12 form-group mb-3">
                <label for="pat_id">Select Patient</label>
                <select name="pat_id" id="pat_id" class="form-select" required>
                    <option value="">Select Patient</option>
                    @foreach ($patients as $item)
                    <option value="{{ $item->pat_id }}">{{ $item->first_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row form-group mb-3">
                <div class="col-lg-6 col-md-12">
                    <label for="" class="mb-2"> Previous CV Interventions </label>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label>
                                <input type="radio" name="pcv_in" value="1" id="pcv_in_yes" />
                                <span>Yes</span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label>
                                <input type="radio" name="pcv_in" value="0" id="pcv_in_no" />
                                <span>No</span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label>
                                <input type="radio" name="pcv_in" value="2" id="pcv_in_uk" checked />
                                <span>Unknown</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="pcvi-use" style="display: none;">
                <div class="col-lg-12">
                    <div class="title-box mb-3">
                        <span class="title-label">If yes</span>
                        <div class="row form-group mb-2">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <label for=""> Previous coronary artery bypass (CAB) </label>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>
                                                    <input type="radio" name="pcab" value="1" id="pcabyes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <label>
                                                    <input type="radio" name="pcab" value="0" id="pcabno" checked />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <label for=""> Previous valve procedure </label>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>
                                                    <input type="radio" name="pv_pro" value="1" id="pv_proyes" />
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <label>
                                                    <input type="radio" name="pv_pro" value="0" id="pv_prono" checked />
                                                    <span>No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="pcpro-use" style="display: none;">
                            <div class="col-lg-12">
                                <div class="title-box mb-3">
                                    <span class="title-label">If yes</span>
                                    <div class="row">
                                        <div class="col-lg-6 form-group mb-3">
                                            <label for="">Previous procedure 1</label>
                                            <select name="pre_pro_1" id="" class="form-select" >
                                                <option value="">Select Procedure</option>
                                                <option value="No additional valve procedure(s)">No additional valve procedure(s)</option>
                                                <option value="Aortic valve balloon valvotomy/valvuloplasty">Aortic valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Aortic valve repair, surgical">Aortic valve repair, surgical</option>
                                                <option value="Aortic valve replacement, surgical">Aortic valve replacement, surgical</option>
                                                <option value="Aortic valve replacement, transcatheter">Aortic valve replacement, transcatheter</option>
                                                <option value="Mitral valve balloon valvotomy/valvuloplasty">Mitral valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Mitral valve commissurotomy, surgical">Mitral valve commissurotomy, surgical</option>
                                                <option value="Mitral valve repair, percutaneous">Mitral valve repair, percutaneous</option>
                                                <option value="Mitral valve repair, surgical">Mitral valve repair, surgical</option>
                                                <option value="Mitral valve replacement, surgical">Mitral valve replacement, surgical</option>
                                                <option value="Mitral valve replacement, transcatheter">Mitral valve replacement, transcatheter</option>
                                                <option value="Tricuspid valve balloon valvotomy/valvuloplasty">Tricuspid valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Tricuspid valve repair, percutaneous">Tricuspid valve repair, percutaneous</option>
                                                <option value="Tricuspid valve repair, surgical">Tricuspid valve repair, surgical</option>
                                                <option value="Tricuspid valve replacement, surgical">Tricuspid valve replacement, surgical</option>
                                                <option value="Tricuspid valve replacement, transcatheter">Tricuspid valve replacement, transcatheter</option>
                                                <option value="Tricuspid valvectomy">Tricuspid valvectomy</option>
                                                <option value="Pulmonary valve balloon valvotomy/valvuloplasty">Pulmonary valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Pulmonary valve repair, surgical">Pulmonary valve repair, surgical</option>
                                                <option value="Pulmonary valve replacement, surgical">Pulmonary valve replacement, surgical</option>
                                                <option value="Pulmonary valve replacement, transcatheter">Pulmonary valve replacement, transcatheter</option>
                                                <option value="Pulmonary valvectomy">Pulmonary valvectomy</option>
                                                <option value="Other valve procedure">Other valve procedure</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 form-group mb-3">
                                            <label for="">Previous procedure 2</label>
                                            <select name="pre_pro_2" id="" class="form-select" >
                                                <option value="">Select Procedure</option>
                                                <option value="No additional valve procedure(s)">No additional valve procedure(s)</option>
                                                <option value="Aortic valve balloon valvotomy/valvuloplasty">Aortic valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Aortic valve repair, surgical">Aortic valve repair, surgical</option>
                                                <option value="Aortic valve replacement, surgical">Aortic valve replacement, surgical</option>
                                                <option value="Aortic valve replacement, transcatheter">Aortic valve replacement, transcatheter</option>
                                                <option value="Mitral valve balloon valvotomy/valvuloplasty">Mitral valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Mitral valve commissurotomy, surgical">Mitral valve commissurotomy, surgical</option>
                                                <option value="Mitral valve repair, percutaneous">Mitral valve repair, percutaneous</option>
                                                <option value="Mitral valve repair, surgical">Mitral valve repair, surgical</option>
                                                <option value="Mitral valve replacement, surgical">Mitral valve replacement, surgical</option>
                                                <option value="Mitral valve replacement, transcatheter">Mitral valve replacement, transcatheter</option>
                                                <option value="Tricuspid valve balloon valvotomy/valvuloplasty">Tricuspid valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Tricuspid valve repair, percutaneous">Tricuspid valve repair, percutaneous</option>
                                                <option value="Tricuspid valve repair, surgical">Tricuspid valve repair, surgical</option>
                                                <option value="Tricuspid valve replacement, surgical">Tricuspid valve replacement, surgical</option>
                                                <option value="Tricuspid valve replacement, transcatheter">Tricuspid valve replacement, transcatheter</option>
                                                <option value="Tricuspid valvectomy">Tricuspid valvectomy</option>
                                                <option value="Pulmonary valve balloon valvotomy/valvuloplasty">Pulmonary valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Pulmonary valve repair, surgical">Pulmonary valve repair, surgical</option>
                                                <option value="Pulmonary valve replacement, surgical">Pulmonary valve replacement, surgical</option>
                                                <option value="Pulmonary valve replacement, transcatheter">Pulmonary valve replacement, transcatheter</option>
                                                <option value="Pulmonary valvectomy">Pulmonary valvectomy</option>
                                                <option value="Other valve procedure">Other valve procedure</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 form-group mb-3">
                                            <label for="">Previous procedure 3</label>
                                            <select name="pre_pro_3" id="" class="form-select" >
                                                <option value="">Select Procedure</option>
                                                <option value="No additional valve procedure(s)">No additional valve procedure(s)</option>
                                                <option value="Aortic valve balloon valvotomy/valvuloplasty">Aortic valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Aortic valve repair, surgical">Aortic valve repair, surgical</option>
                                                <option value="Aortic valve replacement, surgical">Aortic valve replacement, surgical</option>
                                                <option value="Aortic valve replacement, transcatheter">Aortic valve replacement, transcatheter</option>
                                                <option value="Mitral valve balloon valvotomy/valvuloplasty">Mitral valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Mitral valve commissurotomy, surgical">Mitral valve commissurotomy, surgical</option>
                                                <option value="Mitral valve repair, percutaneous">Mitral valve repair, percutaneous</option>
                                                <option value="Mitral valve repair, surgical">Mitral valve repair, surgical</option>
                                                <option value="Mitral valve replacement, surgical">Mitral valve replacement, surgical</option>
                                                <option value="Mitral valve replacement, transcatheter">Mitral valve replacement, transcatheter</option>
                                                <option value="Tricuspid valve balloon valvotomy/valvuloplasty">Tricuspid valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Tricuspid valve repair, percutaneous">Tricuspid valve repair, percutaneous</option>
                                                <option value="Tricuspid valve repair, surgical">Tricuspid valve repair, surgical</option>
                                                <option value="Tricuspid valve replacement, surgical">Tricuspid valve replacement, surgical</option>
                                                <option value="Tricuspid valve replacement, transcatheter">Tricuspid valve replacement, transcatheter</option>
                                                <option value="Tricuspid valvectomy">Tricuspid valvectomy</option>
                                                <option value="Pulmonary valve balloon valvotomy/valvuloplasty">Pulmonary valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Pulmonary valve repair, surgical">Pulmonary valve repair, surgical</option>
                                                <option value="Pulmonary valve replacement, surgical">Pulmonary valve replacement, surgical</option>
                                                <option value="Pulmonary valve replacement, transcatheter">Pulmonary valve replacement, transcatheter</option>
                                                <option value="Pulmonary valvectomy">Pulmonary valvectomy</option>
                                                <option value="Other valve procedure">Other valve procedure</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 form-group mb-3">
                                            <label for="">Previous procedure 4</label>
                                            <select name="pre_pro_4" id="" class="form-select" >
                                                <option value="">Select Procedure</option>
                                                <option value="No additional valve procedure(s)">No additional valve procedure(s)</option>
                                                <option value="Aortic valve balloon valvotomy/valvuloplasty">Aortic valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Aortic valve repair, surgical">Aortic valve repair, surgical</option>
                                                <option value="Aortic valve replacement, surgical">Aortic valve replacement, surgical</option>
                                                <option value="Aortic valve replacement, transcatheter">Aortic valve replacement, transcatheter</option>
                                                <option value="Mitral valve balloon valvotomy/valvuloplasty">Mitral valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Mitral valve commissurotomy, surgical">Mitral valve commissurotomy, surgical</option>
                                                <option value="Mitral valve repair, percutaneous">Mitral valve repair, percutaneous</option>
                                                <option value="Mitral valve repair, surgical">Mitral valve repair, surgical</option>
                                                <option value="Mitral valve replacement, surgical">Mitral valve replacement, surgical</option>
                                                <option value="Mitral valve replacement, transcatheter">Mitral valve replacement, transcatheter</option>
                                                <option value="Tricuspid valve balloon valvotomy/valvuloplasty">Tricuspid valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Tricuspid valve repair, percutaneous">Tricuspid valve repair, percutaneous</option>
                                                <option value="Tricuspid valve repair, surgical">Tricuspid valve repair, surgical</option>
                                                <option value="Tricuspid valve replacement, surgical">Tricuspid valve replacement, surgical</option>
                                                <option value="Tricuspid valve replacement, transcatheter">Tricuspid valve replacement, transcatheter</option>
                                                <option value="Tricuspid valvectomy">Tricuspid valvectomy</option>
                                                <option value="Pulmonary valve balloon valvotomy/valvuloplasty">Pulmonary valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Pulmonary valve repair, surgical">Pulmonary valve repair, surgical</option>
                                                <option value="Pulmonary valve replacement, surgical">Pulmonary valve replacement, surgical</option>
                                                <option value="Pulmonary valve replacement, transcatheter">Pulmonary valve replacement, transcatheter</option>
                                                <option value="Pulmonary valvectomy">Pulmonary valvectomy</option>
                                                <option value="Other valve procedure">Other valve procedure</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 form-group mb-3">
                                            <label for="">Previous procedure 5</label>
                                            <select name="pre_pro_5" id="" class="form-select" >
                                                <option value="">Select Procedure</option>
                                                <option value="No additional valve procedure(s)">No additional valve procedure(s)</option>
                                                <option value="Aortic valve balloon valvotomy/valvuloplasty">Aortic valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Aortic valve repair, surgical">Aortic valve repair, surgical</option>
                                                <option value="Aortic valve replacement, surgical">Aortic valve replacement, surgical</option>
                                                <option value="Aortic valve replacement, transcatheter">Aortic valve replacement, transcatheter</option>
                                                <option value="Mitral valve balloon valvotomy/valvuloplasty">Mitral valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Mitral valve commissurotomy, surgical">Mitral valve commissurotomy, surgical</option>
                                                <option value="Mitral valve repair, percutaneous">Mitral valve repair, percutaneous</option>
                                                <option value="Mitral valve repair, surgical">Mitral valve repair, surgical</option>
                                                <option value="Mitral valve replacement, surgical">Mitral valve replacement, surgical</option>
                                                <option value="Mitral valve replacement, transcatheter">Mitral valve replacement, transcatheter</option>
                                                <option value="Tricuspid valve balloon valvotomy/valvuloplasty">Tricuspid valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Tricuspid valve repair, percutaneous">Tricuspid valve repair, percutaneous</option>
                                                <option value="Tricuspid valve repair, surgical">Tricuspid valve repair, surgical</option>
                                                <option value="Tricuspid valve replacement, surgical">Tricuspid valve replacement, surgical</option>
                                                <option value="Tricuspid valve replacement, transcatheter">Tricuspid valve replacement, transcatheter</option>
                                                <option value="Tricuspid valvectomy">Tricuspid valvectomy</option>
                                                <option value="Pulmonary valve balloon valvotomy/valvuloplasty">Pulmonary valve balloon valvotomy/valvuloplasty</option>
                                                <option value="Pulmonary valve repair, surgical">Pulmonary valve repair, surgical</option>
                                                <option value="Pulmonary valve replacement, surgical">Pulmonary valve replacement, surgical</option>
                                                <option value="Pulmonary valve replacement, transcatheter">Pulmonary valve replacement, transcatheter</option>
                                                <option value="Pulmonary valvectomy">Pulmonary valvectomy</option>
                                                <option value="Other valve procedure">Other valve procedure</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group mb-3">
                            <div class="col-lg-6 col-md-12">
                                <label for="" class="mb-2"> Previous PCI </label>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            <input type="radio" name="ppc_i" value="1" id="ppc_i_yes" />
                                            <span>Yes</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label>
                                            <input type="radio" name="ppc_i" value="0" id="ppc_i_no" />
                                            <span>No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="ppci-use" style="display: none;">
                            <div class="col-lg-12">
                                <div class="title-box mb-3">
                                    <span class="title-label">If yes</span>

                                    <div class="row form-group mb-3">
                                        <div class="col-lg-12 col-md-12">
                                            <label for="" class="mb-2"> PCI Performed Within This Episode Of Care </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label>
                                                        <input type="radio" name="pci_care" value="1" id="pci_care_yes" />
                                                        <span>Yes, at this facility</span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>
                                                        <input type="radio" name="pci_care" value="2" id="pci_care_no" />
                                                        <span>Yes, at some other acute care facility</span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>
                                                        <input type="radio" name="pci_care" value="0" id="pci_care_no" />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 form-group mb-3">
                                            <label for="">Indication for Surgery</label>
                                            <select name="ind_sur" id="" class="form-select" >
                                                <option value="">Select PCI</option>
                                                <option value="PCI Complication">PCI Complication</option>
                                                <option value="PCI Failure with Clinical Deterioration">PCI Failure with Clinical Deterioration</option>
                                                <option value="PCI for STEMI, Multivessel disease">PCI for STEMI, Multivessel disease</option>
                                                <option value="PCI Failure without Clinical Deterioration">PCI Failure without Clinical Deterioration</option>
                                                <option value="PCI/Surgery Staged Procedure (not STEMI)">PCI/Surgery Staged Procedure (not STEMI)</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-7">
                                            <label for=""> PCI Stent </label>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>
                                                        <input type="radio" name="pci_s" value="1" id="pci_syes" />
                                                        <span>Yes</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>
                                                        <input type="radio" name="pci_s" value="0" id="pci_sno" checked />
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="pci-use" style="display: none;">
                                        <div class="col-lg-12">
                                            <div class="title-box mb-3">
                                                <span class="title-label">If yes</span>
                                                <div class="row">
                                                    <div class="col-lg-12 form-group mb-3">
                                                        <label for="">Stent Type</label>
                                                        <select name="stype_id" id="" class="form-select" >
                                                            <option value="">Select stent type</option>
                                                            @foreach ($cprocedures as $cprocedure)
                                                            <option value="{{ $cprocedure->casep_id }}">{{ $cprocedure->stent_type }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 form-group mb-3">
                                            <label for="">PCI Interval</label>
                                            <select name="pci_interval" id="" class="form-select" >
                                                <option value="">Select Intervel</option>
                                                <option value="<= 6h Hours">
                                                    <= 6h Hours</option>
                                                <option value="> 6 Hours">> 6 Hours</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group mb-3">
                            <div class="col-lg-6 col-md-12">
                                <label for="" class="mb-2"> Other Previous Cardiac Interventions </label>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>
                                            <input type="radio" name="opci" value="1" id="opci_yes" />
                                            <span>Yes</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label>
                                            <input type="radio" name="opci" value="0" id="opci_no" />
                                            <span>No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="opci-use" style="display: none;">
                            <div class="col-lg-12">
                                <div class="title-box mb-3">
                                    <span class="title-label">If yes</span>
                                    <div class="row">
                                        <div class="col-lg-6 form-group mb-3">
                                            <label for="">Intervention 1</label>
                                            <select name="intervention_1" id="" class="form-select" >
                                                <option value="Select Intervention">Select Intervention</option>
                                                <option value="No additional interventions">No additional interventions</option>
                                                <option value="Ablation, catheter, atrial fibrillation">Ablation, catheter, atrial fibrillation</option>
                                                <option value="Ablation, catheter, other or unknown">Ablation, catheter, other or unknown</option>
                                                <option value="Ablation, catheter, ventricular">Ablation, catheter, ventricular</option>
                                                <option value="Ablation, surgical, atrial fibrillation">Ablation, surgical, atrial fibrillation</option>
                                                <option value="Ablation, surgical, other or unknown">Ablation, surgical, other or unknown</option>
                                                <option value="Aneurysmectomy, LV">Aneurysmectomy, LV</option>
                                                <option value="Aortic procedure, arch">Aortic procedure, arch</option>
                                                <option value="Aortic procedure, ascending">Aortic procedure, ascending</option>
                                                <option value="Aortic procedure, descending">Aortic procedure, descending</option>
                                                <option value="Aortic procedure, root">Aortic procedure, root</option>
                                                <option value="Aortic procedure, thoracoabdominal">Aortic procedure, thoracoabdominal</option>
                                                <option value="Aortic Procedure, TEVAR">Aortic Procedure, TEVAR</option>
                                                <option value="Aortic root procedure, valve sparing">Aortic root procedure, valve sparing</option>
                                                <option value="Atrial appendage obliteration, Left, surgical">Atrial appendage obliteration, Left, surgical</option>
                                                <option value="Atrial appendage obliteration, Left, transcatheter">Atrial appendage obliteration, Left, transcatheter</option>
                                                <option value="Atrial appendage obliteration, Right, surgical">Atrial appendage obliteration, Right, surgical</option>
                                                <option value="Atrial appendage obliteration, Right, transcatheter">Atrial appendage obliteration, Right, transcatheter</option>
                                                <option value="Cardiac Tumor">Cardiac Tumor</option>
                                                <option value="Cardioversion(s)">Cardioversion(s)</option>
                                                <option value="Closure device, atrial septal defect">Closure device, atrial septal defect</option>
                                                <option value="Closure device, ventricular septal defect">Closure device, ventricular septal defect</option>
                                                <option value="Congenital cardiac repair, surgical">Congenital cardiac repair, surgical</option>
                                                <option value="Implantable Cardioverter Defibrillator (ICD) with or without pacer">Implantable Cardioverter Defibrillator (ICD) with or without pacer</option>
                                                <option value="Pacemaker">Pacemaker</option>
                                                <option value="Pericardiectomy">Pericardiectomy</option>
                                                <option value="Pulmonary thrombectomy">Pulmonary thrombectomy</option>
                                                <option value="Total Artificial Heart (TAH)">Total Artificial Heart (TAH)</option>
                                                <option value="Transmyocardial Laser Revascularization (TMR)">Transmyocardial Laser Revascularization (TMR)</option>
                                                <option value="Transplant heart & lung">Transplant heart & lung</option>
                                                <option value="Transplant, heart">Transplant, heart</option>
                                                <option value="Transplant, lung(s)">Transplant, lung(s)</option>
                                                <option value="Ventricular Assist Device (VAD), BIVAD">Ventricular Assist Device (VAD), BIVAD</option>
                                                <option value="Ventricular Assist Device (VAD), left">Ventricular Assist Device (VAD), left</option>
                                                <option value="Ventricular Assist Device (VAD), right">Ventricular Assist Device (VAD), right</option>
                                                <option value="Other Cardiac Intervention (not listed)">Other Cardiac Intervention (not listed)</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 form-group mb-3">
                                            <label for="">Intervention 2</label>
                                            <select name="intervention_2" id="" class="form-select" >
                                                <option value="Select Intervention">Select Intervention</option>
                                                <option value="No additional interventions">No additional interventions</option>
                                                <option value="Ablation, catheter, atrial fibrillation">Ablation, catheter, atrial fibrillation</option>
                                                <option value="Ablation, catheter, other or unknown">Ablation, catheter, other or unknown</option>
                                                <option value="Ablation, catheter, ventricular">Ablation, catheter, ventricular</option>
                                                <option value="Ablation, surgical, atrial fibrillation">Ablation, surgical, atrial fibrillation</option>
                                                <option value="Ablation, surgical, other or unknown">Ablation, surgical, other or unknown</option>
                                                <option value="Aneurysmectomy, LV">Aneurysmectomy, LV</option>
                                                <option value="Aortic procedure, arch">Aortic procedure, arch</option>
                                                <option value="Aortic procedure, ascending">Aortic procedure, ascending</option>
                                                <option value="Aortic procedure, descending">Aortic procedure, descending</option>
                                                <option value="Aortic procedure, root">Aortic procedure, root</option>
                                                <option value="Aortic procedure, thoracoabdominal">Aortic procedure, thoracoabdominal</option>
                                                <option value="Aortic Procedure, TEVAR">Aortic Procedure, TEVAR</option>
                                                <option value="Aortic root procedure, valve sparing">Aortic root procedure, valve sparing</option>
                                                <option value="Atrial appendage obliteration, Left, surgical">Atrial appendage obliteration, Left, surgical</option>
                                                <option value="Atrial appendage obliteration, Left, transcatheter">Atrial appendage obliteration, Left, transcatheter</option>
                                                <option value="Atrial appendage obliteration, Right, surgical">Atrial appendage obliteration, Right, surgical</option>
                                                <option value="Atrial appendage obliteration, Right, transcatheter">Atrial appendage obliteration, Right, transcatheter</option>
                                                <option value="Cardiac Tumor">Cardiac Tumor</option>
                                                <option value="Cardioversion(s)">Cardioversion(s)</option>
                                                <option value="Closure device, atrial septal defect">Closure device, atrial septal defect</option>
                                                <option value="Closure device, ventricular septal defect">Closure device, ventricular septal defect</option>
                                                <option value="Congenital cardiac repair, surgical">Congenital cardiac repair, surgical</option>
                                                <option value="Implantable Cardioverter Defibrillator (ICD) with or without pacer">Implantable Cardioverter Defibrillator (ICD) with or without pacer</option>
                                                <option value="Pacemaker">Pacemaker</option>
                                                <option value="Pericardiectomy">Pericardiectomy</option>
                                                <option value="Pulmonary thrombectomy">Pulmonary thrombectomy</option>
                                                <option value="Total Artificial Heart (TAH)">Total Artificial Heart (TAH)</option>
                                                <option value="Transmyocardial Laser Revascularization (TMR)">Transmyocardial Laser Revascularization (TMR)</option>
                                                <option value="Transplant heart & lung">Transplant heart & lung</option>
                                                <option value="Transplant, heart">Transplant, heart</option>
                                                <option value="Transplant, lung(s)">Transplant, lung(s)</option>
                                                <option value="Ventricular Assist Device (VAD), BIVAD">Ventricular Assist Device (VAD), BIVAD</option>
                                                <option value="Ventricular Assist Device (VAD), left">Ventricular Assist Device (VAD), left</option>
                                                <option value="Ventricular Assist Device (VAD), right">Ventricular Assist Device (VAD), right</option>
                                                <option value="Other Cardiac Intervention (not listed)">Other Cardiac Intervention (not listed)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 form-group mb-3">
                                            <label for="">Intervention 3</label>
                                            <select name="intervention_3" id="" class="form-select" >
                                                <option value="Select Intervention">Select Intervention</option>
                                                <option value="No additional interventions">No additional interventions</option>
                                                <option value="Ablation, catheter, atrial fibrillation">Ablation, catheter, atrial fibrillation</option>
                                                <option value="Ablation, catheter, other or unknown">Ablation, catheter, other or unknown</option>
                                                <option value="Ablation, catheter, ventricular">Ablation, catheter, ventricular</option>
                                                <option value="Ablation, surgical, atrial fibrillation">Ablation, surgical, atrial fibrillation</option>
                                                <option value="Ablation, surgical, other or unknown">Ablation, surgical, other or unknown</option>
                                                <option value="Aneurysmectomy, LV">Aneurysmectomy, LV</option>
                                                <option value="Aortic procedure, arch">Aortic procedure, arch</option>
                                                <option value="Aortic procedure, ascending">Aortic procedure, ascending</option>
                                                <option value="Aortic procedure, descending">Aortic procedure, descending</option>
                                                <option value="Aortic procedure, root">Aortic procedure, root</option>
                                                <option value="Aortic procedure, thoracoabdominal">Aortic procedure, thoracoabdominal</option>
                                                <option value="Aortic Procedure, TEVAR">Aortic Procedure, TEVAR</option>
                                                <option value="Aortic root procedure, valve sparing">Aortic root procedure, valve sparing</option>
                                                <option value="Atrial appendage obliteration, Left, surgical">Atrial appendage obliteration, Left, surgical</option>
                                                <option value="Atrial appendage obliteration, Left, transcatheter">Atrial appendage obliteration, Left, transcatheter</option>
                                                <option value="Atrial appendage obliteration, Right, surgical">Atrial appendage obliteration, Right, surgical</option>
                                                <option value="Atrial appendage obliteration, Right, transcatheter">Atrial appendage obliteration, Right, transcatheter</option>
                                                <option value="Cardiac Tumor">Cardiac Tumor</option>
                                                <option value="Cardioversion(s)">Cardioversion(s)</option>
                                                <option value="Closure device, atrial septal defect">Closure device, atrial septal defect</option>
                                                <option value="Closure device, ventricular septal defect">Closure device, ventricular septal defect</option>
                                                <option value="Congenital cardiac repair, surgical">Congenital cardiac repair, surgical</option>
                                                <option value="Implantable Cardioverter Defibrillator (ICD) with or without pacer">Implantable Cardioverter Defibrillator (ICD) with or without pacer</option>
                                                <option value="Pacemaker">Pacemaker</option>
                                                <option value="Pericardiectomy">Pericardiectomy</option>
                                                <option value="Pulmonary thrombectomy">Pulmonary thrombectomy</option>
                                                <option value="Total Artificial Heart (TAH)">Total Artificial Heart (TAH)</option>
                                                <option value="Transmyocardial Laser Revascularization (TMR)">Transmyocardial Laser Revascularization (TMR)</option>
                                                <option value="Transplant heart & lung">Transplant heart & lung</option>
                                                <option value="Transplant, heart">Transplant, heart</option>
                                                <option value="Transplant, lung(s)">Transplant, lung(s)</option>
                                                <option value="Ventricular Assist Device (VAD), BIVAD">Ventricular Assist Device (VAD), BIVAD</option>
                                                <option value="Ventricular Assist Device (VAD), left">Ventricular Assist Device (VAD), left</option>
                                                <option value="Ventricular Assist Device (VAD), right">Ventricular Assist Device (VAD), right</option>
                                                <option value="Other Cardiac Intervention (not listed)">Other Cardiac Intervention (not listed)</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 form-group mb-3">
                                            <label for="">Intervention 4</label>
                                            <select name="intervention_4" id="" class="form-select" >
                                                <option value="Select Intervention">Select Intervention</option>
                                                <option value="No additional interventions">No additional interventions</option>
                                                <option value="Ablation, catheter, atrial fibrillation">Ablation, catheter, atrial fibrillation</option>
                                                <option value="Ablation, catheter, other or unknown">Ablation, catheter, other or unknown</option>
                                                <option value="Ablation, catheter, ventricular">Ablation, catheter, ventricular</option>
                                                <option value="Ablation, surgical, atrial fibrillation">Ablation, surgical, atrial fibrillation</option>
                                                <option value="Ablation, surgical, other or unknown">Ablation, surgical, other or unknown</option>
                                                <option value="Aneurysmectomy, LV">Aneurysmectomy, LV</option>
                                                <option value="Aortic procedure, arch">Aortic procedure, arch</option>
                                                <option value="Aortic procedure, ascending">Aortic procedure, ascending</option>
                                                <option value="Aortic procedure, descending">Aortic procedure, descending</option>
                                                <option value="Aortic procedure, root">Aortic procedure, root</option>
                                                <option value="Aortic procedure, thoracoabdominal">Aortic procedure, thoracoabdominal</option>
                                                <option value="Aortic Procedure, TEVAR">Aortic Procedure, TEVAR</option>
                                                <option value="Aortic root procedure, valve sparing">Aortic root procedure, valve sparing</option>
                                                <option value="Atrial appendage obliteration, Left, surgical">Atrial appendage obliteration, Left, surgical</option>
                                                <option value="Atrial appendage obliteration, Left, transcatheter">Atrial appendage obliteration, Left, transcatheter</option>
                                                <option value="Atrial appendage obliteration, Right, surgical">Atrial appendage obliteration, Right, surgical</option>
                                                <option value="Atrial appendage obliteration, Right, transcatheter">Atrial appendage obliteration, Right, transcatheter</option>
                                                <option value="Cardiac Tumor">Cardiac Tumor</option>
                                                <option value="Cardioversion(s)">Cardioversion(s)</option>
                                                <option value="Closure device, atrial septal defect">Closure device, atrial septal defect</option>
                                                <option value="Closure device, ventricular septal defect">Closure device, ventricular septal defect</option>
                                                <option value="Congenital cardiac repair, surgical">Congenital cardiac repair, surgical</option>
                                                <option value="Implantable Cardioverter Defibrillator (ICD) with or without pacer">Implantable Cardioverter Defibrillator (ICD) with or without pacer</option>
                                                <option value="Pacemaker">Pacemaker</option>
                                                <option value="Pericardiectomy">Pericardiectomy</option>
                                                <option value="Pulmonary thrombectomy">Pulmonary thrombectomy</option>
                                                <option value="Total Artificial Heart (TAH)">Total Artificial Heart (TAH)</option>
                                                <option value="Transmyocardial Laser Revascularization (TMR)">Transmyocardial Laser Revascularization (TMR)</option>
                                                <option value="Transplant heart & lung">Transplant heart & lung</option>
                                                <option value="Transplant, heart">Transplant, heart</option>
                                                <option value="Transplant, lung(s)">Transplant, lung(s)</option>
                                                <option value="Ventricular Assist Device (VAD), BIVAD">Ventricular Assist Device (VAD), BIVAD</option>
                                                <option value="Ventricular Assist Device (VAD), left">Ventricular Assist Device (VAD), left</option>
                                                <option value="Ventricular Assist Device (VAD), right">Ventricular Assist Device (VAD), right</option>
                                                <option value="Other Cardiac Intervention (not listed)">Other Cardiac Intervention (not listed)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 form-group mb-3">
                                            <label for="">Intervention 5</label>
                                            <select name="intervention_5" id="" class="form-select" >
                                                <option value="Select Intervention">Select Intervention</option>
                                                <option value="No additional interventions">No additional interventions</option>
                                                <option value="Ablation, catheter, atrial fibrillation">Ablation, catheter, atrial fibrillation</option>
                                                <option value="Ablation, catheter, other or unknown">Ablation, catheter, other or unknown</option>
                                                <option value="Ablation, catheter, ventricular">Ablation, catheter, ventricular</option>
                                                <option value="Ablation, surgical, atrial fibrillation">Ablation, surgical, atrial fibrillation</option>
                                                <option value="Ablation, surgical, other or unknown">Ablation, surgical, other or unknown</option>
                                                <option value="Aneurysmectomy, LV">Aneurysmectomy, LV</option>
                                                <option value="Aortic procedure, arch">Aortic procedure, arch</option>
                                                <option value="Aortic procedure, ascending">Aortic procedure, ascending</option>
                                                <option value="Aortic procedure, descending">Aortic procedure, descending</option>
                                                <option value="Aortic procedure, root">Aortic procedure, root</option>
                                                <option value="Aortic procedure, thoracoabdominal">Aortic procedure, thoracoabdominal</option>
                                                <option value="Aortic Procedure, TEVAR">Aortic Procedure, TEVAR</option>
                                                <option value="Aortic root procedure, valve sparing">Aortic root procedure, valve sparing</option>
                                                <option value="Atrial appendage obliteration, Left, surgical">Atrial appendage obliteration, Left, surgical</option>
                                                <option value="Atrial appendage obliteration, Left, transcatheter">Atrial appendage obliteration, Left, transcatheter</option>
                                                <option value="Atrial appendage obliteration, Right, surgical">Atrial appendage obliteration, Right, surgical</option>
                                                <option value="Atrial appendage obliteration, Right, transcatheter">Atrial appendage obliteration, Right, transcatheter</option>
                                                <option value="Cardiac Tumor">Cardiac Tumor</option>
                                                <option value="Cardioversion(s)">Cardioversion(s)</option>
                                                <option value="Closure device, atrial septal defect">Closure device, atrial septal defect</option>
                                                <option value="Closure device, ventricular septal defect">Closure device, ventricular septal defect</option>
                                                <option value="Congenital cardiac repair, surgical">Congenital cardiac repair, surgical</option>
                                                <option value="Implantable Cardioverter Defibrillator (ICD) with or without pacer">Implantable Cardioverter Defibrillator (ICD) with or without pacer</option>
                                                <option value="Pacemaker">Pacemaker</option>
                                                <option value="Pericardiectomy">Pericardiectomy</option>
                                                <option value="Pulmonary thrombectomy">Pulmonary thrombectomy</option>
                                                <option value="Total Artificial Heart (TAH)">Total Artificial Heart (TAH)</option>
                                                <option value="Transmyocardial Laser Revascularization (TMR)">Transmyocardial Laser Revascularization (TMR)</option>
                                                <option value="Transplant heart & lung">Transplant heart & lung</option>
                                                <option value="Transplant, heart">Transplant, heart</option>
                                                <option value="Transplant, lung(s)">Transplant, lung(s)</option>
                                                <option value="Ventricular Assist Device (VAD), BIVAD">Ventricular Assist Device (VAD), BIVAD</option>
                                                <option value="Ventricular Assist Device (VAD), left">Ventricular Assist Device (VAD), left</option>
                                                <option value="Ventricular Assist Device (VAD), right">Ventricular Assist Device (VAD), right</option>
                                                <option value="Other Cardiac Intervention (not listed)">Other Cardiac Intervention (not listed)</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 form-group mb-3">
                                            <label for="">Intervention 6</label>
                                            <select name="intervention_6" id="" class="form-select" >
                                                <option value="Select Intervention">Select Intervention</option>
                                                <option value="No additional interventions">No additional interventions</option>
                                                <option value="Ablation, catheter, atrial fibrillation">Ablation, catheter, atrial fibrillation</option>
                                                <option value="Ablation, catheter, other or unknown">Ablation, catheter, other or unknown</option>
                                                <option value="Ablation, catheter, ventricular">Ablation, catheter, ventricular</option>
                                                <option value="Ablation, surgical, atrial fibrillation">Ablation, surgical, atrial fibrillation</option>
                                                <option value="Ablation, surgical, other or unknown">Ablation, surgical, other or unknown</option>
                                                <option value="Aneurysmectomy, LV">Aneurysmectomy, LV</option>
                                                <option value="Aortic procedure, arch">Aortic procedure, arch</option>
                                                <option value="Aortic procedure, ascending">Aortic procedure, ascending</option>
                                                <option value="Aortic procedure, descending">Aortic procedure, descending</option>
                                                <option value="Aortic procedure, root">Aortic procedure, root</option>
                                                <option value="Aortic procedure, thoracoabdominal">Aortic procedure, thoracoabdominal</option>
                                                <option value="Aortic Procedure, TEVAR">Aortic Procedure, TEVAR</option>
                                                <option value="Aortic root procedure, valve sparing">Aortic root procedure, valve sparing</option>
                                                <option value="Atrial appendage obliteration, Left, surgical">Atrial appendage obliteration, Left, surgical</option>
                                                <option value="Atrial appendage obliteration, Left, transcatheter">Atrial appendage obliteration, Left, transcatheter</option>
                                                <option value="Atrial appendage obliteration, Right, surgical">Atrial appendage obliteration, Right, surgical</option>
                                                <option value="Atrial appendage obliteration, Right, transcatheter">Atrial appendage obliteration, Right, transcatheter</option>
                                                <option value="Cardiac Tumor">Cardiac Tumor</option>
                                                <option value="Cardioversion(s)">Cardioversion(s)</option>
                                                <option value="Closure device, atrial septal defect">Closure device, atrial septal defect</option>
                                                <option value="Closure device, ventricular septal defect">Closure device, ventricular septal defect</option>
                                                <option value="Congenital cardiac repair, surgical">Congenital cardiac repair, surgical</option>
                                                <option value="Implantable Cardioverter Defibrillator (ICD) with or without pacer">Implantable Cardioverter Defibrillator (ICD) with or without pacer</option>
                                                <option value="Pacemaker">Pacemaker</option>
                                                <option value="Pericardiectomy">Pericardiectomy</option>
                                                <option value="Pulmonary thrombectomy">Pulmonary thrombectomy</option>
                                                <option value="Total Artificial Heart (TAH)">Total Artificial Heart (TAH)</option>
                                                <option value="Transmyocardial Laser Revascularization (TMR)">Transmyocardial Laser Revascularization (TMR)</option>
                                                <option value="Transplant heart & lung">Transplant heart & lung</option>
                                                <option value="Transplant, heart">Transplant, heart</option>
                                                <option value="Transplant, lung(s)">Transplant, lung(s)</option>
                                                <option value="Ventricular Assist Device (VAD), BIVAD">Ventricular Assist Device (VAD), BIVAD</option>
                                                <option value="Ventricular Assist Device (VAD), left">Ventricular Assist Device (VAD), left</option>
                                                <option value="Ventricular Assist Device (VAD), right">Ventricular Assist Device (VAD), right</option>
                                                <option value="Other Cardiac Intervention (not listed)">Other Cardiac Intervention (not listed)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 form-group mb-3">
                                            <label for="">Intervention 7</label>
                                            <select name="intervention_7" id="" class="form-select" >
                                                <option value="Select Intervention">Select Intervention</option>
                                                <option value="No additional interventions">No additional interventions</option>
                                                <option value="Ablation, catheter, atrial fibrillation">Ablation, catheter, atrial fibrillation</option>
                                                <option value="Ablation, catheter, other or unknown">Ablation, catheter, other or unknown</option>
                                                <option value="Ablation, catheter, ventricular">Ablation, catheter, ventricular</option>
                                                <option value="Ablation, surgical, atrial fibrillation">Ablation, surgical, atrial fibrillation</option>
                                                <option value="Ablation, surgical, other or unknown">Ablation, surgical, other or unknown</option>
                                                <option value="Aneurysmectomy, LV">Aneurysmectomy, LV</option>
                                                <option value="Aortic procedure, arch">Aortic procedure, arch</option>
                                                <option value="Aortic procedure, ascending">Aortic procedure, ascending</option>
                                                <option value="Aortic procedure, descending">Aortic procedure, descending</option>
                                                <option value="Aortic procedure, root">Aortic procedure, root</option>
                                                <option value="Aortic procedure, thoracoabdominal">Aortic procedure, thoracoabdominal</option>
                                                <option value="Aortic Procedure, TEVAR">Aortic Procedure, TEVAR</option>
                                                <option value="Aortic root procedure, valve sparing">Aortic root procedure, valve sparing</option>
                                                <option value="Atrial appendage obliteration, Left, surgical">Atrial appendage obliteration, Left, surgical</option>
                                                <option value="Atrial appendage obliteration, Left, transcatheter">Atrial appendage obliteration, Left, transcatheter</option>
                                                <option value="Atrial appendage obliteration, Right, surgical">Atrial appendage obliteration, Right, surgical</option>
                                                <option value="Atrial appendage obliteration, Right, transcatheter">Atrial appendage obliteration, Right, transcatheter</option>
                                                <option value="Cardiac Tumor">Cardiac Tumor</option>
                                                <option value="Cardioversion(s)">Cardioversion(s)</option>
                                                <option value="Closure device, atrial septal defect">Closure device, atrial septal defect</option>
                                                <option value="Closure device, ventricular septal defect">Closure device, ventricular septal defect</option>
                                                <option value="Congenital cardiac repair, surgical">Congenital cardiac repair, surgical</option>
                                                <option value="Implantable Cardioverter Defibrillator (ICD) with or without pacer">Implantable Cardioverter Defibrillator (ICD) with or without pacer</option>
                                                <option value="Pacemaker">Pacemaker</option>
                                                <option value="Pericardiectomy">Pericardiectomy</option>
                                                <option value="Pulmonary thrombectomy">Pulmonary thrombectomy</option>
                                                <option value="Total Artificial Heart (TAH)">Total Artificial Heart (TAH)</option>
                                                <option value="Transmyocardial Laser Revascularization (TMR)">Transmyocardial Laser Revascularization (TMR)</option>
                                                <option value="Transplant heart & lung">Transplant heart & lung</option>
                                                <option value="Transplant, heart">Transplant, heart</option>
                                                <option value="Transplant, lung(s)">Transplant, lung(s)</option>
                                                <option value="Ventricular Assist Device (VAD), BIVAD">Ventricular Assist Device (VAD), BIVAD</option>
                                                <option value="Ventricular Assist Device (VAD), left">Ventricular Assist Device (VAD), left</option>
                                                <option value="Ventricular Assist Device (VAD), right">Ventricular Assist Device (VAD), right</option>
                                                <option value="Other Cardiac Intervention (not listed)">Other Cardiac Intervention (not listed)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-end">
                <button type="submit" class="btn btn-dark w-auto" id="submitBtn">
                    Add Previous Interventions
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    function apsgYesDiv() {
        if ($("#pcv_in_yes").is(":checked")) {
            $("#pcvi-use").slideDown();
        } else {
            $("#pcvi-use").slideUp();
        }
    }
    apsgYesDiv();
    $("input[name='pcv_in']").change(function() {
        apsgYesDiv();
    });
    pv_proyes
    // 
    function pvprYesDiv() {
        if ($("#pv_proyes").is(":checked")) {
            $("#pcpro-use").slideDown();
        } else {
            $("#pcpro-use").slideUp();
        }
    }
    pvprYesDiv();
    $("input[name='pv_pro']").change(function() {
        pvprYesDiv();
    });
    // 
    function ppciYesDiv() {
        if ($("#ppc_i_yes").is(":checked")) {
            $("#ppci-use").slideDown();
        } else {
            $("#ppci-use").slideUp();
        }
    }
    ppciYesDiv();
    $("input[name='ppc_i']").change(function() {
        ppciYesDiv();
    });
    // 
    function pcisYesDiv() {
        if ($("#pci_syes").is(":checked")) {
            $("#pci-use").slideDown();
        } else {
            $("#pci-use").slideUp();
        }
    }
    pcisYesDiv();
    $("input[name='pci_s']").change(function() {
        pcisYesDiv();
    });
    // 
    function opciYesDiv() {
        if ($("#opci_yes").is(":checked")) {
            $("#opci-use").slideDown();
        } else {
            $("#opci-use").slideUp();
        }
    }
    opciYesDiv();
    $("input[name='opci']").change(function() {
        opciYesDiv();
    });
</script>
@endsection