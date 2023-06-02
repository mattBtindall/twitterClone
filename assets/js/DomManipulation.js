import { getAbsoluteHeight } from "./utils"

export class DomManipulation {
    constructor(sharedElements) {
        this.elements = {
            mainContentEl: document.querySelector('.main-content-container'),
            mainHeaderEl: document.querySelector('.main-header'),
            flashPopoverEl: document.querySelector('.flash-popover'),
            flashPopoverMessageEl: document.querySelector('.flash-popover__message')
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

    /**
     * displays a flash message for the specified amount of time (in ms)
     * @param {String} message - flash message content
     * @param {String} classes - comma sperated list of classes to add to popover (use bootstrap here 'bg-danger, border-danger' etc...)
     * @param {Number} time - time the message will show for, default is 5 seconds
     */
    popoverFlashMessage(message, classes, time = 5000) {
        classes = classes.split(',').map(htmlClass => htmlClass.trim())
        classes.push('active')
        this.elements.flashPopoverMessageEl.innerText = message
        this.elements.flashPopoverEl.classList.add(...classes)

        setTimeout(() => {
            this.hidePopoverFlashMessage()
        }, time)
    }

    hidePopoverFlashMessage() {
        this.elements.flashPopoverEl.classList.remove('active')
    }
}
