import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';
import PhotoSwipeLightbox from 'photoswipe/lightbox';
import 'photoswipe/style.css';

Livewire.start()

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
const glassHover = (event) => {
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
}

document.querySelectorAll('.glassHover').forEach(function (glassHoverBloc) {
    // adds event listener when hover on bloc
    glassHoverBloc.addEventListener("mouseenter", () => {
        document.addEventListener("mousemove", glassHover)
    })

    // then removes it when mouse out 
    glassHoverBloc.addEventListener("mouseleave", () => {
        document.removeEventListener("mousemove", glassHover)
    })
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

function copyToClipboard(text) {
    const el = document.createElement('textarea')
        el.value = text;
        el.setAttribute('readonly', '')
        el.style.position = 'absolute'
        el.style.left = '-9999px'
    document.body.appendChild(el)

    el.select()
    document.execCommand('copy')
    document.body.removeChild(el)

    console.log('Text copied to clipboard:', text)


}

function isValidUrl(string) {
    try {
        new URL(string);
        return true;
    } catch (err) {
        return false;
    }
}


function isValidYouTubeUrl(url) {
    // Regular expression pattern for YouTube video URLs
    let pattern = /^(http(s)?:\/\/)?(www\.)?(m\.)?(youtube\.com\/(watch\?(v=|.*&v=)|embed\/|v\/)|youtu\.be\/|youtube\.com\/live\/)([\w-]{11})(\?‌​.+)?.*$/

    let result = pattern.test(url)

    
    return result

    // should work with these:
    // https://youtu.be/dQw4w9WgXcQ
    // https://www.youtube.com/live/1ThO140eQY4?si=XvSU7qDUmrSo9v-1
    // https://www.youtube.com/watch?v=1ThO140eQY4
}

function cleanLink(url) {
    let parsedUrl = isValidUrl(url) ? new URL(url) : false,
        params = new URLSearchParams(parsedUrl.search),
        videoId

    if (parsedUrl) {
        // if live url, gets video id with regex
        if (!params.get('v') && url.includes('/live/')) {
            let match = url.match(/\/live\/([^?]+)/)
            videoId = match ? match[1] : null
        } else if (url.includes('youtu.be')) {
            // Split the URL by '/' and get the last part
            let parts = url.split('/')
            let lastPart = parts[parts.length - 1]

            // Split the last part by '?' to remove any additional parameters
            videoId = lastPart.split('?')[0]
        } else videoId = params.get('v') // else just gets the parameter

        initYouTubeVideo(videoId)
        return `https://youtu.be/${videoId}`
    } else return null

}

function error(event) {
    event.preventDefault()
    event.target.classList.add("error")
    setTimeout(() => { event.target.classList.remove("error") }, 125)
}

function validateNumber(event) {
    if (event.target.name !== 'urlInput' && !/^\d+$/.test(event.data) && event.inputType !== 'deleteContentBackward') {
        error(event)
        return false
    } return true
}

if (document.body.classList.contains('youtube-timecode')) {
    let urlInput = document.querySelector('#urlInput'),
        resultInput = document.querySelector('#timecodeLink'),
        secondsInput = document.querySelector('input[name=seconds]'),
        minutesInput = document.querySelector('input[name=minutes]'),
        hoursInput = document.querySelector('input[name=hours]'),
        errorField = document.querySelector('#error'),
        resultContainer = document.querySelector('.result'),
        youtubePlayer = document.querySelector('.youtube-player')

    urlInput.addEventListener('beforeinput', validateNumber)
    secondsInput.addEventListener('beforeinput', validateNumber)
    minutesInput.addEventListener('beforeinput', validateNumber)
    hoursInput.addEventListener('beforeinput', validateNumber)

    function processLink() {
        let seconds = parseInt(secondsInput?.value) || 0,
            minutes = parseInt(minutesInput?.value) || 0,
            hours = parseInt(hoursInput?.value) || 0

        let time = seconds + (minutes * 60) + (hours * 60 * 60)

        // no validation if no time
        if (!time) {
            resultContainer.classList.remove('visible')
            errorField.innerHTML = ""
            return
        } 

        // if time, then checks if link is valid
        if (!isValidYouTubeUrl(urlInput.value)) {
            errorField.innerHTML = "Your link is invalid"
            resultContainer.classList.remove('visible')

            if (!urlInput.value) {
                errorField.innerHTML = "Your link is missing"
            } return
        }
        
        errorField.innerHTML = ""

        let link = cleanLink(urlInput.value)

        if (link) {
            link = link + '?t=' + time.toString()

            let readableTime = (hours ? `${hours}h` : '') + (minutes ? `${minutes}m` : '') + (seconds ? `${seconds}s` : '')

            resultInput.value = link
            resultInput.dataset.link = link // for copy feature
            youtubePlayer.href = link
            document.querySelector('#readableTime').innerHTML = readableTime
            
            resultContainer.classList.add('visible')
        } else {
            resultContainer.classList.remove('visible')
            youtubePlayer.href = null
            resultInput.value = null
        } 
    }

    urlInput.addEventListener('input', processLink)
    secondsInput.addEventListener('input', processLink)
    minutesInput.addEventListener('input', processLink)
    hoursInput.addEventListener('input', processLink)

    function copyButton() {
        copyToClipboard(resultInput.dataset.link)

        resultInput.value = "Copied! 🎉"

        setTimeout(function () {
            resultInput.value = resultInput.dataset.link
        }, 1500)
    }

    // reset inputs button
    document.querySelector('.input button').onclick = function () {
        urlInput.value = ''
        secondsInput.value = ''
        minutesInput.value = ''
        hoursInput.value = ''
    }

    document.querySelector('#copy').addEventListener("click", copyButton)
    document.querySelector('#copy').addEventListener('keydown', function (event) {
        if (event.key === 'Enter' || event.keyCode === 13 || event.key === ' ' || event.keyCode === 32) {
            copyButton()
        }
    })
}












// stolen here https://gist.github.com/mheland/1fc280248e40cbe08c1f36c20f879cc1
function getYoutubeData(videoId) {
    return fetch(`https://www.youtube-nocookie.com/oembed?format=json&url=http%3A//youtube.com/watch%3Fv%3D${videoId}`)
        .then(res => res.json())
        .catch(err => { console.log(err) })
}

function initYouTubeVideo(videoId) {
    let playerElements = document.getElementsByClassName('youtube-player')
    for (let n = 0; n < playerElements.length; n++) {
        let thisPlayerId = 'playerid-' + n.toString()

        getYoutubeData(videoId)
            .then(out => document.getElementById(thisPlayerId).innerHTML = out.title)
            .catch(err => {
                document.getElementById(thisPlayerId).innerHTML = "Video couldn't be found :("
            })

        let div = document.createElement('div')
            div.setAttribute('data-id', videoId)
        
        let thumbnail = document.createElement('img')
            thumbnail.src = `//i.ytimg.com/vi/${videoId}/hqdefault.jpg`

        div.appendChild(thumbnail)

        let videoTitle = document.createElement('div')
            videoTitle.setAttribute('class', 'videotitle')
            videoTitle.setAttribute('id', thisPlayerId)
            videoTitle.appendChild(document.createTextNode(''))

        div.appendChild(videoTitle)

        playerElements[n].appendChild(div)
    }
}

