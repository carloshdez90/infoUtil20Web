<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadisticas extends CI_Controller {

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
		$this->load->library('table');
   
                }
	public function index()
	{
	
		$data = array(
		'titleprom' =>'Promedio Mensual',
		'titlevisitados' =>'Visitas Mensuales',
		'titlecomentado' =>'Comentarios Mensuales',
		'titledenuncias' =>'Numero de denuncias Mensuales',
		 'subtitleprom'=>'Calificacion promedio categorias',
		  'titleprom2'=>'Notas (1-5)'
		);	
		
//***Arreglo**
$cate = array('Salud','Educacion','Finanzas','Directorio','Deportes' );
$data['categoria']=$cate;

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

		
		$notasprom = array($data['calisalud'],$data['caliedu'],$data['califina'],$data['calidirec'],$data['calicult'] );
		$data['notas']=$notasprom;
		
				// fin de peticiones prom calificaciones
				
				
//Top mas visitados
//arreglo provisional ---consumir servicios
	$dato= array(
             array('Categoria', ' Visitas'),
             array('<span class="glyphicon glyphicon-plus-sign"></span> 	Salud', '23'),
             array('<span class="glyphicon glyphicon-book"></span> 	Educacion', '15' ),
             array('<span class="glyphicon glyphicon-shopping-cart"></span> Finanzas', '10'),
			  array('<span class="glyphicon glyphicon-phone-alt"></span> 	Directorio', '18'),
			   array('<span class="glyphicon glyphicon-bullhorn"></span> 	Cultura', '12'),	
             );

$plantilla = array ( 'table_open'  => '<table  cellpadding="2" cellspacing="1" class="mytable">' );
$this->table->set_template($plantilla);
$data['topvisitadoscat']=$this->table->generate($dato);
	
//fin top visitados


	
		$this->load->view('open',$data);
		$this->load->view('prom');
		$this->load->view('visitados');
		$this->load->view('comentados');
		$this->load->view('menu');
		$this->load->view('cierre');
	}


	public function gsalud()
	{
		
		$data = array(
		'titleprom' =>'Promedio Mensual ',
		 'subtitleprom'=>'Calificacion promedio SALUD',
		  'titleprom2'=>'Notas (1-5)'
		);	
		
	//***Arreglo**

$cate = array('medicamentos','establecimientos','profesionales','proveedores');
$data['categoria']=$cate;


	
			//************* peticion para promedio de calificaciones
		
		
		$arreglo=json_decode($this->curl->simple_get('http://www.infoutil20.fernandomarroquin.com/servicios/promedio_eval_sub.php?subcategoria=2'));
		foreach ($arreglo as $key) {
			$data['medicamentos']=round($key->promediosub,2);
				
		}
		$arreglo=json_decode($this->curl->simple_get('http://www.infoutil20.fernandomarroquin.com/servicios/promedio_eval_sub.php?subcategoria=3'));
		foreach ($arreglo as $key) {
			$data['establecimientos']=round($key->promediosub,2);
			
			
		}
		$arreglo=json_decode($this->curl->simple_get('http://www.infoutil20.fernandomarroquin.com/servicios/promedio_eval_sub.php?subcategoria=5'));
		foreach ($arreglo as $key) {
			$data['profesionales']=round($key->promediosub,2);
			
			
		}
		$arreglo=json_decode($this->curl->simple_get('http://www.infoutil20.fernandomarroquin.com/servicios/promedio_eval_sub.php?subcategoria=15'));
		foreach ($arreglo as $key) {
			$data['proveedores']=round($key->promediosub,2);
			
			
		}
		$notasprom = array($data['medicamentos'],$data['establecimientos'],$data['profesionales'],$data['proveedores'] );
		$data['notas']=$notasprom;
		
		$this->load->view('open',$data);
		$this->load->view('prom');
		$this->load->view('menu');
		$this->load->view('cierre');

		
		
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */