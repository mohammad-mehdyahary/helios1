@extends('layouts.app')


@section('content')
@include('layouts.menubar')

@php 
$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge;
$vat = $setting->vat;
$cart = Cart::Content();
@endphp
<link rel="stylesheet" href="{{ asset('public/panel/front/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('public/panel/front/css/util.css') }}">

{{-- <style>
  .text-center {
      text-align: center;
  }

  .mt-2 {
      margin-top: 2em;
  }

  .spinner {
      margin: 100px auto 0;
      width: 70px;
      text-align: center;
  }

  .spinner > div {
      width: 18px;
      height: 18px;
      background-color: #333;
      border-radius: 100%;
      display: inline-block;
      -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
      animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  }

  .spinner .bounce1 {
      -webkit-animation-delay: -0.32s;
      animation-delay: -0.32s;
  }

  .spinner .bounce2 {
      -webkit-animation-delay: -0.16s;
      animation-delay: -0.16s;
  }

  @-webkit-keyframes sk-bouncedelay {
      0%, 80%, 100% { -webkit-transform: scale(0) }
      40% { -webkit-transform: scale(1.0) }
  }

  @keyframes sk-bouncedelay {
      0%, 80%, 100% {
          -webkit-transform: scale(0);
          transform: scale(0);
      } 40% {
            -webkit-transform: scale(1.0);
            transform: scale(1.0);
        }
  }
</style> --}}

  

 <!-- wrapper -->
   <div class="container-login100" >
		<div class=" col-lg-4">
			
				<span class="login100-form-title p-b-37">
		           فاکتور خرید شما
				</span>

				<!-- <div class="cart_items">
							<ul class="cart_list">
                                @foreach($cart as $row)
								<li class="cart_item clearfix">
									
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
											<div class="cart_item_title"><b>عکس محصول</b> </div>
											<div class="cart_item_text"><img src="{{ asset($row->options->image) }}" style="width: 65px;highte: 65px;"></div>
										</div>
                                    
                                    <div class="cart_item_name cart_info_col">
											<div class="cart_item_title"><b>نام محصول</b></div><br>
											<div class="cart_item_text">{{ $row->name}}</div>
										</div>
                                        @if($row->options->color == NULL)
                                        @else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title"><b>رنگ</b></div><br>
											<div class="cart_item_text">{{ $row->options->color}}</div>
										</div>
                                        @endif
                                        @if($row->options->size == NULL)
                                        @else
                                        <div class="cart_item_size cart_info_col">
											<div class="cart_item_title"><b>سایز</b></div><br>
											<div class="cart_item_text">{{ $row->options->size}}</div>
										</div>
                                        @endif


										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title"><b>تعداد</b></div><br>
                                            
											<div class="cart_item_text">{{ $row->qty }}</div>
                                               
                                            

										</div>


										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title"><b>قیمت</b></div><br>
											<div class="cart_item_text">{{ $row->price }}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title"><b>جمع کل</b></div><br>
											<div class="cart_item_text">{{ $row->price*$row->qty }}</div>
										</div>
                                        
									</div>
								</li>
                                @endforeach
							</ul>
						</div> -->

                        @foreach($cart as $row)
                        <ol class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-start ">
    <div class="ms-2 me-auto">
      <div class="fw-bold"><b>{{ $row->name}}</b></div>جمع فاکتور:
       {{ $row->price*$row->qty }}تومان
    </div>
    <span class="badge bg-success rounded-pill">تعداد:{{ $row->qty }}</span>
    <span class="badge bg-info rounded-pill">سایز:{{ $row->options->size }}</span>
    <span class="badge bg-primary rounded-pill">رنگ:{{ $row->options->color }}</span>
    
  </li>
 
             </ol>
                      @endforeach

                        <ul class="list-group col-lg-12" style="">
                        @if(Session::has('coupon'))
                        <li class="list-group-item">کل سفارش: <span style="float: right;direction: rtl;">{{ Session::get('coupon')['balance'] }}تومان</span></li>
                        <li class="list-group-item">کد تخفیف: ({{ Session::get('coupon')['name'] }})
                               <a href="{{ route('coupon.remove') }}" class="btn btn-sm btn-danger">X</a>
                           <span style="float: right;direction: rtl;">{{ Session::get('coupon')['discount'] }}تومان</span></li>
                        @else
                        <li class="list-group-item">جمع جزء: <span style="float: right;direction: rtl;">{{ Cart::Subtotal() }}تومان</span></li>

                        @endif
                           
                           
                           <li class="list-group-item" >هزینه پستی : <span style="float: right;direction: rtl;">{{ $charge }}تومان</span></li>
                           <li class="list-group-item">مالیات بر ارزش افزوده : <span style="float: right;direction: rtl;">{{ $vat }}تومان</span></li>
                           @if(Session::has('coupon'))
                           <li class="list-group-item">جمع کل : <span style="float: right;direction: rtl;">{{ Session::get('coupon')['balance'] + $charge + $vat }}تومان</span></li>
                           @else
                           <li class="list-group-item">جمع کل : <span style="float: right;direction: rtl;">{{ Cart::Subtotal() + $charge + $vat }}تومان</span></li>
                           @endif
                        </ul>
		</div>
    <div class="col-lg-6">

      <form method="post" action="{{url('shop')}}" style="width: 25rem;display:flex;justify-content: center;">
        {{csrf_field()}}
        <input type="text" name="price" value="{{ Cart::Subtotal() + $charge + $vat }}">
        <button type="submit" style="background: #2546eb;padding:12px;border-radius: 10px;width:70%;color:#ffffff;">تکمیل خرید</button>
      </form>


      {{-- <form class="text-center mt-2" method="post" action="{{ route('stripe.charge') }}">@csrf
        <p>ارسال به ارائه دهنده پرداخت امن</p>
        <p>
          اگر به طور خودکار به وب سایت پرداخت هدایت نشدید
            <span id="countdown">10</span>
           ثانیه
        </p>

        @foreach($cart as $row)
            <input type="hidden" name="price" value="{{ Cart::Subtotal() + $charge + $vat }}">
        @endforeach

        <button type="submit" style="background: #2546eb;padding:12px;border-radius: 10px;width:70%;color:#ffffff;margin-top:1rem;">تکمیل خرید</button>
    </form> --}}
    
    </div>
		{{-- <div class=" col-lg-7">
        <form id="payment-form" action="{{ route('stripe.charge') }}" method="post">
        @csrf
        <div id="payment-element">
        <!--Stripe.js injects the Payment Element-->
      </div>
      <button id="submit">
        <div class="spinner hidden" id="spinner"></div>
        <input type="hidden" name="shipping" value="{{ $charge }}">
        <input type="hidden" name="vat" value="{{ $vat }}">
        <input type="hidden" name="total" value="{{ Cart::Subtotal() + $charge + $vat }}">

        <input type="hidden" name="ship_name" value="{{ $data['name'] }}">
        <input type="hidden" name="ship_phone" value="{{ $data['phone'] }}">
        <input type="hidden" name="ship_email" value="{{ $data['email'] }}">
        <input type="hidden" name="ship_city" value="{{ $data['city'] }}">
        <input type="hidden" name="ship_address" value="{{ $data['address'] }}">
        <input type="hidden" name="payment_type" value="{{ $data['payment'] }}">

        <span id="button-text">Pay now</span>
      </button>
      <div id="payment-message" class="hidden"></div>
    </form> --}}
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>

  <script>
    // Total seconds to wait
    var seconds = 10;

    function submitForm() {
        document.forms[0].submit();
    }

    function countdown() {
        seconds = seconds - 1;
        if (seconds <= 0) {
            // submit the form
            submitForm();
        } else {
            // Update remaining seconds
            document.getElementById("countdown").innerHTML = seconds;
            // Count down using javascript
            window.setTimeout("countdown()", 1000);
        }
    }

    // Run countdown function
    countdown();
