import './bootstrap';


// Mouse animation stolen here: https://codepen.io/kevinpowell/pen/GRBdLEv
const pres = document.querySelectorAll(".tile");

pres.forEach(function(pre) {
    document.addEventListener("mousemove", (e) => {
        rotateElement(e, pre)
    })
})


function rotateElement(event, element) {
    // get mouse position
    const x = event.clientX
    const y = event.clientY
    // console.log(x, y)

    // find the middle
    const middleX = window.innerWidth / 2
    const middleY = window.innerHeight / 2
    // console.log(middleX, middleY)

    // get offset from middle as a percentage
    // and tone it down a little
    const offsetX = ((x - middleX) / middleX) * 45
    const offsetY = ((y - middleY) / middleY) * 45
    // console.log(offsetX, offsetY);

    // set rotation
    element.style.setProperty("--rotateX", (offsetX/4) + "deg")
    element.style.setProperty("--rotateY", -1 * (offsetY/4) + "deg")
}
