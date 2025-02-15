<div>
    <style>
        .form-container {
            width: 300px;
        }

        /* MD */
        @media (min-width: 768px) {
            .form-container {
                width: 350px;
            }
        }

        @media (min-width: 1200px) {
            .form-container {
                width: 400px;
            }
        }
    </style>

    <div class="d-flex justify-content-center w-100 mx-auto" style="height: 100vh">
        <img src="{{ asset('login.jpg') }}" style="object-fit: cover; width: 65vw; filter:brightness(90%)" height="100%" class="d-none d-lg-block">
        <div class="d-flex align-items-center h-full bg-white p-0" style="flex: auto">
            <div class="container my-5 p-0">
                <div class="form-container mx-auto">
                    <div class="app-brand justify-content-center mb-5">
                        <a class="app-brand-link gap-2" href="/">
                            {{-- <img src="{{ asset('head-login.png') }}" style="object-fit: cover;width: 100%;border-radius: 1rem"> --}}
                            <span class="app-brand-logo demo me-3">
                                <img src="{{ asset('pilm_big.svg') }}" height="100px">
                            </span>
                            {{-- <span class="app-brand-text demo text-body fw-bolder text-center"
                                style="text-transform:initial">
                                Profil Desa<br> <span
                                    class="text-primary">{{ env('APP_DESA') }}</span></span> --}}
                        </a>
                    </div>

                    <h4 class="mb-2">Selamat Datang 👋</h4>
                    <p class="mb-4">Silahkan login akun untuk melanjutkan</p>

                    @if (session()->has('registrasi'))
                        <div class="alert alert-primary alert-dismissible border-3 bg-white">
                            Berhasil melakukan registrasi, silahkan masuk untuk melanjutkan.
                            <button class="btn-close" data-bs-dismiss="alert" type="button"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('warning-auth'))
                        <div class="alert alert-warning alert-dismissible border-3 bg-white">
                            Username atau password yang anda masukan tidak ditemukan.
                            <button class="btn-close" data-bs-dismiss="alert" type="button"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <form class="mb-3" wire:submit.prevent="login">
                        <div class="mb-3">
                            <label class="form-label" for="form-email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="form-email"
                                type="email" wire:model.defer="email" placeholder="masukan email" autofocus="">
                        </div>
                        <div class="form-password-toggle mb-3">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="form-password">Password</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input class="form-control @error('password') is-invalid @enderror" id="form-password"
                                    type="password" aria-describedby="password" wire:model.defer="password"
                                    placeholder="············">
                                <span class="input-group-text cursor-pointer">
                                    <i class="bx bx-hide"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" id="remember-me" type="checkbox">
                                <label class="form-check-label" for="remember-me"> Ingat Saya </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-danger d-grid w-100" type="submit">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
