@extends('front.base')

@section('content')
<form action="">
  <imput type="hidden" value="0" id="dirty-bit"></imput>
</form>
@include('front.partials.header')
@include('front.partials.navbar')
<div class="w-section hero">
  <h1 class="sectionheading">HOW IT WORKS</h1>
  <div class="w-container productscontainer">
    <div class="w-row">
      <div class="w-col w-col-4 stepcolumn first-step">
        <div class="stepdiv"><img class="stepimage" src="images/homepage/step2.png">
          <h1 class="stepheading">1.</h1>
          <p class="steptext">CHOOSE A BALL FROM OUR SELECTION</p>
        </div>
      </div>
      <div class="w-col w-col-4 stepcolumn">
        <div class="stepdiv"><img class="stepimage" src="images/homepage/step1.png">
          <h1 class="stepheading">2.</h1>
          <p class="steptext">UPLOAD YOUR LOGO
            <br>OR IMAGE
          </p>
        </div>
      </div>
      <div class="w-col w-col-4 stepcolumn last-step">
        <div class="stepdiv"><img class="stepimage" src="images/homepage/step3.png">
          <h1 class="stepheading">3.</h1>
          <p class="steptext">Voila! your perfect branded golf ball</p>
        </div>
      </div>
    </div>
  </div>
</div>
@include('front.partials.samples')
@include('front.partials.birdie')
@include('front.partials.productsection', ['products' => $products])
@include('front.partials.packaging')
<div id="delivery-section" class="w-section deliversection">
  <h1 class="sectionheading">DELIVERY</h1>
  <div class="w-container delivercontainer">
    <p class="deliverytext">WE WILL DELIVER YOUR BRANDED GOLF BALLS THROUGHOUT SOUTHERN AFRICA.
      <br>
      <br>PLEASE <a class="hyperlink" href="#">CONTACT US</a> WITH ANY ENQUIRIES.
    </p><img class="deliveryimage" src="images/homepage/africamap.png">
  </div>
</div>
@include('front.partials.contact')
@include('front.partials.footer')
@endsection

@section('bodyscripts')
@include('admin.partials.confirmflash')
<script>
  if (cartManager.cart === null) {
    cartManager.init();
  }
  if (document.getElementById('dirty-bit').value == 1) {
    console.log('cleaning')
    cartManager.cart.syncCart(cartManager.syncButtons);
  }
  var contactForm = new AjaxContactForm(document.getElementById('gbb-contact-form'));
  contactForm.init();
</script>
@endsection
