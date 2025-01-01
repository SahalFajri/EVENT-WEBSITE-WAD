<?php

namespace App\Exports;

use App\Models\Article;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ArticleExport implements FromCollection, WithColumnFormatting, WithMapping, WithDrawings, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Article::all();
    }

    public function drawings(): array
    {
        $articles = Article::latest()->get();
        $drawings = [];

        $iteration = 2;

        foreach ($articles as $article) {
            $drawing = new Drawing();

            $drawing->setName('image');
            $drawing->setDescription('Article Image');
            $drawing->setPath(public_path("/storage/$article->image"));

            $drawing->setHeight(90);
            $drawing->setCoordinates('C' . $iteration);

            $drawings[] = $drawing;

            $iteration++;
        }

        return $drawings;
    }

    public function map($article): array
    {
        return [
            $article->id,
            $article->title,
            '',
            $article->content,
            $article->user->name,
            Date::dateTimeToExcel($article->created_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Image',
            'Content',
            'Author',
            'Created At',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $rows = Article::all()->count() + 1;
                for ($i = 2; $i <= $rows; $i++) {
                    $event->sheet->getDelegate()->getRowDimension($i)->setRowHeight(90);
                }
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(30);
            },
        ];
    }
}
