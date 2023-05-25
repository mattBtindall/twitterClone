import { DomManipulation } from "./DomManipulation"
import { EventListeners } from "./EventListeners"
import { GlobalElements } from "./GlobalElements"

window.onload = function() {
    const SharedElements = new GlobalElements()
    const EventListener = new EventListeners(SharedElements)
    const DomManipulator = new DomManipulation(SharedElements)
}
