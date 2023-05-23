import { getAbsoluteHeight } from "./utils"

window.onload = function() {
    const sidebarIconEl = document.querySelector('.sidebar-icon')
    const sidebarEl = document.querySelector('.sidebar')
    const bodyOverlayEl = document.querySelector('.body-overlay')

    function toggleSidebar() {
        sidebarEl.classList.toggle('active')
        document.body.classList.toggle('active')
    }

    sidebarIconEl.addEventListener('click', function() {
        // if position is fixed then we want to be able to open and close the side bar
        const sideBarPosition = window.getComputedStyle(sidebarEl).getPropertyValue("position")
        if (sideBarPosition !== 'fixed') return

            toggleSidebar()
        })

    bodyOverlayEl.addEventListener('click', function() {
        toggleSidebar()
    })
}
