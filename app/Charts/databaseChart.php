<?php

namespace App\Charts;

use App\Http\Controllers\SiswaController;
use App\Models\SiswaModel;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Http\Controllers\ChartController;

class databaseChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        $siswa = SiswaModel::get();

        $data = [
            $siswa->where('idsiswa')->count()
        ];

        $label = [
            'idsiswa'
        ];

        return $this->chart->pieChart()
            ->setTitle('Jumlah data di semua tabel.')
            ->setSubtitle(date('Y'))
            ->addData([$data])
            ->setLabels([$label]);
    }
}
