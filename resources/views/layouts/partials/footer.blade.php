<!-- Main Footer -->
<footer class="main-footer">
    <div class="card-body text-center ">
        {{ config('app.vendor.address') }} • <a href="mailto:{{ config('app.vendor.email') }}">{{ config('app.vendor.email') }}</a> • {{ config('app.vendor.phone') }}
        <br>
        &copy; {{ \Carbon\Carbon::now()->format('Y') }} <a href="http://www.chieppa.com" target="_blank">Jesse Chieppa</a>
        <br>
        {{  `git describe` }}
    </div>
</footer>
