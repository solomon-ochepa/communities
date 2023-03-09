<footer class="main-footer" id="footer">
    <div class="footer-left">
        {{ setting('site_footer') }}
    </div>

    <div id="copyright" class="footer-right">v{{ \App\Libraries\MyString::version(config('site.version')) }}</div>
</footer>
