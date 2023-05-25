export class GlobalElements {
    constructor() {
        this.postContainerEl = document.querySelector('.post-container')
    }

    getElement(el) {
        /** to call logic when getting element name the method 'elName' then the literal word Logic */
        if (this.constructor.prototype.hasOwnProperty(el + 'Logic') && !this[el + 'Logic'](this[el])) {
            return
        }

        return this[el]
    }

    /**
     * EXAMPLE of logic that is added when getting an element
     * notice this must return a boolean that determines whether to return the element or not
     * @param {HTMLElement} el - Dom node
     * @returns {Boolean} whether the object should be returned from the get function
     */
    // postContainerElLogic(el) {
        // console.log('firing some logic for the post container el here')
        // return true
    // }
}
