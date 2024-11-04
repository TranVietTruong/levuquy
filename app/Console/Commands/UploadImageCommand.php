<?php

namespace App\Console\Commands;

use App\Services\UploadImageService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UploadImageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $rgx = 'levuquy.info.vn';
        $rows = DB::table('setup')->whereRaw("data REGEXP '$rgx'")->get();
        foreach ($rows as $row) {
            $data = json_decode($row->data, true);
            foreach ($data as $key => $value) {
                if (str_contains($value, 'levuquy')) {
                    $anh = $value;
                    $anh = str_replace(config('app.url'), '', $anh);
                    $anh = explode('/', $anh)[1];
                    $path = storage_path('app/public/').$anh;
                    $link = UploadImageService::upload($path);

                    if ($link) {
                        $data[$key] = $link;

                        $exist = Storage::disk('public')->exists($anh);
                        if($exist) {
                            Storage::disk('public')->delete($anh);
                        }
                    }
                }
            }
            DB::table('setup')->where('id', $row->id)->update(['data' => json_encode($data)]);
        }

        $rows = DB::table('su_kien_cuoi')->whereRaw("anh REGEXP '$rgx'")->get();
        foreach ($rows as $row) {
            $anh = $row->anh;
            $anh = str_replace(config('app.url'), '', $anh);
            $anh = explode('/', $anh)[1];
            $path = storage_path('app/public/').$anh;
            $link = UploadImageService::upload($path);

            if ($link) {
                DB::table('su_kien_cuoi')->where('id', $row->id)->update(['anh' => $link]);

                $exist = Storage::disk('public')->exists($anh);
                if($exist) {
                    Storage::disk('public')->delete($anh);
                }
            }
        }

        $rows = DB::table('couple_informations')
            ->whereRaw("anh_chu_re REGEXP '$rgx'")
            ->orWhereRaw("anh_co_dau REGEXP '$rgx'")
            ->orWhereRaw("anh_co_dau REGEXP '$rgx'")
            ->orWhereRaw("anh_qr_chu_re REGEXP '$rgx'")
            ->orWhereRaw("anh_qr_co_dau REGEXP '$rgx'")
            ->get();
        foreach ($rows as $row) {
            if (str_contains($row->anh_chu_re, $rgx)) {
                $anh = $row->anh_chu_re;
                $anh = str_replace(config('app.url'), '', $anh);
                $anh = explode('/', $anh)[1];
                $path = storage_path('app/public/').$anh;
                $link = UploadImageService::upload($path);

                if ($link) {
                    DB::table('couple_informations')->where('id', $row->id)->update(['anh_chu_re' => $link]);

                    $exist = Storage::disk('public')->exists($anh);
                    if($exist) {
                        Storage::disk('public')->delete($anh);
                    }
                }
            }
            if (str_contains($row->anh_co_dau, $rgx)) {
                $anh = $row->anh_co_dau;
                $anh = str_replace(config('app.url'), '', $anh);
                $anh = explode('/', $anh)[1];
                $path = storage_path('app/public/').$anh;
                $link = UploadImageService::upload($path);

                if ($link) {
                    DB::table('couple_informations')->where('id', $row->id)->update(['anh_co_dau' => $link]);

                    $exist = Storage::disk('public')->exists($anh);
                    if($exist) {
                        Storage::disk('public')->delete($anh);
                    }
                }
            }
            if (str_contains($row->anh_qr_chu_re, $rgx)) {
                $anh = $row->anh_qr_chu_re;
                $anh = str_replace(config('app.url'), '', $anh);
                $anh = explode('/', $anh)[1];
                $path = storage_path('app/public/').$anh;
                $link = UploadImageService::upload($path);

                if ($link) {
                    DB::table('couple_informations')->where('id', $row->id)->update(['anh_qr_chu_re' => $link]);

                    $exist = Storage::disk('public')->exists($anh);
                    if($exist) {
                        Storage::disk('public')->delete($anh);
                    }
                }
            }
            if (str_contains($row->anh_qr_co_dau, $rgx)) {
                $anh = $row->anh_qr_co_dau;
                $anh = str_replace(config('app.url'), '', $anh);
                $anh = explode('/', $anh)[1];
                $path = storage_path('app/public/').$anh;
                $link = UploadImageService::upload($path);

                if ($link) {
                    DB::table('couple_informations')->where('id', $row->id)->update(['anh_qr_co_dau' => $link]);

                    $exist = Storage::disk('public')->exists($anh);
                    if($exist) {
                        Storage::disk('public')->delete($anh);
                    }
                }
            }
        }

        $rows = DB::table('love_stories')->whereRaw("anh REGEXP '$rgx'")->get();
        foreach ($rows as $row) {
            $anh = $row->anh;
            $anh = str_replace(config('app.url'), '', $anh);
            $anh = explode('/', $anh)[1];
            $path = storage_path('app/public/').$anh;
            $link = UploadImageService::upload($path);

            if ($link) {
                DB::table('love_stories')->where('id', $row->id)->update(['anh' => $link]);

                $exist = Storage::disk('public')->exists($anh);
                if($exist) {
                    Storage::disk('public')->delete($anh);
                }
            }
        }

        $rows = DB::table('phudau')
            ->whereRaw("anh_phu_dau REGEXP '$rgx'")
            ->orWhereRaw("anh_phu_re REGEXP '$rgx'")
            ->get();
        foreach ($rows as $row) {
            if (str_contains($row->anh_phu_dau, $rgx)) {
                $anh = $row->anh_phu_dau;
                $anh = str_replace(config('app.url'), '', $anh);
                $anh = explode('/', $anh)[1];
                $path = storage_path('app/public/').$anh;
                $link = UploadImageService::upload($path);

                if ($link) {
                    DB::table('couple_informations')->where('id', $row->id)->update(['anh_phu_dau' => $link]);

                    $exist = Storage::disk('public')->exists($anh);
                    if($exist) {
                        Storage::disk('public')->delete($anh);
                    }
                }
            }
            if (str_contains($row->anh_phu_re, $rgx)) {
                $anh = $row->anh_phu_re;
                $anh = str_replace(config('app.url'), '', $anh);
                $anh = explode('/', $anh)[1];
                $path = storage_path('app/public/').$anh;
                $link = UploadImageService::upload($path);

                if ($link) {
                    DB::table('couple_informations')->where('id', $row->id)->update(['anh_phu_re' => $link]);

                    $exist = Storage::disk('public')->exists($anh);
                    if($exist) {
                        Storage::disk('public')->delete($anh);
                    }
                }
            }

        }

        $rows = DB::table('website_informations')->whereRaw("anh_website REGEXP '$rgx'")->get();
        foreach ($rows as $row) {
            $anh = $row->anh_website;
            $anh = str_replace(config('app.url'), '', $anh);
            $anh = explode('/', $anh)[1];
            $path = storage_path('app/public/').$anh;
            $link = UploadImageService::upload($path);

            if ($link) {
                DB::table('website_informations')->where('id', $row->id)->update(['anh_website' => $link]);

                $exist = Storage::disk('public')->exists($anh);
                if($exist) {
                    Storage::disk('public')->delete($anh);
                }
            }
        }
    }
}
