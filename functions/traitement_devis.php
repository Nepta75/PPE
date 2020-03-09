<?php
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

require_once("includes/topdf/html2pdf-master/src/Html2Pdf.php");
$cAdmin = $this->cAdmin;

$user = array(
    "id" => 1,
    "siret" => "152 356 785",
    "firstname" => "BMW",
    "lastname" => "PARIS",
    "email" => "lokmancfa@gmail.com",
    "portable" => "06.25.35.45.35",
    "address" => "1 rue de rivoli, PARIS 75001",
);

$datadevis = $this->selectDevis($_GET['id']);
$data = $this->selectClient($datadevis['id_client']);
$client = array(
            "id" => $data['id_user'],
			"firstname" => $data['prenom'],
			"lastname" => $data['nom'],
			"address" => $data['adresse'],
			"portable" => $data['tel'],
            "mail" => $data['mail'],
);

if(isset($datadevis['sujet']) && $datadevis["sujet"] == "vente") {
    $data = $cAdmin->selectVehicule($datadevis['immatriculation']);

    $project = array(
        "name" => "Votre devis détaillé pour : ".$data['data']['marque'].' '.$data['data']['modele'].' '.$data['type'],
    );

    $tasks[] = array(
        "id" => 1,
        "description" => $data['data']['marque'].', '.$data['data']['modele'].' '.$data['type'],
        "price" => $data['data']['prix'],
        "quantity" => 1,
        "project_id" => 1
    );

    $tasks[] = array(
        "id" => 2,
        "description" => "Modele : ".$data['data']['modele'],
        "price" => 0,
        "quantity" => 1,
        "project_id" => 2
    );
    
    $tasks[] = array(
        "id" => 3,
        "description" => "Type : ".$data['data']['type_vehicule'],
        "price" => 0,
        "quantity" => 1,
        "project_id" => 3
    );
    
    $tasks[] = array(
        "id" => 4,
        "description" => "Immatriculation : ".$data['data']['immatriculation'],
        "price" => 0,
        "quantity" => 1,
        "project_id" => 4
    );
    
    $tasks[] = array(
        "id" => 5,
        "description" => "Cylindree : ".$data['data']['cylindree'],
        "price" => 0,
        "quantity" => 1,
        "project_id" => 5
    );
}

$total = 0;  $total_tva = 0;
?>

<style type="text/css">
    table { 
        width: 100%; 
        color: #717375; 
        font-family: helvetica; 
        line-height: 5mm; 
        border-collapse: collapse; 
    }
    h2 { margin: 0; padding: 0; }
    p { margin: 5px; }
 
    .border th { 
        border: 1px solid #000;  
        color: white; 
        background: #000; 
        padding: 5px; 
        font-weight: normal; 
        font-size: 14px; 
        text-align: center; 
        }
    .border td { 
        border: 1px solid #CFD1D2; 
        padding: 5px 10px; 
        text-align: center; 
    }
    .no-border { 
        border-right: 1px solid #CFD1D2; 
        border-left: none; 
        border-top: none; 
        border-bottom: none;
    }
    .space { padding-top: 250px; }
 
    .10p { width: 10%; } .15p { width: 15%; } 
    .25p { width: 25%; } .50p { width: 50%; } 
    .60p { width: 60%; } .75p { width: 75%; }
</style>

<page backtop="10mm" backleft="10mm" backright="10mm" backbottom="10mm" footer="page;">
 
 <page_footer>
     <hr />
     <p>Fait a Paris, le <?php echo date("d/m/y"); ?></p>
     <p>Signature du particulier, suivie de la mension manuscrite "bon pour accord".</p>
     <br>
 </page_footer>

 <table style="vertical-align: top;">
     <tr>
         <td class="75p">
             <strong><?= $user['firstname']." ".$user['lastname']; ?></strong><br />
             <?= nl2br($user['address']); ?><br />
             <strong>SIRET:</strong> <?= $user['siret']; ?><br />
             <?= $user['email']; ?><br />
             n° devis: <?= $_GET['id']; ?>
         </td>
         <td class="25p">
             <strong><?php echo $client['firstname']." ".$client['lastname']; ?></strong><br />
             <?php echo nl2br($client['address']); ?><br />
             <?php echo "+33 ".$client['portable']; ?>
         </td>
     </tr>
 </table>

 <table style="margin-top: 50px;">
     <tr>
         <td class="50p"><h2>Vente de vehicule <?= $data['type'] ?></h2></td>
         <td class="50p" style="text-align: right;">Emis le <?php echo date("d/m/y"); ?></td>
     </tr>
     <tr>
         <td style="padding-top: 15px;" colspan="2"><strong>Objet :</strong> <?php echo $project['name']; ?></td>
     </tr>
 </table>

 <table style="margin-top: 30px;" class="border">
     <thead>
         <tr>
             <th class="60p">Description</th>
             <th class="10p">Quantité</th>
             <th class="15p">Prix Unitaire HT</th>
             <th class="15p">Montant</th>
         </tr>
     </thead>
     <tbody>
         <?php foreach ($tasks as $task): ?>
         <tr>
             <td><?php echo $task['description']; ?></td>
             <td><?php echo $task['quantity']; ?></td>
             <td><?php echo $task['price']; ?> euros</td>
             <td><?php
                     $price_tva = $task['price']*1.2;
                     echo $price_tva;
                 ?>
             euros</td>

             <?php
                 $total += $task['price'];
                 $total_tva += $price_tva;
             ?>
         </tr>
         <?php endforeach ?>

         <tr>
             <td class="space"></td>
             <td></td>
             <td></td>
             <td></td>
         </tr>

         <tr>
             <td colspan="2" class="no-border"></td>
             <td style="text-align: center;" rowspan="3"><strong>Total:</strong></td>
             <td>HT : <?php echo $total; ?> euros</td>
         </tr>
         <tr>
             <td colspan="2" class="no-border"></td>
             <td>TVA : <?php echo ($total_tva - $total); ?> euros</td>
         </tr>
         <tr>
             <td colspan="2" class="no-border"></td>
             <td>TTC : <?php echo $total_tva; ?> euros</td>
         </tr>
     </tbody>
 </table>

</page>

<?php
$content = ob_get_clean();
$pdf = new Html2Pdf('P','A4','fr',true,"UTF-8",array(10, 10, 10, 16)); 
$pdf->pdf->SetAuthor('BMW - PARIS');
$pdf->pdf->SetTitle('Devis '.$_GET['id']);
$pdf->pdf->SetSubject('Achat véhicule');
$pdf->writeHTML($content);
$pdf->output('devis.pdf');
?>