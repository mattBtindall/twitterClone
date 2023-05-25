export class EventListeners {
    constructor() {
        this.sharedElements = {
            sidebarEl: document.querySelector('.sidebar')
        }

        this.setEventlisteners()
    }

    setEventlisteners() {
        this.setSideBar()
        this.setPostSection()
    }

    setSideBar() {
        const sidebarIconEl = document.querySelector('.sidebar-icon')
        const bodyOverlayEl = document.querySelector('.body-overlay')

        sidebarIconEl.addEventListener('click', () => {
            // if position is fixed then we want to be able to open and close the side bar
            const sideBarPosition = window.getComputedStyle(this.sharedElements.sidebarEl).getPropertyValue("position")
            if (sideBarPosition !== 'fixed') return
            this.toggleSidebar()
        })

        bodyOverlayEl.addEventListener('click',() => {
            this.toggleSidebar()
        })
    }

    setPostSection() {
        const postBtnEl = document.querySelector('.post-btn')
        const postContainerEl = document.querySelector('.post-container')

        postBtnEl.addEventListener('click', () => {
            postContainerEl.classList.toggle('active')
            postBtnEl.innerText = postContainerEl.classList.contains('active') ? 'Hide Post' : 'Post'
            this.toggleSidebar()
        })
    }

    toggleSidebar() {
        this.sharedElements.sidebarEl.classList.toggle('active')
        document.body.classList.toggle('active')
    }
}