</script>

<script>
        // This is your test publishable API key.
const stripe = Stripe("pk_test_51KK5DlLOErORrbQL21f5RHmWmzTPHz6x9KbmLZZiv2Oq3DLNEgYmVzCMwLHRqRB5JM3LqIEr9ADME8ZJRI0O9wFl00VUMy2nYr");

// The items the customer wants to buy
const items = [{ id: "xl-tshirt" }];

let elements;

initialize();
checkStatus();

document
  .querySelector("#payment-form")
  .addEventListener("submit", handleSubmit);

// Fetches a payment intent and captures the client secret
async function initialize() {
  const { clientSecret } = await fetch("/create.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ items }),
  }).then((r) => r.json());

  elements = stripe.elements({ clientSecret });

  const paymentElement = elements.create("payment");
  paymentElement.mount("#payment-element");
}

async function handleSubmit(e) {
  e.preventDefault();
  setLoading(true);

  const { error } = await stripe.confirmPayment({
    elements,
    confirmParams: {
      // Make sure to change this to your payment completion page
      return_url: "http://localhost:4242/public/checkout.html",
    },
  });

  // This point will only be reached if there is an immediate error when
  // confirming the payment. Otherwise, your customer will be redirected to
  // your `return_url`. For some payment methods like iDEAL, your customer will
  // be redirected to an intermediate site first to authorize the payment, then
  // redirected to the `return_url`.
  if (error.type === "card_error" || error.type === "validation_error") {
    showMessage(error.message);
  } else {
    showMessage("An unexpected error occured.");
  }

  setLoading(false);
}

// Fetches the payment intent status after payment submission
async function checkStatus() {
  const clientSecret = new URLSearchParams(window.location.search).get(
    "payment_intent_client_secret"
  );

  if (!clientSecret) {
    return;
  }

  const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

  switch (paymentIntent.status) {
    case "succeeded":
      showMessage("Payment succeeded!");
      break;
    case "processing":
      showMessage("Your payment is processing.");
      break;
    case "requires_payment_method":
      showMessage("Your payment was not successful, please try again.");
      break;
    default:
      showMessage("Something went wrong.");
      break;
  }
}

// ------- UI helpers -------

function showMessage(messageText) {
  const messageContainer = document.querySelector("#payment-message");

  messageContainer.classList.remove("hidden");
  messageContainer.textContent = messageText;

  setTimeout(function () {
    messageContainer.classList.add("hidden");
    messageText.textContent = "";
  }, 4000);
}

// Show a spinner on payment submission
function setLoading(isLoading) {
  if (isLoading) {
    // Disable the button and show a spinner
    document.querySelector("#submit").disabled = true;
    document.querySelector("#spinner").classList.remove("hidden");
    document.querySelector("#button-text").classList.add("hidden");
  } else {
    document.querySelector("#submit").disabled = false;
    document.querySelector("#spinner").classList.add("hidden");
    document.querySelector("#button-text").classList.remove("hidden");
  }
}
</script>
@endsection
