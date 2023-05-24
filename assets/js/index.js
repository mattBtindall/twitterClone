import { getAbsoluteHeight } from "./utils"
import { setEventlisteners } from "./eventListeners"

window.onload = function() {
    setMainContainerHeight()
    setEventlisteners()
}

function setMainContainerHeight() {
    const mainContentEl = document.querySelector('.main-content')
    const mainTitleEl = document.querySelector('.main-title-container')
    const mainContentHeight = window.innerHeight - getAbsoluteHeight(mainTitleEl)
    mainContentEl.style.height = mainContentHeight + 'px'
}
