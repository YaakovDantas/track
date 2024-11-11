<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page</title>
</head>
<body>
    <h1>Welcome to page: <span id="page-number"></span></h1>
    <script src="{{ asset('js/page/view.js') }}"></script>
    <script src="{{ asset('js/page/tracker.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const pageView = new PageView();
            pageView.setPageContent();
            new Tracker(pageView).submit();
        });
</script>
</body>
</html>
