<x-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 dark:text-white">
            <h1>{{$title}}</h1>
            <section class="Box">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label for="name">{{ __('Character Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('email') is-invalid @enderror" name="name" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div>
                            <input id="description" type="text" class="form-control @error('password') is-invalid @enderror" name="description" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div>
                            <button type="submit">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</x-layout>
