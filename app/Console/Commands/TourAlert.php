<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Auth;

//Model added
use App\Models\Order;
use App\Models\User;

class TourAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tour:alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'After staring tour send alert to tourist and guide,host';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $orders=Order::all();

        foreach($orders as $order)
        {

            $user=User::where('id',$order->id)->get();

            //semd mail to tourist
            $details = [

                'title' => 'Tour Notification',
                'body' => 'Your tour starting',
        
            ];
        
            \Mail::to($order->email)->send(new \App\Mail\TourAlertMail($details));

        }

      
        \Log::info("Send Alert successfully!");
    }
}
