@extends('layouts.login_register')

@section('content')
<div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
              <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="auth-form-transparent text-left p-3">
                  <div class="brand-logo">
                    <img src="admin/images/logo.svg" alt="logo">
                  </div>
                  <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                      <i class="mdi mdi-account-outline text-primary"></i>
                                    </span>
                                  </div>
                                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-lg border-left-0" name="name" value="{{ old('name') }}" required autofocus placeholder="name">
                                  @if ($errors->has('name'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                              </div>
                              </div>
                              <div class="form-group">
                                    <div class="input-group">
                                      <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                          <i class="mdi mdi-account-outline text-primary"></i>
                                        </span>
                                      </div>
                                      <input id="nip" type="text" class="form-control{{ $errors->has('nip') ? ' is-invalid' : '' }} form-control-lg border-left-0" name="nip" value="{{ old('nip') }}" required autofocus placeholder="nip">
                                      @if ($errors->has('nip'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nip') }}</strong>
                                            </span>
                                        @endif
                                  </div>
                                  </div>
                                  <div class="form-group">
                                        <div class="input-group">
                                          <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                              <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                          </div>
                                          <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} form-control-lg border-left-0" name="username" value="{{ old('username') }}" required autofocus placeholder="username">
                                          @if ($errors->has('username'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                      </div>
                                      </div>
                                      <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-prepend bg-transparent">
                                                <span class="input-group-text bg-transparent border-right-0">
                                                  <i class="mdi mdi-email-outline text-primary"></i>
                                                </span>
                                              </div>
                                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg border-left-0" name="email" value="{{ old('email') }}" required autofocus placeholder="email">
                                              @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                          </div>
                                          </div>
                                          <div class="form-group">
                                                <div class="input-group">
                                                  <div class="input-group-prepend bg-transparent">
                                                    <span class="input-group-text bg-transparent border-right-0">
                                                      <i class="mdi mdi-lock-outline text-primary"></i>
                                                    </span>
                                                  </div>
                                                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg border-left-0" name="password" value="{{ old('password') }}" required autofocus placeholder="password">
                                                  @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif                      </div>
                                              </div>
                                              <div class="form-group">
                                                    <div class="input-group">
                                                      <div class="input-group-prepend bg-transparent">
                                                        <span class="input-group-text bg-transparent border-right-0">
                                                          <i class="mdi mdi-lock-outline text-primary"></i>
                                                        </span>
                                                      </div>
                                                      <input id="password-confirm" type="password" class="form-control form-control-lg border-left-0" name="password_confirmation"  required  placeholder="re-password">
                                                    </div>
                                                  </div>

                        <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                    {{ __('Register') }}
                                </button>
                        </div>
                    </form>
                </div>
              </div>
              <div class="col-lg-6 register-half-bg d-flex flex-row">
                <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
@endsection
