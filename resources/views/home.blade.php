@extends('layout.app')

@section('content')
    <div class="container">
        <div id="form_container">
            <div class="row no-gutters">
                <div class="col-lg-4">
                    <div id="left_form">
                        <figure><img src="{{ asset('img/justice.jpg') }}" alt="" width="100" height="100">
                        </figure>
                        <h2>DEPO-PROVERA <span>Questionnaire with Guidance</span></h2>
                        <p>Help yourself in decision-making on whether to seek professional legal advice for a
                            Depo-Provera lawsuit.</p>
                        <a href="tel:18667401419" class="btn_1 rounded yellow purchase" target="_parent"><i
                                class="icon-call"></i>1-866-740-1419</a>
                        <a href="#wizard_container" class="btn_1 rounded mobile_btn yellow">Start Now!</a>
                        <a href="#0" id="more_info" data-toggle="modal" data-target="#more-info"><i
                                class="pe-7s-info"></i></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div id="wizard_container">
                        <div id="top-wizard">
                            <div id="progressbar"></div>
                            <span id="location"></span>
                        </div>
                        @if($errors->any())
                        <div class="row alert-danger alert">
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        </div>
                        @endif
                        <!-- /top-wizard -->
                        <form method="post" action="{{ route('store-inquiry') }}" id="inquiry-form"
                              data-tf-element-role="offer">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control required"
                                               placeholder="First Name *" id="first_name"
                                               oninput="checkValidInput(this)" required
                                               name="first_name" data-tf-element-role="consent-grantor-first_name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name *"
                                               id="last_name" oninput="checkValidInput(this)" required name="last_name"
                                               data-tf-element-role="consent-grantor-last_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Phone number</label>
                                        <input type="text" id="phone" placeholder="Phone number *"
                                               maxlength="10" required onkeypress="return isNumber(event)"
                                               name="phone" class="form-control"
                                               data-tf-element-role="consent-grantor-phone">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" placeholder="Email *" required
                                               name="email" oninput="checkValidInput(this)" class="form-control"
                                               data-tf-element-role="consent-grantor-email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="container_check" data-tf-element-role="contact-method">
                                            By checking this box and clicking “SUBMIT CLAIM REVIEW” I represent that I
                                            am the line subscriber or primary user of the phone number above (including
                                            my wireless number if provided) and provide my express consent authorizing
                                            PLM, Michaels & Sterling, Prime Marketing Source and our marketing partners to contact me by
                                            telephone (including text messages), delivered via automated technology to
                                            the phone number above regarding legal products and/or offerings even if I
                                            am on a Federal, State or Do-Not-Call registry. I understand that these
                                            calls/texts may be delivered via automated technology, at any time in any
                                            way, including but not limited to telemarketing calls using an auto-dialer,
                                            text, fax, or email, even if these result in charges by my carrier. I
                                            further represent that I am a U.S. Resident over the age of 18, understand
                                            and agree to the <a
                                                href="{{route('privacy-policy')}}">Privacy Policy</a>, <a
                                                href="{{route('terms-condition')}}">Terms &amp;
                                                Conditions</a>, and <a
                                                href="https://depolawsuitnow.com/depo-privacy-rights">California Privacy Notice</a> and agree to receive email promotions from PLM, Michaels & Sterling
                                            LLC and our marketing partners. I understand and agree that this site uses
                                            third-party visit recording technology, including, but not limited to,
                                            Trusted Form and Jornaya. I understand that my consent is not required to
                                            continue with my application or is a condition to search for legal products
                                            and/offerings. I understand I can revoke consent at any time.
                                            <input type="checkbox" name="accept_terms" value="Yes"
                                                   data-tf-element-role="consent-opt-in" required>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="g-recaptcha" data-sitekey="{{ config('settings.captcha_site_key') }}" required>
                                </div>
                                <div><input type="hidden" name="hiddenRecaptcha" id="hiddenRecaptcha" required></div>

                            </div>
                            <div id="captchaMessage" style="color: red; display: none; margin-bottom: 20px;">
                                Security Verification Pending...!
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="utm_source" value="{{ request()->get('utm_source', '') }}">
                                <input type="hidden" name="utm_medium" value="{{ request()->get('utm_medium', '') }}">
                                <input type="hidden" name="utm_campaign" value="{{ request()->get('utm_campaign', '') }}">
                                <input type="hidden" name="utm_content" value="{{ request()->get('utm_content', '') }}">
                                <input type="hidden" name="utm_term" value="{{ request()->get('utm_term', '') }}">
                                <input type="hidden" name="fbclid" value="{{ request()->get('fbclid', '') }}">
                                <input type="hidden" name="referer" value="{{ request()->headers->get('referer', '') }}">
                                    <input type="hidden" name="bot" value="bot">
                                <input type="hidden" name="bot_capture" value="">
                                    <p><input type="submit" value="Submit" data-tf-element-role="submit"
                                              class="btn_1 add_bottom_15"
                                              id="submit-contact"></p>
                                </div>
                            </div>
                        </form>
                        {{-- {{ dd(urlencode(route('store-inquiry')))}} --}}
                        {{--<iframe
                            src="https://link.streamlinesystems.io/widget/form/324Ox4FOhxANvjel9LAI"
                            style="width:100%;height:100%;border:none;border-radius:3px"
                            id="inline-324Ox4FOhxANvjel9LAI"
                            data-layout="{'id':'INLINE'}"
                            data-trigger-type="alwaysShow"
                            data-trigger-value=""
                            data-activation-type="alwaysActivated"
                            data-activation-value=""
                            data-deactivation-type="neverDeactivate"
                            data-deactivation-value=""
                            data-form-name="Depo Lead Form"
                            data-height="1070"
                            data-layout-iframe-id="inline-324Ox4FOhxANvjel9LAI"
                            data-form-id="324Ox4FOhxANvjel9LAI"
                            title="Depo Lead Form"
                        >
                        </iframe>
                        <script src="https://link.streamlinesystems.io/js/form_embed.js"></script>--}}
                    </div>
                    <!-- /Wizard container -->
                </div>
            </div><!-- /Row -->
        </div><!-- /Form_container -->

        <main id="general_page">
            <div class="container margin_60_35">
                <div class="main_title_2">
                    <span><em></em></span>
                    <h2 id="get_started">GET STARTED</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6" id="left_form"
                         style="background-color: #0088ccc9;text-align: left">
                        <p>Are you struggling with health complications after using Depo? You’re not alone, and we’re
                            here to help. At DepoLawsuit, we understand how devastating the impact of unexpected side
                            effects can be on your health, finances, and quality of life. Whether you’ve experienced
                            debilitating medical conditions or a loved one has been affected, you don’t have to face
                            this battle alone. Filing a Depo lawsuit is your first step toward holding negligent parties
                            accountable and seeking the compensation you deserve.</p>

                        <p>Our team of experienced legal professionals specializes in cases like yours. We’ve helped
                            countless individuals navigate the complex legal process and fight for justice against large
                            corporations. From gathering evidence to filing claims, we handle every aspect of your case
                            so you can focus on your recovery. At DepoLawsuit, we are committed to giving you a voice
                            and ensuring you are treated fairly under the law.</p>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <img src="{{ asset('img/get_started.png') }}">
                    </div>
                </div>
            </div>
            <!-- /container -->

            <div class="container margin_60_35">
                <div class="main_title_2">
                    <span><em></em></span>
                    <h2 id="background_info">BACKGROUND INFO</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <img src="{{ asset('img/background_info.png') }}">
                    </div>
                    <div class="col-lg-6 col-md-6" id="left_form" style="background-color: #6c757d;text-align: left">
                        <p>Depo has long been a trusted medication, but growing evidence links it to severe health
                            risks, including bone density loss, hormonal imbalances, severe mood changes, and an increased risk of infertility.. Many users were not properly warned about these dangers,
                            leaving them vulnerable to unexpected complications.</p>

                        <p>If you or a loved one has experienced adverse side effects from Depo, it’s essential to
                            understand your rights. Our team specializes in uncovering the facts and helping victims
                            hold negligent manufacturers accountable.</p>
                    </div>

                </div>
            </div>

            <div class="container margin_60_35">
                <div class="main_title_2">
                    <span><em></em></span>
                    <h2 id="who_is_eligible">WHO IS ELIGIBLE?</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6" id="left_form" style="background-color: #1c7430;text-align: left">
                        <p>Not sure if you qualify for a Depo-related lawsuit? You may be eligible if:</p>
                        <ul class="list">
                            <li>1. You were prescribed Depo and suffered from serious side effects.</li>
                            <li>2. You were not informed of the associated risks before using Depo.</li>
                            <li>3. You have medical records or evidence linking Depo to your condition.</li>
                            <li>4. A loved one has experienced complications or passed away due to Depo-related issues.
                            </li>
                        </ul>

                        <p>Our dedicated legal team will evaluate your case for free and determine your eligibility.
                            Don’t let time run out—lawsuit deadlines may apply.</p>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <img src="{{ asset('img/who_is_eligible.png') }}">
                    </div>
                </div>
            </div>

            <div class="container margin_60_35">
                <div class="main_title_2">
                    <span><em></em></span>
                    <h2 id="free_case_evaluation">FREE CASE EVALUATION</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <img src="{{ asset('img/Farmer-Family-2-e1697654633765.png') }}">
                    </div>
                    <div class="col-lg-6 col-md-6" id="left_form" style="text-align: left">
                        <p>Getting started is easy and completely risk-free. At DepoLawsuit, we believe everyone
                            deserves access to justice, so there are no upfront costs for your case evaluation. Simply
                            provide us with some basic information about your experience, and our legal experts will
                            review your case. If you qualify, we’ll connect you with an experienced attorney who will
                            fight for your rights and work tirelessly to secure the compensation you deserve.

                        </p>

                        <p><strong>Your story matters—contact us today!</strong></p>
                    </div>

                </div>
            </div>


        </main>
    </div>
    <!-- /container -->

    <!-- Modal info -->
    <div class="modal fade" id="more-info" tabindex="-1" role="dialog" aria-labelledby="more-infoLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="more-infoLabel">Depo-Provera Lawsuit – Frequently Asked Questions
                        (FAQs)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <strong>1. What is the Depo-Provera lawsuit about?</strong>
                    <p>The Depo-Provera lawsuit involves claims against the manufacturer for failing to warn users about
                        the serious side effects of the injectable contraceptive. These include osteoporosis, bone
                        fractures, and other long-term health complications.</p>
                    <strong>2. What are the side effects associated with Depo-Provera?</strong>
                    <p>Common side effects include:</p>
                    <ul>
                        <li>Bone density loss leading to osteoporosis.</li>
                        <li>Increased risk of bone fractures.</li>
                        <li>Irregular menstrual cycles.</li>
                        <li>Depression, headaches, and weight changes.</li>
                    </ul>
                    <strong>3. Who is eligible to file a Depo-Provera lawsuit?</strong>
                    <p>You may be eligible if:</p>
                    <ul>
                        <li>You used Depo-Provera and were diagnosed with osteoporosis, bone fractures, or other related
                            conditions.
                        </li>
                        <li>You were not adequately informed of these risks by your healthcare provider or the
                            manufacturer.
                        </li>
                    </ul>
                    <strong>4. What compensation can I receive?</strong>
                    <p>Compensation may cover:</p>
                    <ul>
                        <li>Medical expenses (past and future).</li>
                        <li>Pain and suffering.</li>
                        <li>Loss of income due to health complications.</li>
                        <li>Punitive damages against the manufacturer.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_1" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection


@section('script')
    <script type="text/javascript">
        (function () {
            var tf = document.createElement('script');
            tf.type = 'text/javascript';
            tf.async = true;
            tf.src = ("https:" == document.location.protocol ? 'https' : 'http') +
                '://api.trustedform.com/trustedform.js?field=xxTrustedFormCertUrl&ping_field=xxTrustedFormPingUrl&l=' +
                new Date().getTime() + Math.random();
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(tf, s);
        })();
    </script>
    <noscript>
        <img src='https://api.trustedform.com/ns.gif'/>
    </noscript>
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            var recaptchaResponse = grecaptcha.getResponse();
            var captchaMessage = document.getElementById('captchaMessage');

            if (recaptchaResponse.length === 0) {
                event.preventDefault();
                captchaMessage.style.display = 'block'; // Show the error message
            } else {
                captchaMessage.style.display = 'none'; // Hide the message if CAPTCHA is complete
                document.getElementById('hiddenRecaptcha').value = recaptchaResponse;
            }
        });
    </script>
@endsection
