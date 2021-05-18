<footer class="footer fixed-bottom mt-auto py-3 bg-dark">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-4 d-flex justify-content-between">
                <a href="../pages/about_us.php" class="text-light text-decoration-none fs-6 clickable">About</a>
                <a href="{{ route('faq') }}" class="text-light text-decoration-none fs-6 clickable">FAQ</a>
            </div>
            <div class="col-md-10 col-sm-9 col-8 text-end">
                <span class="text-light fs-6"> &copy; {{ config('app.name', 'Laravel') }} <?= date('Y') ?> </span>
            </div>
        </div>
    
    
    </div>
</footer>
