function setSideBar() {
    const sidebarIconEl = document.querySelector('.sidebar-icon')
    const sidebarEl = document.querySelector('.sidebar')
    const bodyOverlayEl = document.querySelector('.body-overlay')

    function toggleSidebar() {
        sidebarEl.classList.toggle('active')
        document.body.classList.toggle('active')
    }

    sidebarIconEl.addEventListener('click', () => {
        // if position is fixed then we want to be able to open and close the side bar
        const sideBarPosition = window.getComputedStyle(sidebarEl).getPropertyValue("position")
        if (sideBarPosition !== 'fixed') return
        toggleSidebar()
    })

    bodyOverlayEl.addEventListener('click', function() {
        toggleSidebar()
    })
}

function setPostSection() {
    const postBtnEl = document.querySelector('.post-btn')
    const postContainerEl = document.querySelector('.post-container')

    postBtnEl.addEventListener('click', () => {
        postContainerEl.classList.toggle('active')
        postBtnEl.innerText = postContainerEl.classList.contains('active') ? 'Hide Post' : 'Post'
    })
}

export function setEventlisteners() {
    setSideBar()
    setPostSection()
}
