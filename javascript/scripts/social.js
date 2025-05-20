function sharePost(platform) {
    const title = encodeURIComponent(document.getElementById('post-title').innerText);
    const url = encodeURIComponent(window.location.href);
    let shareUrl = '';

    switch (platform) {
        case 'Facebook':
            shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${title}`;
            break;
        case 'Twitter':
            shareUrl = `https://twitter.com/intent/tweet?text=${title}&url=${url}`;
            break;
        case 'LinkedIn':
            shareUrl = `https://www.linkedin.com/shareArticle?mini=true&url=${url}&title=${title}`;
            break;
        case 'Reddit':
            shareUrl = `https://www.reddit.com/submit?title=${title}&url=${url}`;
            break;
        default:
            alert("Platform not supported.");
            return;
    }

    window.open(shareUrl, '_blank', 'width=600,height=400');
}
