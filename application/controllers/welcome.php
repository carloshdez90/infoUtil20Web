<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 
	  public function __construct()
        {
        parent:: __construct();
   
        $this->load->library('curl');
   
                }
	public function index()
	{
		$data = array(
		'title' =>'Estadisticas InfoUtil2.0',
		 'subtitle'=>'Puede ver estadisticas mas especificas dando clic en el grafico'
		
, );
		//************* peticion para promedio de calificaciones
		
		$arreglo=json_decode($this->curl->simple_get('http://www.infoutil20.fernandomarroquin.com/servicios/promedio_eval_cat.php?categoria=1'));
		foreach ($arreglo as $key) {
			$data['calisalud']=round($key->promedio,2);
			
		}
		$arreglo=json_decode($this->curl->simple_get('http://www.infoutil20.fernandomarroquin.com/servicios/promedio_eval_cat.php?categoria=5'));
		foreach ($arreglo as $key) {
			$data['caliedu']=round($key->promedio,2);
			
		}
		$arreglo=json_decode($this->curl->simple_get('http://www.infoutil20.fernandomarroquin.com/servicios/promedio_eval_cat.php?categoria=8'));
		foreach ($arreglo as $key) {
			$data['califina']=round($key->promedio,2);
			
		}
		$arreglo=json_decode($this->curl->simple_get('http://www.infoutil20.fernandomarroquin.com/servicios/promedio_eval_cat.php?categoria=10'));
		foreach ($arreglo as $key) {
			$data['calidirec']=round($key->promedio,2);
			
		}
		$arreglo=json_decode($this->curl->simple_get('http://www.infoutil20.fernandomarroquin.com/servicios/promedio_eval_cat.php?categoria=22'));
		foreach ($arreglo as $key) {
			$data['calicult']=round($key->promedio,2);
			
		}
		// fin de peticiones prom calificaciones
		
		//$prom = array('eduprom' => json_decode($this->curl->simple_get('http://www.infoutil20.fernandomarroquin.com/servicios/promedio_eval_cat.php?categoria=1')), );
		
		
		$this->load->view('open');
		$this->load->view('grafic1',$data);
		$this->load->view('grafic2');
		$this->load->view('prom',$data);
		$this->load->view('menu');
		$this->load->view('cierre');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */