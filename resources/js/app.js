
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

document.querySelectorAll('.watched-toggle').forEach(
    function( elem ) {
        elem.addEventListener('click', toggleVideo);
    }
);

function toggleVideo( e ) {

    e.preventDefault();

    const toggleUrl = this.dataset.toggleUrl;
    const statusElem = this.parentNode.querySelector('.watched-status');

    axios.post( toggleUrl )
        .then( function (response) {
            if ( 1 == response.data.newStatus ) {
                statusElem.innerHTML = 'Yes';
            } else {
               statusElem.innerHTML = 'No';
            }
        } )
        .catch( error => console.log(error) );

}

document.querySelector('.mobile-toggle').addEventListener('click', mobileToggle);

function mobileToggle(e) {
    e.preventDefault();
    const videoNav = document.querySelector('.video-nav');
    videoNav.classList.toggle('mobile-closed');
    videoNav.classList.toggle('mobile-open');
}