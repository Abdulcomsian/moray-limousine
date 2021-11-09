    
@extends('layouts.main-home-layout')
@section('title')
Become Partner
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

    <main id="step-1" style="margin: top 2px;%">
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
                    <h2 class="lsp-page--title">Want to drive with us?</h2>
                    <h4 class="lsp-page--description">Please tell us about you and your company to get started.</h4>
                </div>
                <div class="row validate validate--name">
                    <div class="apollo-input"style="width: 100%;">
                        <div class="input-label">
                            <label>Company name</label>
                        </div>
                        <div class="input-field">
                            <input id="company-name" name="company_name" placeholder="Full company name and legal entity" type="text" required class="form-control input-field__element">
                        </div>
                        <div class="input-desc">
                            <label>Full company name and legal entity. Sole proprietors enter first and last name.</label>
                        </div>
                    </div>
                </div>
                <div class="row validate validate--email">
                    <div class="apollo-input" style="width: 100%;">
                        <div class="input-label">
                            <label>Email</label>
                        </div>
                        <div class="input-field">
                            <input id="email" name="email" placeholder="Email" type="email" required class="input-field__element form-control">
                        </div>
                        <div class="input-desc hide">
                            <label></label>
                        </div>
                    </div>
                </div>
                <div class="row subsection">
                    <div class="apollo-input">
                        <div class="input-label">
                            <label>Do your drivers have basic English skills?</label>
                        </div>
                        <div class="input-field input-field--grouped">
                            <label for="language-yes" l10n="" class="input-field__radio">
                                <input type="radio" id="language-yes" name="language" value="1" class="input-field__radio-element">Yes</label>
                                <label for="language-no" l10n="" class="input-field__radio">
                                    <input type="radio" id="language-no" name="language" value="0" class="input-field__radio-element">No</label>
                                </div>
                                <div class="input-desc hide">
                                    <label></label>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <button l10n="" class="next-page">Next</button>
                        </div>
                        <div class="row">
                            <a href="" l10n="">Already a partner?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        .btn-secondary:focus{
            background: #1e1e1e;
            color: white;
            font-weight: bold;
        }
    </style>


    <main id="step-2" style="display: none; margin: top 2px;%">
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
                    <h2 class="lsp-page--title">Moray Limousines cities</h2>
                    <h4 class="lsp-page--description">Where do you want to operate?</h4>
                </div>
                
                <div class="row validate validate--name" style="width:100%">
                    <div class="apollo-input" style="width: 100%;">
                        <div class="input-label">
                            <label>Select Your City</label>
                        </div>
                        <select class="select" id="city-select" name="city-select" >
                            <option disabled="" selected="">Please select</option>
                            <option value="57dd4e52-a44e-4e48-ab57-502951b78be1">Abu-Dhabi</option>
                            <option value="a57c3f63-9fd5-47ff-8ad9-b187c9f1f410">Adelaide</option>
                            <option value="42fc5455-9aa4-4750-849f-4cd863f0dd13">Amsterdam</option>
                            <option value="19314522-244d-4ca4-95b7-cab15cba8426">Athens</option>
                            <option value="9f9940aa-7b6b-4a43-a48b-f34c9e7a5f1b">Atlanta</option>
                            <option value="24495297-76c6-42b9-bd68-865b784ea687">Auckland</option>
                            <option value="6f1d02eb-ab4d-47d8-8e8a-fa3c346cc9ff">Austin</option>
                            <option value="fe94f9dd-3f54-4ab2-b5f1-831dd9db2fcf">Baltimore</option>
                            <option value="0b847b05-9469-4c1e-ab47-0526fc723fac">Bangkok</option>
                            <option value="6d9df802-0d40-402f-ba3b-9aa239bf5e1e">Barcelona</option>
                            <option value="e06947cf-7f1c-4fb4-9a16-4e0c453bd37f">Basel</option>
                            <option value="db9d68b1-b225-4d81-ba9c-81280bd7395e">Beijing</option>
                            <option value="884980b1-4a90-4ca8-ad49-d5c8b360b469">Berlin</option>
                            <option value="a4650564-d319-4488-b313-8c954e3016a6">Bilbao</option>
                            <option value="68882c3c-456d-405d-a0b6-fe009bc17b20">Birmingham</option>
                            <option value="c7db59cd-c901-40bc-90ac-de53b96ce3a2">Bonn</option>
                            <option value="0b0e8fe3-1a8f-4265-a516-d1314f631023">Bordeaux</option>
                            <option value="4d97d892-255e-463b-8a13-0701bcea3882">Boston</option>
                            <option value="e0cc092d-7cd5-4da0-9d4d-50ac56fb9af6">Bratislava</option>
                            <option value="f86b9e55-b2a3-480d-a213-fe0d3bc7d38c">Brisbane</option>
                            <option value="6ae4d424-7ee9-4c3f-a9dc-3bab1af8a72f">Bristol</option>
                            <option value="95078cb8-6bd7-4c00-966b-0f8287c4b250">Brussels</option>
                            <option value="f6bbeee7-3c39-42ed-8558-ec962518cd33">Bucharest</option>
                            <option value="6a5d2230-f289-4f18-aba9-0861d5993b95">Budapest</option>
                            <option value="b3f1083b-dec7-4048-821b-292437f65950">Buenos-Aires</option>
                            <option value="8694a4bc-2666-4c3a-8f9e-29175a90050e">Canberra</option>
                            <option value="9851962e-1ada-403f-b56a-8cab16442ef2">Cannes</option>
                            <option value="37a6867b-4cdc-488b-818b-ea2171729494">Cape-Town</option>
                            <option value="74982460-758e-4bb9-8839-e5ea87c612e4">Charlotte</option>
                            <option value="e6db2aea-49bb-405a-b0cf-b97b2147c7e6">Chicago</option>
                            <option value="70d7ea2e-4e66-4673-8eab-d8562ac96add">Christchurch</option>
                            <option value="394aa092-0153-4526-9864-e4c61dbd8df9">Cleveland</option>
                            <option value="0852e10a-3e00-4418-bf57-3e27a196e455">Cologne</option>
                            <option value="f4baa90f-a9f2-418b-b440-4a42ecd40875">Copenhagen</option>
                            <option value="ab9c526e-b186-4cf6-9270-0847db0c7a44">Dallas</option>
                            <option value="59827e1f-1835-4818-93a7-749a061ee61f">Dammam</option>
                            <option value="2d478593-9d1c-42e2-b6e1-6c898e6d7136">Denpasar-Bali</option>
                            <option value="a253337c-063c-4b3f-b269-d169c0c819d2">Denver</option>
                            <option value="fafc8788-d394-4f05-ba46-58f699f5fd8c">Detroit</option>
                            <option value="45908905-00a6-4335-915d-aba6eb84baab">Dortmund</option>
                            <option value="c0ee2183-7d41-4f42-8ea1-74f299d712b0">Dresden</option>
                            <option value="206f6acb-cf06-4c03-90c3-97dff5475f92">Dubai</option>
                            <option value="3ec39e26-88a1-4db3-bfd1-90ecba4248e5">Dublin</option>
                            <option value="98571615-7d17-4b13-ae56-9802abe6b956">Duesseldorf</option>
                            <option value="1ca2e849-2e2d-4238-8f78-641789ea5c61">Edinburgh</option>
                            <option value="0174a8b3-6c6a-479d-8b7d-edd25781fab5">Essen</option>
                            <option value="68e0604e-e120-4af6-ad50-e3357a878855">Florence</option>
                            <option value="4e9ae811-66a4-4c48-abb5-759a5677e2fa">Fort-Lauderdale</option>
                            <option value="4718e0c1-39c7-4d8d-8a09-3ff168e2cb65">Frankfurt</option>
                            <option value="5c08c989-c9e8-4b81-8fbb-7a1cc2158363">Gdansk</option>
                            <option value="7f1d9dbb-5ab7-4181-8036-0274b7daf6ba">Geneva</option>
                            <option value="6a276544-f52c-4fc1-80a2-52d3f3db0048">Genoa</option>
                            <option value="cf87cd16-982f-478b-b6fb-4802ea71f265">Glasgow</option>
                            <option value="22778bdc-763f-47a8-8544-0d1289fdc54e">Gold-Coast</option>
                            <option value="ea1a2075-4a8e-47d9-882b-04c48f977173">Gothenburg</option>
                            <option value="ddb8f280-9e46-4af5-b06f-9c067bc865cb">Hamburg</option>
                            <option value="df609890-72d5-43e5-a9d9-0d1010bf82b1">Hanoi</option>
                            <option value="c44a10fd-0444-4a94-9402-be0d8cb502c4">Hanover</option>
                            <option value="8cd08d2e-c442-4473-a848-179cbf961980">Hartford</option>
                            <option value="07165db1-923b-4976-8c4b-0eb877f462a9">Ho-Chi-Minh-City</option>
                            <option value="ef89273a-65ed-4af9-9fa2-f7c6386b1ebb">Hong-Kong</option>
                            <option value="18a231c9-8454-4ea2-8b1e-03ac1f81e435">Honolulu</option>
                            <option value="919828de-dc93-4027-a0b3-4eaac4a46a22">Houston</option>
                            <option value="9f84c91f-805d-41d6-b3c3-ea64231b09bf">Istanbul</option>
                            <option value="8600b957-e3e4-4e14-a462-6683078681a9">Jakarta</option>
                            <option value="81fc7e27-7670-402a-b19d-834d30f0bee3">Jeddah</option>
                            <option value="f114cb4c-8db1-432e-bd8a-10fcb1259851">Johannesburg</option>
                            <option value="262c065c-07ad-43ac-8942-1025a395cb1c">Kiev</option>
                            <option value="225ce5c8-9f3b-4ff9-907f-f7c5a687c356">Krakow</option>
                            <option value="8bcc3853-32fb-4456-93b5-29de8f5e65b1">Kuala-Lumpur</option>
                            <option value="ea76be95-002b-4dd8-b7b8-5585e8e2571b">Kuwait-City</option>
                            <option value="f89b2417-2929-46ca-993e-2856e2579f3d">Kyoto</option>
                            <option value="1f2de363-39cf-4d80-98cf-f88184bdb08e">Las-Vegas</option>
                            <option value="c53a7e50-22a5-4695-b7c4-43222b158ca4">Lisbon</option>
                            <option value="efc40865-c687-4ba0-8f22-09e0b8ac7ba0">Liverpool</option>
                            <option value="0233200d-7a2a-446f-8973-e99645de02d2">London</option>
                            <option value="5e24efc9-14e4-432c-b7dc-3630204fb956">Los-Angeles</option>
                            <option value="3b1f434d-43b9-48f6-aca4-7dcabd913d78">Luxembourg</option>
                            <option value="a6595f3a-f001-4c46-86f2-597f19b2660a">Lyon</option>
                            <option value="1435ed75-4c87-4d26-a001-f5673d4769dd">Macau</option>
                            <option value="19c1a631-25f7-4f73-8e9a-2a6f728f3820">Madrid</option>
                            <option value="31df16ac-8339-44f9-9403-2e52efbd7a18">Malaga</option>
                            <option value="aa862c85-9950-499f-9ea5-646bdd393d09">Manchester</option>
                            <option value="9c88ab59-1726-45b4-b990-4e52a93c3b47">Manila</option>
                            <option value="6cfb08f9-fbbc-4521-9046-2dc372be1bc2">Marbella</option>
                            <option value="15960778-2b64-4b06-942b-111ae5e3d724">Marseille</option>
                            <option value="9a3d8a3d-69f3-4223-bfbf-8dfd72776459">Mexico-City</option>
                            <option value="d7bbb58d-4a8a-4cc6-bd79-d79e709e70aa">Miami</option>
                            <option value="585baa43-4c51-4042-a5d5-a142624285b6">Milan</option>
                            <option value="c97685e9-17a8-47b4-8f40-7297e63be5f9">Minneapolis</option>
                            <option value="af91ead5-d418-4e6b-bae3-ffce8aaa4a18">Monaco</option>
                            <option value="2e97e46f-bf1d-45a5-84ce-1283a273e58a">Moscow</option>
                            <option value="58cad37f-29e6-479a-95dd-277b1a080649">Munich</option>
                            <option value="114e0ae3-0c49-4e7d-9cb4-056308cebe0c">Muscat</option>
                            <option value="fe6fe759-a1ed-476b-915b-a832f6dbc0d1">Nashville</option>
                            <option value="83a5afae-ab5b-4616-8839-49614493a69f">New-Orleans</option>
                            <option value="2f9e243c-db54-44dc-8045-0da3d26352a0">New-York</option>
                            <option value="81e37823-973b-4adb-bafa-f258c68e5acd">Newcastle</option>
                            <option value="52b13ba7-d756-44b5-ab1c-1b9b8ede27e3">Nice</option>
                            <option value="0912ed20-797b-4031-98e9-2fec0040e0fb">Orlando</option>
                            <option value="d4c4d9f4-c229-427b-bc23-d0b640707b2a">Osaka</option>
                            <option value="aa51ce36-08a1-4397-a57f-c76166075655">Oslo</option>
                            <option value="2852205f-043d-4481-8216-82f97e6cf2d6">Palm-Beach</option>
                            <option value="fbde323a-83f4-419e-9230-9ebe348d0f7a">Palm-Springs</option>
                            <option value="713f0562-54c7-4532-b911-191aaf778ad8">Palma-de-Mallorca</option>
                            <option value="27b0be73-51a8-4175-a8b9-9c1c29d22653">Paris</option>
                            <option value="beee9a1c-ec70-4a47-a92c-0388d2c0e474">Perth</option>
                            <option value="97538398-7178-4717-99f0-0527b5fc4b76">Philadelphia</option>
                            <option value="4bf27b8e-9dbd-4b97-9383-177895c2aa2e">Phoenix</option>
                            <option value="b8365782-8015-45fb-bdd1-fb2d294e76d2">Pittsburgh</option>
                            <option value="7ae7ec98-8365-495c-82ba-7e673624e7e1">Porto</option>
                            <option value="39df4523-0ddc-485c-9036-da34ea95b008">Poznan</option>
                            <option value="975d5b95-e9e5-4a94-928a-8fdefd041632">Prague</option>
                            <option value="7536f44b-3561-4a75-a1f9-363a2401c810">Raleigh</option>
                            <option value="47a96078-d5b7-483e-a284-350b7071bb96">Rio-de-Janeiro</option>
                            <option value="1e438c8a-9c66-4565-81a4-f5a6f3cd07be">Riyadh</option>
                            <option value="afd86e87-33fa-42ed-8f7a-3b6e3d9db37b">Rome</option
                            ><option value="69e02095-2d02-4cf2-957b-c7d98b671057">Rotterdam</option>
                            <option value="ded10197-e2be-42d2-90d1-4f20cfee7fd1">Salalah</option>
                            <option value="5376176d-721f-4811-bc87-6975cbd2b033">San-Antonio</option>
                            <option value="8b69084a-c10d-435b-87a9-afc0de13e86b">San-Diego</option>
                            <option value="e2d158c8-5e08-48ad-b11b-f61470222926">San-Francisco</option>
                            <option value="8607defc-3d9e-4777-bda3-e0c174c44e3c">San-Sebastian</option>
                            <option value="402c8abf-76ba-4ca8-8164-f1ce46ab726f">Santiago</option>
                            <option value="2a4d92a5-28b5-4161-be88-e413b048b5b1">Sao-Paulo</option>
                            <option value="a297d62d-4c8d-4878-83a0-ae6999d5ae84">Seattle</option>
                            <option value="76e3a38e-f067-4cf6-976e-411c52d7a904">Seville</option>
                            <option value="68d7fad7-23a6-478d-8e96-68f317c5667b">Shanghai</option>
                            <option value="8d48c0dc-83b2-4b89-a365-8fbeb1a1e07e">Singapore</option>
                            <option value="5f3c33c8-d190-4ab6-9c7e-3733a3ac5ebc">Sochi</option>
                            <option value="e47c2530-99fc-4a9d-a54f-80f23a1b095f">Sofia</option>
                            <option value="9a2e7608-210c-430c-a7a0-eaec038b3652">St--Petersburg</option>
                            <option value="154932e1-64bb-48af-95c1-2d3b8fa659a0">Stockholm</option>
                            <option value="a7ac8078-564f-4842-9da2-e104f634fc26">Stuttgart</option>
                            <option value="06b5f6c7-93ea-43ad-ba67-ef3c5e6b70d8">Surat</option>
                            <option value="a161fe44-c9d4-41a8-a59e-ed99f7d4c114">Suzhou</option>
                            <option value="a6a6390a-a6b7-4ed8-9550-555ee88d5597">Taipei</option>
                            <option value="50ce3375-c1ad-4026-8fe7-35386e0e9b04">Tampa</option>
                            <option value="84ace599-e006-4c91-bd98-97494eb35fc5">Tel-Aviv</option>
                            <option value="ea0afdaf-1a1f-4364-a199-d45b09c0b4d2">Tokyo</option>
                            <option value="837d38d1-715e-4254-bc82-dbf4b68c577e">Toulouse</option>
                            <option value="a127915e-8b8e-4c54-aa72-39cba1eb9aec">Turin</option>
                            <option value="040fbf3a-ffb8-4ea2-8264-9461566d3451">Valencia</option>
                            <option value="5eee1f95-7614-42ef-96d7-8a1aaf74eb01">Vancouver</option>
                            <option value="f7d541d6-04ae-4ef1-89b2-197fe47c85fc">Vienna</option>
                            <option value="36ffb173-a591-4fe2-8c67-08aef1f9c3e4">Warsaw</option>
                            <option value="92dd9932-3072-4712-9fd4-40b8aa4684e8">Washington--D-C-</option>
                            <option value="18f40db1-0c08-407e-bd45-e28664bf00f0">Wellington</option>
                            <option value="c2f3b17a-21e0-486f-9315-4a008f6f3ec5">Zagreb</option>
                            <option value="896df379-87e0-4c26-8c0d-958c908e98eb">Zurich</option>
                        </select>
                        <div class="input-desc">
                            <label>You can add more cities later</label>
                        </div>
                         <div id="step-4" class="row placeholder" style="display: flow-root; text-align:center">
                            <div class="apollo-media">
                                <div class="media-object">
                                    <img src="{{asset ('images/cms/home/ic-arrow-up.svg')}}" alt="Select to view required vehicles for your city" class="media-object__picture media-object__picture--rounded">
                                    <div class="media-object__content">
                                        <div class="media-object__description">
                                            <p style="font-size:1.375rem";>Select to view required vehicles for your city</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                    </div>
                </div>
                <div id="step-5" class="row subsection" style="display:none">
                    <h3 l10n="">Do you have one of the following vehicles?</h3>
                    <div data-template="Maximum _AGE_ years old in _COLOR_" data-or="or" l10n-data-template="" l10n-data-or="" class="content">
                        <div class="service-class-list">
                            <h4>Maximum 4 years old in black or white</h4>
                        </div>
                        <ul>
                            <li>Mercedes-Benz E-Class</li>
                            <li>BMW 5-Series</li>
                            <li>BMW 6-Series GC</li>
                            <li>Audi A6/A7</li>
                            <li>Tesla Model S</li>
                            <li>Tesla Model X</li>
                            <li>GMC Yukon</li>
                            <li>Mercedes-Benz V-Class</li>
                            <li>Chevrolet Suburban</li>
                            <li>Chevrolet Tahoe</li>
                            <li>Cadillac Escalade</li>
                        </ul>
                        <div class="service-class-list">
                            <h4>Maximum 3 years old in black or white</h4>
                        </div>
                        <ul>
                            <li>Polestar 2</li>
                            <li>Mercedes-Benz S-Class</li>
                            <li>BMW 7-Series</li>
                            <li>Audi A8</li>
                        </ul>
                    </div>
                </div>
                <div class="row subsection">
                    <div class="apollo-input">
                        <div class="input-label">
                            <label>Do you have one of the vehicles listed above?</label>
                        </div>
                        <div class="input-field input-field--grouped">
                            <label for="language-yes" l10n="" class="input-field__radio">
                                <input type="radio" id="language-yes" name="language" value="1"  class="input-field__radio-element">Yes</label>
                                <label for="language-no" l10n="" class="input-field__radio">
                                    <input type="radio" id="language-no" name="language" value="0" class="input-field__radio-element">No</label>
                                </div>
                                <div class="input-desc hide">
                                    <label></label>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <button l10n="" class="second-next-page">Next</button>
                        </div>
                        <div class="row">
                            <a href="" l10n="">Already a partner?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <main id="step-3" style="display: none; margin: top 2px;%">
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
                    <h2 class="lsp-page--title">Required documents</h2>
                    <h4 class="lsp-page--description">This includes all documents that comply with your local regulations.</h4>
                </div>

                <div class="apollo-infobox info">
                    <div class="apollo-infobox--title">
                        <h4>Please note:</h4>
                    </div>
                    <div class="apollo-infobox--description">
                        <p l10n="">We only work with registered companies. We will ask you to send specific documents at a later step.</p>
                    </div>
                </div>

                <div id="service-classes" class="row subsection">
                    <h3 l10n="">Do you have all the following documents?</h3>
                    <div data-template="Maximum _AGE_ years old in _COLOR_" data-or="or" l10n-data-template="" l10n-data-or="" class="content">
                        <div class="service-class-list">
                            <h4>Vehicle</h4>
                        </div>
                        <ul>
                            <li>Vehicle Registration Details Certificate</li>
                            <li>Vehicle Inspection Record</li>
                            <li>Third Party Vehicle Insurance</li>
                            <li>Photos of Vehicle showing Licence Plate</li>
                        </ul>
                        <div class="service-class-list">
                            <h4>Company</h4>
                        </div>
                        <ul>
                            <li>Australia Business Register / Australian Company Number</li>
                            <li>Operator Accreditation Certificate</li>
                        </ul>
                        <div class="service-class-list">
                            <h4>Driver</h4>
                        </div>
                        <ul>
                            <li>Chauffeur Profile Picture</li>
                            <li>Driver's License</li>
                            <li>Driver Accreditation</li>
                        </ul>
                    </div>
                </div>
                <div class="row subsection">
                    <div class="apollo-input">
                        <div class="input-label">
                            <label>Do you have all documents listed above?</label>
                        </div>
                        <div class="input-field input-field--grouped">
                            <label for="language-yes" l10n="" class="input-field__radio">
                                <input type="radio" id="language-yes" name="language" value="1"  class="input-field__radio-element">Yes</label>
                                <label for="language-no" l10n="" class="input-field__radio">
                                    <input type="radio" id="language-no" name="language" value="0" class="input-field__radio-element">No</label>
                                </div>
                                <div class="input-desc hide">
                                    <label></label>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <button l10n="" class="submit-page">Submit</button>
                        </div>
                        <div class="row">
                            <a href="" l10n="">Already a partner?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
@section('js')
<script>
    $(".next-page").on('click',function(){
        $('#step-1').hide();
        $('#step-2').show();
        $('#step-3').hide();
    });
    $(".second-next-page").on('click',function(){
        
        $('#step-2').hide();
        $('#step-3').show();

    });
    $(".submit-page").on('click',function(){
        // $('#step-1').show();
        // $('#step-2').hide();
    });

    $('#city-select').on('change', function(){
        $('#step-4').hide();
        $('#step-5').show();
    });
   

</script>
@endsection
