import { getAbsoluteHeight } from "./utils"

export class DomManipulation {
    constructor(sharedElements) {
        this.elements = {
            mainContentEl: document.querySelector('.main-content-container'),
            mainHeaderEl: document.querySelector('.main-header')

        }

        this.setMainContainerHeight()
        this.setYear()
    }

    setMainContainerHeight() {
        const mainContentHeight = window.innerHeight - getAbsoluteHeight(this.elements.mainHeaderEl)
        this.elements.mainContentEl.style.height = mainContentHeight + 'px'
    }

    setYear() {
        const yearOutputs = document.querySelectorAll('.year-output')
        const date = new Date()
        const year = date.getFullYear()
        yearOutputs.forEach(el => el.innerText = year)
    }
}
