<div class="likeContainer {{ $glass ? 'glass' : '' }}"
    x-data="{ liked: {{ $this->isLiked() ? 'true' : 'false' }} }"
    wire:click="toggleLike"
    @click="liked = true; localStorage.setItem('liked_{{ $this->element->id }}', true)"
    :class="liked ? 'liked' : ''">
    <span class="likeCounter">{{ $element->likes ? $element->likes : 0 }}</span>
    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 420 350"><path d="m510 216.125c0 153.125-210 231.875-210 231.875s-210-78.75-210-231.875c0-65.275 50.736-118.125 113.4-118.125 40.824 0 76.608 22.488 96.6 56.175 19.992-33.687 55.776-56.175 96.6-56.175 62.664 0 113.4 52.85 113.4 118.125z" fill="#f7263f" fill-rule="nonzero" transform="translate(-90 -98)"/></svg>
</div>