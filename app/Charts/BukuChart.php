<?php
namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Penulis;
use App\Models\Minjem;
use App\Models\Kembali;
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
        
        return $this->chart->lineChart()
            ->setTitle('Grafic')
            ->setSubtitle('Data Assalaam Library')
            ->addData('Amount', [$booksCount, $publishersCount, $authorsCount, $categoriesCount])
            ->setXAxis(['Book', 'Publisher', 'Writter', 'Category'])
            ->setHeight(400)
            ->setWidth(400)
            ->setMarkers(['#000fff'], 7, 10);
    }

    public function buildLoanReturnChart()
    {
        // Ambil data jumlah peminjaman per bulan
        $loansPerMonth = Minjem::select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as total'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')->toArray();

        // Ambil data jumlah pengembalian per bulan
        $returnsPerMonth = Kembali::select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as total'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')->toArray();

        // List bulan (1 untuk Januari, 2 untuk Februari, dst)
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        // Convert hasil menjadi array yang cocok dengan bulan
        $loansData = array_replace(array_fill(1, 12, 0), $loansPerMonth);
        $returnsData = array_replace(array_fill(1, 12, 0), $returnsPerMonth);

        return $this->chart->barChart()
            ->setTitle('Loan and Return Data per Month')
            ->setSubtitle('Loans and Returns per Month')
            ->addData('Loans', array_values($loansData))
            ->addData('Returns', array_values($returnsData))
            ->setHeight(287)
            ->setXAxis($months);
    }
}