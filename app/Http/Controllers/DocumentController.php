<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Course;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;  // Pastikan nama kelas benar
use PhpOffice\PhpPresentation\IOFactory as PresentationIOFactory;
use PhpOffice\PhpPresentation\Writer\Pdf as PresentationPdfWriter;


class DocumentController extends Controller
{
    public function show($id)
    {
        $data = Course::find($id);

        if (!$data) {
            return view('data_materi.viewproduct')->with('data', null);
        }

        $filePath = public_path('assets/' . $data->file);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $pdfPath = public_path('assets/' . pathinfo($data->file, PATHINFO_FILENAME) . '.pdf');

        if ($extension == 'docx') {
            $phpWord = WordIOFactory::load($filePath);
            $pdfWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF'); // Perbaiki namespace di sini juga
            $pdfWriter->save($pdfPath);
            $data->file = pathinfo($data->file, PATHINFO_FILENAME) . '.pdf';
        } elseif ($extension == 'pptx') {
            $pptReader = PresentationIOFactory::createReader('PowerPoint2007');
            $presentation = $pptReader->load($filePath);
            $pdfWriter = new PresentationPdfWriter($presentation);
            $pdfWriter->save($pdfPath);
            $data->file = pathinfo($data->file, PATHINFO_FILENAME) . '.pdf';
        }

        return view('data_materi.viewproduct', compact('data'));
    }
}
