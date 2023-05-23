export function getAbsoluteHeight(el) {
    el = (typeof el === 'string') ? document.querySelector('el') : el

    const styles = window.getComputedStyle(el)
     var margin = parseFloat(styles['marginTop']) +
                  parseFloat(styles['marginBottom'])

    return Math.ceil(el.offsetHeight + margin)
}
