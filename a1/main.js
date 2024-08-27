function navigateToPage() {
    const selector = document.getElementById('pageSelector');
    const selectedPage = selector.value;
    if (selectedPage) {
        window.location.href = selectedPage;
    }
}