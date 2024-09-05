<?php
namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class BukuChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        
        return $this->chart->barChart()
            ->setTitle('Grafik')
            ->setSubtitle('Cinta Selamanya')
            ->addData('Adit', [1,2,3,4,5,6,])
            ->addData('Sipa', [6,5,4,3,2,1,])
            ->setHeight(287)
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
