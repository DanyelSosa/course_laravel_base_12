<?php

namespace App\View\Components\blog;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Post;
class Show extends Component
{
    //public $post;


    //protected $except = ['changeTitle'];


    /**
     * Create a new component instance.
     */
    public function __construct( public Post $post)
    {


    }

    public function changeTitle()
    {
        $this->post->title = 'New Title';
    }


    public function render(): View|Closure|string
    {
        return view('components.blog.post.show');
    }
}
