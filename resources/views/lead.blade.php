@extends('layout.app1')

@section('content')
<div class="container">
    <div id="form_container">
        <div class="row no-gutters">
            
            <div class="col-lg-12">
                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>
                        <span id="location"></span>
                    </div>
                    <!-- /top-wizard -->
                    <form method="post" action="{{ route('send-lead') }}" 
                              data-tf-element-role="offer">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control required"
                                               placeholder="First Name *" id="firstname"
                                               oninput="checkValidInput(this)" required
                                               name="firstname" data-tf-element-role="consent-grantor-firstname">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name *"
                                               id="lastname" oninput="checkValidInput(this)" required name="lastname"
                                               data-tf-element-role="consent-grantor-lastname">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Phone number</label>
                                        <input type="text" id="phone" placeholder="Phone number *"
                                               maxlength="10" required onkeypress="return isNumber(this)"
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
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="zip">Zip</label>
                                        <input type="text" class="form-control required"
                                               placeholder="Zip *" id="zip" required
                                               name="zip" data-tf-element-role="consent-grantor-zip">
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="trusted_form_cert_id">Trusted Form Cert ID</label>
                                        <input type="text" class="form-control required"
                                               placeholder="Trusted Form Cert ID *" id="trusted_form_cert_id" required
                                               name="trusted_form_cert_id" data-tf-element-role="consent-grantor-trusted_form_cert_id">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="trusted_form_cert_url">Trusted Form Cert URL</label>
                                        <input type="text" class="form-control required"
                                               placeholder="Trusted Form Cert URL *" id="trusted_form_cert_url" required
                                               name="trusted_form_cert_url" data-tf-element-role="consent-grantor-trusted_form_cert_url">
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="AffiliateReferenceID">Trusted Form Sharable Cert</label>
                                        <input type="text" class="form-control required"
                                               placeholder="Trusted Form Sharable Cert*" id="AffiliateReferenceID" required
                                               name="AffiliateReferenceID" data-tf-element-role="consent-grantor-AffiliateReferenceID">
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <p><input type="submit" value="SUBMIT CLAIM REVIEW" data-tf-element-role="submit"
                                              class="btn_1 add_bottom_15"
                                              id="submit-contact"></p>
                                </div>
                            </div>
                        </form>
                </div>
                <!-- /Wizard container -->
            </div>
        </div><!-- /Row -->
    </div><!-- /Form_container -->

   
</div>
<!-- /container -->


@endsection


@section('script')

@endsection
