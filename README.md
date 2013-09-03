codeigniter-facebook-library
============================

/*

  Author	   	Ulises Rodríguez<br>
  Site:		  	http://www.ulisesrodriguez.com	<br>
  Twitter:		https://twitter.com/#!/isc_ulises<br>
  Facebook:		http://www.facebook.com/ISC.Ulises<br>
  Github:	  	https://github.com/ulisesrodriguez<br>
  Email:	  	ing.ulisesrodriguez@gmail.com<br>
  Skype:	  	systemonlinesoftware<br>
  Location:		Guadalajara Jalisco Mexíco<br><br>
 
  Facebook<br>
*/


Libreria codeigniter usando la API de Facebook

Uso 
============================

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
		      
		      // Incluir session
		      $this->load->library( 'session' );
		      
		      // Guardamos los datos en una sessión
		      $this->session->user_data( $response );
		      
		      exit;
	}
        
        
          /*
            Agregar vista y copiar el código para el boton de login.
            https://developers.facebook.com/docs/reference/plugins/login/
          */
          
        
      }
      
    }
    





