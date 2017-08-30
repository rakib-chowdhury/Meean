<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fileupdown extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php?module=fileupload
	 *	- or -  
	 * 		http://example.com/admin
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
        function __construct()
	{
		parent::__construct();
                if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
                $this->load->library('excel');
        }
        
        /*
         * index() read Excel Files
         * For xlsx file use Excel2007
         * For xls  file use Excel5
         */
        
	public function read_excel()
	{
           
            $objReader = PHPExcel_IOFactory::createReader('Excel2007');
            $objPHPExcel = $objReader->load("./uploads/ivan.xlsx");
            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
            foreach ($sheetData as $data) {
                    echo $data['A'] . '<br />';
            }
            
	}
        public function download_file($file){            
            $data=file_get_contents(base_url()."uploads/".$file);
            $name = $file;
            force_download($name, $data);
        }
        public function upload_excel()
        {
                $code = (($this->input->get('m'))?(($this->input->get('c'))?'module='.$this->input->get('m').'&view='.$this->input->get('c'):'module='.$this->input->get('m')): '');
                if(empty($code)) show_404(); 
                $config['upload_path']='./uploads/';
                $config['allowed_types'] = 'xls|xlsx';
                $config['max_size']='10000';
                $this->load->library('upload',$config);
                if($this->upload->do_upload('excel'))
                {                    
                    $upload_value=$this->upload->data();
                    $ext=$upload_value['file_ext'];
                    $name=$upload_value['file_name']; 
                    if($ext='.xls')$objReader = PHPExcel_IOFactory::createReader('Excel5');
                    else $objReader = PHPExcel_IOFactory::createReader('Excel2007');
                    $objPHPExcel = $objReader->load("./uploads/".$name);
                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                    $i=0;
                    $index=array();
                    $check=array();
                    $head=array();
                    foreach ($sheetData as $datas) {
                            if($i==0){
                                $i=1;
                                foreach ($datas as $data){
                                    if(in_array($data, $head))
                                    $index[]=$data;
                                    $check[]=$data;
                                }
                            }
                            else{    
                                $count=0;
                                $counter=0;
                                $values=array();
                                foreach($datas as $data){
                                    if((in_array($check[$count], $head))&&$data!=NULL)$values[$index[$counter++]]=$data;
                                    else if(in_array($check[$count], $head))$counter++;
                                    $count++;
                                }
                                $this->ion_auth->inputdata($table,$values);
                            }
                    } 
                    $this->session->set_flashdata('message', 'Successfully Updated');
                    $path_to_file = 'uploads/'.$upload_value['file_name'];
                    unlink($path_to_file);
                }
                else $this->session->set_flashdata('message_error',(($this->upload->display_errors())?$this->upload->display_errors():''));
                redirect($code,'refresh');                
        }
        public function upload_csv()
        {
                $code = (($this->input->get('m'))?(($this->input->get('c'))?'module='.$this->input->get('m').'&view='.$this->input->get('c'):'module='.$this->input->get('m')): '');
                if(empty($code)) show_404();
                $config['upload_path']='./uploads/';
                $config['allowed_types'] = 'csv';
                $config['max_size']='10000';
                $this->load->library('upload',$config);
                if($this->upload->do_upload('csv'))
                {                    
                    $upload_value=$this->upload->data();
                    $file='uploads/'.$upload_value['file_name']; 
                    $header=NULL;
                    $full = array();
                    if(file_exists($file)){
                        if(($handle = fopen($file, 'r')) !== FALSE)
                        {
                            while (($row = fgetcsv($handle)) !== false) 
                            {                                
                                if(!$header)
                                    $header = $row;
                                else
                                {
                                    $values = array();
                                    $values = array_combine($header, $row);
                                    $values['status']=1;
                                    $this->ion_auth->inputdata($table,$values);
                                }
                                    
                            }
                            fclose($handle);
                            $this->session->set_flashdata('message', 'Successfully Updated');
                        }else $this->session->set_flashdata('message_error', 'File Could Not Be Open');
                    }else $this->session->set_flashdata('message_error', 'File Not Found');                    
                    unlink($file);
                }
                else $this->session->set_flashdata('message_error',(($this->upload->display_errors())?$this->upload->display_errors():''));
                redirect($code,'refresh');                
        }
        
        public function download_excel(){
            $this->load->library('excel');
            $sheet = new PHPExcel();
            $sheet->getProperties()->setTitle('Attendance Report')->setDescription('Attendance Report');
            $sheet->setActiveSheetIndex(0);            
            $attendacne_data=$this->ion_auth->getdata($table);
            $head=array();
            $col = 0;
            foreach ($attendacne_data[0] as $field=>$value) 
            {
                if(in_array($field, $head)||count($head)==0)
                {
                    $sheet->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
                    $col++;                            
                }
            }
            $row = 2;
            foreach ($attendacne_data as $data) 
            {
                $col = 0;
                foreach ($data as $field=>$field_val) 
                {
                    if(in_array($field, $head)||count($head)==0)
                    {
                        $sheet->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $field_val);
                        $col++;
                    }
                }
                $row++;
            }
            $sheet_writer = PHPExcel_IOFactory::createWriter($sheet, 'Excel5');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="att_report_'.date('dMy').'.xls"');
            header('Cache-Control: max-age=0');

            $sheet_writer->save('php://output');
        }
        
        public function download_csv(){
            $datas = $this->ion_auth->getdata($table);
            $heads=array();
            $head=array();
            $values=array();            
            foreach ($datas[0] as $field=>$field_val) {
                    if(in_array($field, $heads)||count($heads)==0){
                        $head[]=$field;                        
                    }                        
            }            
            foreach ($datas as $data){
                $value=array();
                foreach ($data as $field=>$field_val) {
                        if(in_array($field, $head)){
                            $value[]=$field_val;                        
                        }
                }
                $values[]=$value;
            }
            $fp = fopen('uploads/export.csv', 'w');

            foreach ($values as $fields) {
                fputcsv($fp, $fields);
            }

            fclose($fp);
            $data=file_get_contents(base_url()."uploads/export.csv");
            $name = 'inventory.csv';
            force_download($name, $data);
        }
}

/* End of file fileupload.php */
/* Location: pi/modules/fileupload/controllers/fileupload.php */