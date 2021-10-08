<?php

namespace App\Listeners;

use App\Events\ViewCountMovie;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Session;
use Carbon\Carbon;
use App\Models\ViewCount;

class ViewListen
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ViewCountMovie  $event
     * @return void
     */
    public function handle(ViewCountMovie $event)
    {
        $movie = $event->movie;
        if (!$this->checkSession($movie)) {
            $movie->view_count+=1;
            $movie->save();
            $view_count = new ViewCount;
            $view_count->id_movie = $movie->id;
            $view_count->save();
            $this->putSession($movie);
        }
    }
    private function checkSession($movie)
    {
        return array_key_exists($movie->id, Session::get('view_count',[]));
    }
    private function putSession($movie)
    {
        return Session::put('view_count.'.$movie->id,Carbon::now());
    }
}
