<div>
    <footer class="py-5 text-white bg-primary bg-gradient border-top mt-auto">
        <div class="container px-5">
            <div class="row">
                <div class="col-lg-2">
                    <img src="/logo.png" style="height: 150px;" alt="">
                </div>
                <div class="col-lg-4 mx-auto">
                    <h4 class="mb-4 fw-bold">Visi</h4>

                    <p style="line-height: 2rem;">
                        {!! optional($pengaturan)['visi'] !!}
                    </p>
                </div>
                <div class="col-lg-4">
                    <livewire:components.footer-counter lazy />
                </div>
            </div>
        </div>
    </footer>
</div>