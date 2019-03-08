<!DOCTYPE html>
<html lang="en" class="h-full font-sans antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Nova::name() }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('app.css', 'vendor/nova') }}">
</head>
<body class="bg-black text-black h-full">
    <div class="h-full">
        <div class="px-view py-view mx-auto">

            <div class="mx-auto py-8 max-w-sm text-center text-90">

                <a href="../../" style="text-decoration: none; color: white;">
                    <h1 width="200", height="39">AskPls</h1> 
                </a>
             
            </div>

            <form class="bg-white shadow p-8 max-w-login mx-auto" method="POST" action="{{ route('register') }}">
                        @csrf

                        <h2 class="text-2xl text-center font-normal mb-6 text-90">Please Register!</h2>

                        <div class="mb-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="block font-bold mb-2" for="name">{{ __('Name') }}</label>

                            @if ( old('name') )
                                <input class="form-control form-input form-input-bordered w-full rounded-none {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                            @else

                                <input class="form-control form-input form-input-bordered w-full rounded-none {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" type="text" name="name" value="{{ $req_name }}" required autofocus>

                            @endif

                            @if ($errors->has('name'))
                                <span class="text-center font-semibold text-danger my-3" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="mb-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="block font-bold mb-2" for="email">{{ __('E-Mail Address') }}</label> 

                            @if ( old('email') )

                                    <input id="email" type="email" class="form-control form-input form-input-bordered w-full rounded-none form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @else

                                    <input id="email" type="email" class="form-control form-input form-input-bordered w-full rounded-none form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $req_emailid }}" required>

                                @endif

                                @if ($errors->has('email'))
                                    <span class="text-center font-semibold text-danger my-3" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
 
                        </div>

                        <div class="mb-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="block font-bold mb-2" for="name">Phone</label>

                            @if ( old('email') )
                                <input class="form-control form-input form-input-bordered w-full rounded-none {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" type="text" name="phone" value="{{ old('phone') }}" required autofocus>
                            @else
                                <input class="form-control form-input form-input-bordered w-full rounded-none {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" type="text" name="phone" value="{{ $req_phone }}" required autofocus>

                            @endif

                            @if ($errors->has('phone'))
                                <span class="text-center font-semibold text-danger my-3" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
 
                       
                        <div class="mb-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="password" class="mb-6 {{ $errors->has('email') ? ' has-error' : '' }}"><b>{{ __('Password') }}</b></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control form-input form-input-bordered w-full rounded-none form-control form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="text-center font-semibold text-danger my-3" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="mb-6"><b>{{ __('Confirm Password') }}</b></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control form-input form-input-bordered w-full rounded-none form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="flex mb-6">
                            <label class="flex items-center block text-xl font-bold">
                                <input class="" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="text-base ml-2">{{ __('Remember') }}</span>
                            </label>


                            @if (Laravel\Nova\Nova::resetsPasswords())
                            <div class="ml-auto">
                                <a class="text-primary dim font-bold no-underline" href="/login">
                                    Login
                                </a> | 
                                <a class="text-primary dim font-bold no-underline" href="{{ route('nova.password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            </div>
                            @endif
                        </div>

                        <button class="w-full btn btn-default btn-primary hover:bg-primary-dark rounded-none" type="submit">
                            {{ __('Register') }}
                        </button>
                    </form>

        </div>
    </div>
</body>
</html>


 