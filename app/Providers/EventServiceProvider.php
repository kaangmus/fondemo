<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Events\MMFileUploaded;
use App\Listeners\MMFileUploadedListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Image;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        MMFileUploaded::class => [
            MMFileUploadedListener::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Event::listen('MMFileUploaded', function ($name, $data,$options) {
        //     Log::info('This is some useful information '.$name.$data.json_encode($options));

        // });
        Event::listen('MMFileUploaded', function ($file_path,$type,$options,$exif_data,$location) {
            // $data = Image::make($url)->exif();
            $dataAry = [
            'file_path' => $file_path,
            'type'      => $type,
            'options'      => $options,
            'exif_data'=>$exif_data,
            'location'=>$location,
            // 'ipct'      => $iptc
            ];
           Log::info('This is some useful information.',$dataAry);
        //    Log::info("GPS",$location);
        //    Log::info("GPS".$iptc);

        });
        Event::listen('MMFileSaved', function ($file_path,$type) {
           Log::info('This is some useful information '.$file_path.$type);

        });
        Event::listen('MMFileDeleted', function ($file_path,$is_folder) {
           Log::info('This is some useful information '.$file_path.$is_folder);

        });
        Event::listen('MMFileRenamed', function ($old_path,$new_path) {
           Log::info('This is some useful information '.$old_path.$new_path);

        });
        Event::listen('MMFileMoved', function ($old_path,$new_path) {
           Log::info('This is some useful information '.$old_path.$new_path);

        });
    }

    /**
     * "ctf0/package-changelog".
     */
    public static function postAutoloadDump(\Composer\Script\Event $event)
    {
        if (class_exists('ctf0\PackageChangeLog\Ops')) {
            return \ctf0\PackageChangeLog\Ops::postAutoloadDump($event);
        }
    }
}
