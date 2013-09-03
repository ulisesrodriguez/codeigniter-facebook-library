codeigniter-facebook-library
============================

/*

  Author	   	Ulises Rodríguez
  Site:		  	http://www.ulisesrodriguez.com	
  Twitter:		https://twitter.com/#!/isc_ulises
  Facebook:		http://www.facebook.com/ISC.Ulises
  Github:	  	https://github.com/ulisesrodriguez
  Email:	  	ing.ulisesrodriguez@gmail.com
  Skype:	  	systemonlinesoftware
  Location:		Guadalajara Jalisco Mexíco
 
  Facebook
*/


Libreria codeigniter usando la API de Facebook


Uso 

1.- Copiar y pegar en application/library

2.- Crear un controller
    class Facebookextends extends CI_Controller{
    }
  
3.- Inluir la libreria y configurar
    
    class Facebookextends extends CI_Controller{
      
      public function index(){
        
        // Load Library
        $this->load->library( 'codeigniter-facebook-library/facebooklib' );	
        
        $this->facebooklib->config( $appid, $secretkey );	
        
        
        // Ejemplo de loging
        if ($_REQUEST) {
		  		  
		      $response =  $this->facebooklib->parse_signed_request($_REQUEST['signed_request'] );
		      
		      print_r( $response );
		      
		      exit;
		    }
        
        
          /*
            Agregar vista y copiar el código para el boton de login.
          */
        
        
      }
      
    }
    





