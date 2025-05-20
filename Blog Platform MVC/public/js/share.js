function share(platform) {
    let url = '';
    switch (platform) {
        case 'Facebook':
            url = `https://www.facebook.com/sharer/sharer.php?u=${postUrl}&quote=${postTitle}`;
            break;
        case 'Twitter':
            url = `https://twitter.com/intent/tweet?url=${postUrl}&text=${postTitle}`;
            break;
        case 'LinkedIn':
            url = `https://www.linkedin.com/shareArticle?mini=true&url=${postUrl}&title=${postTitle}`;
            break;
        case 'Reddit':
            url = `https://www.reddit.com/submit?url=${postUrl}&title=${postTitle}`;
            break;
        default:
            alert('Unsupported platform');
            return;
    }
    window.open(url, '_blank', 'width=600,height=400');
}
