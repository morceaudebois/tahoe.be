<div class="likeContainer {{ $glass ? 'glass' : '' }}"
    x-data="{ liked: {{ $this->isLiked() ? 'true' : 'false' }} }"
    wire:click="toggleLike"
    @click="event.preventDefault(); liked ? null : createFirework(event.clientX, event.clientY); liked = true; localStorage.setItem('liked_{{ $this->element->id }}', true)"
    :class="liked ? 'liked' : ''">
    <span class="likeCounter">{{ $element->likes ? $element->likes : 0 }}</span>
    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 420 350"><path d="m510 216.125c0 153.125-210 231.875-210 231.875s-210-78.75-210-231.875c0-65.275 50.736-118.125 113.4-118.125 40.824 0 76.608 22.488 96.6 56.175 19.992-33.687 55.776-56.175 96.6-56.175 62.664 0 113.4 52.85 113.4 118.125z" fill="#f7263f" fill-rule="nonzero" transform="translate(-90 -98)"/></svg>
</div>

@push('scripts')
    <script>
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
    </script>
@endpush
