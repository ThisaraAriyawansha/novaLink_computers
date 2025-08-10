<!-- /main-content-wrap -->
<!-- bottom-page -->
<div class="bottom-page">
    <div class="footer-content">
        <div class="footer-text">2025 © All Rights Reserved | NovaLink Computers</div>
    </div>
</div>
<!-- /bottom-page -->

<!-- /main-content -->
</div>
<!-- /section-content-right -->
</div>
<!-- /layout-wrap -->
</div>
<!-- /#page -->
</div>
<!-- /#wrapper -->

<!-- Javascript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/zoom.js') }}"></script>
<script src="{{ asset('js/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('js/switcher.js') }}"></script>
<script src="{{ asset('js/theme-settings.js') }}"></script>
<script src="{{ asset('js/mains.js') }}"></script>

<style>
/* Footer Styles */
.bottom-page {
    background-color: #000;
    padding: 1.5rem 0;
    margin-top: 2rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.footer-content {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

.footer-text {
    color: #fff;
    font-size: 1.2rem;
    opacity: 0.8;
}

/* Dark mode alternative (if you prefer white background) */
/*
.bottom-page {
    background-color: #fff;
    border-top: 1px solid #e5e7eb;
}
.footer-text {
    color: #000;
}
*/

/* Responsive adjustments */
@media (max-width: 768px) {
    .bottom-page {
        padding: 1rem 0;
    }
    .footer-text {
        font-size: 0.75rem;
    }
}
</style>
</body>
</html>