@extends('layouts.main-home-layout')
    @section('title')
        Company Information
    @endsection
    @section('content-area')
    <style>
        .header-04 .bottom-header {
            background: rgb(0, 0, 0);
            position: absolute;
            z-index: 9;
            width: 100%;
        }

        .section-iconbox:not(.fix-mtb) {
            padding: 0 0 64px;
            margin-top: 10rem;
        }
    </style>
    <style>
        .btn-secondary:focus {
            background: #1e1e1e;
            color: white;
            font-weight: bold;
        }
        // workaround
        .intl-tel-input {
        display: table-cell;
        }
        .intl-tel-input .selected-flag {
        z-index: 4;
        }
        .intl-tel-input .country-list {
        z-index: 5;
        }
        .input-group .intl-tel-input .form-control {
        border-top-left-radius: 4px;
        border-top-right-radius: 0;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 0;
        }
        .lsp-pager {
        background-color: #F6F6F6;
        padding: 1rem0;
        font-size: 1.125rem;
    }
    }

    </style>

    <form method="post" action="{{ route('register') }}" id="partner-register-form">
        <input type="hidden" name="user_type" value="partner">
        <main id="step-1" class="d-block" style="margin: top 2px;">

            <div id="general-errors" class="apollo-notification hidden apollo-notification--error">
                <div class="apollo-notification__content">
                    <div class="top-baner">
                       <div class="container-fluid">
                           <div class="row">
                               <div class="col-md-12">
                                    <div class="top-baner-content">
                                        <div class="back-icon"></div>
                                        <div class="content">Step 1 of 6</div>
                                        <div class="next-icon"></div>
                                    </div>
                                </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
            <div id="registrationData">
                <div class="lsp-layout lsp-layout--enabled">
                    <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
                </div>
                <div class="lsp-page">
                <div class="row lsp-page--header " style="    display: block;">
                        <h2 class="lsp-page--title">Company information</h2>
                        <h4 class="lsp-page--description">Please provide a few more details about your company.</h4>
                    </div>
                   
                    <div class="row validate validate--name">
                        <div class="apollo-input" style="width: 100%;">
                            <div class="input-label">
                                <label>Company name</label>
                            </div>
                            <div class="input-field">
                                <input id="company-name" name="company_name" placeholder="Example Company Inc." type="text" required class="form-control input-field__element">

                            </div>
                            <span class="text-danger companyerror"></span>
                            <div class="input-desc">
                                <label>Legal name of your company. Sole proprietors enter first and last name.</label>
                            </div>
                        </div>

                        <div class="apollo-input pt-4" style="width: 100%;">
                            <div class="input-label">
                                <label>Legal form of company</label>
                            </div>
                            <div class="input-field">
                                <select class="custom-select" id="legal-form" name="legal_form">
                                    <option disabled selected>Please select</option>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    <option value="Sole Proprietorship">Sole Proprietorship</option>
                                    <option value="S.A.">S.A.</option>
                                    <option value="S.L.">S.L.</option>
                                    <option value="S.L.N.E.">S.L.N.E.</option>
                                    <option value="S.L.L.">S.L.L.</option>
                                    <option value="S.C.">S.C.</option>
                                    <option value="S.C.P.">S.C.P.</option>
                                    <option value="S.Cra.">S.Cra.</option>
                                    <option value="S.Coop.">S.Coop.</option>
                                </select>

                            </div>
                        </div>
                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>First name of authorised representative</label>
                            </div>
                            <div class="input-field">
                                <input id="company-name" name="company_name"  type="text" required class="form-control input-field__element">

                            </div>
                        </div>
                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Last name of authorised representative</label>
                            </div>
                            <div class="input-field">
                                <input id="company-name" name="company_name"  type="text" required class="form-control input-field__element">

                            </div>
                        </div>
                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Phone number</label>
                            </div>
                            <div class="input-field">
                                <input id="company-name" name="company_name"  type="number" required class="form-control input-field__element">
                            </div>
                        </div>
                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Company address</label>
                            </div>
                            <div class="input-field">
                                <input id="company-name" name="company_name"  type="text" required class="form-control input-field__element">
                            </div>
                        </div>
                       
                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>City</label>
                            </div>
                            <div class="input-field">
                                <input id="company-name" name="company_name"  type="text" required class="form-control input-field__element">
                            </div>
                            <span class="text-danger companyerror"></span>
                            <div class="input-desc">
                                <label>Enter the city where your company is based, which may differ from where you operate.</label>
                            </div>
                        </div>
                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Postal code</label>
                            </div>
                            <div class="input-field">
                                <input id="company-name" name="company_name"  type="text" required class="form-control input-field__element">

                            </div>
                        </div>

                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Country</label>
                            </div>
                            <div class="input-field">
                                <input id="company-name" name="company_name"  type="number" required class="form-control input-field__element">
        
                            </div>
                        </div>
                        <div class="apollo-input pt-3">
                            <div class="input-label">
                                <label>Do your drivers have basic English skills?</label>
                            </div>
                            <div class="input-field input-field--grouped">
                                <label for="language-yes" class="input-field__radio">
                                    <input type="radio" id="language-yes" name="language" value="1" class="input-field__radio-element">Yes</label>
                                <label for="language-no" class="input-field__radio">
                                    <input type="radio" id="language-no" name="language" value="0" class="input-field__radio-element">No</label>
                            </div>
                            <span class="text-danger languageerror"></span>
                        </div>
                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>VAT/Sales Tax Number</label>
                            </div>
                            <div class="input-field">
                                <input id="company-name" name="company_name"  type="text" required class="form-control input-field__element">

                            </div>
                        </div>

                    </div>

                    <div class="row subsection">
                        
                    </div>
                    <div class="actions">
                        <button type="button" class="next-page">Next</button>
                    </div>
                    <!-- <div class="row">
                        <a href="{{url('/login')}}">Already a partner?</a>
                    </div> -->
                </div>
            </div>
            </div>
            </div>
        </main>       
        <main id="step-2" class="d-none" style="margin: top 2px;">
            <div id="general-errors" class="apollo-notification hidden apollo-notification--error">
                <div class="apollo-notification__content">

                </div>
            </div>
            <div id="registrationData">
                <div class="lsp-layout lsp-layout--enabled">
                    <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
                </div>
                <div class="lsp-page">
                    <div class="row lsp-page--header">
                        <h2 class="lsp-page--title">Add first driver</h2>
                        <h4 class="lsp-page--description">You can add more drivers later.</h4>
                    </div>
                    <div class="apollo-infobox info">
                        <div class="apollo-infobox--title">
                            <h4>Please note:</h4>
                        </div>
                        <div class="apollo-infobox--description">
                            <p>You will later be asked to upload documents for this driver.</p>
                        </div>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>First name</label>
                        </div>
                        <div class="input-field">
                            <input id="company-name" name="company_name"  type="text" required class="form-control input-field__element">

                        </div>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Last name</label>
                        </div>
                        <div class="input-field">
                            <input id="company-name" name="company_name"  type="text" required class="form-control input-field__element">
                        </div>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Email</label>
                        </div>
                        <div class="input-field">
                            <input id="company-name" name="company_name"  type="email" required class="form-control input-field__element">

                        </div>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Phone number</label>
                            </div>
                            <div class="input-field">
                                <input id="company-name" name="company_name"  type="number" required class="form-control input-field__element">
                            </div>
                        </div>
                   
                    <div class="actions pt-5">
                        <button type="button" class="second-next-page">Next</button>
                    </div>
                    <!-- <div class="row">
                        <a href="{{url('/login')}}">Already a partner?</a>
                    </div> -->
                </div>
            </div>
            </div>
            </div>
        </main>
        <main id="step-3" class="d-none" style="margin: top 2px;">
            <div id="general-errors" class="apollo-notification hidden apollo-notification--error">
                <div class="apollo-notification__content">

                </div>
            </div>
            <div id="registrationData">
                <div class="lsp-layout lsp-layout--enabled">
                    <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
                </div>
                <div class="lsp-page">
                    <div class="row lsp-page--header">
                        <h2 class="lsp-page--title">Add first vehicle</h2>
                        <h4 class="lsp-page--description">You can add more vehicles later.</h4>
                    </div>

                    <div class="apollo-infobox info">
                        <div class="apollo-infobox--title">
                            <h4>Please note:</h4>
                        </div>
                        <div class="apollo-infobox--description">
                            <p>You will later be asked to upload documents for this vehicle.</p>
                        </div>
                    </div>

                    <div class="apollo-input pt-4" style="width: 100%;">
                            <div class="input-label">
                                <label>Your vehicle</label>
                            </div>
                            <div class="input-field">
                                <select class="custom-select" id="legal-form" name="legal_form">
                                    <option disabled selected>Please select</option>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    <option value="Mercedes-Benz E-Class">Mercedes-Benz E-Class</option>
                                    <option value="BMW 5-Series">BMW 5-Series</option>
                                    <option value="BMW 6-Series GC">BMW 6-Series GC</option>
                                    <option value="Audi A6 / A7">Audi A6 / A7</option>
                                    <option value="Tesla Model S">Tesla Model S</option>
                                    <option value="Tesla Model X">Tesla Model X</option>
                                    <option value="Mercedes-Benz S-Class">Mercedes-Benz S-Class</option>
                                    <option value="BMW 7-Series">BMW 7-Series</option>
                                    <option value="Audi A8">Audi A8</option>
                                    <option value="Mercedes V-Class">Mercedes V-Class</option>
                                    <option value="Mercedes-Benz EQV">Mercedes-Benz EQV</option>
                                </select>
                                <div class="input-desc">
                                    <label>Service class:</label>
                                </div>
                            </div>
                        </div>
                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Color</label>
                            </div>
                            <div class="input-field">
                                <select class="custom-select" id="legal-form" name="legal_form">
                                    <option disabled selected>Please select</option>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    <option value="black">Black</option>
                                    <option value="white">White</option>
                                    <option value="red">Red</option>
                                </select>
                                    
                            </div>
                        </div>
                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Year of production</label>
                            </div>
                            <div class="input-field">
                                <select class="custom-select" id="legal-form" name="legal_form">
                                    <option disabled selected>Please select</option>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    <option value="black">1</option>
                                    <option value="white">2</option>
                                    <option value="red">3</option>
                                </select>
                                    
                            </div>
                        </div>
                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>License plate</label>
                            </div>
                            <div class="input-field">
                                <input id="license-plate" name="license-plate"  type="text" required class="form-control input-field__element">
        
                            </div>
                        </div>

                    <div class="actions pt-5">
                        <button type="button" class="third-next-page">Next</button>
                    </div>
                    <!-- <div class="row">
                        <a href="{{url('/login')}}">Already a partner?</a>
                    </div> -->
                </div>
            </div>
            </div>
            </div>
        </main>
        <main id="step-4" class="d-none" style="margin: top 2px;">
            <div id="general-errors" class="apollo-notification hidden apollo-notification--error">
                <div class="apollo-notification__content">
                <div class="lsp-pager">
                <!-- <div class="wrapper">
                    <div class="pager-prev"><a href="./vehicle.html"><img src="/assets/images/ic-arrow-left.svg"></a></div>
                    <div class="pager-data"><span l10n="" class="cur">Step 4 </span><span l10n="" class="max">of 6</span></div>
                    <div class="pager-next hidden"><a href="./documents.html"><img src="/assets/images/ic-arrow-right.svg"></a></div>
                </div>
                </div> -->
                </div>
            </div>
            <div id="registrationData">
                <div class="lsp-layout lsp-layout--enabled">
                    <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
                </div>
                <div class="lsp-page">
                    <div class="row lsp-page--header">
                        <h2 class="lsp-page--title">Payment information</h2>
                        <h4 class="lsp-page--description">Please tell us how you would like to receive payment.</h4>
                    </div>
                    <div class="apollo-input pt-3">
                        <div class="input-label">
                            <input type="radio" class="input-field__radio-element" checked>
                            <label>Bank Transfer</label>
                        </div>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Bank account owner</label>
                            </div>
                            <div class="input-field">
                                <input id="bank-account-owner" name="bank-account-owner"  type="text" required class="form-control input-field__element">
                            </div>
                    </div>
                    <div class="apollo-input pt-3">
                            <div class="input-label">
                                <label>Bank account owner type</label>
                            </div>
                            <div class="input-field input-field--grouped">
                                <label for="language-yes" class="input-field__radio">
                                    <input type="radio" id="language-yes" name="language" value="1" class="input-field__radio-element">Individual</label>
                                <label for="language-no" class="input-field__radio">
                                    <input type="radio" id="language-no" name="language" value="0" class="input-field__radio-element">Corporation</label>
                            </div>
                            <span class="text-danger languageerror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Iban</label>
                            </div>
                            <div class="input-field">
                                <input id="bank-account-owner" name="bank-account-owner"  type="text" required class="form-control input-field__element">

                            </div>
                        </div>
                        <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>BIC/Swift</label>
                            </div>
                            <div class="input-field">
                                <input id="bank-account-owner" name="bank-account-owner"  type="text" required class="form-control input-field__element">

                            </div>
                        </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Payments outside the UK and EU (including Russia and Turkey) are issued in US dollars. Next</label>
                            </div>
                       </div>
                        
                    

                   
                   
                    <div class="actions pt-5">
                        <button type="button" class="fourth-next-page">Next</button>
                    </div>
                    <!-- <div class="row">
                        <a href="{{url('/login')}}">Already a partner?</a>
                    </div> -->
                </div>
            </div>
            </div>
            </div>
        </main>
        <main id="step-5" class="d-none" style="margin: top 2px;">
            <div id="general-errors" class="apollo-notification hidden apollo-notification--error">
                <div class="apollo-notification__content">
                <div class="lsp-pager">
                
                </div>
            </div>
            <div id="registrationData">
                <div class="lsp-layout lsp-layout--enabled">
                    <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
                </div>
                <div class="lsp-page">
                    <div class="row lsp-page--header">
                        <h2 class="lsp-page--title">Documents and training</h2>
                        <h4 class="lsp-page--description">To continue, please complete the sections below.</h4>
                    </div>
                    <div class="apollo-input pt-3">
                        <div class="input-label">
                            <label>Upload documents</label>
                        </div>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Company</label>
                            </div>
                            <div class="input-field">
                                <input id="bank-account-owner" name="bank-account-owner"  type="file" required class="form-control input-field__element">
                            </div>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Driver</label>
                            </div>
                            <div class="input-field">
                                <input id="bank-account-owner" name="bank-account-owner"  type="file" required class="form-control input-field__element">
                            </div>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                            <div class="input-label">
                                <label>Vehicle</label>
                            </div>
                            <div class="input-field">
                                <input id="bank-account-owner" name="bank-account-owner"  type="file" required class="form-control input-field__element">
                            </div>
                    </div>
                    <div class="apollo-input pt-5">
                        <div class="input-label">
                            <label>Complete training</label>
                        </div>
                    </div>
                    <div class="apollo-input pt-3">
                            <div class="input-label">
                                <label>Partner training</label>
                            </div>
                            <div class="input-field">
                                <input id="bank-account-owner" name="bank-account-owner"  type="file" required class="form-control input-field__element">
                            </div>
                    </div>
                    <div class="apollo-input pt-5">
                        <div class="input-label">
                            <label>Sign contract</label>
                        </div>
                    </div>
                    <div class="apollo-input pt-3">
                            <div class="input-label">
                                <label>View and sign contract</label>
                            </div>
                            <div class="input-field">
                                <input id="bank-account-owner" name="bank-account-owner"  type="file" required class="form-control input-field__element">
                            </div>
                    </div>
                    

                   
                   
                    <div class="actions pt-5">
                        <button type="button" class="fifth-next-page">Next</button>
                    </div>
                    <!-- <div class="row">
                        <a href="{{url('/login')}}">Already a partner?</a>
                    </div> -->
                </div>
            </div>
            </div>
            </div>
        </main>
        <main id="step-6" class="d-none" style="margin: top 2px;">
            <div id="general-errors" class="apollo-notification hidden apollo-notification--error">
                <div class="apollo-notification__content">
                <div class="lsp-pager">
                
                </div>
            </div>
            <div id="registrationData">
                <div class="lsp-layout lsp-layout--enabled">
                    <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
                </div>
                <div class="lsp-page">
                    <div class="row lsp-page--header">
                        <h2 class="lsp-page--title " style="color:red; font-weight:bold">You Submation is Successfully</h2>
                        <!-- <h4 class="lsp-page--description">To continue, please complete the sections below.</h4> -->
                    </div>
                    <div class="actions pt-5">
                        <button type="button" class="back">Submit</button>
                    </div>
                    <!-- <div class="row">
                        <a href="{{url('/login')}}">Already a partner?</a>
                    </div> -->
                </div>
            </div>
            </div>
            </div>
        </main>
    </form>
   

    @endsection
    @section('js')
     <script>

            $(".next-page").on('click',function(){
                $("#step-1").removeClass('d-block').hide();
                $("#step-2").removeClass('d-none').show();
            })
            $(".second-next-page").on('click',function(){
                $('#step-2').removeClass('d-block').hide();
                $('#step-3').removeClass('d-none').show();
            })
            $(".third-next-page").on('click',function(){
                $('#step-3').removeClass('d-block').hide();
                $('#step-4').removeClass('d-none').show();
            })
            $(".fourth-next-page").on('click',function(){
                $('#step-4').removeClass('d-block').hide();
                $('#step-5').removeClass('d-none').show();
            })
            $(".fifth-next-page").on('click',function(){
                $('#step-5').removeClass('d-block').hide();
                $('#step-6').removeClass('d-none').show();
            })
            $(".back").on('click',function(){
                $('#step-6').removeClass('d-block').hide();
                $('#step-1').removeClass('d-none').show();
            })
  
        // $(".next-page").on('click', function() {
        //     if ($("#company-name").val() == "") {
        //         $(".companyerror").text("Please Enter Company Name");
        //         return false;
        //     } else {
        //         $(".companyerror").text("");
        //     }

        //     if ($("#email").val() == "") {
        //         $(".emailerror").text("Please Enter Email");
        //         return false;
        //     } else {
        //         $(".emailerror").text("");
        //     }

        //     if ($("#password").val() == "") {

        //         $(".passworderror").text("Please Enter Pssword");
        //         return false;
        //     } else {
        //         $(".passworderror").text("");
        //     }

        //     if ($("#password").val().length < 8) {
        //         $(".passworderror").text("Please Enter minimum 8 charachter Pssword");
        //         return false;
        //     } else {
        //         $(".passworderror").text("");
        //     }

        //     if (!$("input[name='language']:checked").val()) {
        //         $(".languageerror").text("Plese Select Yes for continue");
        //         return false;
        //     } else {
        //         $(".languageerror").text("");
        //     }
        //     $('#step-1').hide();
        //     $('#step-2').show();
        //     $('#step-3').hide();
            
            
        // });
        // $(".second-next-page").on('click', function() {
        //     if ($("#city-select").val() == "") {
        //         $(".cityerror").text("Plese Select City");
        //         return false;
        //     } else {
        //         $(".cityerror").text("");
        //     }
        //     if (!$("input[name='vehicleradio']:checked").val()) {
        //         $(".vehicleerror").text("Plese Select Yes for continue");
        //         return false;
        //     } else {
        //         $(".vehicleerror").text("");
        //     }
        //     $('#step-2').hide();
        //     $('#step-3').show();

        // });
        // $(".submit-page").on('click', function() {
        //     if (!$("input[name='documentradio']:checked").val()) {
        //         $(".documenterror").text("Plese Select Yes for continue");
        //         return false;
        //     } else {
        //         $(".documenterror").text("");
        //         $("#partner-register-form").submit();
        //     }
        // });

        // $('#city-select').on('change', function() {
        //     cityid = $(this).val();
        //     $.ajax({
        //         url: "{{url('/get-city-vehicle')}}",
        //         method: "get",
        //         data: {
        //             cityid: cityid
        //         },
        //         success: function(res) {
        //             $('#step-4').hide();
        //             $(".requirements").html(res);
        //             $('#step-5').show();
        //         }

        //     })
        // });
    </script> 
    @endsection