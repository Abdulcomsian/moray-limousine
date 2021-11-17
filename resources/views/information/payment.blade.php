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
<form method="post" action="{{route('save-payment')}}">
    @csrf
    <main id="step-4" style="margin: top 2px;">
        <div id="general-errors" class="apollo-notification hidden apollo-notification--error">
            <div class="apollo-notification__content"></div>
            <div id="registrationData">
                <div class="lsp-layout lsp-layout--enabled">
                    <div class="lsp-spinner"><img src="/assets/images/ic-spinner.svg"></div>
                </div>
                <div id="informationCompany" class="paged">
                    <div class="lsp-pager">
                        <div class="wrapper">
                            <div class="pager-prev"><a href="{{url('info/vehicle')}}" id="prev-page-4"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></div>
                            <div class="pager-data"><span l10n class="cur">Step &nbsp; 4 &nbsp; </span><span l10n class="max">of &nbsp; 5</span></div>

                        </div>
                    </div>
                </div>
                <div class="lsp-page">
                    <div class="row lsp-page--header">
                        <h2 class="lsp-page--title">Payment information</h2>
                        <h4 class="lsp-page--description">Please tell us how you would like to receive payment.</h4>
                    </div>
                    <div class="apollo-input pt-3">
                        <div class="input-label">
                            <input type="radio" name="bank_transfer" class="input-field__radio-element" checked>
                            <label>Bank Transfer</label>
                        </div>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Bank account owner</label>
                        </div>
                        <div class="input-field">
                            <input id="bank-account-owner" name="bank_account_owner" type="text" required class="form-control input-field__element" value="{{\Auth::user()->partner->bank_account_owner ?? ''}}">
                        </div>
                        @if($errors->has('bank_account_owner'))
                        <div class="text-danger">{{ $errors->first('bank_account_owner') }}</div>
                        @endif
                    </div>
                    <div class="apollo-input pt-3">
                        <div class="input-label">
                            <label>Bank account owner type</label>
                        </div>
                        @php
                        $individaual="checked";
                        $corporation="";
                        if(\Auth::user()->partner->type=="Individual")
                        {
                        $individaual="checked";
                        }
                        if(\Auth::user()->partner->type=="Corporation")
                        {
                        $individaual="";
                        $corporation="checked";
                        }

                        @endphp
                        <div class="input-field input-field--grouped">
                            <label for="language-yes" class="input-field__radio">
                                <input type="radio" id="language-yes" name="account_type" value="Individual" class="input-field__radio-element" {{$individaual}}>Individual</label>
                            <label for="language-no" class="input-field__radio">
                                <input type="radio" id="language-no" name="account_type" value="Corporation" class="input-field__radio-element" {{$corporation}}>Corporation</label>
                        </div>
                        <span class="text-danger languageerror"></span>
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Iban</label>
                        </div>
                        <div class="input-field">
                            <input id="iban" name="iban" type="text" required class="form-control input-field__element" value="{{\Auth::user()->partner->iban ?? ''}}">
                        </div>
                        @if($errors->has('iban'))
                        <div class="text-danger">{{ $errors->first('iban') }}</div>
                        @endif
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>BIC/Swift</label>
                        </div>
                        <div class="input-field">
                            <input id="bicswift" name="bicswift" type="text" required class="form-control input-field__element" value="{{\Auth::user()->partner->bic_swift ?? ''}}">
                        </div>
                        @if($errors->has('bicswift'))
                        <div class="text-danger">{{ $errors->first('bicswift') }}</div>
                        @endif
                    </div>
                    <div class="apollo-input pt-3" style="width: 100%;">
                        <div class="input-label">
                            <label>Payments outside the UK and EU (including Russia and Turkey) are issued in US dollars. Next</label>
                        </div>
                    </div>
                    <div class="actions pt-5">
                        <button type="submit" class="fourth-next-page">Next</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
</form>
@endsection