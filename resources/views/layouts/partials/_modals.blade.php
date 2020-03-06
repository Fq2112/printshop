<!-- subscribe modal -->
<div class="modal-on-load" data-target="#subscribe-modal"></div>
<div class="modal1 mfp-hide subscribe-widget divcenter" id="subscribe-modal" style="max-width: 750px;">
    <div class="row justify-content-center bg-white align-items-center" style="min-height: 380px;">
        <div class="col-md-5 p-0">
            <div
                style="background: url('{{asset('images/modals/modal1.jpg')}}') no-repeat center right;background-size: cover;min-height: 380px;"></div>
        </div>
        <div class="col-md-7 bg-white p-4">
            <div class="heading-block nobottomborder mb-3">
                <h3 class="font-secondary nott ">Join Our Newsletter &amp; Get <span class="text-danger">40%</span>
                    Off your First Order</h3>
                <span>Get Latest Fashion Updates &amp; Offers</span>
            </div>
            <div class="widget-subscribe-form-result"></div>
            <form class="widget-subscribe-form2 mb-2" action="include/subscribe.php" method="post">
                <input type="email" id="widget-subscribe-form2-email" name="widget-subscribe-form-email"
                       class="form-control required email" placeholder="Enter your Email Address..">
                <div class="d-flex justify-content-between align-items-center mt-1">
                    <button class="button button-dark  bg-dark text-white ml-0" type="submit">Subscribe</button>
                    <a href="#" class="btn-link" onClick="$.magnificPopup.close();return false;">Don't Show me</a>
                </div>
            </form>
            <small class="nobottommargin font-italic text-black-50">*We also hate Spam &amp; Junk Emails.</small>
        </div>
    </div>
</div>

<!-- auth modal -->
<div class="modal1 mfp-hide" id="modal-register">
    <div class="card divcenter" style="max-width: 540px;">
        <div class="card-header py-3 nobg center">
            <h3 class="mb-0 t400">Hello, Welcome Back</h3>
        </div>
        <div class="card-body divcenter py-5" style="max-width: 70%;">

            <a href="#"
               class="button button-large btn-block si-colored si-facebook nott t400 ls0 center nomargin"><i
                    class="icon-facebook-sign"></i> Log in with Facebook</a>

            <div class="divider divider-center"><span class="position-relative" style="top: -2px">OR</span></div>

            <form id="login-form" name="login-form" class="nobottommargin row" action="#" method="post">

                <div class="col-12">
                    <input type="text" id="login-form-username" name="login-form-username" value=""
                           class="form-control not-dark" placeholder="Username"/>
                </div>

                <div class="col-12 mt-4">
                    <input type="password" id="login-form-password" name="login-form-password" value=""
                           class="form-control not-dark" placeholder="Password"/>
                </div>

                <div class="col-12">
                    <a href="#" class="fright text-dark t300 mt-2">Forgot Password?</a>
                </div>

                <div class="col-12 mt-4">
                    <button class="button btn-block nomargin" id="login-form-submit" name="login-form-submit"
                            value="login">Login
                    </button>
                </div>
            </form>
        </div>
        <div class="card-footer py-4 center">
            <p class="mb-0">Don't have an account? <a href="#"><u>Sign up</u></a></p>
        </div>
    </div>
</div>
