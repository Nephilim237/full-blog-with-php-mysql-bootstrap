function menuToggle() {
    let hamburger = document.querySelector('#hamburger');
    let header = document.querySelector('#header');
    let icon = hamburger.firstChild;

    icon.addEventListener('click', menuHandle);

    function menuHandle() {
        if (!header.classList.contains('show')) {
            header.classList.add('show');
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        } else {
            header.classList.remove('show');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    }
}


function responsiveDropdownToggle() {
    let dropdown = document.querySelector('.dropdown-menu');
    document.querySelector('.nav-item.submenu').addEventListener('click', () => {
        if (!dropdown.classList.contains('show')) {
            dropdown.classList.add('show')
        } else {
            dropdown.classList.remove('show')
        }
    })
}

menuToggle();

responsiveDropdownToggle();