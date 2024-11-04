<?php session_start();
include('db.php');


require 'vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\Alignment;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;


$tableHead = [
    'font'=>[
        'color'=>[
            'rgb'=>'FFFFFF'
        ],
        'bold'=>true,
        'size'=>11
    ],
    'fill'=>[
        'fillType'=> Fill::FILL_SOLID,
        'startColor'=>[
            'rgb' =>'09A742'
        ],
        ],
        ];



if(isset($_POST['report'])){

    $filename = "report".time();

    $daily = $_POST["daily"];



    $query = "SELECT entrance.key,users.f_name,users.v_number,entrance.entrance,entrance.exit,entrance.price,entrance.speed,entrance.dis,entrance.ent_date,entrance.ent_time,entrance.exit_date,entrance.exit_time FROM entrance INNER JOIN users ON entrance.key =users.nic  WHERE entrance.ent_date='$daily'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0){

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getDefaultStyle()
        ->getFont()
        ->setName('Arial')
        ->setSize(10);

        $spreadsheet->getActiveSheet()
        ->setCellValue('A1',"History of journey");

        $spreadsheet->getActiveSheet()->mergeCells("A1:L1");

        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);

        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(20);



        // $spreadsheet->getActiveSheet()->getStyle('A2:N2')->getFont()->setSize(11);
        // $spreadsheet->getActiveSheet()->getStyle('A2:N2')->getFont()->setBold(true);

        //color
        $spreadsheet->getActiveSheet()->getStyle('A2:L2')->applyFromArray($tableHead);

        foreach (range('A', 'N') as $letra) {            
            $spreadsheet->getActiveSheet()->getColumnDimension($letra)->setAutoSize(true);
        }

        

        $sheet->setCellValue('A2', 'Customer Name');
        $sheet->setCellValue('B2', 'Vehicle Number');
        $sheet->setCellValue('C2', 'NIC');
        $sheet->setCellValue('D2', 'Entrance Name');
        $sheet->setCellValue('E2', 'Exit Name');
        $sheet->setCellValue('F2', 'Distance (Km/h)');
        $sheet->setCellValue('G2', 'Speed');
        $sheet->setCellValue('H2', 'Price(Rs.)');
        $sheet->setCellValue('I2', 'Enter Date');
        $sheet->setCellValue('J2', 'Enter Time');
        $sheet->setCellValue('K2', 'Exit Date');
        $sheet->setCellValue('L2', 'Exit Time');




        $rowCount = 4;

        foreach($query_run as $data){

            $sheet->setCellValue('A' . $rowCount, $data['f_name']);
            $sheet->setCellValue('B' . $rowCount, $data['v_number']);
            $sheet->setCellValue('C' . $rowCount, $data['key']);
            $sheet->setCellValue('D' . $rowCount, $data['entrance']);
            $sheet->setCellValue('E' . $rowCount, $data['exit']);
            $sheet->setCellValue('F' . $rowCount, $data['dis']);
            $sheet->setCellValue('G' . $rowCount, $data['speed']);
            $sheet->setCellValue('H' . $rowCount, $data['price']);
            $sheet->setCellValue('I' . $rowCount, $data['ent_date']);
            $sheet->setCellValue('J' . $rowCount, $data['ent_time']);
            $sheet->setCellValue('K' . $rowCount, $data['exit_date']);
            $sheet->setCellValue('L' . $rowCount, $data['exit_time']);


            $rowCount++;
        }
        
    
        $writer = new Xlsx($spreadsheet);
        $final_filename = $filename.'.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-disposition: attachement; filename="'.urlencode($final_filename).'"');

        $writer->save('php://output');
        $_SESSION['success'] = 'Success';
        header("location: report.php");


    }

    else{

        $_SESSION['error'] = 'N0 Records';
    }


}

header("location: report.php");


?>