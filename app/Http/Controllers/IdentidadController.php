<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use App\Models\Firmas;
use Mailjet\Resources;
use \ConvertApi\ConvertApi;

class IdentidadController extends Controller
{
    public function sendIdentidadPresentacion(Request $request)
    {
		$caracteres = strlen($request->oficina);

		$divisor = $caracteres/19;
		if ($divisor <=  1) {
			$fuente = 6;
			$espacio = 3.9;
		}elseif($divisor >  1 && $divisor <=  2){
			$fuente = 3.9;
			$espacio = 0;
		}


    	$client = new Client();
    	$html = '<div class="anverso">
                        <div class="anverso_1">
                            <img src="https://i.ibb.co/zx358FR/reverso-1.jpg" alt="">
                        </div>
                    </div>';
		$css = ".anverso{
					
				}
				.anverso_1{
					
				}
				.anverso_1 img{
					width: 100%;
				}
				.anverso_2{
					
				}
				.anverso_2 p{
					
				}";
		
		$html_2 = '
		<div class="reverso" style="width: 2304px; max-height: 1500px; overflow: hiden;">
			<div class="logo_titulo" style="font-size: 0px;">
				<img src="https://i.postimg.cc/26yCqWtQ/logo-soc-2.jpg" style="width: 360px; display: inline-block; vertical-align: middle; margin-left: 150px; padding-top: '.$espacio.'rem">
				<h2 style="color: #016C4E;
			font-size: '.$fuente.'rem;
			text-align: left;
			text-transform: uppercase;
			white-space: break;
			max-width: 1500px;
			margin-left: 3rem;
			padding-left: 3rem;
			vertical-align: middle;
			display: inline-block;  border-left: 12px solid #016C4E;">'.$request->oficina.'</h2>
			</div>
			<div>
				<img src="https://i.ibb.co/r5bZHWW/logo-bot.jpg" style="width: 540px; display: inline-block; vertical-align: middle; margin-left: 330px">
			</div>
			<div class="reverso_head">
				<div style="display: inline-block; width: 1500px; vertical-align: top">
					<h3 style="color: #016C4E;
						font-size: 4.5rem;
						text-align: left;
						width: 2250px;
						text-transform: uppercase;
						white-space: break;
						padding-top: 30px;
						width: 100%;
						margin-bottom: .6rem;
						margin-left: 150px;">'.$request->nombre.'
					</h3>
					<p style="color: #4ed176; margin-left: 90px; font-weight: normal"><span>'.$request->puesto.'</span></p>
				</div>
				<div style="display: inline-block; width: 600px; vertical-align: top; text-align: right; margin-top: 6rem; margin-right: 0px">
					<img src="https://api.qrserver.com/v1/create-qr-code/?data='.$request->qr.'&amp;size=420x420&color=006F4E" alt="" title="" />
				</div>
			</div>
			<div class="reverso_1" style="width:100%; display: block; font-size: 0px; margin-bottom: 90px">
				<p style="width: 1350px; display: inline-block; vertical-align: middle; color: #016C4E;">'.
				'<span style="display: inline-block; margin-bottom: 24px"><img src="https://i.postimg.cc/yYxd7jwS/phone-call-1.png" style="width: 75px; margin-right: 30px">'.$request->telefono.'</span><br>'.
				'<span  style="display: inline-block; margin-bottom: 24px"><img src="https://i.postimg.cc/QdWdTtN8/email-1.png" style="width: 75px; margin-right: 30px">'.$request->email.'</span><br>'.
				'<span  style="display: inline-block; margin-bottom: 24px"><img src="https://i.postimg.cc/ZKQqn3Ss/placeholder.png" style="width: 75px; margin-right: 30px">'.$request->direccion.'</span><br>
				</p>
				
			</div>';
			
