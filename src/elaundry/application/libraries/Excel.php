<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Excel extends Spreadsheet
{
    public function __construct()
    {
        parent::__construct();
    }

    public function export($filename = 'export', $type = 'Xlsx')
    {
        $writer = IOFactory::createWriter($this, $type);
        $ext    = strtolower($type) === 'xls' ? 'xls' : 'xlsx';
        $mimes  = [
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'xls'  => 'application/vnd.ms-excel',
        ];

        while (ob_get_level()) ob_end_clean();

        header('Content-Type: ' . ($mimes[$ext] ?? 'application/octet-stream'));
        header('Content-Disposition: attachment;filename="' . $filename . '.' . $ext . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
