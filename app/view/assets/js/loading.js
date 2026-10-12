const loading = document.getElementById("loading-screen");

function hideLoading() {
    if (loading) {
        loading.classList.remove("active");
    }
}

window.addEventListener("pageshow", () => {
    setTimeout(hideLoading, 500);
});


function navigateTo(url) {
    if (loading) {
        loading.classList.add("active");
    }

    setTimeout(() => {
        window.location.href = url;
    }, 700);
}