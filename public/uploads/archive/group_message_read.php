<style>
    .modal {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: 1;
    /*background-color:rgb(245, 245, 245) ;*/
    opacity: 0;
    visibility: hidden;
    transform: scale(1.1);
    transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
}
.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 1rem 1.5rem;
    width: 24rem;
    border-radius: 0.5rem;
}
.close-button {
    float: right;
    width: 1.5rem;
    line-height: 1.5rem;
    text-align: center;
    cursor: pointer;
    border-radius: 0.25rem;
    background-color: lightgray;
}
.close-button:hover {
    background-color: darkgray;
}
.show-modal {
    opacity: 1;
    visibility: visible;
    transform: scale(1.0);
    transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}
</style>
<div class="ad flex fh qq fe ws wl wc translate-x" :class="profileSidebarOpen ? 'translate-x-1/3' : 'translate-x-0'">
    <div class="tv np">
        <div class="flex items-center fg bg-white cx border-slate-200 vd jd zx op">
            
            <div class="flex items-center">
                <button class="qg yu xm mr-4" @click.stop="profileSidebarOpen = !profileSidebarOpen" aria-controls="profile-sidebar" :aria-expanded="profileSidebarOpen" aria-expanded="false">
                    <span class="tc">Close sidebar</span>
                    <svg class="ur oo db" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"></path>
                    </svg>
                </button>
                <a class="back-to-index d-xl-none d-md-none megasize" href="