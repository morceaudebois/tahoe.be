import PhotoSwipeLightbox from 'photoswipe/lightbox';
import 'photoswipe/style.css';



window.createFirework = function(x, y) {
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

// Mouse animation stolen here: https://codepen.io/kevinpowell/pen/GRBdLEv
document.addEventListener("mousemove", (event) => {
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
    document.body.style.setProperty("--rotateX", (offsetX / 5) + "deg")
    document.body.style.setProperty("--rotateY", -1 * (offsetY / 5) + "deg")
})

// masonry grid stolen here: https://css-tricks.com/a-lightweight-masonry-solution/
let grids = [...document.querySelectorAll('#photo-grid, #post-grid')];
if (grids.length && getComputedStyle(grids[0]).gridTemplateRows !== 'masonry') {
    grids = grids.map(grid => ({
        _el: grid,
        gap: parseFloat(getComputedStyle(grid).rowGap),
        items: [...grid.childNodes].filter(c => c.nodeType === 1 && +getComputedStyle(c).gridColumnEnd !== -1),
        ncol: 0,
        mod: 0
    }))

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

    // trigger fonction de layout pendant l'animation d'apparition
    if (document.body.classList.contains('photography')) {
        let intervalId = setInterval(layout, 1)

        setTimeout(function () {
            clearInterval(intervalId);
        }, 1000)
    }
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
    lightbox.pswp.options.easing = 'cubic-bezier(0.165, 0.84, 0.44, 1)'

    // disables right click 
    lightbox.pswp.element.querySelectorAll('.pswp__item').forEach(function(item) {
        item.oncontextmenu = function (event) {
            console.error("Thief! 🫠")
            event.preventDefault()
        }
    })  
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


lightbox.on('uiRegister', function () {
    // info button
    lightbox.pswp.ui.registerElement({
        name: 'info-button',
        order: 8,
        isButton: true,
        tagName: 'button',
        appendTo: 'root',
        // SVG with outline
        html: {
            isCustomSVG: true,
            inner: '<svg clip-rule="evenodd" id="pswp__icn-download" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg"><path d="m13 11c0-1.646-1.354-3-3-3s-3 1.354-3 3 1.354 3 3 3 3-1.354 3-3zm-3 5c-2.743 0-5-2.257-5-5s2.257-5 5-5 5 2.257 5 5-2.257 5-5 5zm-3.58-13.44-.67.64c-.371.357-.865.558-1.38.56h-2.37c-1.027-.063-1.926.724-2 1.75v10.54c.069 1.03.97 1.822 2 1.76h16c1.03.062 1.931-.73 2-1.76v-10.54c-.069-1.03-.97-1.822-2-1.76h-2.37c-.515-.002-1.009-.203-1.38-.56l-.67-.64c-.372-.354-.867-.551-1.38-.55h-4.4c-.515.002-1.009.203-1.38.56z" transform="translate(0 -2)"/></svg>',
            outlineID: 'pswp__icn-download'
        },
        onClick: () => {
            document.querySelector('.pswp__descContainer').classList.toggle('visible')
        }
    }),
    // info block
    lightbox.pswp.ui.registerElement({
        name: 'descContainer',
        tagName: 'div',
        appendTo: 'root',

        onInit: (el, pswp) => {
            pswp.on('change', () => {
                let desc = pswp.currSlide.data.element.getAttribute("data-description")
                
                if (desc) {
                    document.querySelector('.pswp__descContainer').innerHTML = desc
                } else {
                    document.querySelector('.pswp__button--info-button').style.display = "none"
                }
            })
        }
    })
})

lightbox.init()
