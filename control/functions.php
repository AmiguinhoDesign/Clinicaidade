<?php
require_once("../ActionServer.php");

$action_server = new ActionServer();
$teste = 0;

function utf8_array_decode($input) {
    foreach ($input as $key => $val) {
        if (is_array($val)) {
            $array[$key] = utf8_array_decode($val);
        } else {
            $array[$key] = $val;
        }
    }
    return $array;
}

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {

        case 'menugrande' :
            $section = $_POST['section'];
            if ($section == "especialidades") {
                ?>
                
                <h2 class="especialidades_title">
                    Nossos serviços e especialidades
                </h2>
                <div class="especialidades_nomes">
                    <ul>
                        <li><div class="especialidades_tile"></div><span class="especialidade_nome">Anestesiologia</span></li>
                        <li><div class="especialidades_tile"></div><span class="especialidade_nome">Cardiologia</span></li>
                        <li><div class="especialidades_tile"></div><span class="especialidade_nome">Cirurgia Geral</span></li>
                        <li><div class="especialidades_tile"></div><span class="especialidade_nome">Imagiologia</span></li>
                        <li><div class="especialidades_tile"></div><span class="especialidade_nome">Neurologia</span></li>
                        <li><div class="especialidades_tile"></div><span class="especialidade_nome">Oftalmologia</span></li>
                        <li><div class="especialidades_tile"></div><span class="especialidade_nome">Pediatria</span></li>
                        <li><div class="especialidades_tile"></div><span class="especialidade_nome">Psicologia</span></li>
                        <li><div class="especialidades_tile"></div><span class="especialidade_nome">Psiquiatria</span></li>
                        <li><div class="especialidades_tile"></div><span class="especialidade_nome">Urologia</span></li>
                    </ul>
                </div>
                <div class="especialidades_detalhes">
                    <h2 class="especialidade_detalhes_title">Um grande número de especialidades para lhe dar o melhor serviço, a sua medida</h2>
                    <p>A clínica da idade é dotada de uma equipa de profissionais espalhados por várias especialidades, para que seja dado aos nossos clientes todos e os melhores serviços hospitalares.</p>
                    <p>Com o melhor equipamento, pode contar com a melhor satisfação na escolha da nossa clínica, saia melhor de saúde e com um sorriso na sua cara.</p>
                    <figure class="especialidade_detalhes_imagem">
                        <img src="<?php echo ROOT; ?>img/doctors.png"/>
                    </figure>
                </div>
                <?php
            } elseif ($section == "home") {
                ?>
                <script>
                    $('.slider_news').bxSlider({
                        prevImage: "http://amiguinhodesign.com/clinicaidade/img/green_next.png",
                        nextImage: "http://amiguinhodesign.com/clinicaidade/img/green_next.png"
                    });
                    $(".icon_field_icon").click(
                    function () {

                        $('.icon_field_contacto').removeClass('icon_field_contacto_active');
                        $('.icon_field_medico').removeClass('icon_field_medico_active');
                        $('.icon_field_consulta').removeClass('icon_field_consulta_active');
                        $('.icon_field_especialidades').removeClass('icon_field_especialidades_active');
                        $('.icon_field_acordos').removeClass('icon_field_acordos_active');
                            
                        var class_name = $(this).attr('class');
                        class_name = class_name.split(' ');
                        var teste = class_name[1].split('_');
                        if(teste[3] != "active"){
                            var my_newclass = class_name[1] + "_active";
                            //$(this).removeClass(class_name[1]);
                            $(this).addClass(my_newclass);
                        }
                    }
                      
                );
                </script>
                <figure class="entry_1_image">
                    <img src="<?php echo ROOT; ?>img/doctor.png" />
                </figure>
                <div class="slider_news">
                    <div>
                        <h2 class="slider_news_title">Rastreio Cancro do Cólon e Recto</h2>
                        <p class="slider_news_text">No próximo mês de Março, a Unidade de Coloproctologia da Clínica 
                            da Idade promove um Rastreio gratuito ao cancro do cólon e recto.</p>
                        <a class="slider_news_link" href=""><img src="<?php echo ROOT; ?>img/button.png"/></a>
                        <div class="slider_news_divider"></div>
                        <h2 class="slider_news_title">Nova consulta de enfermagem</h2>
                        <p class="slider_news_text">A Clínica da Idade, disponibiliza aos seus utentes e à população em 
                            geral, uma nova consulta gratuita, Consulta de Enfermagem,
                            de modo a proporcionar a todos um acompanhamento
                            personalizado e especializado.</p>
                        <a class="slider_news_link" href=""><img src="<?php echo ROOT; ?>img/button.png"/></a>
                    </div>
                    <div>         
                        <h2 class="slider_news_title">Terapia da Fala</h2>
                        <p class="slider_news_text">A Clínica da Idade disponibiliza um novo serviço de modo a oferecer aos seus utentes um vasto leque de possibilidades terapêuticas: terapia da fala.</p>
                        <a class="slider_news_link" href=""><img src="<?php echo ROOT; ?>img/button.png"/></a>
                        <div class="slider_news_divider"></div>
                        <h2 class="slider_news_title">Rastreio Cancro do Cólon e Recto</h2>
                        <p class="slider_news_text">No próximo mês de Março, a Unidade de Coloproctologia da Clínica 
                            da Idade promove um Rastreio gratuito ao cancro do cólon e recto.</p>
                        <a class="slider_news_link" href=""><img src="<?php echo ROOT; ?>img/button.png"/></a>
                    </div>


                </div>

                <?php
            }
            break;

        case 'addProduto' :
            $titulo = $_POST['titulo'];
            $valorinicial = $_POST['valorinicial'];
            $datafim = $_POST['datafim'];
            $descricao = $_POST['descricao'];
            $desconto = $_POST['desconto'];
            $condicoes = $_POST['condicoes'];
            $id_empresa = 1;
            $action_server->addProduto($titulo, $valorinicial, $desconto, $datafim, $descricao, $condicoes, $id_empresa);
            break;
        case 'addNovaEmpresa' :
            $id_empresa = $_POST['id_empresa'];
            $descricao_empresa = $_POST['descricao_empresa'];
            $nome_empresa = $_POST['nome_empresa'];
            $morada = $_POST['morada'];
            $action_server->addNovaEmpresa($id_empresa, $descricao_empresa, $nome_empresa, $morada);
            break;
        case 'getEmpresas':
            $empresas = $action_server->getEmpresas();
            if (sizeof($empresas) > 0) {

                echo "<script type='text/javascript'>Actions.init();</script>";
                echo "<div style='float:left; width:645px; margin-top:10px;margin-bottom:10px'><b>Empresa Proprietária:</b> <select class='empresa' name='empresa'>";
                echo "<option value=''>Escolha empresa</option>";
                for ($row = 0; $row < sizeof($empresas); $row++) {
                    $id_empresa = $empresas[$row]['id_empresa'];
                    $nome = $empresas[$row]['nome_empresa'];
                    echo "<option value='$id_empresa'>$nome</option>";
                }
                echo "</select></div>";
            }
            break;


        case 'getEmpresa':
            $id_empresa = $_POST['id_empresa'];
            $empresa = $action_server->getEmpresa($id_empresa);
            if ($teste == 0) {
                echo "<script type='text/javascript'>Actions.init();</script>";
                $teste = 1;
            }
            if (is_numeric($id_empresa)) {
                ?>
                <script>
                    jQuery(document).ready(function($){
                        $(".mapa_google").fuGMAP({markers: [{address:'<?php echo $empresa['morada_empresa']; ?>', zoom:4}]});
                                                                                                                                                                                        
                                                                                                                                                                    
                    });
                </script>
                <div class="apresentacao_empresa" >
                    <table style=" margin-bottom: 10px;margin-top: 10px;float:left; margin-left: 25px"width="655" border="0" cellspacing="0" cellpadding="0" >
                        <tr>
                            <td height="20" style="background-repeat:no-repeat; background-image:url('<?php echo ROOT; ?>imagens/header_apresenta_empresa.png'); "></td>
                            <td style="background-repeat:no-repeat; background-image:url('<?php echo ROOT; ?>imagens/header_mapa_apres_empresa.png'); "></td>
                        </tr>
                        <tr>
                            <td VALIGN="top" style=" padding-left:45px; padding-right: 20px; font-family: verdana; text-align:left; background-color:#fcfcfc; background-repeat:repeat-x; background-image:url('<?php echo ROOT; ?>imagens/degrade_apresenta_empresa.png'); background-position:bottom;">
                                <h4 >Descrição</h4>
                                <?php echo $empresa['descricao_empresa']; ?>       
                            </td>
                            <td VALIGN="top" style="padding-top:8px; text-align:left;background-image:url('<?php echo ROOT; ?>imagens/degrade_apresenta_empresa_mapa.png');"  >
                                <div class="mapa_middle_apresentacao_empresa_titulo">A Empresa</div>
                                <div class="mapa_middle_apresentacao_empresa_nome_empresa">
                                    <b style="color: #058ccc"><?php echo $empresa['nome_empresa']; ?></b></div><br />
                                <?php
                                $image = ROOT . $empresa['logotipo'];
                                echo "<img style='margin-left:30px; margin-top:10px; margin-bottom: -10px;' src='$image'/>";
                                ?>

                                <div class="mapa_middle_apresentacao_morada_empresa">

                                    <b style="margin-left: -10px;margin-bottom: 3px;">Morada:</b><br/>
                                    <?php echo $empresa['morada']; ?><br/>
                                    <b style="margin-left: -10px; margin-bottom: 3px;">Horário:</b><br/>
                                    <?php echo $empresa['horario']; ?><br/>
                                    <b style="margin-left: -10px; margin-bottom: 3px;">Contactos:</b><br/>
                                    <?php echo $empresa['telefone']; ?> <br/>
                                    <?php echo $empresa['telemovel']; ?> <br/>
                                    <?php echo $empresa['email']; ?><br/>
                                    <b style="margin-left: -10px; margin-bottom: 3px;">Website:</b><br/>
                <?php echo $empresa['website']; ?><br/>
                                    <b style="margin-left: -10px;margin-bottom: 3px;">Localização:</b><br/>
                                </div>
                                <div style="margin-top: 10px; margin-left: 12px; width: 160px; height: 200px; "class="mapa_google"></div>
                                <br />

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="<?php echo ROOT; ?>imagens/footer_apres_empresa.png">
                            </td>
                            <td>
                                <img src="<?php echo ROOT; ?>imagens/footer_mapa_apres_empresa.png">
                            </td>
                        </tr> 
                    </table>
                </div>
                <?php
            } else {
                ?>

                <form method='post' id='form2'>
                    <input type='hidden' name='action' value='addEmpresa' id='action'/>
                    <div class="apresentacao_empresa" >
                        <table style=" margin-bottom: 10px;margin-top: 10px;float:left; margin-left: 25px"width="655" border="0" cellspacing="0" cellpadding="0" >
                            <tr>
                                <td height="20" style="background-repeat:no-repeat; background-image:url('<?php echo ROOT; ?>imagens/header_apresenta_empresa.png'); "></td>
                                <td style="background-repeat:no-repeat; background-image:url('<?php echo ROOT; ?>imagens/header_mapa_apres_empresa.png'); "></td>
                            </tr>
                            <tr>
                                <td VALIGN="top" style=" padding-left:45px; padding-right: 20px; font-family: verdana; text-align:left; background-color:#fcfcfc; background-repeat:repeat-x; background-image:url('<?php echo ROOT; ?>imagens/degrade_apresenta_empresa.png'); background-position:bottom;">
                                    <h4 >Descrição</h4>
                                    <textarea class='ckeditor' name='descricao_empresa'></textarea>
                                    <h4 style="margin-top:10px;">Informação Administrativa</h4>
                                    <div id="stylized" style="margin-top: -15px;" class="myform">

                                        <p>
                                            <label class='lbl_registo'>Fax
                                                <span class="small">Número de Fax</span>
                                            </label>
                                            <input type="text" name="fax" id="fax" size="30" />
                                        </p> 
                                        <p>
                                            <label class='lbl_registo'>NIF
                                                <span class="small"></span>
                                            </label>
                                            <input type="text" name="NIF" id="NIF"  size="30" />
                                        </p>

                                        <p style="padding-top: 10px;">
                                            <label class='lbl_registo'>NIB
                                                <span class="small"></span>
                                            </label>
                                            <input type="text" name="NIB" id="NIB" size="30" />
                                        </p>
                                        <p style="padding-top: 10px;">
                                            <label class='lbl_registo'>Banco
                                                <span class="small">Nome do Banco</span>
                                            </label>
                                            <input type="text" name="banco" id="banco" size="30" />
                                        </p>      
                                        <button type="submit">Finalizar Registo</button>           
                                    </div>
                                </td>
                                <td VALIGN="top" style="padding-top:8px; text-align:left;background-image:url('<?php echo ROOT; ?>imagens/degrade_apresenta_empresa_mapa.png');"  >


                                    <div class="mapa_middle_apresentacao_empresa_titulo">A Empresa</div>
                                    <div class="mapa_middle_apresentacao_empresa_nome_empresa">
                                        <input type='text'  name='nome_empresa' style='width:140px;' id='nome_empresa'/>
                                        <p>Nome da Empresa do Parceiro</p>
                                        <img style="margin-left:30px; margin-top:10px; margin-bottom: -10px;"src="<?php echo ROOT; ?>imagens/logo_teste.png">
                                        <div class="mapa_middle_apresentacao_morada_empresa">

                                            <b style="margin-left: -10px;margin-bottom: 3px;">Morada:</b><br/>
                                            <input type='text' name='morada'  style='width:140px;' id='morada'/>
                                            <p>Morada para o cliente</p>
                                            <b style="margin-left: -10px; margin-bottom: 3px;">Horário:</b><br/>
                                            <textarea class='ckeditor3' name='horario'>Segunda a Sexta:
                                                                                                                                                                                              <br/>8-19H<br/>
                                                                                                                                                                                            Sabádo:
                                                                                                                                                                                                9-13H</textarea>
                                            <b style="margin-left: -10px; margin-bottom: 3px;">Contactos:</b><br/>
                                            <input type="text" name="telefone" id="telefone" size="20" />
                                            <p>Nº Telefone</p><br/>
                                            <input type="text" name="telemovel" id="telemovel" size="20"  />
                                            <p>Nº Telemovel</p><br/>
                                            <input type="email" name="email" id="email" size="20"/>
                                            <p>Email do Parceiro</p><br/>
                                            <b style="margin-left: -10px; margin-bottom: 3px;">Website:</b><br/>
                                            <input type="text" name="website" id="website"  size="20" />
                                            <p>www.xpto.com</p> <br/>
                                            <b style="margin-left: -10px;margin-bottom: 3px;">Localização:</b><br/>
                                            <input type='text' name='morada_empresa'  style='width:140px;' id='nome_empresa'/>
                                            <p>Ex. Avenida Jão de Deus Ramos 146, Coimbra, Portugal</p> 
                                        </div>

                                </td>
                            </tr>

                            <td>
                                <img src="<?php echo ROOT; ?>imagens/footer_apres_empresa.png">
                            </td>
                            <td>
                                <img src="<?php echo ROOT; ?>imagens/footer_mapa_apres_empresa.png">
                            </td>
                            </tr> 
                        </table>
                    </div>
                </form>
                <?php
            }
            break;
        case 'addEmpresa':
            $descricao_empresa = $_POST['descricao_empresa'];
            $nome_empresa = $_POST['nome_empresa'];
            $morada = $_POST['morada'];
            $morada_empresa = $_POST['morada_empresa'];
            $telefone = $_POST['telefone'];
            $fax = $_POST['fax'];
            $telemovel = $_POST['telemovel'];
            $email = $_POST['email'];
            $website = $_POST['website'];
            $NIF = $_POST['NIF'];
            $NIB = $_POST['NIB'];
            $banco = $_POST['banco'];
            $horario = $_POST['horario'];
            $logo = $_POST['logotipo'];
            $addempresa = $action_server->addNovaEmpresa($nome_empresa, $morada, $morada_empresa, $telefone, $fax, $telemovel, $email, $website, $NIF, $NIB, $banco, $descricao_empresa, $logo, $horario);

            break;


        case 'addclient':
            $user = $_POST['user'];
            $password = $_POST['pass1'];
            $nome = $_POST['nome'];
            $cidade = $_POST['cidade'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $geralNews = $_POST['geralNews'];
            $cidadeNEWS = $_POST['cidadeNEWS'];




            $name = md5(uniqid(rand(), true));
            $test = $action_server->addclient($user, $password, $nome, $cidade, $email, $telefone, $name, $geralNews, $cidadeNEWS);

            $msg = "
    <?php session_start()?>
    <!doctype html>
    <html>
    <head>
    <meta charset='utf-8'>

    <meta name='author' content='Ricardo Martins @ RMartynDesign' />
    <title>GREATdiscounTZ - Os melhores Descontos </title>
  
    <style>
   .registo_mail_back{
	background-color:black;
	width:721px;
	height:388px;
	float:left;
}

.registo_mail_content{
        background: url('http://i42.tinypic.com/5cg8qe.png') no-repeat;
	width:721px;
	height:388px;
	float:left;
	}
	
.registo_mail_text_registo{
    float: left;
    height: 170px;
    margin-left: 34px;
    margin-top: 150px;
    width: 650px;
}

.registo_mail_text_registo h1{
	font-family: verdana;
    font-size: 14px;
	padding-left:10px;
}

.registo_mail_text_registo h2{
	padding-left:10px;
	font-family: verdana;
    font-size: 13px;
	
}
.registo_mail_text_registo p{
	font-family: verdana;
    font-size: 12px;
    padding-left: 25px;
    padding-top: 24px;
}

.registo_mail_text_registo A:link { text-decoration: none; color:#058ccc}
.registo_mail_text_registo A:visited {text-decoration: none; color: #058ccc;}
.registo_mail_text_registo A:active {text-decoration: none; color: #058ccc;}
.fregisto_mail_text_registo A:hover {text-decoration: none; color: #058ccc;}

.registo_mail_footer{
	 float: left;
    font-family: verdana;
    font-size: 9px;
    margin-left: 57px;
    margin-top: 25px;}


    
    </style>
    
    </head>
    <div class='registo_mail_back'>
	<div class='registo_mail_content'>
	
	<div class='registo_mail_text_registo'>
		<h1>Bem Vindo(a), Luis Oliveira</h1>
		<p>Obrigado por ter criado a sua conta.</p> 
		<p>Por favor active a sua conta através do seguinte link: <a href ='www.greatdiscountz.com/greatdiscountz'><b>verifique o seu endereço de e-mail</b></a>.</p>
	</div>
	
	<div class='registo_mail_footer'>
		Precisa de ajuda? Contacto-nos: 21 xxx xx xx /93 xxx xx xx / 96 xxx xx xx /91 xxx xx xx / info@greatdiscountz.com
	</div>
	</div>
</div>";

            $mail = new PHPMailer(); // defaults to using php "mail()"
//            $msg->IsSMTP();
//                 $msg -> IsSMTP = ('smtp');
            $body = $msg;
            $body = eregi_replace("[\]", '', $body);
            $mail->AddReplyTo("rmartyn@live.com.pt", "GREATdiscounTZ - Os seus descontos");

            $mail->SetFrom("rmartyn@live.com.pt", "GREATdiscounTZ - Os seus descontos");


            $address = $email_cliente;
            $mail->AddAddress($email, $nome);

            $mail->Subject = "GREATdiscounTZ - Confirme a sua conta.";
            $mail->CharSet = 'UTF-8';

            $mail->MsgHTML($body);

            if (!$mail->Send()) {
                
            } else {
                
            }

            echo $test;

            break;
        case 'getcidade' :
            $json = $action_server->getcidades();

            echo json_encode($json);
            break;
        case 'getcategoria' :
            $json = $action_server->getcategorias();
//             for ($i = 0; $i <= sizeof($json); $i++){
//          
//            $a = $json[$i]['categoria'];
//           // echo "<script>alert($a);</script>";
//            $json[$i]['categoria'] = utf8_encode($a);
//             // echo "<script>alert($record[$i]['categoria');</script>";
//        }
            echo json_encode($json);
//            echo "<pre>";
//            print_r($json);
//             echo "</pre>";
            break;
        case 'getsexo' :
            $json = $action_server->getcidades();

            echo json_encode($json);
            break;

        case 'DelDesconto' :
            $id_desconto = $_POST['id'];
            $action_server->DelDesconto($id_desconto);
            ?>

            <script>
                jQuery(document).ready(function($){
                    $('.bt_sub').click(function(){
                        var id = $(this).attr('data-id');
                                                            
                        $("#dialog-confirm").dialog({
                            resizable: false,
                            modal: false,
                            buttons: {
                                "Apagar Desconto": function() {
                                    $.ajax({  
                                        type: "POST",  
                                        url: "<?php echo ROOT . '/control/functions.php'; ?>",  
                                        data: "action=DelDesconto&id="+id,
                                        success: function(data){ 
                                            $('.registos').html(data);
                                        },
                                                       error:function (xhr, ajaxOptions, thrownError){
                                                               if(xhr.readyState == 0 || xhr.status == 0) {
                                                                       return;
                                                               } else {
                                                                       alert(xhr.status);
                                                                       alert(thrownError);
                                                               }
                                                       }  
                                                                                                                                                                          
                                    });  
                                    $( this ).dialog( "close" );
                                },
                                "Cancelar": function() {
                                    $( this ).dialog( "close" );
                                }
                            }
                        });
                    });
                });
                                                                                                                                                                            
            </script>

            <form id="form1" enctype="multipart/form-data" method="post">
                <?php
                $service = $_POST['id'];
                $action_server = new ActionServer();

                $cidades = $action_server->getcidades();

                if ($service) {
                    for ($row2 = 0; $row2 < sizeof($cidades); $row2++) {
                        $nomecidade = $cidades[$row2]['cidade'];
                        $produtos = $action_server->getTodosProdutos($nomecidade);
                        if (sizeof($produtos) > 0) {

                            echo "<div class='titulo_admin_gestao_cidades' style='text-shadow: 2px 2px 2px #000;'>Cidade: " . $nomecidade . " </div>";

                            echo"   <table  id='gradient-style' summary='Clientes'>
    <thead>
    	<tr>
        <th scope='col'>Imagem</th>
            <th scope='col'>ID Produto</th>
            <th scope='col'>Empresa</th>
            <th scope='col'>Cidade</th>
             <th scope='col'>Data Inicio</th>
              <th scope='col'>Data Fim</th>
              <th scope='col'>Titulo</th>
               <th scope='col'>Eliminar</th>               
</tr>
    </thead>  
";
                            for ($row = 0; $row < sizeof($produtos); $row++) {
                                $imagem = $produtos[$row]['thumb'];
                                $id_produto = $produtos[$row]['id_produto'];
                                $titulo = $produtos[$row]['titulo'];
                                $id_empresa = $produtos[$row]['id_empresa'];
                                $empresa = $action_server->getEmpresa($id_empresa);
                                $nome_empresa = $empresa['nome_empresa'];
                                $datainicio = $produtos[$row]['datainicio'];
                                $datafim = $produtos[$row]['datafim'];
                                $cidade = $produtos[$row]['cidade'];

                                echo"
                 <tbody>
                    <tr>
                        <td><img src=" . ROOT . $imagem . " /></td>
                        <td>" . $id_produto . "</td>
                        <td>" . $nome_empresa . "</td>
                        <td>" . $cidade . "</td>
                        <td>" . $datainicio . "</td>
                        <td>" . $datafim . "</td>
                        <td>" . utf8_encode($titulo) . "</td>
                             <td><button data-id='$id_produto' class='bt_sub' type='button'>Eliminar Desconto</button></td>
                             </tr>";
                            }

                            echo "</tbody>
            </table>";
                        }
                    }
                }
                ?>
            </div>
            </form>
            <?php
            break;

        case 'DelParceiro':
            $id_parceiro = $_POST['id'];
            $action_server->DelParceiro($id_parceiro);
            ?>
            <script>
                jQuery(document).ready(function($){
                    $('.bt_sub').click(function(){
                        var id = $(this).attr('data-id');
                        $("#dialog-confirm").dialog({
                            resizable: false,
                            modal: false,
                            buttons: {
                                "Apagar Parceiro": function() {
                                    $.ajax({  
                                        type: "POST",  
                                        url: "<?php echo ROOT . '/control/functions.php'; ?>",  
                                        data: "action=DelParceiro&id="+id,
                                        success: function(data){ 
                                            $('.registos').html(data);
                                        },
                                                       error:function (xhr, ajaxOptions, thrownError){
                                                               if(xhr.readyState == 0 || xhr.status == 0) {
                                                                       return;
                                                               } else {
                                                                       alert(xhr.status);
                                                                       alert(thrownError);
                                                               }
                                                       }  
                                    });  
                                    $( this ).dialog( "close" );
                                },
                                "Cancelar": function() {
                                    $( this ).dialog( "close" );
                                }
                            }
                        });
                    });
                });
                                                                                                                                                    
            </script>
            <?php
            $parceiro = $action_server->getparceiros();
            if (sizeof($parceiro) > 0) {
                echo"   <table id='gradient-style' summary='Clientes'>
    <thead>
    	<tr>
       <th scope='col'>Imagem</th>
<th scope='col'>ID Parceiro</th>
            <th scope='col'>Nome</th>
            <th scope='col'>NIF</th>
             <th scope='col'>Telefone</th>
              <th scope='col'>Telemovel</th>
              <th scope='col'>Email</th>
               <th scope='col'>Eliminar Parceiro</th>
</tr>
    </thead>  
";
                for ($row = 0; $row < sizeof($parceiro); $row++) {
                    $id_parceiro = $parceiro[$row]['id_empresa'];
                    $NIF = $parceiro[$row]['NIF'];
                    $nome = $parceiro[$row]['nome_empresa'];
                    $imagem = $parceiro[$row]['logotipo'];
                    $telefone = $parceiro[$row]['telefone'];
                    $telemovel = $parceiro[$row]['telemovel'];
                    $email = $parceiro[$row]['email'];
                    echo"
                 <tbody>
                    <tr>
                    <td>
                     <img src=" . ROOT . $imagem . " /></td>
                        <td>" . $id_parceiro . "</td>
                        <td>" . $nome . "</td>
                        <td>" . $NIF . "</td>
                        <td>" . $telefone . "</td>
                        <td>" . $telemovel . "</td>
                        <td>" . $email . "</td>
                     <td><button data-id='$id_parceiro' class='bt_sub' type='button'>Eliminar</button></td>
                    </tr>";
                }
                echo "</tbody>
            </table>";
            }
            ?>

            </div>
            <?php
            break;
        case 'Delcliente':
            $id_cliente = $_POST['id'];
            $action_server->Delcliente($id_cliente);
            ?>
            <script>
                jQuery(document).ready(function($){
                    $('.bt_sub').click(function(){
                        var id = $(this).attr('data-id');
                        $("#dialog-confirm").dialog({
                            resizable: false,
                            modal: false,
                            buttons: {
                                "Apagar Cliente": function() {
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo ROOT . '/control/functions.php'; ?>",
                                        data: "action=Delcliente&id="+id,
                                        success: function(data){
                                            $('.registos').html(data);
                                        },
                                                       error:function (xhr, ajaxOptions, thrownError){
                                                               if(xhr.readyState == 0 || xhr.status == 0) {
                                                                       return;
                                                               } else {
                                                                       alert(xhr.status);
                                                                       alert(thrownError);
                                                               }
                                                       }  

                                    });
                                    $( this ).dialog( "close" );
                                },
                                "Cancelar": function() {
                                    $( this ).dialog( "close" );
                                }
                            }
                        });
                    });
                });

            </script>

            <div class="registos">                           
                <?php
                $cliente = $action_server->getclientes();

                echo"   <table style='margin-lefT:30px; text-align:center;' id='gradient-style' summary='Clientes'>
    <thead>
    		<tr>
              <th scope='col'>Imagem</th>
             <th scope='col'>ID Cliente</th>
            <th scope='col'>UserName</th>
            <th scope='col'>Nome</th>
            <th scope='col'>Cidade</th>
             <th scope='col'>Email</th>
              <th scope='col'>Telefone</th>
               <th scope='col'>Morada</th>
              <th scope='col'>Saldo</th>
               <th scope='col'>Admin</th>
               <th scope='col'>Editar</th> 
</tr>
    </thead>  

";
                for ($row = 0; $row < sizeof($cliente); $row++) {
                    $imagem = $cliente[$row]['photo'];
                    $id_cliente = $cliente[$row]['id_cliente'];
                    $username = $cliente[$row]['username'];
                    $nome = $cliente[$row]['nome'];
                    $cidade = $cliente[$row]['cidade'];
                    $email = $cliente[$row]['email'];
                    $telefone = $cliente[$row]['telefone'];
                    $morada = $cliente[$row]['morada'];
                    $admin = $cliente[$row]['admin'];
                    $saldo = $cliente[$row]['saldo'];

                    echo"
                 <tbody>
                      <tr>
                        <td><img src='https://graph.facebook.com/" . $imagem . "/picture'></td>
                        <td>" . $id_cliente . "</td>
                        <td>" . $username . "</td>
                        <td>" . $nome . "</td>
                       <td>" . $cidade . "</td> 
                        <td>" . $email . "</td>
                        <td>" . $telefone . "</td>
                        <td>" . $morada . "</td>
                        <td>" . $saldo . "€</td>
                    <td>" . $admin . "</td>
                   <td><button data-id='$id_cliente' class='bt_sub' type='button'>Eliminar</button></td>
                    </tr>";
                }
                echo "</tbody>
            </table>";
                ?>
            </div>   
            <?php
            break;


        case 'loginclient':

            $mail = $_POST['mail'];
            $pass = $_POST['pass1'];




            break;
        case 'get_payment' :

            break;

        case 'criaencomenda' :
            $idcliente = $_POST['idcliente'];
            $idproduto = $_POST['idproduto'];
            $quantidade = $_POST['numProd'];
            $preco = $_POST['preco'];
            $opcao = $_POST['opcao'];

            function getopcoes($opcao) {
                $opcoes = explode(":", $opcao);
                for ($i = 0; $i < (sizeof($opcoes) - 1); $i++) {
                    $opcoes2 = explode(";", $opcoes[$i]);
                    $opcoestotais[$i]['nome'] = $opcoes2[0];
                    $opcoestotais[$i]['preco'] = $opcoes2[1];
                    $opcoestotais[$i]['desconto'] = $opcoes2[2];
                }
                return $opcoestotais;
            }

            $encomendasdados = $action_server->criaencomenda($idproduto, $quantidade, $preco, $idcliente);
            $id_encomenda = $encomendasdados['id_encomenda'];
            $precofinal = $encomendasdados['precofinal'];

            $dadosmultibanco = GenerateMbRef('11473', '362', $id_encomenda, $precofinal);
            $entidade = $dadosmultibanco['entidade'];
            $referencia = $dadosmultibanco['referencia'];

            $action_server->updateencomenda($id_encomenda, $entidade, $referencia);

            $getdadosprod = $action_server->getProduto($idproduto);
            $opcoes = getopcoes($getdadosprod['opcao']);

            $preco = $produto['valor_inicial'] * (1 - ($produto['desconto'] / 100));
            echo"<span class='titulo_textos'>1º Passo - Resumo do seu desconto</span>";
            if ($opcao == null) {
                echo "
             
            <div class='detalhes_produto'>
            
                        <table border ='0'>
                            <tr>
                                <th width='120px' stylE='text-align: center;'>Desconto</th>
                                <th>Descrição do Desconto</th>
                                <th stylE='text-align: center;'>Quantidade</th>
                                <th stylE='text-align: center;'>Montante</th>
                                <th stylE='text-align: center;'>Total</th>
                            </tr>
                            <tr>
                                <td colspan='5'>
                                    <img style='padding-top:-15px; padding-bottom: -15px' src='" . ROOT . "imagens/linha_fundo.png'>
                                </td>
                            </tr>
                            <tr>
                                <td stylE='text-align: center;'>

                                    <img src='" . ROOT . $getdadosprod['thumb'] . "'/>
                                   
                                </td>
                                <td width='450px'>
                                    " . utf8_encode($getdadosprod['titulo']) . "
                                </td>
                                <td stylE='text-align: center;'>
                                    " . $quantidade . "
                                 
                                    
                                </td>

                                <td stylE='text-align: center;' width='80px'>
                                    <span class='valor' >
                                        " . $precofinal . "
                                    </span> €
                                </td>
                                <td  stylE='text-align: center;' width='100px'>
                                    <span class='total'>" . $precofinal . " € 
                                    </span>
                                </td>
                            </tr>
                        </table>
                        
                    </div> ";
            } else {

                echo "
                    <div class='detalhes_produto'>
                        <table width='900' border ='0'>
                            <tr>
                                <th  stylE='text-align: left;'>Desconto</th>
                                <th>Descrição do Desconto</th>
                                <th>Opção</th>
                                <th stylE='text-align: left;
                '>Quantidade</th>
                                <th stylE='text-align: left;
                '>Montante</th>
                                <th stylE='text-align: left;
                '>Total</th>
                            </tr>
                            <tr><td colspan='6'><img style='padding-top:-15px; padding-bottom: -15px ' src='" . ROOT . "imagens/linha_fundo.png'></td></tr>
                            <tr> 
                                <td stylE='text-align: left;'> 
                                     <img src='" . ROOT . $getdadosprod['thumb'] . "'/>
                                </td>
                                <td>
                                   " . utf8_encode($getdadosprod['titulo']) . "
                                </td>
                                <td>
                                  " . $opcoes[0]['nome'] . " (" . $opcoes[0]['preco'] . "€, com " . $opcoes[0]['desconto'] . " de desconto)
                                </td>
                                <td stylE='text-align:center;'>
                                    " . $quantidade . "
                                </td>
                                <td stylE='text-align: left;'><span class='valor'>
                                   " . $precofinal . " </span> €</td><td  stylE='text-align: left;
                '><span class='total'>" . $precofinal . " €
                </span></td>
                </tr>
                </table>
                </div>
                <div class='div_comprar'>
                        <span class='poupa2' style='visibility: hidden'>" . ($opcoes[0]['preco'] - $precofinal) . "</span>
                        <table>
                            <tr>                                                                                               
                                <td><span style='padding-top: -10px;'><b>Valor poupado: <span class='poupa'>" . ($opcoes[0]['preco'] - $precofinal) . "</span> €</b></span></td>
                                <td style='cursor:pointer; padding-top: 5px;'>
                                   
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
                   
                ";
            }
            echo"
                <div class='passo2e3'style='float:left;margin-top:35px;margin-left:30px; margin-bottom:10px;'>
                    <span class='titulo_textos_payment'>2º Passo - Seleccione o seu método de pagamento</span></br>
                    <div class='pagamento_mb'>
                        <h3>Referência Multibanco</h3>
                        <table style='margin-top:0px'>
                            <tr><td rowspan='4'><img src='" . ROOT . "imagens/fundo_pagamento_15.png'></td></tr>
                            <tr><td><b>Entidade: </b>" . $entidade . " </td></tr>
                            <tr><td><b>Referência: </b>" . $referencia . "</td></tr>
                            <tr><td><b>Montante: </b>" . $precofinal . " €</td></tr>
                        </table>


                    </div>
                    <div  class='pagamento_paypal'>
                        <h3 style='margin-left:-10px;'>Paypal</h3>
                        ";
            ?>


            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="payPalForm">
                <input type="hidden" name="item_number" value="<?php echo $idproduto; ?>">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="business" value="paypalservice@greatdiscountz.com">
                <input type="hidden" name="currency_code" value="EUR">
                <input type="hidden" name="return" value="http://greatdiscountz.com/greatdiscountz/accept_payment/">
                <input type="hidden" name="cancel_return" value="http://greatdiscountz.com/greatdiscountz/cancel_payment/">
                <input type="hidden" name='item_name' value="<?php echo $getdadosprod['titulo'] ?>">
                <input type="hidden" name="amount" type="text" id="amount" value="<?php echo $precofinal ?>">

                <table style="margin-top: 0px">
                    <tr><td> <input type="image" src="<?php echo ROOT; ?>imagens/paybt_15.png" name="Submit"></td></tr>
                    <tr><td align="center"><b>Montante: </b><?php echo $precofinal ?>  €</td></tr>
                </table>



            </form>
            <?php
            echo"</div>
  
</div>
   <div class='passo3'>
      <span class='titulo_textos_payment'>3º Passo - Finalize a sua compra</span></br>        

          <p>Estes dados foram enviados para o e-mail associado à sua conta. Terá 24 horas para poder completar a sua compra, utilizando um dos métodos de pagamentos existentes.</p>

          <p>O seu desconto encontra-se desde já disponível na sua área de 'A Minha Conta', na secção 'Os meus descontos'. </p>

          <p>Após efectuar o pagamento do seu desconto, ira receber num prazo máximo de 24 horas, no seu e-mail o seu voucher para poder usufruir do seu desconto.</p>
         </div>      

"
            ;

            break;

        case 'Delimage' :
            $idimage = $_POST['id'];
            $action_server->Delimage($idimage);

            break;
    }
}
?>