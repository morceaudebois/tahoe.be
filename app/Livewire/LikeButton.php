<?php 

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class LikeButton extends Component {
    public $post, $glass;

    public function mount(Post $post) {
        $this->post = $post;
    }

    public function toggleLike() {
         $this->post->update([
            'likes' => $this->post->likes + 1,
        ]);
    }

    public function render() {
        return view('livewire.like-button');
    }
}
