<footer id="footer" class="footer">
    <div class="footer-legal text-center">
        <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">
            <div class="d-flex flex-column align-items-center align-items-lg-start">
                <div class="copyright">
                    Copyright &copy; <strong><span>Nama LKBB</span></strong>. All Rights Reserved {{ now()->year }}
                </div>
            </div>
            <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                @if(!empty($sosmeds))
                    @if(!empty($sosmeds->email) && $sosmeds->email !== '-')
                    <a href="mailto:{{ $sosmeds->email }}" class="gmail" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-envelope-fill"></i>
                    </a>
                    @endif
                    @if(!empty($sosmeds->facebook) && $sosmeds->facebook !== '-')
                    <a href="{{ $sosmeds->facebook }}" class="facebook" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-facebook"></i>
                    </a>
                    @endif
                    @if(!empty($sosmeds->instagram) && $sosmeds->instagram !== '-')
                    <a href="{{ $sosmeds->instagram }}" class="instagram" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-instagram"></i>
                    </a>
                    @endif
                    @if(!empty($sosmeds->tiktok) && $sosmeds->tiktok !== '-')
                    <a href="{{ $sosmeds->tiktok }}" class="tiktok" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    @endif
                    @if(!empty($sosmeds->twitter) && $sosmeds->twitter !== '-')
                    <a href="{{ $sosmeds->twitter }}" class="twitter" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-twitter"></i>
                    </a>
                    @endif
                    @if(!empty($sosmeds->youtube) && $sosmeds->youtube !== '-')
                    <a href="{{ $sosmeds->youtube }}" class="youtube" target="_blank" rel="noopener noreferrer">
                        <i class="bi bi-youtube"></i>
                    </a>
                    @endif
                @endif
            </div>
        </div>
    </div>
</footer>