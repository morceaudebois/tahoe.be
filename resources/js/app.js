import './bootstrap'
import PhotoSwipeLightbox from 'photoswipe/lightbox';
import 'photoswipe/style.css';



// Mouse animation stolen here: https://codepen.io/kevinpowell/pen/GRBdLEv
const articles = document.querySelectorAll(".glassHover")

articles.forEach(function(pre) {
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
    // console.log(offsetX, offsetY)

    // set rotation
    element.style.setProperty("--rotateX", (offsetX/6) + "deg")
    element.style.setProperty("--rotateY", -1 * (offsetY/6) + "deg")
}

document.querySelectorAll('.likeContainer').forEach(function(likeContainer) {
    likeContainer.addEventListener('click', function (event) {
        event.preventDefault()
        createFirework(event.clientX, event.clientY)
    })
})

function createFirework(x, y) {
    const container = document.getElementById('particle-container')

    for (let i = 0; i < 30; i++) {
        const particle = document.createElement('div.particle')
            particle.className = 'particle'

        const angle = Math.random() * Math.PI * 2
        const velocity = Math.random() * 8 + 2 // Random velocity between 2 and 10

        const dx = Math.cos(angle) * velocity
        const dy = Math.sin(angle) * velocity

        particle.style.left = x + 'px'
        particle.style.top = y + 'px'

        container.appendChild(particle)

        setTimeout(() => {
            particle.remove()
        }, 400)

        animateParticle(particle, dx, dy)
    }
}

function animateParticle(particle, dx, dy) {
    const startTime = Date.now()
    function update() {
        const deltaTime = Date.now() - startTime
        const progress = Math.min(deltaTime / 400, 1)

        const x = parseFloat(particle.style.left) + dx * progress
        const y = parseFloat(particle.style.top) + dy * progress

        particle.style.left = x + 'px'
        particle.style.top = y + 'px'

        if (progress < 1) requestAnimationFrame(update)
    }

    requestAnimationFrame(update)
}

// masonry grid stolen here: https://css-tricks.com/a-lightweight-masonry-solution/
let grids = [...document.querySelectorAll('#photo-grid')];
if (grids.length && getComputedStyle(grids[0]).gridTemplateRows !== 'masonry') {
    grids = grids.map(grid => ({
        _el: grid,
        gap: parseFloat(getComputedStyle(grid).gridRowGap),
        items: [...grid.childNodes].filter(c => c.nodeType === 1 && +getComputedStyle(c).gridColumnEnd !== -1),
        ncol: 0,
        mod: 0
    }));

    function layout() {
        grids.forEach(grid => {
            /* get the post relayout number of columns */
            let ncol = getComputedStyle(grid._el).gridTemplateColumns.split(' ').length;

            grid.items.forEach(c => {
                let new_h = c.getBoundingClientRect().height;

                if (new_h !== +c.dataset.h) {
                    c.dataset.h = new_h;
                    grid.mod++
                }
            });

            /* if the number of columns has changed */
            if (grid.ncol !== ncol || grid.mod) {
                /* update number of columns */
                grid.ncol = ncol;

                /* revert to initial positioning, no margin */
                grid.items.forEach(c => c.style.removeProperty('margin-top'));

                /* if we have more than one column */
                if (grid.ncol > 1) {
                    grid.items.slice(ncol).forEach((c, i) => {
                        let prev_fin = grid.items[i].getBoundingClientRect().bottom /* bottom edge of item above */,
                            curr_ini = c.getBoundingClientRect().top /* top edge of current item */;

                        c.style.marginTop = `${prev_fin + grid.gap - curr_ini}px`
                    })
                }

                grid.mod = 0
            }
        })
    }

    addEventListener('load', e => {
        layout(); /* initial load */
        addEventListener('resize', layout, false) /* on resize */
    }, false);
}



const lightbox = new PhotoSwipeLightbox({
    gallery: '#photo-grid',
    children: 'a',
    showHideAnimationType: 'zoom',
    hideAnimationDuration: 300,
    showAnimationDuration: 300,
    pswpModule: () => import('https://unpkg.com/photoswipe'),
})

lightbox.on('firstUpdate', () => {
    lightbox.pswp.options.easing = 'cubic-bezier(0.165, 0.84, 0.44, 1)';
})

lightbox.on('initialZoomInEnd', () => {
    lightbox.pswp.options.easing = 'cubic-bezier(0.165, 0.84, 0.44, 1)';
})

lightbox.on('close', () => {
    lightbox.pswp.options.easing = 'cubic-bezier(0.165, 0.84, 0.44, 1)';
})

lightbox.on('afterInit', () => {
    // console.log(lightbox.pswp.currSlide.container)
    lightbox.pswp.currSlide.container.classList.add('radius');
})

lightbox.init()
