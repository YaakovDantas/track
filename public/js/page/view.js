class PageView {
    getPageNumber() {
        return location.pathname.replace(/^\/+/g,'').split('/')[1];
    }
    setPageContent() {
        const span = document.getElementById('page-number');
        span.textContent = this.getPageNumber()
    }

}