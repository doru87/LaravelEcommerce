@extends('layouts.app')

@section('section-css')

<style>
.StripeElement {
  background-color: white;
  padding: 16px 16px;
  border: 1px solid #ccc;
}

.StripeElement--focus {
  // box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

#card-errors {
  color: #fa755a;
}
</style>


@endsection

@section('content')
    <div class="container mt-5 mb-5">
      @if (session()->has('statusofpayment'))
      <div class="alert alert-primary" role="alert">
        {{session('statusofpayment')}}
      </div>
      @endif
        <div class="makeorder-wrapper d-flex justify-content-center align-items-center">
            <div class="col-8 text-white p-3">
                <table class="table">
              
                    <tbody>
                      <tr class="thead-dark">
                        <th scope="row">Amount</th>
                        <td>{{$total = isset($total) ? $total : 0}} $</td>
                      
                      </tr>
                      <tr class="thead-dark">
                        <th scope="row">Delivery Tax</th>
                        <td>{{ $shipping_charges = isset($shipping_charges) ? $shipping_charges : 0 }} $</td>
                     
                      </tr>
                      <tr class="thead-dark">
                        <th scope="row">Total amount</th>
                        <td>{{$total + $shipping_charges}} $</td>
                    
                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="col-8 text-black p-3 makeorder ">
                <form action="/makeorder" method="POST" id="payment-form" class="needs-validation" enctype="multipart/form-data">
                    @csrf
                  <div class="form-row ">
                      <div class="col-md-6 mb-3">
                        <label for="firstname">First name</label>
                        <input type="text" class="form-control border border-primary" id="firstname" name="firstname" value="{{$firstname}}" required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="lastname">Last name</label>
                        <input type="text" class="form-control border border-primary" id="lastname" name="lastname" value="{{$lastname}}" required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control border border-primary" id="city" name="city" value="{{$city}}" required>
                        <div class="invalid-tooltip">
                          Please provide a valid city.
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control border border-primary" id="country" name="country" value="{{$country}}" required>
                        <div class="invalid-tooltip">
                          Please provide a valid city.
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="payment_method">Payment Method</label>
                        <select class="custom-select border border-primary" id="payment_method" name="payment_method" required>
                          <option selected disabled value="">Choose...</option>
                          <option value="1">Online payment</option>
                          <option value="2">Payment on delivery</option>
                        </select>
                        <div class="invalid-tooltip">
                          Please select a valid state.
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="zip_code">Zip code</label>
                        <input type="text" class="form-control border border-primary" id="zip_code" name="zip_code" required>
                        <div class="invalid-tooltip">
                          Please provide a valid zip.
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control border border-primary" id="address" name="address" value="{{$address}}" required>
                            <div class="invalid-tooltip">
                              Please provide a valid adress.
                            </div>
                          </div>
                    </div>
                   
     
                    <div class="payment_details">
                      <h2>Payment Details</h2>

                      <div class="form-group">
                          <label for="name_on_card">Name on Card</label>
                          <input type="text" class="form-control border border-primary" id="name_on_card" name="name_on_card" value="">
                      </div>

                      <div class="form-group">
                          <label for="card-element">
                            Credit or debit card
                          </label>
                          <div id="card-element" class="border border-primary">
                          </div>
                          <div id="card-errors" role="alert"></div>
                      </div>
                    </div>

                    <input type="hidden" name="shipping_charges" value="{{$shipping_charges}}">
                    <input type="hidden" name="total" value="{{$total + $shipping_charges}}">

            <button class="btn btn-primary" id="complete-order" type="submit">Submit form</button>
          </form>
        </div>
        </div>
    </div>
@endsection

@section('section-js')
<script src="https://js.stripe.com/v3/"></script>
    <script>
        document.getElementById('payment_method').addEventListener('change', function () {
            document.querySelector('.payment_details').style.display = this.value == 1 ? 'block' : 'none';
        });

        (function(){
            // Create a Stripe client
            var stripe = Stripe('pk_test_51IDASUGMKwBbdaOByrLwMB4BUCy1pu34phvsg39UIXdsOIFqpKZqeRzgBjDiWoHGfBg5UNDpbdt4PikZk0fLFE1c00vXq5PEjk');
            // Create an instance of Elements
            var elements = stripe.elements();
            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };
            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });
            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });
            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();
              // Disable the submit button to prevent repeated clicks
              document.getElementById('complete-order').disabled = true;

              var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('country').value,
                address_zip: document.getElementById('zip_code').value
              }

              stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;
                  // Enable the submit button
                  document.getElementById('complete-order').disabled = false;
                } else {
                  // Send the token to your server
                  stripeTokenHandler(result.token);
                }
              });
            });
            function stripeTokenHandler(token) {
              // Insert the token ID into the form so it gets submitted to the server
              var form = document.getElementById('payment-form');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', token.id);
              form.appendChild(hiddenInput);
              // Submit the form
              form.submit();
            }
          })();
    </script>
@endsection