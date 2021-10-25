@extends('layouts.main-home-layout')
@section('title')
    Payment Details
@endsection

@section('content-area')
<style>
    .header-04 .bottom-header {
        background: rgb(30, 30, 30);}
    .summary-bar-area.open {
        top: 125px !important;
    }
</style>
    <section class="summary-bar-area open">
        <div class="container-fluid mr-0 ml-5">
            <div class="row">
                <div class="col-md-12 p-0">
                    <ul class="summary-bar">
                        <li>
                            <div class="info">
                                Pick Up Address
                            </div>
                            <p title="{{$form_data['pick_address']}}">{{ substr($form_data['pick_address'], 0, 40)}}...</p>
                        </li>
                        <li>
                            <div class="info">
                                @if($form_data->booking_type === 'time')
                                    Selected Hours
                                @else
                                    Drop Off Address
                                @endif
                            </div>
                            @if($form_data->booking_type === 'time')
                                <p> This Booking Is For    {{ $form_data->estimated_time }} Hours</p>
                                @else
                                    <p title="{{$form_data['drop_address']}}">{{substr($form_data['drop_address'],0,40)}}...</p>
                                @endif
                        </li>
                        <li>
                            <div class="info">
                                Datum
                            </div>
                            <p>{{$form_data['pick_date']}}</p>
                        </li>
                        <li>
                            <div class="info">
                                Zeit
                            </div>
                            <p>{{$form_data['pick_time']}}</p>
                        </li>
                        <li>
                            <div class="info">
                                Dauer
                            </div>
                            <p style="font-family: -webkit-body;">voraussichtlich : {{number_format($form_data['estimated_time'] , 2)  }} Strecke :  {{number_format($form_data['estimated_distance'] , 1)}} km </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
     <section class="booking-steps-area mht ">
            <div class="container-fluid ml-4 mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="booking-steps">
                            <li>
                                <span>1</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/car.png')}}" alt="">
                                </div>
                                <div class="text">
                                    FAHRZEUGKLASSE
                                </div>
                            </li>
                            <li>
                                <span>2</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/options.png')}}" alt="">
                                </div>
                                <div class="text">
                                    OPTIONEN
                                </div>
                            </li>
                            <li>
                                <span>3</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/login.png')}}" alt="">
                                </div>
                                <div class="text">
                                    LOGIN
                                </div>
                            </li>
                            <li class="active">
                                <span>4</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/card.png')}}" alt="">
                                </div>
                                <div class="text text-uppercase">
                                    Bezahlung
                                </div>
                            </li>
                            <li>
                                <span>5</span>
                                <div class="icon">
                                    <img src="{{asset('images/booking/check-out.png')}}" alt="">
                                </div>
                                <div class="text">
                                    CHECK OUT
                                </div>
                            </li>
                        </ul>
                        <div class="button-summary-bar open">
                            <div class="icon">
                                <span class="ion-ios-arrow-thin-down"></span>
                            </div>
                            <p class="show">Ihre Auswahl</p>
                            <p class="hide">Hide</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <section class="check-out-area mt-0 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="check-out">
                        <div class="middle p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>Reservierungsinformationen</h2>
                                    <ul class="summary-bar">
                                        <li>
                                            <div class="info">
                                                Von                                            </div>
                                            <p>{{$form_data->pick_address}}</p>
                                        </li>
                                        <li>
                                            <div class="info">
                                                @if($form_data->booking_type === 'time')
                                                    Stunden
                                                @else
                                                    Nach
                                                @endif
                                            </div>
                                            <p>
                                                @if($form_data->booking_type === 'time')
                                                    {{$form_data->estimated_time}}
                                                @else
                                                    {{$form_data->drop_address}}
                                                @endif
                                                 </p>
                                        </li>
                                        <li>
                                            <div class="info">
                                                Datum
                                            </div>

                                            <p>{{   date_format(date_create($form_data->pick_date),'d/m/Y') }}  </p>
                                        </li>
                                        <li>
                                            <div class="info">
                                                Zeit
                                            </div>
                                            <p>{{$form_data->pick_time}} </p>
                                        </li>
                                        <li>
                                            <div class="info">
                                                Dauer    {{--                                        {{$form_data->description}}--}}
                                            </div>
                                            <p>voraussichtlich : {{$form_data->estimated_time}} <br>Strecke : {{$form_data->estimated_distance}} km </p>
                                        </li>
                                    </ul>
                                  <!--   <form action="{{route('submit.booking')}}" method="post">
                                        @csrf -->
                                        <input type="hidden" name="FormData" value="{{json_encode($form_data)}}">
                                        <input type="hidden" name="selected_category" value="{{json_encode($class)}}">
                                        <input type="hidden" name="selected_category" value="{{json_encode($options_data)}}">
                                        <input type="hidden" name="optionsData" value="{{json_encode($options_data)}}">
                                        <div class="bottom p-5">
                                            <!-- <button type="submit" class="btn btn-lg"> Check Out </button> -->
                                            @if($form_data->orderId == '' || $form_data->orderId == null)
                                            <div id="paypal-button-container"></div>
											
											<p><img src="{{ asset('images/creditcard.png') }}" alt="credit card icons" style="width:30%;" /></p>
											<p style="padding:5px;margin-top:30px;color: #000;font-size: 16px;border-radius:50px;background: #fff;border: 1px solid goldenrod !important;">Mit Kreditkarte ohne Paypal direkt bezahlen uber den Paypal Button oben! </p>
                                            @else
                                            <h4>Betrag Bezahlt!</h4>
                                            @endif
                                        </div>
                                   <!--  </form> -->
                                </div>
                                <div class="col-md-6 pr-0">
                                    <h2>Übersicht</h2>
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Anzahl</th>
                                            <th scope="col">Betrag</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $counter = 1 @endphp
                                        @if(count($options_data) > 0 )
                                            @foreach($options_data as $option)
                                                <tr>
                                                    <th scope="row">{{$counter++}}</th>
                                                    <td class="p-0 pt-2">{{$option->selected_option}}</td>
                                                    <td>{{$option->quantity}}</td>
                                                    <td>{{$option->option_price}}</td>
                                                    <td class="text-primary ">{{$option->option_price * $option->quantity}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <h2>keine weiteren Optionen ausgewählt</h2>
                                        @endif

                                        </tbody>
                                    </table>
                                    <ul class="summary-bar" style="font-family: monospace;">
                                        <li>
                                            <div class="info mt-4">
                                                <ul class="list-group">
                                                    <li class="list-group-item location-list text-center p-2">
                                                        <i class="fa fa-clock"></i> Betrag<span class="w-50 float-right"> {{$form_data->travel_amount - $form_data->tax_amount}} EUR </span>
                                                    </li>
                                                    <li class="list-group-item location-list text-center p-2">
                                                        <i class="fa fa-clock "></i> Extras  <span class="w-50 float-right"> {{$form_data->extra_options_amount}} EUR </span>
                                                    </li>
                                                    <li class="list-group-item location-list text-center p-2">
                                                        <i class="fa fa-clock "></i> Summe  <span class="w-50 float-right"> {{$form_data->extra_options_amount + ($form_data->travel_amount - $form_data->tax_amount)}} EUR </span>
                                                    </li>
                                                    <li class="list-group-item location-list text-center p-2">
                                                         
                                                        {{$tax_rate}}% MwSt.  <span class="w-50 float-right">  {{$form_data->tax_amount}} EUR </span>
                                                    </li>
                                                    <li class="list-group-item location-list text-center p-2" style="color: #af7e2b !important; font-weight: bold;">
                                                        <i class="fa fa-eur"></i> Total
                                                        <span class="w-50 float-right">
                                                            {{$form_data->extra_options_amount + ($form_data->travel_amount)}} EUR </span>

                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')

    <script src="https://www.paypal.com/sdk/js?client-id=Aae4GB5knrVLrqV6EpSXQMJkNbM3kaa6bGLTbGX0vkRUWn19sH-pDWUgmY72qhsGBuU402gTwIppueK1&currency=EUR"></script>
	
<!-- &disable-funding=credit,card <script src="https://www.paypal.com/sdk/js?client-id=AUXGCQW8WwUWqay1Zsmf6zCxdtcGMUqeCPbV0HqW5jqd7MurPnPBsRJIbtFi-_3K2tqlgtl0ZQjqaOdb&currency=EUR"></script> -->

    <script>
        paypal.Buttons({
	style: {
	 layout: 'horizontal',
	 fundingicons: 'true',
	},
	funding: {
	 allowed: [ paypal.FUNDING.CARD ],

	},
            createOrder: function(data, actions) { 
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value: '{{$form_data->net_amount}}'
                }
                }]
            });
            },
            onApprove: function(data, actions) {
                console.log('data');
                console.log(data);
            return actions.order.capture().then(function(details) {
                console.log(details);
                // Call your server to save the transaction
                return fetch('/paypal-transaction-complete', {
                method: 'post',
                headers: {
                    'content-type': 'application/json'
                },
                body: JSON.stringify({
                    orderID: data.orderID,
                    userDetail: details,
                    bookingId: '{{$form_data->id}}',
                    _token: '{{csrf_token()}}'
                })
                }).then(function(){
                    location.href = "{{url('booking/checkout')}}/{{$form_data->id}}";
                });
            });
            }
        }).render('#paypal-button-container');
        $(window).scroll(function() {
             if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                if($(".summary-bar-area").hasClass('open'))
                {
                  $(".summary-bar-area").attr("style","position:fixed;top:0px !important;z-index:999999");
                }
             }else{
                $(".summary-bar-area").attr("style","");
             }
        });
        
	</script>
@endsection
