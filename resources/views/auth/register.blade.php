@extends('layouts.login_header')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->






<div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <img src="{{asset('app-assets/images/logo/robust-logo-dark.png')}}" alt="branding logo">
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Create Account</span></h6>
            </div>
            <div class="card-body collapse in"> 
                <div class="card-block">
                    <form class="form-horizontal form-simple" method="POST"  action="{{ route('register') }}" >
                       {{ csrf_field() }}

                        <fieldset class="form-group position-relative has-icon-left mb-1{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control form-control-lg input-lg" id="user-name" name="name" value="{{ old('name') }}" placeholder="User Name" required autofocus>
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>

                            @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif

                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left mb-1{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control form-control-lg input-lg" id="user-email"  name="email" value="{{ old('email') }}" placeholder="Your Email Address" required>
                            <div class="form-control-position">
                                <i class="icon-mail6"></i>
                            </div>

                                @if ($errors->has('email'))
                                    <span class="help-block alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control form-control-lg input-lg" id="user-password" name="password" placeholder="Enter Password" required>
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>

                            @if ($errors->has('password'))
                                    <span class="help-block alert alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control form-control-lg input-lg" id="user-password" name="password_confirmation" placeholder="Confirm Password" required>
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Register</button>
                    </form>
                </div>
                <p class="text-xs-center">Already have an account ? <a href="{{ route('login') }}" class="card-link">Login</a></p>
            </div>
        </div>
      </div>
    </section>
   </div>
  </div>
 </div>
@endsection