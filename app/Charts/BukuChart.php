<?php
namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Penulis;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
class BukuChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {

        $booksCount = Buku::count();
        $publishersCount = Penerbit::count();
        $authorsCount = Penulis::count();
        $categoriesCount = Kategori::count();
        
        return $this->chart->barChart()
            ->setTitle('Grafic')
            ->setSubtitle('Data Assalaam Library')
            ->addData('Amount', [$booksCount,$publishersCount,$authorsCount,$categoriesCount])
            ->setXAxis(['Book','Publisher','Writter','Category'])
            ->setHeight(400)
            ->setWidth(400)
            ->setMarkers(['#000fff'], 7, 10);
            // ->setYAxis(0, 100);

    // {
    //     // Ambil data jumlah per bulan dari model Buku
    //     $bukuPerMonth = Buku::select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as total'))
    //         ->groupBy('month')
    //         ->orderBy('month')
    //         ->pluck('total', 'month')->toArray();

    //     // Ambil data jumlah per bulan dari model Penerbit
    //     $penerbitPerMonth = Penerbit::select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as total'))
    //         ->groupBy('month')
    //         ->orderBy('month')
    //         ->pluck('total', 'month')->toArray();

    //     // Ambil data jumlah per bulan dari model Penulis
    //     $penulisPerMonth = Penulis::select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as total'))
    //         ->groupBy('month')
    //         ->orderBy('month')
    //         ->pluck('total', 'month')->toArray();

    //     // Ambil data jumlah per bulan dari model Kategori
    //     $kategoriPerMonth = Kategori::select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as total'))
    //         ->groupBy('month')
    //         ->orderBy('month')
    //         ->pluck('total', 'month')->toArray();

    //     // List bulan (1 untuk Januari, 2 untuk Februari, dst)
    //     $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    //     // Convert hasil menjadi array yang cocok dengan bulan
    //     $bukuData = array_replace(array_fill(1, 12, 0), $bukuPerMonth);
    //     $penerbitData = array_replace(array_fill(1, 12, 0), $penerbitPerMonth);
    //     $penulisData = array_replace(array_fill(1, 12, 0), $penulisPerMonth);
    //     $kategoriData = array_replace(array_fill(1, 12, 0), $kategoriPerMonth);

    //     return $this->chart->barChart()
    //         ->setTitle('Data / Month')
    //         ->setSubtitle('Books Amount, Publisher, Writter, and Category per Month')
    //         ->addData('Book', array_values($bukuData))
    //         ->addData('Publisher', array_values($penerbitData))
    //         ->addData('Writter', array_values($penulisData))
    //         ->addData('Category', array_values($kategoriData))
    //         ->setHeight(287)
    //         ->setXAxis($months);
    // }


     }
    
}