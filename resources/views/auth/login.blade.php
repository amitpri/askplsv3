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

            <form
                class="bg-white shadow p-8 max-w-login mx-auto"
                method="POST"
                action="{{ route('nova.login') }}"
            >
                {{ csrf_field() }}

                <h2 class="text-2xl text-center font-normal mb-6 text-90">Please Login!</h2>
 

                @if ($errors->any())
                <p class="text-center font-semibold text-danger my-3">
                    @if ($errors->has('email'))
                        {{ $errors->first('email') }}
                    @else
                        {{ $errors->first('password') }}
                    @endif
                    </p>
                @endif

                <div class="mb-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="block font-bold mb-2" for="email">{{ __('Email Address') }}</label>
                    <input class="form-control form-input form-input-bordered w-full rounded-none" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="mb-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="block font-bold mb-2" for="password">{{ __('Password') }}</label>
                    <input class="form-control form-input form-input-bordered w-full rounded-none" id="password" type="password" name="password" required>
                </div>

                <div class="flex mb-6">
                    <label class="flex items-center block text-xl font-bold">
                        <input class="" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="text-base ml-2">{{ __('Remember') }}</span>
                    </label>


                    @if (Laravel\Nova\Nova::resetsPasswords())
                    <div class="ml-auto">
                        <a class="text-primary dim font-bold no-underline" href="/register">
                            Register
                        </a> | 
                        <a class="text-primary dim font-bold no-underline" href="{{ route('nova.password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    </div>
                    @endif
                </div>

                <button class="w-full btn btn-default btn-primary hover:bg-primary-dark rounded-none" type="submit">
                    {{ __('Login') }}
                </button>
            </form>

        </div>
    </div>
</body>
</html>


 