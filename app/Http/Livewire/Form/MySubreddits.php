<?php

namespace App\Http\Livewire\Form;

use App\Actions\Reddit\Db\RefreshMySubreddits;
use Livewire\Component;
use WireUi\Traits\Actions;

class MySubreddits extends Component
{
    use Actions;

    public function render()
    {
        return view('livewire.form.my-subreddits');
    }

    public function refreshMySubreddits()
    {
        RefreshMySubreddits::run();

        $this->notification()->success(
            $title = 'Updated your Subreddits',
        );
    }
}
