import { getAbsoluteHeight } from "./utils"

export class DomManipulation {
    constructor() {
        this.setMainContainerHeight()
    }

    setMainContainerHeight() {
        const mainContentEl = document.querySelector('.main-content')
        const mainTitleEl = document.querySelector('.main-title-container')
        const mainContentHeight = window.innerHeight - getAbsoluteHeight(mainTitleEl)
        mainContentEl.style.height = mainContentHeight + 'px'
    }
}
