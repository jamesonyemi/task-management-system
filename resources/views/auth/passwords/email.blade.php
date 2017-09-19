@extends('layouts.login_header')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
            <div class="card-header no-border pb-0">
                <div class="card-title text-xs-center">
                    <img src="{{ asset('app-assets/images/logo/robust-logo-dark.png') }}" alt="branding logo">
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>We will send you a link to reset your password.</span></h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">

                        {{ csrf_field() }}

                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="email" class="form-control form-control-lg input-lg{{ $errors->has('email') ? ' has-error' : '' }}" id="user-email" name="email" placeholder="Your Email Address" value="{{ old('email') }}" required>
                            <div class="form-control-position">
                                <i class="icon-mail6"></i>
                            </div>
                                @if ($errors->has('email'))
                                    <span class="alert alert-info">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </fieldset>
                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-lock4"></i> Recover Password</button>
                    </form>
                </div>
            </div>
            <div class="card-footer no-border">
                <p class="float-sm-left text-xs-center"><a href="{{ url('login') }}" class="card-link">Login</a></p>
                <p class="float-sm-right text-xs-center">New to Robust ? <a href="{{ url('register') }}" class="card-link">Create Account</a></p>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


@endsection