			if ($request->facebook != null || $request->linkedin != null || $request->instagram != null || $request->twitter != null || $request->customRadio == "si") {
				$html_2 .= '<p style="color: #016C4E; margin-bottom: 0px; text-align: right; font-weight: normal; font-size: 3.3rem; padding-right: 30px"><span><b style="font-weight: bold">Juntos</b> lo hacemos real</span></p>
				<div class="reverso_footer" style="background-image: url(https://i.postimg.cc/9M7R7vQQ/cintillo-2.jpg); padding-left: 150px; background-size: cover; background-position: right;"><ul>';
					if ($request->facebook != null){
						$html_2 .= '<li><img src="https://i.ibb.co/jh9LYSY/002-facebook.png" alt="">@'.$request->facebook.'</li>';
					}else{}
					if ($request->instagram != null){
						$html_2 .= '<li><img src="https://i.ibb.co/DC9zkJ3/001-instagram.png" alt="">@'.$request->instagram.'</li>';
					}else{}
					if ($request->twitter != null){
						$html_2 .= '<li><img src="https://i.ibb.co/YD25rwt/Tik-Tok-Logo-PNG.png" alt="">@'.$request->twitter.'</li>';
					}else{}	
                       $html_2 .= ' </ul></div>';
			}else{
				$html_2 .= '<img src="https://i.postimg.cc/4xdzM6Ww/cintillo.jpg" style="width: 100%">';
			}
			
				
				$html_2 .= '
			
			
		</div>';
		$css_2 = "
		.logo_titulo{
		   width: 100%;
		}
		logo_titulo img{
			max-width 390px;
			width: 100%;
			display: inline-block;
		}
		logo_titulo h2{
			width: 60%;
			display: inline-block;
		}
		.reverso {
			padding: 30px 0px 0px 0px;
			font-size: 0;
			text-align: left;
			overflow: hidden;
			min-width: 1272px;
		}
		.reverso_head h2 {
			color: #015694;
			padding: 0 60px 0 10px;
			font-size: 4.5rem;
			text-align: left;
			margin-bottom: 3rem;
			margin-top: 0;
			display: inline-block;
		}
		
		.reverso_head p {
			color: ##40516F;
			font-weight: 100;
			font-size: 3rem;
			padding: 0 60px 0px 60px;
			text-align: left;
			margin-bottom: 3rem;
			margin-top: 0;
		}
		
		.reverso h2 {
			color: #015694;
			margin-bottom: 3rem;
		}
		
		.reverso_1 {
			display: inline-block;
			width: 60%;
			padding: 0 150px;
		}
		
		.reverso_1 p {
			font-size: 3.3rem;
			margin-bottom: 0;
			color: #40516F;
			font-weight: normal;
			text-align: left;
		}
		
		.reverso_2 img {
			width: 100%;
		}
		
		.reverso_2 {
			padding: 0 30px;
			display: inline-block;
			width: 20%;
			vertical-align: top;
		}
		.reverso_2 svg{
			width: 100%;
		}
		.reverso_footer {
			min-height: 105px;
			width: 100%;
			margin-top: 1.5rem;
			background: #016F4E;
		}
		.reverso_footer ul{
			list-style: none;
			padding-left: 0;
			text-align: left;
			margin-left: 0;
			padding-top: 21px;
		}
		.reverso_footer ul li{
			display: inline-block;
		}
		.reverso_footer ul li img{
			margin-right: 15px;
			width: 60px;
		}
		.reverso_footer ul li{
			font-size: 2.1rem;
			padding-right: 3rem;
			color: #fff;
		}";
		
		
		

		// // Retrieve your user_id and api_key from https://htmlcsstoimage.com/dashboard
		$res = $client->request('POST', 'https://hcti.io/v1/image', [
		   'auth' => ['6eefc015-07e6-43d0-9004-6ea368bfc0b2', '55a61981-6250-4d1c-bf7d-750f83b92a08'],
		   'form_params' => ['html' => $html, 'css' => $css]
		 ]);

		 $res_2 = $client->request('POST', 'https://hcti.io/v1/image', [
			'auth' => ['6eefc015-07e6-43d0-9004-6ea368bfc0b2', '55a61981-6250-4d1c-bf7d-750f83b92a08'],
			'form_params' => ['html' => $html_2, 'css' => $css_2]
		  ]);
		  $url_1 = strval($res->getBody());
		  $url_1_split = explode('{"url":"', $url_1);
		  $url_1_split = explode('"}', $url_1_split[1]);
		  $url_1_split = $url_1_split[0];

