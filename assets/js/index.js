import { DomManipulation } from "./DomManipulation"
import { EventListeners } from "./EventListeners"
import { GlobalElements } from "./GlobalElements"

window.onload = function() {
    const SharedElements = new GlobalElements()
    const DomManipulator = new DomManipulation(SharedElements)
    const EventListener = new EventListeners(SharedElements, DomManipulator)
}
