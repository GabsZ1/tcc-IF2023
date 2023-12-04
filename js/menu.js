function menuShow() {
    let menuResponsivo = document.querySelector('.menu-responsivo');
    
    if (menuResponsivo.classList.contains('open')) {
        menuResponsivo.classList.remove('open');
        document.querySelector('.icon').src="../../assets/img/imgSITE/menu-svgrepo-com";
    } else {
        menuResponsivo.classList.add('open');
        document.querySelector('.icon').src="../../assets/img/imgSITE/menu-svgrepo-com"
    }
}

function menuShowIndex() {
    let menuResponsivo = document.querySelector('.menu-responsivo');
    
    if (menuResponsivo.classList.contains('open')) {
        menuResponsivo.classList.remove('open');
        document.querySelector('.icon').src ="../../assets/img/imgSITE/menu-svgrepo-com";
    } else {
        menuResponsivo.classList.add('open');
        document.querySelector('.icon').src="../../assets/img/imgSITE/menu-svgrepo-com"
    }
}