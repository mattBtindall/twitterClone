import Global from "./GlobalVariables"

export class EventListeners {
    constructor(sharedElements, DomManipulator) {
        this.sharedElements = {
            sidebarEl: document.querySelector('.sidebar'),
        }

        this.DomManipulator = DomManipulator
        this.setEventlisteners()
    }

    setEventlisteners() {
        this.setSideBar()
        this.setPostSection()
        this.setCopyToClipboard()
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
            // if route is not app_posts redirect to app_posts
            if (Global.getRoute() !== 'app_posts') {
                window.location = Global.getPostsPath() + '/true'
                return
            }

            postContainerEl.classList.toggle('active')
            postBtnEl.innerText = postContainerEl.classList.contains('active') ? 'Hide Post' : 'Post'
            setTimeout(() => this.DomManipulator.setMainContainerHeight(), 310) // wait until the post container has animatied it's height
            this.toggleSidebar()
        })
    }

    setCopyToClipboard() {
        const copyToClipboardEls = document.querySelectorAll('.copy-to-clipboard')

        const copyToClipboard = (e) => {
            e.preventDefault()
            navigator.clipboard.writeText(e.currentTarget.dataset.url)
        }

        copyToClipboardEls.forEach(el => el.addEventListener('click', copyToClipboard))
    }

    toggleSidebar() {
        this.sharedElements.sidebarEl.classList.toggle('active')
        document.body.classList.toggle('active')
    }
}
