<!-- Main Footer -->
<footer class="main-footer">
    <div class="card-body text-center ">
        {{ config('app.vcs.address') }} • <a href="mailto:{{ config('app.vcs.email') }}">{{ config('app.vcs.email') }}</a> • {{ config('app.vcs.phone') }} • {{ config('app.vcs.fax') }}
        <br>
        &copy; {{ \Carbon\Carbon::now()->format('Y') }} <a href="http://www.chieppa.com" target="_blank">Jesse Chieppa</a>
        <br>
        {{  `git describe` }}
    </div>
</footer>
