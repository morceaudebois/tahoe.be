<?php 

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Photo;

class LikeButton extends Component {
    public $element, $glass;

    // $element can be either a photo or a post
    public function mount($element) {
        $this->element = $element;
    }

    public function toggleLike() {
        $this->element->update(
            ['likes' => $this->element->likes + 1]
        );
    }

    public function render() {
        return view('livewire.like-button');
    }
}
