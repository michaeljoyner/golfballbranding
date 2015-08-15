@extends('front.base')

@section('head')
    <meta property="CSRF-token" content="{{ Session::token() }}"/>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
@stop

@section('htmltag')
<html data-wf-site="55bacdc9bb74ff2b476ec9a9" data-wf-page="55c94f2d2795b0501c8e85b4">
@stop

@section('content')
    @include('front.partials.header')
    {!! Form::open(['url' => 'checkout', 'id' => 'checkout-form']) !!}
    <div class="w-section checkoutlistsection">
        <div class="w-container productlistcontainer">
            <h1 class="sectionheading">YOUR SELECTED PRODUCTS</h1>
            <p class="uploadtext">CHOOSE YOUR QUANTITIES</p>
            <ol class="checkout-item-list">
                @foreach($products as $product)
                    <li>
                        <img class="checkout-item-img" src="{{ $product->smallestImageSrc() }}" alt="product image"/>
                        <span class="checkout-iten-name">{{ $product->name }}</span>
                        <div class="select-container">
                            <span class="select-arrow"></span>
                            <select name="product_{{ $product->id }}">
                                @foreach(range(12, 120, 12) as $qty)
                                    <option value="{{ $qty }}">{{ $qty }}</option>
                                @endforeach
                            </select>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
    <div class="w-section packaging-section">
        <div class="w-container packaging-container">
            <h1 class="sectionheading">BRANDED PACKAGING</h1>
            <p class="uploadtext">OPTIONALLY UPGRADE WITH SOME BRANDED PACKAGING</p>
            <div class="w-container">
                <div class="w-row">
                    <div class="w-col-6">
                        <label for="packaging_A">
                            <img src="/images/products/default.jpg" alt="packaging image"/>
                            <input type="checkbox" name="packaging_A" id="packaging_A"/>
                            <span>Branded packaging option A</span>
                        </label>
                    </div>
                    <div class="w-col-6">
                        <label for="packaging_B">
                            <img src="/images/products/default.jpg" alt="packaging image"/>
                            <input type="checkbox" name="packaging_B" id="packaging_B"/>
                            <span>Branded packaging option B</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-section uploadimagesection">
        <div  class="w-container uploadcontainer">
            <h1 class="sectionheading">UPLOAD YOUR LOGO</h1>
            <div action="/logouploads" id="logo-dropzone" class="dropzone uploadbutton">
                CLICK OR DRAG FILES TO UPLOAD
            </div>
            <div id="image-preview" class="dropzone-pv dropzone-previews"></div>
        </div>
        <div class="uploadtext deliverytext ch-para"><span class="highlighttext">Don’t have a logo or image?</span> No problem. You don’t have to do this step right now. And if you need us to design a logo or image for you please let us know in the ‘additional information’ box.</div>
    </div>
    <div class="w-section adittionalinfosection">
        <div class="w-container additionalinfocontainer">
            <h1 class="sectionheading">YOUR DETAILS</h1>
            <div class="w-form yourdeatilsform">
                <div id="email-form" name="email-form">
                    <label class="additionalinfofieldlabel" for="name">Name:</label>
                    <input class="w-input" id="name" type="text" placeholder="Enter your name" name="name">
                    <label class="additionalinfofieldlabel" for="email">Email Address:</label>
                    <input class="w-input" id="email" type="email" placeholder="Enter your email address" name="email"required="required">
                    <label class="additionalinfofieldlabel" for="field">Contact Number:</label>
                    <input class="w-input" id="field" type="text" placeholder="Enter your contact number" name="phone" required="required">
                    <label class="additionalinfofieldlabel" for="field">ADDRESS:</label>
                    <input class="w-input" id="field" type="text" placeholder="Delivery address" name="address" required="required">
                    <label class="additionalinfofieldlabel" for="field">Additional Information:</label>
                    <input class="w-input additionainfotextfield" id="field" type="text" placeholder="Let us know if you have any special requests or questions" name="enquiry">
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="w-button formbutton">Checkout</button>
    {!! Form::close() !!}
    @include('front.partials.footer')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/webflow.js"></script>
    <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
@endsection

@section('bodyscripts')
    <script>
        var helper = {
            getCSRFToken: function() {
                var metas = document.getElementsByTagName('meta');
                var i = 0, l = metas.length;
                for(i;i<l;i++) {
                    if(metas[i].getAttribute("property") == 'CSRF-token') {
                        return metas[i].getAttribute("content");
                    }
                }
                return "";
            },

            appendHiddenFieldToForm: function(formID, inputName, inputValue) {
                var form = document.getElementById(formID);
                var hiddenInput;

                hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');

                hiddenInput.setAttribute('name', inputName);
                hiddenInput.setAttribute('value', inputValue);
                form.appendChild(hiddenInput);
                return;
            }
        };

        Dropzone.options.logoDropzone = {
            init: function() {
                this.on('sending', function(file, xhr, formData) {
                    formData.append('_token', helper.getCSRFToken());
                });
                this.on('success', function(file, response) {
                    helper.appendHiddenFieldToForm('checkout-form', 'logo_images[]', response);
                });
            },
            acceptedFiles: 'image/*',
            headers: {'X-Requested-With': 'XMLHttpRequest'},

            thumbnailWidth: 400,
            thumbnailHeight: null,
            dictDefaultMessage: '',
            previewsContainer: '#image-preview'

        };
    </script>
@endsection