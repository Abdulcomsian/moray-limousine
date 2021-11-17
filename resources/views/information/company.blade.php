@extends('layouts.partner-main-home-layout')
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

    .lsp-pager {
        background-color: #F6F6F6;
        padding: 1rem 0;
        font-size: 1.125rem;
    }

    .lsp-pager .wrapper {
        display: flex;
        max-width: 35rem;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .lsp-pager .pager-prev,
    .lsp-pager .pager-data,
    .lsp-pager .pager-next {
        display: inline-block;
    }

    .lsp-pager .pager-data {
        margin: 0 auto;
        text-align: center;
        flex: 1 0 auto;
    }

    .lsp-pager .pager-data .cur {
        color: #1F1F1F;
    }

    .lsp-pager .pager-data .max {
        color: #A8A8A8;
    }

    .lsp-pager .pager-prev,
    .lsp-pager .pager-next {
        flex: 0 1 auto;
    }

    .lsp-pager .pager-prev.hidden,
    .lsp-pager .pager-next.hidden {
        visibility: hidden;
    }

    .lsp-pager .pager-prev img,
    .lsp-pager .pager-next img {
        width: 1rem;
        height: 1rem;
        object-fit: contain;
    }

    .lsp-pager a {
        font-size: 1.125rem;
        font-weight: normal;
        line-height: normal;
        text-decoration: none;
    }

    div#informationCompany {
        padding-top: 8%;
    }

    .lsp-pager .pager-prev img,
    .lsp-pager .pager-next img {
        width: 1rem;
        height: 1rem;
        object-fit: contain;
    }

    .lsp-pager a {
        font-size: 1.125rem;
        font-weight: normal;
        line-height: normal;
        text-decoration: none;
    }

    .lsp-pager .pager-prev,
    .lsp-pager .pager-next {
        flex: 0 1 auto;
    }

    .lsp-pager .wrapper {
        display: flex;
        max-width: 35rem;
        margin: 0 auto;
        padding: 0 1rem;
    }
</style>
<form method="post" action="{{route('save-company')}}">
    @csrf
    <main id="step-1">
        <div id="registrationData">
            <div class="lsp-layout lsp-layout--enabled">
                <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
            </div>
            <div id="informationCompany" class="paged">
                <div class="lsp-pager">
                    <div class="wrapper">
                        <div class="pager-data"><span l10n class="cur">Step &nbsp; 1 &nbsp; </span><span l10n class="max">of &nbsp; 5</span></div>
                        <!-- <div class="pager-prev"><a href="{{url('info/driver')}}" id="prev-page-1"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></div> -->
                    </div>
                </div>
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
                            <input id="companyName" name="company_name" value="{{\Auth::user()->partner->company_name ?? ''}}" placeholder="Example Company Inc." type="text" class="form-control input-field__element" required>
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
                                <option value=" ">Please select</option>
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                <option value="Sole Proprietorship" @if(\Auth::user()->partner->legal_form_company=='Sole Proprietorship'){{'selected'}}@endif>Sole Proprietorship</option>
                                <option value="S.A." @if(\Auth::user()->partner->legal_form_company=='S.A.'){{"selected"}}@endif>S.A.</option>
                                <option value="S.L." @if(\Auth::user()->partner->legal_form_company=="S.L."){{'selected'}}@endif>S.L.</option>
                                <option value="S.L.N.E." @if(\Auth::user()->partner->legal_form_company=="S.L.N.E."){{'selected'}}@endif>S.L.N.E.</option>
                                <option value="S.L.L." @if(\Auth::user()->partner->legal_form_company=="S.L.L."){{'seleted'}}@endif>S.L.L.</option>
                                <option value="S.C." @if(\Auth::user()->partner->legal_form_company=="S.C."){{'selected'}}@endif>S.C.</option>
                                <option value="S.C.P." @if(\Auth::user()->partner->legal_form_company=="S.C.P."){{'selected'}}@endif>S.C.P.</option>
                                <option value="S.Cra." @if(\Auth::user()->partner->legal_form_company=="S.Cra."){{'selected'}}@endif>S.Cra.</option>
                                <option value="S.Coop." @if(\Auth::user()->partner->legal_form_company==='S.Coop.'){{'selected'}}@endif>S.Coop.</option>
                            </select>

                        </div>
                        <span class="text-danger leagalformerror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>First name of authorised representative</label>
                        </div>
                        <div class="input-field">
                            <input id="authorizedFname" name="authorizedFname" value="{{\Auth::user()->first_name ?? ''}}" type="text" required class="form-control input-field__element">

                        </div>
                        <span class="text-danger authorizedFnameerror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Last name of authorised representative</label>
                        </div>
                        <div class="input-field">
                            <input id="authorizedLname" name="authorizedLname" value="{{\Auth::user()->last_name ?? ''}}" type="text" required class="form-control input-field__element">

                        </div>
                        <span class="text-danger authorizedLnameerror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Phone number</label>
                        </div>
                        <div class="input-field">
                            <input id="phoneNumber" name="phoneNumber" value="{{\Auth::user()->phone_number ?? ''}}" type="number" required class="form-control input-field__element">
                        </div>
                        <span class="text-danger phoneNumbererror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Company address</label>
                        </div>
                        <div class="input-field">
                            <input id="companyAddress" name="companyAddress" value="{{\Auth::user()->partner->address ?? ''}}" type="text" required class="form-control input-field__element">
                        </div>
                        <span class="text-danger companyAddresserror"></span>
                    </div>

                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>City</label>
                        </div>
                        <div class="input-field">
                            <input id="city" name="city" value="{{\Auth::user()->partner->city ?? ''}}" type="text" required class="form-control input-field__element">
                        </div>
                        <span class="text-danger cityerror"></span>
                        <div class="input-desc">
                            <label>Enter the city where your company is based, which may differ from where you operate.</label>
                        </div>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Postal code</label>
                        </div>
                        <div class="input-field">
                            <input id="postalCode" name="postalCode" value="{{\Auth::user()->partner->postal_code ?? ''}}" type="text" required class="form-control input-field__element">

                        </div>
                    </div>

                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Country</label>
                        </div>
                        <div class="input-field">
                            <input id="country" name="country" value="{{\Auth::user()->partner->country ?? ''}}" type="text" class="form-control input-field__element" required>
                        </div>
                        <span class="text-danger countryerror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>VAT/Sales Tax Number</label>
                        </div>
                        <div class="input-field">
                            <input id="vat-sales" name="vat_sales" value="{{\Auth::user()->partner->vat_sales_tax_no ?? ''}}" type="text" required class="form-control input-field__element">

                        </div>
                    </div>

                </div>

                <div class="row subsection">

                </div>
                <div class="actions pt-5">
                    <button type="submit">Next</button>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>
</form>
@endsection