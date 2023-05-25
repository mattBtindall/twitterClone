import { getAbsoluteHeight } from "./utils"

export class DomManipulation {
    constructor(sharedElements) {
        this.elements = {
            mainContentEl: document.querySelector('.main-content'),
            mainHeaderEl: document.querySelector('.main-header')

        }
        this.setMainContainerHeight()
    }

    setMainContainerHeight() {
        const mainContentHeight = window.innerHeight - getAbsoluteHeight(this.elements.mainHeaderEl)
        this.elements.mainContentEl.style.height = mainContentHeight + 'px'
    }
}