		  $url_2 = strval($res_2->getBody());
		  $url_2_split = explode('{"url":"', $url_2);
		  $url_2_split = explode('"}', $url_2_split[1]);
		  $url_2_split = $url_2_split[0];
		ConvertApi::setApiSecret('c45DeZtgAL6onP6Z');
		
		$fromFormat = 'web';
		$conversionTimeout = 180;
		$dir = sys_get_temp_dir();

		$result = ConvertApi::convert(
		    'pdf',
		    [
		        'Url' => $url_2_split,
		        'FileName' => 'firma_soc'
		    ],
		    $fromFormat,
		    $conversionTimeout
		);
		$url_1 = $result->response["Files"][0]["Url"];
		return view("identidad_presentacion",['url_1'=>$url_1_split, 'url_2'=>$url_2_split, 'url_download'=>$url_2_split]);
    }
	public function sendIdentidadFirma(Request $request)
	{
		$client = new Client();
		$conta = strlen($request->direccion);

		$conta_oficina = strlen($request->oficina);

		if ($conta_oficina <= 5) {
			$font = "3rem";
		}elseif($conta_oficina <= 7){
			$font = "2.2rem";
		}elseif($conta_oficina <= 20){
			$font = "1.5rem";
		}else{
			$font = "0.85rem";
		}

		if ($conta >= 63) {
			// code...
		}else{
			
		}

		$caracteres = strlen($request->oficina);
		$url_firma = explode("://", $request->micrositio_oficina);

		$html_firma = '
		<div class="firma" style=" display:width: 500px;  display: -webkit-flex;
			    display: flex;
			    -webkit-flex-direction: row;
			    flex-direction: row;
			    -webkit-flex-wrap: nowrap;
			    flex-wrap: nowrap;
			    -webkit-justify-content: center;
			    justify-content: center;
			    -webkit-align-content: center;
			    align-content: center;
			    -webkit-align-items: center;
			    align-items: center; padding-top: 1rem">
			<div class="firma_2" min-height: 160px;>
				<img src="https://i.postimg.cc/DwDN8syt/logo-sin-lideres.jpg" style="max-width: 160px; padding-bottom: 1rem" alt="">
				<span style="height: 3px; background: #006D4E; width: 160px; display: block; margin: 0 auto;"></span>';
					

					$html_firma.= '<h1 style="font-size: '.$font.'; line-height: 1; display: block; margin: 0 auto; margin-top: .8rem; margin-bottom: 0!important;  color: #006D4E; max-width: 160px; text-align: center;     line-break: auto; font-weight: bold;">'.$request->oficina.'</h1>';

				
				
			$html_firma .= '</div>
			<div class="firma_1">
				<div class="firma_head">';
				if ($caracteres < 14) {
					$html_firma.= '<h2>'.$request->nombre.'</h2>';

				}else{
					$html_firma.= '<h2 style="font-size: 1rem">'.$request->nombre.'</h2>';
				}
				
					
					$html_firma .= '<p><span style="color: #42b766">'.$request->puesto.'</span></p>
				</div>';
				if ($conta > 55) {
					$html_firma .= '<p style="font-weight: normal;margin-bottom: 0rem!important; font-size: .75rem!important;">';
				}else{
					$html_firma .= '<p style="font-weight: normal; ">';
				}
				
				if ($request->telefono != null) {
					$html_firma .= 'Cel. '.$request->telefono.'<br>';
				}else{}
				if ($request->email != null) {
					$html_firma .= $request->email.'<br>';
				}else{}
				
				
				if ($request->direccion != null) {
					$html_firma .= $request->direccion;
				}else{}

			
				

				
				$html_firma .='</p>
			</div>';

			$html_firma .='</div>';
			$html_firma .='<div class="firma_footer" style="width: 100%; margin-top: 1rem; text-align: center">
					<span style="line-height: 2; font-size: .9rem">';
					$html_firma .= $url_firma[1];
				$html_firma .='</span></div>';
			
			
		$css_firma = '

		.firma {
			padding: 0px 0px 0px 0px;
			font-size: 0;
			width: 500px;
			height: 180px;
			text-align: left;
			overflow: hidden;
		}
		.firma_head{
			
		}
		.firma_head h2 {
			color: #006D4E;
			font-size: 1.1rem;
			text-align: left;
			margin-bottom: 0!important;
			
		}
		
		.firma_head p {
			color: #40516F!important;
			font-weight: 100!important;
			font-size: 1.1rem!important;
			text-align: left!important;
			margin-bottom: 1rem!important;
			margin-top: 0;
		}
		
		.firma h2 {
			color: #006D4E;
			
		}
		
		.firma_1 {
			display: inline-block;
			width: 40%;
			vertical-align: middle;
			padding: 0 20px;
		}
		
		.firma_1 p {
			font-size: .8rem;
			margin-bottom: 0;
			color: #006D4E;
			font-weight: bold;
			text-align: left;
		}
		
		.firma_2 img {
			padding-bottom: 0rem;
			margin: 0 auto;
		}
		
		.firma_2 {
			padding: 0 10px;
			display: inline-block;
			width: 43%;
			text-align: center;
			vertical-align: middle;
		}
		.firma_2 p {
			font-size: 1.7rem;
			font-weight: bold;
			margin-bottom: 0;
			margin-top: 1rem;
			color: #006D4E;
			text-align: center;
		}
		.firma_2 svg{
			width: 100%;
		}
		
		.firma_footer {
			min-height: 30px;
			width: 100%;
			background: rgb(2, 88, 150);
			background: #006D4E;
		}
		.firma_footer span{
			color: #fff;
			font-size: 1rem;
			font-weight: normal
		}
		.firma_footer ul{
			list-style: none;
			padding-left: 0;
			text-align: center;
			margin-left: 0;
			padding-top: 7px;
		}
		.firma_footer ul li{
			display: inline-block;
		}
		.firma_footer ul li img{
			margin-right: 5px;
			width: 20px;
		}
		.firma_footer ul li{
			font-size: .7rem;
			padding-right: 1rem;
			color: #fff;
		}
		';
		$firma_r = $client->request('POST', 'https://hcti.io/v1/image', [
			'auth' => ['6eefc015-07e6-43d0-9004-6ea368bfc0b2', '55a61981-6250-4d1c-bf7d-750f83b92a08'],
			'form_params' => ['html' => $html_firma, 'css' => $css_firma]
		  ]);

		  $url_1 = strval($firma_r->getBody());
		  $url_1_split = explode('{"url":"', $url_1);
		  $url_1_split = explode('"}', $url_1_split[1]);
		  $url_1_split = $url_1_split[0];
		return view("identidad_firma",['url_1'=>$url_1_split]);
	}
	public function sendIdentidadTarjeta(Request $request){
		$firma = Firmas::insertGetId([
            'imagen' => $request->foto,
            'name' => $request->nombre,
            'puesto' => $request->puesto,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
        ]);
		return view("identidad_digital",['url'=>$firma]);
	}
	public function tarjetaDigital($id){
		$registro = Firmas::where('id',$id)->get();
        return view('identidad_tarjeta_firma',['registro' => $registro[0]]);
	}
	public function sendMail(Request $request){
		function clean($string) {
                $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
                $string = strtolower($string);
                        
                return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
            }
            $file = $request->file('tarjeta');
            $file_name = clean($file->getClientOriginalName());
            $tarjeta = time().'_'.$file_name;

            // File upload location
            $location = 'archivos/tarjetas/';

            // Upload file
            $file->move(public_path().'/archivos/tarjetas/', $tarjeta);

            $file = $request->file('tarjeta_2');
            $file_name = clean($file->getClientOriginalName());
            $tarjeta_2 = time().'_'.$file_name;

            // File upload location
            $location = 'archivos/tarjetas/';

            // Upload file
            $file->move(public_path().'/archivos/tarjetas/', $tarjeta_2);  
        
        
            $file = $request->file('pago');
            $file_name = clean($file->getClientOriginalName());
            $pago = time().'_'.$file_name;

            // File upload location
            $location = 'archivos/tarjetas/';

            // Upload file
            $file->move(public_path().'/archivos/tarjetas/', $pago); 

            $email_to = "ingluisfelipe07@gmail.com";

            $email_from = "webmaster@socasesores.com";

             $email_message = "Links de las tarjetas a imprimir y comprobante \n";

        $email_message .= "Tarjeta Anverso: http://marketing.socasesores.com/archivos/tarjetas/".$tarjeta."<br>";
        $email_message .= "Tarjeta Reverso: http://marketing.socasesores.com/archivos/tarjetas/".$tarjeta_2."<br>";
        $email_message .= "Comprobante de Pago: http://marketing.socasesores.com/archivos/tarjetas/".$pago."<br>";
             
            $mj = new \Mailjet\Client("3ed1abd6eef1c2e815025a2801116c70", "4775bb3a9bcedb326bc355925aa04edf",true,['version' => 'v3.1']);

			// Define your request body

			$body = [
			    'Messages' => [
			        [
			            'From' => [
			                'Email' => "luishernandez@socasesores.com",
			                'Name' => "Webmaster"
			            ],
			            'To' => [
			                
			                [ 
			                	'Email' => "hsamperio@socasesores.com",
			                	'Name' => "HSamperio"
			                ],
			                [ 
			                	'Email' => "luishernandez@socasesores.com",
			                	'Name' => "Luis Felipe"
			                ],
			                [ 
			                	'Email' => "rcortes@socasesores.com",
			                	'Name' => "Rodrigo"
			                ]
			            ],
			            'Subject' => "Solicitud de tarjetas para impresion",
			            'HTMLPart' => $email_message
			        ]
			    ]
			];

			// All resources are located in the Resources class

			$response = $mj->post(Resources::$Email, ['body' => $body]);

			

			// Read the response

			
			return view("imprimir", ["imprimir" => true]);

	}
	public function sendIdentidadPosters(Request $request)
	{
		$linea = $request->linea;
		function clean($string) {
                $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
                $string = strtolower($string);
                        
                return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
            }
		$firma = null;
		if ($request->file('file')) {
			$file = $request->file('file');
            $file_name = clean($file->getClientOriginalName());
            $tarjeta = time().'_'.$file_name;

            // File upload location
            $location = 'img/';

            // Upload file
            $file->move(public_path().'/img/', $tarjeta);
            $firma = "http://marketing.socasesores.com/img/".$tarjeta;
		}
		$client = new Client();

		$imagen_select = $request->imagen_select;

		switch ($imagen_select) {

			case 'hipotecario1':
				$base_imagen = "https://prmarketing.socasesores.com/posters/poster1-1.png";
				$top_s = "85.5";
				$top_l = "87.7";
				$left = "20.25";
				break;

			case 'hipotecario2':
				$base_imagen = "https://prmarketing.socasesores.com/posters/poster1-2.png";
				$top_s = "86";
				$top_l = "88.1";
				$left = "20.25";
				break;

			case 'hipotecario3':
				$base_imagen = "https://prmarketing.socasesores.com/posters/poster1-3.png";
				$top_s = "86.8";
				$top_l = "88.8";
				$left = "20.25";
				break;

			case 'automotriz1':
				$base_imagen = "https://prmarketing.socasesores.com/posters/poster5-1.png";
				$top_s = "85.5";
				$top_l = "87.7";
				$left = "20.25";
				break;

			case 'automotriz2':
				$base_imagen = "https://prmarketing.socasesores.com/posters/poster5-2.png";
				$top_s = "86";
				$top_l = "88.1";
				$left = "20.25";
				break;

			case 'automotriz3':
				$base_imagen = "https://prmarketing.socasesores.com/posters/poster5-3.png";
				$top_s = "85";
				$top_l = "87.2";
				$left = "20.25";
				break;

			case 'empresarial1':
				$base_imagen = "https://prmarketing.socasesores.com/posters/poster3-1.png";
				$top_s = "85.9";
				$top_l = "88.1";
				$left = "20.25";
				break;

			case 'empresarial2':
				$base_imagen = "https://prmarketing.socasesores.com/posters/poster3-2.png";
				$top_s = "85.9";
				$top_l = "88.1";
				$left = "20.25";
				break;

			case 'empresarial3':
				$base_imagen = "https://prmarketing.socasesores.com/posters/poster3-3.png";
				$top_s = "85.9";
				$top_l = "88.1";
				$left = "20.25";
				break;

			case 'seguros1':
				$base_imagen = "https://prmarketing.socasesores.com/posters/poster4.png";
				$top_s = "85.7";
				$top_l = "87.8";
				$left = "20.6";
				break;

			case 'seguros2':
				$base_imagen = "https://prmarketing.socasesores.com/posters/poster4-2.png";
				$top_s = "85.9";
				$top_l = "88.1";
				$left = "20.6";
				break;

			case 'seguros3':
				$base_imagen = "https://prmarketing.socasesores.com/posters/poster4-3.png";
				$top_s = "85.9";
				$top_l = "88.1";
				$left = "20.6";
				break;

			case 'seguros1':
				$base_imagen = "https://prmarketing.socasesores.com/posters/poster4.png";
				$top_s = "85.7";
				$top_l = "87.8";
				$left = "20.6";
				break;
			
			default:
				// code...
				break;
		}

		$base_imagen_credito_automotriz = "https://i.ibb.co/pZY37bk/poster2.png";
		$cantidad = strlen($request->nombre);


		if($cantidad > 1 && $cantidad <= 16){
			$html_firma = ' <div style="position: relative">
							<img src="'.$base_imagen.'" style="width: 1700px">
							<div style="position: absolute; top: '.$top_s.'%; left: '.$left.'%; height: 104px; width: 650px; display: block;">
								<p style="font-size: 3.76rem; line-height: 1; font-weight: bold; z-index: 100; color: #006c4d;  white-space: normal;  display: block;">'.$request->nombre.'<p>
							</div>
						<div>';
		
		}elseif ($cantidad > 16 && $cantidad <= 22) {
			$html_firma = ' <div style="position: relative">
							<img src="'.$base_imagen.'" style="width: 1700px">
							<div style="position: absolute; top: '.$top_l.'%; left: '.$left.'%; height: 104px; width: 225px; display: block;">
								<p style="font-size: 1.5rem; line-height: 1; font-weight: bold; z-index: 100; color: #006c4d;  white-space: normal;  display: block;">'.$request->nombre.'<p>
							</div>
						<div>';

		}elseif ($cantidad > 22) {
			$html_firma = ' <div style="position: relative">
							<img src="'.$base_imagen.'" style="width: 1700px">
							<div style="position: absolute; top: '.$top_l.'%; left: '.$left.'%; height: 104px; width: 300px; display: block;">
								<p style="font-size: 1.5rem; line-height: 1; font-weight: bold; z-index: 100; color: #006c4d;  white-space: normal;  display: block;">'.$request->nombre.'<p>
							</div>
						<div>';

		}else{

		}
		
		
		$css_firma = '';
		$firma_r = $client->request('POST', 'https://hcti.io/v1/image', [
			'auth' => ['6eefc015-07e6-43d0-9004-6ea368bfc0b2', '55a61981-6250-4d1c-bf7d-750f83b92a08'],
			'form_params' => ['html' => $html_firma, 'css' => $css_firma]
		  ]);

		  $url_1 = strval($firma_r->getBody());
		  $url_1_split = explode('{"url":"', $url_1);
		  $url_1_split = explode('"}', $url_1_split[1]);
		  $url_1_split = $url_1_split[0];
		return view("identidad_posters",['url_1'=>$url_1_split]);
	}
}
