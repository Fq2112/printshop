<!-- auth -->
<div class="modal fade login" id="loginModal">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="line-height: 2;"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body pb-0">
                <!-- Sign in form -->
                <div class="box">
                    <div class="content">
                        <div class="social">
                            <a class="button button-rounded button-reveal button-facebook tleft"
                               href="{{route('redirect', ['provider' => 'facebook'])}}">
                                <i class="icon-facebook"></i><span>Facebook</span>
                            </a>
                            <a class="button button-rounded button-reveal button-google tleft"
                               href="{{route('redirect', ['provider' => 'google'])}}">
                                <i class="icon-google"></i><span>Google</span>
                            </a>
                        </div>
                        <div class="division">
                            <div class="line l"></div>
                            <span>{{__('lang.modal.auth.divider')}}</span>
                            <div class="line r"></div>
                        </div>
                        <div class="error"></div>
                        <div class="form loginBox">
                            @if(session('register') || session('recovered'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                    </button>
                                    <h4 class="mb-1"><i class="icon-check"></i> {{__('lang.alert.success')}}</h4>
                                    {{session('register') ? __('lang.alert.register') : __('lang.alert.recovery')}}
                                </div>
                            @elseif(session('error') || session('inactive'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                    </button>
                                    <h4 class="mb-1"><i class="icon-times"></i> {{__('lang.alert.error')}}</h4>
                                    {{session('error') ? __('lang.alert.login-fail') : __('lang.alert.login-inactive')}}
                                </div>
                            @endif
                            <form method="post" accept-charset="UTF-8" class="form-horizontal nomargin"
                                  action="{{route('login')}}" id="form-login">
                                @csrf
                                <div class="row has-feedback">
                                    <div class="col-12">
                                        <input class="form-control" type="text" name="useremail" required
                                               value="{{old('email')}}"
                                               placeholder="{{__('lang.placeholder.useremail')}}">
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="row has-feedback">
                                    <div class="col-12">
                                        <input id="log_password" type="password"
                                               class="form-control {{session('error') ? 'is-invalid' : ''}}"
                                               placeholder="{{__('lang.placeholder.password')}}" name="password"
                                               minlength="6" required>
                                        <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                              style="pointer-events: all;cursor: pointer"></span>
                                        @if(session('error'))
                                            <span class="invalid-feedback" style="display: block">
                                                <strong>{{ $errors->first('password') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7">
                                        <div>
                                            <input id="remember" class="checkbox-style" name="remember"
                                                   type="checkbox" {{old('remember') ? 'checked' : ''}}>
                                            <label for="remember" class="checkbox-style-2-label checkbox-small"
                                                   style="text-transform: none">{{__('lang.modal.auth.remember')}}</label>
                                        </div>
                                    </div>
                                    <div class="col text-right">
                                        <a href="javascript:openEmailModal()">{{__('lang.button.forgot')}}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit"
                                                class="button button-rounded button-xlarge nomargin btn-login">
                                            {{__('lang.button.login')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sign up form -->
                <div class="box">
                    <div class="content registerBox" style="display:none;">
                        <div class="form">
                            @if ($errors->has('email'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                    </button>
                                    <h4 class="mb-1"><i class="icon-times"></i> {{__('lang.alert.error')}}</h4>
                                    {{ $errors->first('email') }}
                                </div>
                            @elseif($errors->has('password') || $errors->has('name'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                    </button>
                                    <h4 class="mb-1"><i class="icon-times"></i> {{__('lang.alert.error')}}</h4>
                                    {{ $errors->has('password') ? $errors->first('password') : $errors->first('name') }}
                                </div>
                            @endif
                            <div id="reg_errorAlert"></div>
                            <form method="post" accept-charset="UTF-8" class="form-horizontal nomargin"
                                  action="{{route('register')}}" id="form-register">
                                @csrf
                                <div class="row has-feedback">
                                    <div class="col-12">
                                        <input id="reg_name" type="text" placeholder="{{__('lang.placeholder.name')}}"
                                               class="form-control" name="name" required>
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="row has-feedback">
                                    <div class="col-12">
                                        <input id="reg_username" type="text" placeholder="Username"
                                               class="form-control" name="username" minlength="4" required>
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="row has-feedback">
                                    <div class="col-12">
                                        <input id="reg_email" class="form-control" type="email"
                                               placeholder="Email" name="email" required>
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="row has-feedback">
                                    <div class="col-12">
                                        <input class="form-control" type="password" name="password" minlength="6"
                                               placeholder="{{__('lang.placeholder.password')}}" id="reg_password" required>
                                        <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                              style="pointer-events: all;cursor: pointer"></span>
                                    </div>
                                </div>
                                <div class="row has-feedback">
                                    <div class="col-12">
                                        <input class="form-control" type="password" minlength="6"
                                               placeholder="{{__('lang.placeholder.re-password')}}"
                                               id="reg_password_confirm" name="password_confirmation" required>
                                        <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                              style="pointer-events: all;cursor: pointer"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" style="font-size: 15px;text-align: justify">
                                        <small>
                                            {!! __('lang.modal.auth.pp-tnc') !!}
                                            <a href="{{route('syarat-ketentuan')}}" target="_blank">
                                                {{__('lang.footer.tnc')}}</a>{{__('lang.modal.auth.pp-tnc2')}}
                                            <a href="{{route('kebijakan-privasi')}}" target="_blank">
                                                {{__('lang.footer.pp')}}</a>{!! __('lang.modal.auth.pp-tnc3') !!}.
                                        </small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" id="recaptcha-register"></div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" disabled
                                                class="button button-rounded button-xlarge nomargin btn-register">
                                            {{__('lang.button.register')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Reset password form -->
                <div class="box">
                    <div class="content emailBox" style="display:none;">
                        <div class="form">
                            @if(session('resetLink') || session('resetLink_failed'))
                                <div
                                    class="alert alert-{{session('resetLink') ? 'success' : 'danger'}} alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                    </button>
                                    <h4 class="mb-1">
                                        <i class="icon-{{session('resetLink') ? 'check' : 'times'}}"></i>
                                        {{session('resetLink') ? __('lang.alert.success') : __('lang.alert.alert')}}
                                    </h4>
                                    {{session('resetLink') ? __('lang.alert.reset') : __('lang.alert.email')}}
                                </div>
                            @endif
                            <form method="post" accept-charset="UTF-8" class="form-horizontal nomargin"
                                  action="{{route('password.email')}}">
                                @csrf

                                <div class="row {{ $errors->has('Email') ? ' has-danger' : '' }} has-feedback">
                                    <div class="col-12">
                                        <input class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                                               type="email" placeholder="Email" name="email"
                                               value="{{ old('email') }}" required>
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="display: block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit"
                                                class="button button-rounded button-xlarge nomargin btn-login">
                                            {{__('lang.button.reset')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Recovery password form -->
                <div class="box">
                    @if(session('recover_failed'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <h4 class="mb-1"><i class="icon-times"></i> {{__('lang.alert.error')}}</h4>
                            {{ __('lang.alert.email') }}
                        </div>
                    @endif
                    <div class="content passwordBox" style="display:none;">
                        <div id="forg_errorAlert"></div>
                        <div class="form">
                            <form id="form-recovery" method="post" accept-charset="UTF-8"
                                  class="form-horizontal nomargin" action="{{route('password.reset',
                                  ['token' => session('reset') ? session('reset')['token'] : old('token')])}}">
                                @csrf
                                <div class="row {{ $errors->has('Email') ? ' has-danger' : '' }} has-feedback">
                                    <div class="col-12">
                                        <input class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                                               type="email" placeholder="Email" name="email"
                                               {{session('reset') ? 'readonly' : 'required'}}
                                               value="{{session('reset') ? session('reset')['email'] : old('email')}}">
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="display: block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row {{ $errors->has('password') ? ' has-danger' : '' }} has-feedback">
                                    <div class="col-12">
                                        <input id="forg_password" type="password"
                                               class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                                               placeholder="{{__('lang.placeholder.new-password')}}" name="password"
                                               minlength="6" required>
                                        <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                              style="pointer-events: all;cursor: pointer"></span>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" style="display: block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row {{ $errors->has('password_confirmation') ? ' has-danger' : '' }} has-feedback">
                                    <div class="col-12">
                                        <input id="forg_password_confirm" class="form-control" type="password"
                                               placeholder="{{__('lang.placeholder.re-password')}}"
                                               name="password_confirmation" minlength="6"
                                               onkeyup="return checkForgotPassword()" required>
                                        <span class="glyphicon glyphicon-eye-open form-control-feedback"
                                              style="pointer-events: all;cursor: pointer"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit"
                                                class="button button-rounded button-xlarge nomargin btn-password">
                                            {{__('lang.button.recovery')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="forgot login-footer">
                    <span>{!! __('lang.modal.auth.footer-create') !!}</span>
                </div>
                <div class="forgot register-footer" style="display:none">
                    <span>{!! __('lang.modal.auth.footer-login') !!}</span>
                </div>
            </div>
        </div>
    </div>
</div>
