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

    .uploadDocuments .lsp-page--title {
        font-size: 24px;
        margin: 20px 0px;
    }

    .uploadDocuments ul li {
        padding: 10px 5px;
        background: #80808047;
        margin-bottom: 5px;
    }

    .uploadDocuments ul li a {
        font-size: 18px;
        font-weight: 500;
    }

    .uploadDocuments ul li .countDiv {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .uploadDocuments ul li a {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .uploadDocuments ul li .countDiv p {
        margin-right: 20px;
    }

    .uploadDocuments ul li .countDiv i {
        color: #000;
    }

    .editText {
        color: blue;
    }

    .itemDiv .textItem {
        font-size: 18px;
        color: #000;
        font-weight: 600;
    }

    .itemDiv i {
        font-weight: 600;
        color: #000;
    }

    .uploadDocuments {
        margin-top: 40px;
    }

    .uploadDocuments img {
        width: 100%;
    }

    .note {
        font-size: 21px;
        font-weight: 400;
        color: #000;
    }

    .fileInput {
        opacity: 0;
        width: 100%;
        z-index: 10000008;
        height: 80px;
        position: relative;
    }

    .inputBtn {
        position: absolute;
        top: 0px;
        z-index: 0;
        width: 100%;
    }

    .inputDiv {
        position: relative;
        margin-top: 20px
    }

    .inputDiv .inputBtn i {
        position: absolute;
        right: 15px;
        top: 15px;
    }

    .btnDiv {
        justify-content: space-between;
    }
</style>
<div id="informationCompany" class="paged">
    <div class="lsp-pager">
        <div class="wrapper">
            <div class="pager-data"><span l10n class="cur">Step &nbsp; 1 &nbsp; </span><span l10n class="max">of &nbsp; 5</span></div>
            <!-- <div class="pager-prev"><a href="{{url('info/driver')}}" id="prev-page-1"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></div> -->
        </div>
    </div>
    <div class="lsp-page">
        <div class="row lsp-page--header " style="    display: block;">
            <h2 class="lsp-page--title">{{$title}}</h2>
            <form method="post" action="{{url('info/upload-document')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="title" value="{{$title}}" />
                <input type="hidden" name="type" value="{{$type}}" />
                <div class="uploadDocuments">
                    <img src="@if(isset($uploadeddoc->document_img)){{asset('uploaded-user-images/partner-documents/').'/'.$uploadeddoc->document_img}}@else{{asset('images/download.png')}}@endif" alt="">
                    <p class="note">Please provide us with an image or scan of your valid document.</p>
                    <div class="inputDiv">
                        <input type="file" name="file" class="fileInput">
                        <div class="inputBtn">
                            <input type="text" name="" id="" placeholder="JPEG, PNG, PDF">
                            <i class="fa fa-camera"></i>
                        </div>
                        <span>Maximum file size 30 MB</span>
                    </div>
                </div>
                <div class="d-flex btnDiv">
                    <button style="margin-top:30px;">Cancel</button>
                    <button style="margin-top:30px;">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection