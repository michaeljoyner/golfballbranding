<div id="contact-section" class="w-section contactcontainer">
    <h1 class="sectionheading">CONTACT</h1>
    <div class="contacttextblock">send us a message and we’ll get back to you shortly.</div>
    <div class="w-container contactcontainer">
        <div class="formwrapper">
            <form id="gbb-contact-form" method="POST" action="/contactus">
                {!! csrf_field() !!}
                <label class="fieldlabel" for="name">Name:</label>
                <input class="w-input formfield" id="name" type="text" placeholder="Enter your name" name="name" data-name="Name">
                <label class="fieldlabel" for="email">Email Address:</label>
                <input class="w-input formfield" id="email" type="email" placeholder="Enter your email address" name="email" data-name="Email" required="required">
                <label class="fieldlabel" for="field">Message:</label>
                <input class="w-input formfield message" id="field" type="text" placeholder="Type Message" name="enquiry" required="required">
                <input class="w-button formbutton" type="submit" value="Submit">
                <div class="form-cover">
                    <p id="cf-thanks">
                        Thank you. We'll be in touch
                    </p>
                    <p id="cf-reset">Send another message.</p>
                </div>
            </form>
        </div>
    </div>
    <div class="contacttextblock bottom">Alternatively call ryan at +27 83 257 9611 or EMAIL at ryan@absolutesport.co.za</div>
</div>
