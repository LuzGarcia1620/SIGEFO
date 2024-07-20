function activateLink(element) {
    // Remove 'active' class from all nav links
    var links = document.querySelectorAll('.nav-link');
    links.forEach(function(link) {
        link.classList.remove('active');
    });

    // Add 'active' class to the clicked nav link
    element.classList.add('active');
}

/*fetch('../../templates/header.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('headerContainer').innerHTML = data;
    });
fetch('../../templates/footer.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('footerContainer').innerHTML = data;
    });*/